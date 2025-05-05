<div class="sidebar">
    <div class="tools">
        <!-- Top: Logo -->
        <div class="top">
            <div class="logo-container">
                <img src="/v-chain/images/Vlink.png" class="logo" alt="Logo">
            </div>
        </div>

        <!-- Middle: Menu Items -->
        <div class="middle">
            <div class="menu-item">
                <a href="/v-chain/php/Dashboard.php" class="menu-link">
                    <img src="/v-chain/images/home.png" alt="">
                </a>
            </div>
            <div class="menu-item">
                <a href="/v-chain/php/statistics.php" class="menu-link">
                    <img src="/v-chain/images/statistics.png" alt="">
                </a>
            </div>
            <div class="menu-item">
                <a href="/v-chain/php/transaction.php" class="menu-link">
                    <img src="/v-chain/images/clock.png" alt="">
                </a>
            </div>
            <div class="menu-item">
                <a href="/v-chain/php/registry.php" class="menu-link">
                    <img src="/v-chain/images/folder.png" alt="">
                </a>
            </div>
        </div>

        <!-- Bottom: Logout -->
        <div class="bottom">
            <div class="menu-item logout" id="logout" onclick="logout()">
                <a href="" class="menu-link">
                    <img src="/v-chain/images/sign-out.png" alt="">
                </a>
            </div>
        </div>
    </div>
</div>


<script type="module">
    import { logout } from "/v-chain/js/firebase.js";

    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("logout").addEventListener("click", function (event) {
            event.preventDefault(); 
            logout();
        });
    });
</script>