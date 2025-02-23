document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("loginForm");

    form.addEventListener("submit", function (event) {
        const email = form.email.value.trim();
        const password = form.password.value.trim();
        window.location.href = "../Pin_Security.php";

        if (!email || !password) {
            alert("Please fill out both fields.");
            event.preventDefault();
        }
    });
});
