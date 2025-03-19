<?php
// NodeMCU IP address
$esp8266_ip = "http://192.168.4.1";

// Control LED (on/off)
$action = isset($_GET['action']) ? $_GET['action'] : 'servo1';

$response = file_get_contents("$esp8266_ip/$action");

echo "NodeMCU Response: $response";
?>
