<?php
include 'dbconnect.php';

// NodeMCU IP address
$esp8266_ip = "http://192.168.4.1";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['plate_number'])) {
        echo json_encode(["error" => "No plate number provided"]);
        exit;
    }

    $plateNumber = $data['plate_number'];
    $currentTime = date('Y-m-d H:i:s');

    // 1. Check if plate exists in vehicle_registration table
    $stmt = $conn->prepare("SELECT plate_number, full_name, vehicle_type FROM vehicle_registration WHERE plate_number = ?");
    $stmt->bind_param("s", $plateNumber);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo json_encode(["error" => "Plate not registered."]);
        exit;
    }

    $vehicle = $result->fetch_assoc();
    $ownerName = $vehicle['full_name'];
    $vehicleType = $vehicle['vehicle_type'];

    $stmt->close();

    // 2. Check if the vehicle is already logged in (without an exit time)
    $stmt = $conn->prepare("SELECT log_id FROM vehicle_logs WHERE plate_number = ? AND exit_time IS NULL LIMIT 1");
    $stmt->bind_param("s", $plateNumber);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Vehicle is logged in – update the exit time
        $log = $result->fetch_assoc();
        $logId = $log['log_id'];

        $stmt->close();

        $updateStmt = $conn->prepare("UPDATE vehicle_logs SET exit_time = ? WHERE log_id = ?");
        $updateStmt->bind_param("si", $currentTime, $logId);

        if ($updateStmt->execute()) {
            echo json_encode(["message" => "Exit log updated successfully."]);

            // Trigger servo1 (exit)
            $response = file_get_contents("$esp8266_ip/servo1");
            echo json_encode(["servo" => "Exit gate opened", "NodeMCU Response" => $response]);

            // Log exit to Blockchain
            $command = "node C:\\xampp\\htdocs\\V-Chain\\js\\logToBlockchain.js exit \"$plateNumber\"";
            exec($command, $output, $returnCode);

            if ($returnCode === 0) {
                echo json_encode(["blockchain" => "Exit logged to blockchain successfully."]);
            } else {
                echo json_encode(["error" => "Failed to log exit to blockchain."]);
            }
        } else {
            echo json_encode(["error" => "Failed to update exit log."]);
        }

        $updateStmt->close();
    } else {
        // Vehicle is NOT logged in – log a new entry
        $stmt->close();

        $insertStmt = $conn->prepare("INSERT INTO vehicle_logs (plate_number, entry_time, owner_name, vehicle_type) VALUES (?, ?, ?, ?)");
        $insertStmt->bind_param("ssss", $plateNumber, $currentTime, $ownerName, $vehicleType);

        if ($insertStmt->execute()) {
            echo json_encode(["message" => "Entry log saved successfully."]);

            // Trigger servo2 (entry)
            $response = file_get_contents("$esp8266_ip/servo2");
            echo json_encode(["servo" => "Entry gate opened", "NodeMCU Response" => $response]);

            // Log entry to Blockchain
            $command = "node C:\\xampp\\htdocs\\V-Chain\\js\\logToBlockchain.js entry \"$plateNumber\" \"$ownerName\" \"$vehicleType\"";
            exec($command, $output, $returnCode);

            if ($returnCode === 0) {
                echo json_encode(["blockchain" => "Entry logged to blockchain successfully."]);
            } else {
                echo json_encode(["error" => "Failed to log entry to blockchain."]);
            }
        } else {
            echo json_encode(["error" => "Failed to save entry log."]);
        }

        $insertStmt->close();
    }

    $conn->close();
}
?>