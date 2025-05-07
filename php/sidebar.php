<div class="sidebar">
    <div class="tools">
        <!-- Top: Logo -->
        <div class="top">
            <div class="logo-container">
                <img src="../images/icon.png" class="logo" alt="Logo">
            </div>
        </div>

        <!-- Middle: Menu Items -->
        <div class="middle">
            <div class="menu-item">
                <a href="../php/Dashboard.php" class="menu-link">
                    <img src="../images/home.png" alt="">
                </a>
            </div>
            <div class="menu-item">
                <a href="../php/statistics.php" class="menu-link">
                    <img src="../images/statistics.png" alt="">
                </a>
            </div>
            <div class="menu-item">
                <a href="../php/registry.php" class="menu-link">
                    <img src="../images/folder.png" alt="">
                </a>
            </div>
        </div>

        <!-- Bottom: Logout -->
        <div class="bottom">
            <div class="menu-item logout" id="logout" onclick="logout()">
                <a href="" class="menu-link">
                    <img src="../images/sign-out.png" alt="">
                </a>
            </div>
        </div>
    </div>
</div>


<script type="module">
    import { logout } from "../js/firebase.js";

    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("logout").addEventListener("click", function (event) {
            event.preventDefault(); 
            logout();
        });
    });
</script>