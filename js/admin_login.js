import { login, register, logout } from "./firebase.js";

/*
document.getElementById("register-btn").addEventListener("click", () => {
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;
  register(email, password);
});
*/
  /*
document.getElementById("logout-btn").addEventListener("click", () => {
  logout();
});
*/


document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("loginForm");

    form.addEventListener("submit", async function (event) {
        event.preventDefault(); 

        const email = form.email.value.trim();
        const password = form.password.value.trim();

        if (!email || !password) {
            alert("Please fill out both fields.");
            return;
        }

        try {
            const user = await login(email, password);
            if (user) {
                console.log("Login successful:", user);
                window.location.href = "/CC106/php/Dashboard.php"; 
            }
        } catch (error) {
            console.error("Login failed:", error.message);
            alert("Invalid email or password. Please try again.");
        }
    });
});
