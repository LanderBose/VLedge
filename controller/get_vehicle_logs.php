<?php
include 'dbconnect.php';

header('Content-Type: application/json');

// Fetch logs with registration_type from vehicle_registration table
$sql = "SELECT vl.plate_number, vl.owner_name, vl.vehicle_type, vl.entry_time, vl.exit_time, vr.registration_type
        FROM vehicle_logs vl
        JOIN vehicle_registration vr ON vl.plate_number = vr.plate_number
        ORDER BY vl.entry_time DESC";

$result = $conn->query($sql);

$logs = [];
while ($row = $result->fetch_assoc()) {
    $logs[] = $row;
}

// Return JSON response
echo json_encode($logs);

$conn->close();
?>
