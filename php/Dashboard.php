<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <h5 class="dashboard">Dashboard</h5>
    <link rel="stylesheet" href="/CC106/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/video.js/dist/video.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/video.js/dist/video-js.min.css">
    <link rel="stylesheet" href="/CC106/css/sidebar.css">
    <link rel="stylesheet" href="/CC106/css/modal.css">
</head>
<body>
<?php include 'sidebar.php'; ?>  <!-- Include the sidebar -->

            <main class="content">
            <header class="top-bar">
                <span class="dashboard-title">Dashboard</span>
                <div class="date-time">&nbsp;</div>
            </header>

            <section class="video-section">

                    <video id="camera1" class="video-js vjs-default-skin" controls autoplay></video>
                    <canvas id="canvas1" style="display:none;"></canvas>
                    <video id="camera2" class="video-js vjs-default-skin" controls autoplay></video>
                    <canvas id="canvas2" style="display:none;"></canvas>
            </section>
            
            <section class="plate-container">
                <div class="plate-block">
                    <p class="text-plate">Detected Plate on Camera 1:</p>
                    <p id="plate1">ABC 1234</p>
                </div>
                <div class="plate-block">
                    <p class="text-plate2">Detected Plate on Camera 2:</p>
                    <p id="plate2">XYZ 5678</p>
                </div>
    </section>

     
            <section class="transactions">
                <h2>Transactions</h2>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Plate No.</th>
                                <th>Name</th>
                                <th>Registration Type</th>
                                <th>Date</th>
                                <th>TimeStamp</th>
                                <th>Access Point</th>
                            </tr>
                        </thead>
                <tbody>
                    <tr>
                        <td>f74a1b...</td>
                        <td>ABC 1234</td>
                        <td>John Doe</td>
                        <td>Resident</td>
                        <td>2-14-25</td>
                        <td>12:30:00</td>
                        <td>Entry</td>
                    </tr>
                    <tr>
                        <td>f75c2d...</td>
                        <td>DEF 5678</td>
                        <td>Jane Smith</td>
                        <td>Guest</td>
                        <td>2-14-25</td>
                        <td>12:45:00</td>
                        <td>Exit</td>
                    </tr>
                    <tr>
                        <td>f76e3f...</td>
                        <td>GHI 9101</td>
                        <td>Michael Brown</td>
                        <td>Resident</td>
                        <td>2-14-25</td>
                        <td>13:00:00</td>
                        <td>Entry</td>
                    </tr>
                    <tr>
                        <td>f77g4h...</td>
                        <td>JKL 1121</td>
                        <td>Emily Davis</td>
                        <td>Guest</td>
                        <td>2-14-25</td>
                        <td>13:15:00</td>
                        <td>Exit</td>
                    </tr>
                    <tr>
                        <td>f78i5j...</td>
                        <td>MNO 3141</td>
                        <td>Chris Johnson</td>
                        <td>Resident</td>
                        <td>2-14-25</td>
                        <td>13:30:00</td>
                        <td>Entry</td>
                    </tr>
                    <tr>
                        <td>f79k6l...</td>
                        <td>PQR 5161</td>
                        <td>Sarah Wilson</td>
                        <td>Guest</td>
                        <td>2-14-25</td>
                        <td>13:45:00</td>
                        <td>Exit</td>
                    </tr>
                    <tr>
                        <td>f80m7n...</td>
                        <td>STU 7182</td>
                        <td>David Lee</td>
                        <td>Resident</td>
                        <td>2-14-25</td>
                        <td>14:00:00</td>
                        <td>Entry</td>
                    </tr>
                    <tr>
                        <td>f81o8p...</td>
                        <td>VWX 9202</td>
                        <td>Olivia Martinez</td>
                        <td>Guest</td>
                        <td>2-14-25</td>
                        <td>14:15:00</td>
                        <td>Exit</td>
                    </tr>
                    <tr>
                        <td>f82q9r...</td>
                        <td>YZA 3245</td>
                        <td>James Anderson</td>
                        <td>Resident</td>
                        <td>2-14-25</td>
                        <td>14:30:00</td>
                        <td>Entry</td>
                    </tr>
                    <tr>
                        <td>f83s0t...</td>
                        <td>BCD 6789</td>
                        <td>Jessica White</td>
                        <td>Guest</td>
                        <td>2-14-25</td>
                        <td>14:45:00</td>
                        <td>Exit</td>
                    </tr>
                    <tr>
                        <td>f84u1v...</td>
                        <td>EFG 1357</td>
                        <td>Matthew Harris</td>
                        <td>Resident</td>
                        <td>2-14-25</td>
                        <td>15:00:00</td>
                        <td>Entry</td>
                    </tr>
                    <tr>
                        <td>f85w2x...</td>
                        <td>HIJ 2468</td>
                        <td>Sophia Clark</td>
                        <td>Guest</td>
                        <td>2-14-25</td>
                        <td>15:15:00</td>
                        <td>Exit</td>
                    </tr>
                    <tr>
                        <td>f83s0t...</td>
                        <td>BCD 6789</td>
                        <td>Jessica White</td>
                        <td>Guest</td>
                        <td>2-14-25</td>
                        <td>14:45:00</td>
                        <td>Exit</td>
                    </tr>
                    <tr>
                        <td>f84u1v...</td>
                        <td>EFG 1357</td>
                        <td>Matthew Harris</td>
                        <td>Resident</td>
                        <td>2-14-25</td>
                        <td>15:00:00</td>
                        <td>Entry</td>
                    </tr>
                    <tr>
                        <td>f85w2x...</td>
                        <td>HIJ 2468</td>
                        <td>Sophia Clark</td>
                        <td>Guest</td>
                        <td>2-14-25</td>
                        <td>15:15:00</td>
                        <td>Exit</td>
                    </tr>
                    <tr>
                        <td>f83s0t...</td>
                        <td>BCD 6789</td>
                        <td>Jessica White</td>
                        <td>Guest</td>
                        <td>2-14-25</td>
                        <td>14:45:00</td>
                        <td>Exit</td>
                    </tr>
                    <tr>
                        <td>f84u1v...</td>
                        <td>EFG 1357</td>
                        <td>Matthew Harris</td>
                        <td>Resident</td>
                        <td>2-14-25</td>
                        <td>15:00:00</td>
                        <td>Entry</td>
                    </tr>
                    <tr>
                        <td>f85w2x...</td>
                        <td>HIJ 2468</td>
                        <td>Sophia Clark</td>
                        <td>Guest</td>
                        <td>2-14-25</td>
                        <td>15:15:00</td>
                        <td>Exit</td>
                    </tr>
                </tbody>

                    </table>
                </div>
            </section>
        </main>
    </div>


  <!-- Error Modal -->
  <div id="errorModal" class="modal">
    <div class="modal-content">
        <div class="modal-icon error-icon">&#10006;</div> <!-- Red X icon -->
        <h2 class="modal-title error-title">Error!</h2>
        <p>The plate number is not recognized. Please register it first.</p>
        <button id="retryButton" class="modal-button retry-button">Retry</button>
        </div>
</div>

<!-- Success Modal -->
<div id="successModal" class="modal">
    <div class="modal-content">
        <div class="modal-icon success-icon">&#10004;</div> <!-- Green check icon -->
        <h2 class="modal-title success-title">Success!</h2>
        <p>The plate number <span id="plateNumber" class="plate-number">ABC 1234</span> has been successfully registered.</p>
        <button class="modal-button ok-button">OK</button>
    </div>
</div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/video.js/7.21.1/video.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-hls/5.15.0/videojs-contrib-hls.min.js"></script>
 
    <script type="module" src="/CC106/js/dashboard.js"></script>
    
</body>
</html>

