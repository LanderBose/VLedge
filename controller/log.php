<?php
include 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $plateNumber = $_POST['plate_number'];
    $ownerName = $_POST['owner_name'];
    $vehicleType = $_POST['vehicle_type'];
    $entryTime = date('Y-m-d H:i:s');

    $query = "INSERT INTO vehicle_logs (plate_number, owner_name, vehicle_type, entry_time) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $plateNumber, $ownerName, $vehicleType, $entryTime);

    if ($stmt->execute()) {
        echo "Log saved to database successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
