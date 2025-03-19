let capturing = true; // Global flag to control capturing

async function getCameras() {
    const devices = await navigator.mediaDevices.enumerateDevices();
    return devices.filter(device => device.kind === 'videoinput');
}

async function startCamera(videoElement, deviceId) {
    try {
        const stream = await navigator.mediaDevices.getUserMedia({ video: { deviceId: { exact: deviceId } } });
        videoElement.srcObject = stream;
    } catch (error) {
        console.error(`Error accessing camera: ${error}`);
    }
}

async function initializeCameras() {
    const cameras = await getCameras();

    if (cameras.length === 0) {
        console.error("No cameras detected.");
        return;
    }

    startCamera(document.getElementById('camera1'), cameras[0].deviceId);

    if (cameras.length > 1) {
        startCamera(document.getElementById('camera2'), cameras[1].deviceId);
    } else {
        console.warn("Only one camera detected, skipping second camera.");
    }
}

async function captureFrame(videoElement, canvasElement) {
    const ctx = canvasElement.getContext('2d');
    canvasElement.width = videoElement.videoWidth || 640;
    canvasElement.height = videoElement.videoHeight || 480;
    ctx.drawImage(videoElement, 0, 0, canvasElement.width, canvasElement.height);
    return canvasElement.toDataURL('image/jpeg'); 
}

function showPlatePopup(cameraLabel, plate) {
    document.getElementById("detectedCamera").innerText = `${cameraLabel} detected a plate`;
    document.getElementById("plateNumber").innerText = plate;
    showModal('successModal');
}

// Stop capturing when modal is open
function stopCapturing() {
    capturing = false;
}

// Resume capturing when user clicks confirm
function resumeCapturing() {
    capturing = true;
}

async function sendToServer(videoElement, canvasElement, plateId, endpoint, cameraLabel) {
    if (!capturing) return; // Stop processing if modal is open

    const imageData = await captureFrame(videoElement, canvasElement);
    fetch(endpoint, {
        method: 'POST',
        body: JSON.stringify({ image: imageData }),
        headers: { 'Content-Type': 'application/json' }
    })
    .then(response => response.json())
    .then(data => {
        const plateElement = document.getElementById(plateId);
        if (plateElement) {
            plateElement.innerText = data.plate ? `${data.plate}` : "No plate detected.";
        }

        if (data.plate && data.plate !== "Not Detected") {
            stopCapturing(); // Stop new captures
            showPlatePopup(cameraLabel, data.plate);
            logVehicle(data.plate); // Log to MySQL & Blockchain
        }
    })
    .catch(error => console.error(`Error sending to ${endpoint}:`, error));
}

async function logVehicle(plate) {
    fetch('../controller/log_vehicle.php', {
        method: 'POST',
        body: JSON.stringify({ plate_number: plate }),
        headers: { 'Content-Type': 'application/json' }
    })
    .then(response => response.json())
    .then(data => console.log("Log status: ", data))
    .catch(error => console.error("Error logging vehicle:", error));
}

function startCapturing() {
    setInterval(() => {
        if (capturing) { // Capture only if allowed
            sendToServer(document.getElementById('camera1'), document.getElementById('canvas1'), "plate1", "/v-chain/controller/process.php", "Camera 1");
            sendToServer(document.getElementById('camera2'), document.getElementById('canvas2'), "plate2", "/v-chain/controller/process2.php", "Camera 2");
        }
    }, 3000);
}

// Modal Handling Functions
function showModal(modalId) {
    stopCapturing(); // Stop capturing when modal is shown
    document.getElementById(modalId).style.display = 'flex';
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
    resumeCapturing(); // Resume capturing after modal is closed
}

// Initialize cameras and start capturing when the page loads
document.addEventListener('DOMContentLoaded', () => {
    initializeCameras().then(() => startCapturing());

    // Confirm button for success modal
    document.getElementById('confirmButton').addEventListener('click', () => {
        closeModal('successModal');
    });
});

// Display real-time date and time
function updateDateTime() {
    const now = new Date();
    const formattedDate = now.toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' });
    const formattedTime = now.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
    document.querySelector('.date-time').innerHTML = `${formattedDate} &nbsp; ${formattedTime}`;
}

setInterval(updateDateTime, 1000);
window.onload = updateDateTime;



function fetchVehicleLogs() {
    fetch('/V-Chain/controller/get_vehicle_logs.php') // Ensure correct path
        .then(response => response.json())
        .then(data => {
            const tableBody = document.getElementById('vehicleLogsTable');

            // Get all existing log IDs in the table to prevent duplicates
            const existingLogIds = new Set();
            tableBody.querySelectorAll('tr').forEach(row => {
                existingLogIds.add(row.getAttribute('data-log-id'));
            });

            data.forEach(log => {
                if (!existingLogIds.has(log.log_id)) {
                    const row = document.createElement('tr');
                    row.setAttribute('data-log-id', log.log_id); // Unique identifier for each log entry

                    row.innerHTML = `
                        <td>${log.log_id.substring(0, 7)}...</td>
                        <td>${log.plate_number}</td>
                        <td>${log.full_name}</td>
                        <td>${log.registration_type}</td>
                        <td>${log.date}</td>
                        <td>${log.timestamp}</td>
                        <td>${log.access_point || 'N/A'}</td>
                    `;

                    // Append the new row at the **top** so latest logs appear first
                    tableBody.prepend(row);
                }
            });
        })
        .catch(error => console.error('Error fetching vehicle logs:', error));
}

// Fetch logs every 5 seconds
setInterval(fetchVehicleLogs, 5000);

// Fetch logs immediately when the page loads
fetchVehicleLogs();
