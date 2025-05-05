<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camera Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/video.js/dist/video.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/video.js/dist/video-js.min.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/modal.css">
</head>
<body>
<?php include 'sidebar.php'; ?>  <!-- Include the sidebar -->

            <main class="content">
            <header class="top-bar">
                <span class="dashboard-title">Camera</span>
                <div class="date-time">&nbsp;</div>
            </header>

            <section class="video-section">
                <div class="camera-container">
                <video id="camera1" class="video-js vjs-default-skin" autoplay></video>
                    <canvas id="canvas1" style="display:none;"></canvas>
                </div>
                <div class="camera-container">
                    <video id="camera2" class="video-js vjs-default-skin" autoplay></video>
                    <canvas id="canvas2" style="display:none;"></canvas>
                </div>
            </section>
            
            <section class="plate-container">
                <div class="plate-block">
                    <div class="plate-number-box">
                        <p class="text-plate">Detected Plate:</p>
                        <p id="plate1">ABC1234</p>
                    </div>
                    <div class="plate-info">
                        <div class="info-item">
                            <span class="info-label">Vehicle Type:</span>
                            <span class="info-value">Private Car</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Registered as:</span>
                            <span class="info-value">Resident</span>
                        </div>
                    </div>
                </div>
                <div class="plate-block">
                    <div class="plate-number-box">
                        <p class="text-plate2">Detected Plate:</p>
                        <p id="plate2">ABC1234</p>
                    </div>
                    <div class="plate-info">
                        <div class="info-item">
                            <span class="info-label">Vehicle Type:</span>
                            <span class="info-value">Private Car</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Registered as:</span>
                            <span class="info-value">Resident</span>
                        </div>
                    </div>
                </div>
            </section>
     
            <section class="transactions">
                <h2>Recent Activity</h2>
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
                <tbody id="vehicleLogsTable">
                
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
            <h2 class="modal-title success-title" id="detectedCamera"></h2> 
            <p>Plate Number: <span id="plateNumber" class="plate-number"></span></p>
            <button class="modal-button ok-button" id="confirmButton">Confirm</button>
        </div>
    </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-hls/5.15.0/videojs-contrib-hls.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/video.js/7.21.1/video.min.js"></script> 
<script src="../js/dashboard.js"></script>
<script src="../js/camera-control.js"></script>
    
</body>
</html>
