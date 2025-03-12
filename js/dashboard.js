
    function updateDateTime() {
        const now = new Date();
        const formattedDate = now.toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' });
        const formattedTime = now.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
        document.querySelector('.date-time').innerHTML = `${formattedDate} &nbsp; ${formattedTime}`;
    }
    setInterval(updateDateTime, 1000);
    window.onload = updateDateTime;

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
        if (cameras.length < 2) {
            console.error("Not enough cameras detected.");
            return;
        }

        // Start both cameras
        startCamera(document.getElementById('camera1'), cameras[0].deviceId);
        startCamera(document.getElementById('camera2'), cameras[1].deviceId);
    }

    async function captureFrame(videoElement, canvasElement) {
        const ctx = canvasElement.getContext('2d');
        canvasElement.width = videoElement.videoWidth || 640;
        canvasElement.height = videoElement.videoHeight || 480;
        ctx.drawImage(videoElement, 0, 0, canvasElement.width, canvasElement.height);
        return canvasElement.toDataURL('image/jpeg'); 
    }

    async function sendToServer(videoElement, canvasElement, plateId, endpoint) {
        const imageData = await captureFrame(videoElement, canvasElement);
        fetch(endpoint, {
            method: 'POST',
            body: JSON.stringify({ image: imageData }),
            headers: { 'Content-Type': 'application/json' }
        })
        .then(response => response.json())
        .then(data => {
            const plateElement = document.getElementById(plateId); // Correctly reference the ID
            if (plateElement) {
                plateElement.innerText = data.plate ? `${data.plate}` : "No plate detected.";
            }
        })
        .catch(error => console.error(`Error sending to ${endpoint}:`, error));
    }

    // Capture frames and send to the server every 3 seconds
    function startCapturing() {
        const cam1 = document.getElementById('camera1');
        const cam2 = document.getElementById('camera2');
        const canvas1 = document.getElementById('canvas1');
        const canvas2 = document.getElementById('canvas2');

        setInterval(() => {
            sendToServer(cam1, canvas1, "plate1", "/cc106/php/process.php");  // Correct plateId passed
            sendToServer(cam2, canvas2, "plate2", "/cc106/php/process2.php"); // Correct plateId passed
        }, 3000);
    }


    // Initialize cameras when page loads
    document.addEventListener('DOMContentLoaded', () => {
        initializeCameras().then(() => startCapturing());
    });

    document.addEventListener('DOMContentLoaded', () => {
        // Initialize cameras or any other logic
    
        // Attach event listener for Retry button
        const retryButton = document.getElementById('retryButton');
        retryButton.addEventListener('click', () => {
            closeAndShowNext('errorModal', 'successModal');
        });
    
        // Attach event listener for OK button in success modal
        const okButton = document.getElementById('ok-button');
        okButton.addEventListener('click', () => {
            closeModal('successModal');
        });
    });
    
    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
    }
    
    function showModal(modalId) {
        document.getElementById(modalId).style.display = 'flex';
    }
    
    function closeAndShowNext(currentModalId, nextModalId) {
        closeModal(currentModalId);
        setTimeout(() => {
            document.getElementById("plateNumber").innerText = "ABC 1234"; // Example plate number
            showModal(nextModalId);
        }, 500); // Delay before showing next modal
    }
    
    // Show the error modal when the page loads
    window.onload = function() {
        showModal('errorModal');
    };
    