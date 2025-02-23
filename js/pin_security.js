document.addEventListener("DOMContentLoaded", function () {
    const pinBoxes = document.querySelectorAll(".pin-box");
    const pinForm = document.getElementById("pinForm");
    const cancelButton = document.getElementById("cancelButton");

    pinBoxes.forEach((box, index) => {
        box.addEventListener("input", (e) => {
            if (e.target.value.length === 1 && index < pinBoxes.length - 1) {
                pinBoxes[index + 1].focus();
            }
            collectPin();
        });

        box.addEventListener("keydown", (e) => {
            if (e.key === "Backspace" && index > 0 && !box.value) {
                pinBoxes[index - 1].focus();
            }
        });
    });

    function collectPin() {
        let enteredPin = Array.from(pinBoxes).map(box => box.value).join("");
        if (enteredPin.length === 6) {
            // Redirect to Dashboard.php when all 6 digits are entered
            window.location.href = "/CC106/php/Dashboard.php";
        }
    }

    cancelButton.addEventListener("click", function () {
        window.location.replace("/CC106/php/Admin_Login.php"); // Redirect correctly
    });

    pinBoxes[0].focus();
});
