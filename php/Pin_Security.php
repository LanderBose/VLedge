
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
    <script src="https://cdn.jsdelivr.net/npm/emailjs-com@3/dist/email.min.js"></script>
    <script>    emailjs.init("5rr0gFf8RlG6Q2UM7");    </script>
    <script type="module" src="/CC106/js/pin_security.js"></script>
</body>
</html>
