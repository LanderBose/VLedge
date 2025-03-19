<?php
$plateNumber = $_POST['plate_number'];
$ownerName = $_POST['owner_name'];
$vehicleType = $_POST['vehicle_type'];

$command = "node logToBlockchain.js \"$plateNumber\" \"$ownerName\" \"$vehicleType\"";
exec($command, $output, $returnCode);

if ($returnCode === 0) {
    echo "Log added to blockchain: " . implode("\n", $output);
} else {
    echo "Error adding log to blockchain.";
}
?>
