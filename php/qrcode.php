<?php
// Get the local IP address dynamically
$ipAddresses = shell_exec("ipconfig"); // For Windows
preg_match('/IPv4 Address[.\s]+: ([\d\.]+)/', $ipAddresses, $matches);
$localIP = $matches[1] ?? getHostByName(getHostName()); // Fallback if needed

// Generate QR Code URL with a timestamp to force refresh
$qrUrl = "https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=http://$localIP/V-Chain/php/reg-registration.php&t=" . time();
?>
<img id="qrCode" src="<?php echo $qrUrl; ?>" alt="QR Code">
