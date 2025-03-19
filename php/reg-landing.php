<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/v-chain/css/styles.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <title>V-Chain Security</title>
</head>
<body>
<img src="/v-chain/images/svg.png" alt="" style="width: 100%; height: 150px; max-width: 100vw; display: block; position: relative;">
<div class="content">
            <div class="left-content">
            <img src="/v-chain/images/LOGO.png" alt="Registration Image" class="animated-logo" style="margin: 65px 0px 0px 0px; width: 400px; height: 400px;">
            </div>
            <div class="right-content">
            <h1>Start your security with <span class="element"></span>!</h1>
                <p>Register today to guarantee your safe and authorized entry and exit</p>
                <button class="register-btn" onclick="window.location.href='/v-chain/php/reg-registration.php';">Register</button>
            </div>
        </div>    
        <img src="/v-chain/images/svg_bottom.png" alt="" style="width: 100%;position: fixed;bottom: 0;left: 0;height: 150px;">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script>
        AOS.init();
  document.addEventListener("DOMContentLoaded", function () {
    const typed = new Typed('.element', {
      strings: ['V-Chain', 'a secure future', 'peace of mind'],
      typeSpeed: 50,
      backSpeed: 30,
      loop: true
    });
  });
</script>
    
</body>
</html>