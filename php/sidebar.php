<div class="sidebar">
    <div class="tools">
        <div class="menu-item">
            <img src="/CC106/images/Vlink.png" class="logo" alt="Logo">
        </div>
        <div class="menu-item">
            <a href="/CC106/php/Dashboard.php" class="menu-link">
                <img src="/CC106/images/dash.png" alt="">
                <span>Dashboard</span>
            </a>
        </div>
        <div class="menu-item">
            <a href="/CC106/php/transaction.php" class="menu-link">
                <img src="/CC106/images/trans.png" alt="">
                <span>Transactions</span>
            </a>
        </div>
        <div class="menu-item">
            <a href="/CC106/php/registry.php" class="menu-link active">
                <img src="/CC106/images/group.png" alt="">
                <span>Registry</span>
            </a>
        </div>

        <div class="spacer"></div> <!-- Pushes logout down -->

        <div class="menu-item logout" id="logout" onclick="logout()">
            <a href="" class="menu-link">
                <img src="/CC106/images/logout.png" alt="">
            </a>
        </div>
    </div>
</div>
<script type="module">
    import { logout } from "/CC106/js/firebase.js";

    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("logout").addEventListener("click", function (event) {
            event.preventDefault(); 
            logout();
        });
    });
</script>