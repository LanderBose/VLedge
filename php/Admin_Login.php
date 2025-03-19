<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V-CHAIN Admin Login</title>
    <link rel="stylesheet" href="/v-chain/css/admin_login.css">
    <link href="https://fonts.googleapis.com/css2?family=Bagel+Fat+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <h1>V-CHAIN</h1>
            <p>Your vehicle’s safety,<br> powered by <strong>VChain</strong></p>
        </div>
        <div class="right-panel">
            <h2>ADMIN LOGIN</h2>
            <form id="loginForm">
            <input type="email" name="email" id="email" placeholder="Email" required>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <button type="submit" id ="submit">SUBMIT</button>
            </form>
        </div>
    </div>
    <script type="module" src="/CC106/js/admin_login.js" ></script>
</body>
</html>
