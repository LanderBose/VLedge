


document.addEventListener("DOMContentLoaded", function () {
    const pinBoxes = document.querySelectorAll(".pin-box");
    const cancelButton = document.getElementById("cancelButton");

    // Retrieve user's email from sessionStorage
    const userEmail = sessionStorage.getItem("userEmail");
    if (!userEmail) {
        alert("Session expired. Please log in again.");
        window.location.href = "/CC106/php/Admin_Login.php";
        return;
    }

    const pinCode = Math.floor(100000 + Math.random() * 900000).toString();
    sessionStorage.setItem("pinCode", pinCode); 

    emailjs.send("service_nzj75vb", "template_ab5996j", {
        to_email: userEmail,
        pin_code: pinCode
    }, "tsY0ahEWdqVEevENI")
    .then(() => {
        console.log("PIN sent successfully!");
    })
    .catch((error) => {
        console.error("Error sending PIN:", error);
    });

    // Handle PIN input
    pinBoxes.forEach((box, index) => {
        box.addEventListener("input", (e) => {
            if (e.target.value.length === 1 && index < pinBoxes.length - 1) {
                pinBoxes[index + 1].focus();
            }
            validatePin();
        });

        box.addEventListener("keydown", (e) => {
            if (e.key === "Backspace" && index > 0 && !box.value) {
                pinBoxes[index - 1].focus();
            }
        });
    });

    function validatePin() {
        let enteredPin = Array.from(pinBoxes).map(box => box.value).join("");
        const storedPin = sessionStorage.getItem("pinCode");

        if (enteredPin.length === 6) {
            if (enteredPin === storedPin) {
                alert("PIN verified successfully!");
                window.location.href = "/CC106/php/Dashboard.php"; 
            } else {
                alert("Incorrect PIN. Please try again.");
                pinBoxes.forEach(box => box.value = ""); 
                pinBoxes[0].focus();
            }
        }
    }

    cancelButton.addEventListener("click", function () {
        window.location.replace("/CC106/php/Admin_Login.php"); 
    });

    pinBoxes[0].focus();
});