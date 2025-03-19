<?php
include 'dbconnect.php';

header('Content-Type: application/json');

// Fetch logs from vehicle_logs table
$sql = "SELECT log_id, plate_number, full_name, registration_type, date, timestamp, access_point 
        FROM vehicle_logs 
        ORDER BY timestamp DESC";

$result = $conn->query($sql);

$logs = [];
while ($row = $result->fetch_assoc()) {
    $logs[] = $row;
}

// Return JSON response
echo json_encode($logs);

$conn->close();
?>
