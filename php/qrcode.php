<?php
// Get all network interfaces
$ipAddresses = shell_exec("ipconfig"); // For Windows
preg_match('/IPv4 Address[.\s]+: ([\d\.]+)/', $ipAddresses, $matches);
$localIP = $matches[1] ?? getHostByName(getHostName()); // Fallback if needed
?>
<img id="qrCode" src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=http://<?php echo $localIP; ?>/CC106/php/reg-landing.php" alt="QR Code">
