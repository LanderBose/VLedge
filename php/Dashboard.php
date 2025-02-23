<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <h1 class="dashboard">Dashboard</h1>
    <link rel="stylesheet" href="/CC106/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <div class="logo"><img src="/CC106/images/Logo.png" alt="Logo" class="logo-img"></div>
            <nav>
                <ul>
                    <li class="active"><i class="fa-solid fa-tachometer-alt"></i> Dashboard</li>
                    <li><i class="fa-solid fa-file-alt"></i> Transactions</li>
                    <li><i class="fa-solid fa-users"></i> Registry</li>
                </ul>
            </nav>
        </aside>
        <main class="content">
            <header class="top-bar">
                <span class="dashboard-title">Dashboard</span>
                <div class="date-time">&nbsp;</div>
            </header>
            <section class="video-section">
                <div class="video-feed" id="camera1"><img src="/CC106/images/4K-IP-camera-infrared-scaled 2.png" alt="Camera 1"></div>
                <div class="video-feed" id="camera2"><img src="/CC106/images/4K-IP-camera-infrared-scaled 2.png" alt="Camera 2"></div>
            </section>
            <section class="transactions">
                <h2>Transactions</h2>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Plate No.</th>
                                <th>Plate Type</th>
                                <th>Date</th>
                                <th>TimeStamp</th>
                                <th>Access Point</th>
                                <th>Color</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>f74...</td>
                                <td>ABC 1234</td>
                                <td>Standard</td>
                                <td>2-14-25</td>
                                <td>12:30:00</td>
                                <td>Entry</td>
                                <td>Red</td>
                            </tr>
                            <tr>
                                <td>f75...</td>
                                <td>DEF 5678</td>
                                <td>Premium</td>
                                <td>2-14-25</td>
                                <td>12:45:00</td>
                                <td>Exit</td>
                                <td>Blue</td>
                            </tr>
                            <tr>
                                <td>f76...</td>
                                <td>GHI 9101</td>
                                <td>Standard</td>
                                <td>2-14-25</td>
                                <td>13:00:00</td>
                                <td>Entry</td>
                                <td>Black</td>
                            </tr>
                            <tr>
                                <td>f77...</td>
                                <td>JKL 1121</td>
                                <td>Commercial</td>
                                <td>2-14-25</td>
                                <td>13:15:00</td>
                                <td>Exit</td>
                                <td>White</td>
                            </tr>
                            <tr>
                                <td>f78...</td>
                                <td>MNO 3141</td>
                                <td>VIP</td>
                                <td>2-14-25</td>
                                <td>13:30:00</td>
                                <td>Entry</td>
                                <td>Gray</td>
                            </tr>
                            <tr>
                                <td>f79...</td>
                                <td>PQR 5161</td>
                                <td>Standard</td>
                                <td>2-14-25</td>
                                <td>13:45:00</td>
                                <td>Exit</td>
                                <td>Green</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
</body>

<script src="/CC106/js/dashboard.js"></script>
</html>

