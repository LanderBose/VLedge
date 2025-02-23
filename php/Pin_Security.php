<?php
session_start();

// Define the correct PIN
$correctPin = "123456";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["pin"]) && is_array($_POST["pin"])) {
        $enteredPin = implode("", $_POST["pin"]); // Combine array values into a string

        if ($enteredPin === $correctPin) {
            // Redirect to the dashboard or another page
            header("Location: /CC106/php/Dashboard.php");
            exit();
        } else {    
            // Show error message
            $_SESSION["error"] = "Incorrect PIN. Try again.";
            header("Location: index.php");
            exit();
        }
    }
}

// Get error message (if exists)
$errorMessage = isset($_SESSION["error"]) ? $_SESSION["error"] : "";
unset($_SESSION["error"]); // Clear error after displaying
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter PIN</title>
    <link rel="stylesheet" href="/CC106/css/Pin_Security.css">
</head>
<body>
    <div class="container">
        <h2>Enter New PIN</h2>
        <?php if (!empty($errorMessage)) : ?>
            <p class="error"><?= $errorMessage ?></p>
        <?php endif; ?>
        <form id="pinForm" method="POST">
            <div class="pin-inputs">
                <input type="text" class="pin-box" name="pin[]" maxlength="1">
                <input type="text" class="pin-box" name="pin[]" maxlength="1">
                <input type="text" class="pin-box" name="pin[]" maxlength="1">
                <input type="text" class="pin-box" name="pin[]" maxlength="1">
                <input type="text" class="pin-box" name="pin[]" maxlength="1">
                <input type="text" class="pin-box" name="pin[]" maxlength="1">
            </div>
            <button type="button" id="cancelButton">Cancel</button>
        </form>
    </div>
    <script src="/CC106/js/pin_security.js"></script>
</body>
</html>
