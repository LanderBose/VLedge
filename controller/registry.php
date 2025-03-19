<?php
require 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $plate = $_POST['plate_number'];

    // Check vehicle in MySQL
    $stmt = $conn->prepare("SELECT * FROM vehicle_registration WHERE plate_number = ?");
    $stmt->bind_param("s", $plate);
    $stmt->execute();
    $result = $stmt->get_result();
    $vehicle = $result->fetch_assoc();

    if (!$vehicle) {
        echo json_encode(["error" => "Vehicle not registered."]);
        exit();
    }

    $name = $vehicle['full_name'];
    $vehicleType = $vehicle['vehicle_type'];
    $entryTime = date("Y-m-d H:i:s");

    // Store log in MySQL
    $stmt = $conn->prepare("INSERT INTO logs (plate_number, owner_name, vehicle_type, entry_time) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $plate, $name, $vehicleType, $entryTime);
    $stmt->execute();

    echo json_encode([
        "success" => true,
        "plate" => $plate,
        "name" => $name,
        "vehicleType" => $vehicleType
    ]);
}
?>
