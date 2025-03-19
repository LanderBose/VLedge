<?php
$servername = "localhost";  
$username = "root";         
$password = "";             
$database = "VChain";       

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $contact_number = $_POST['contact_number'];
    $house_address = $_POST['house_address'];
    $registration_type = $_POST['registration_type'];
    $plate_number = $_POST['plate_number']; // Changed variable name
    $vehicle_type = $_POST['vehicle_type'];
    $plate_type = $_POST['plate_type'];
    $vehicle_color = $_POST['vehicle_color'];

    // Remove spaces from the plate number
    $plate_number = str_replace(' ', '', $plate_number);

    $vehicle_images = "";

    if (!empty($_FILES['vehicle_images']['name'][0])) {
        $target_dir = "uploads/"; 
    
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
    
        $file_paths = [];
        $files = is_array($_FILES["vehicle_images"]["name"]) ? $_FILES["vehicle_images"]["name"] : [$_FILES["vehicle_images"]["name"]];
    
        foreach ($files as $key => $file_name) {
            $tmp_name = $_FILES["vehicle_images"]["tmp_name"][$key];
            $target_file = $target_dir . uniqid() . "_" . basename($file_name);
    
            if (move_uploaded_file($tmp_name, $target_file)) {
                $file_paths[] = $target_file;
            }
        }
    
        $vehicle_images = implode(",", $file_paths);
    }
    
    $sql = "INSERT INTO vehicle_registration 
            (id, full_name, contact_number, house_address, registration_type, plate_number, 
             vehicle_type, plate_type, vehicle_color, vehicle_images) 
            VALUES 
            (UUID(), ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $full_name, $contact_number, $house_address, 
                                    $registration_type, $plate_number, 
                                    $vehicle_type, $plate_type, $vehicle_color, 
                                    $vehicle_images);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
