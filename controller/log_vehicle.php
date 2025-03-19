<?php
include 'dbconnect.php';

header('Content-Type: application/json'); // Ensure JSON output

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $response = [];

    if (!isset($data['plate_number'])) {
        echo json_encode(["error" => "No plate number provided"]);
        exit;
    }

    $plateNumber = str_replace(' ', '', $data['plate_number']); // Remove spaces
    $currentDate = date('Y-m-d');
    $currentTime = date('H:i:s');

    // Generate a random log_id
    $logId = uniqid();

    // 1. Check if plate exists in vehicle_registration table
    $stmt = $conn->prepare("SELECT full_name, registration_type FROM vehicle_registration WHERE plate_number = ?");
    $stmt->bind_param("s", $plateNumber);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo json_encode(["error" => "Plate not registered."]);
        exit;
    }

    $vehicle = $result->fetch_assoc();
    $ownerName = $vehicle['full_name'];
    $registrationType = $vehicle['registration_type'];
    $stmt->close();

    // Access point is null for now
    $accessPoint = null;

    // 2. Insert into vehicle_logs table
    $stmt = $conn->prepare("INSERT INTO vehicle_logs (log_id, plate_number, full_name, registration_type, date, timestamp, access_point) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $logId, $plateNumber, $ownerName, $registrationType, $currentDate, $currentTime, $accessPoint);

    if ($stmt->execute()) {
        $response["message"] = "Log saved successfully.";

        // Log to Blockchain
        $command = "node C:\\xampp\\htdocs\\V-Chain\\js\\logToBlockchain.js \"$logId\" \"$plateNumber\" \"$ownerName\" \"$registrationType\" \"$currentDate\" \"$currentTime\"";
        exec($command, $output, $returnCode);

        $response["blockchain"] = ($returnCode === 0) ? "Log recorded on blockchain successfully." : "Failed to log on blockchain.";
    } else {
        $response["error"] = "Failed to save log.";
    }

    $stmt->close();
    $conn->close();

    echo json_encode($response);
}
?>
