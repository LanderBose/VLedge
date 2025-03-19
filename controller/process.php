<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    if (!isset($data['image'])) {
        echo json_encode(["error" => "No image received"]);
        exit;
    }

    // Decode Base64 Image and Save to Server
    $imageData = $data['image'];
    $imageData = str_replace('data:image/jpeg;base64,', '', $imageData);
    $imageData = base64_decode($imageData);
    $imagePath = "C:/xampp/htdocs/v-chain/capture.jpg";
    file_put_contents($imagePath, $imageData);

    // Run OpenALPR
    $command = "alpr -c ph -p ph \"$imagePath\"";
    $output = shell_exec($command);
    
    preg_match('/-\s+([A-Z0-9]+)\s+confidence:/i', $output, $matches);
    $plate = $matches[1] ?? 'Not Detected';

    if($matches){

    }


    echo json_encode(["plate" => $plate]);
}
?>