<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <h5 class="dashboard">Dashboard</h5>
    <link rel="stylesheet" href="/CC106/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://unpkg.com/video.js/dist/video-js.css" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="sidebar">
        
            <div class="tools">
    
                <div class="menu-item">
                    <img src="/CC106/images/Logo.png" class="logo" alt="Logo">
                </div>
        
                <div class="menu-item">
                    <img src="/CC106/images/dash.png" alt="">
                    <span>Dashboard</span>
                </div>
                <div class="menu-item">
                    <img src="/CC106/images/trans.png" alt="">
                    <span>Transactions</span>
                </div>
                <div class="menu-item">
                    <img src="/CC106/images/group.png" alt="">
                    <span>Registry</span>
                </div>
                <div class="menu-item">
                    <img src="/CC106/images/logout.png" class="logout"alt="">
                </div>
    
            </div>
    
        </div>
    
        <main class="content">
            <header class="top-bar">
                <span class="dashboard-title">Dashboard</span>
                <div class="date-time">&nbsp;</div>
            </header>
            <section class="video-section">
             <video id="videoPlayer" class="video-js vjs-default-skin" controls autoplay>
                <source src="hls/stream.m3u8" type="application/x-mpegURL">
            </video>

            <video id="videoPlayer" class="video-js vjs-default-skin" controls autoplay>
                <source src="hls/stream.m3u8" type="application/x-mpegURL">
            </video>

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
                                <td>f75...</td>
                                <td>DEF 5678</td>
                                <td>Premium</td>
                                <td>2-14-25</td>
                                <td>12:45:00</td>
                                <td>Exit</td>
                                <td>Blue</td>
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
                                <td>f75...</td>
                                <td>DEF 5678</td>
                                <td>Premium</td>
                                <td>2-14-25</td>
                                <td>12:45:00</td>
                                <td>Exit</td>
                                <td>Blue</td>
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

    <script src="https://unpkg.com/video.js/dist/video.js"></script>
    <script>
    var player = videojs('videoPlayer');
    function updateDateTime() {
        const now = new Date();
        const formattedDate = now.toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' });
        const formattedTime = now.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
        document.querySelector('.date-time').innerHTML = `${formattedDate} &nbsp; ${formattedTime}`;
    }
    setInterval(updateDateTime, 1000);
    window.onload = updateDateTime;
</script>
</body>
</html>

