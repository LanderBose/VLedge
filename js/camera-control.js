/**
 * Camera Control Module
 * Provides functionality for enlarging camera feeds and full-screen control
 */

document.addEventListener('DOMContentLoaded', function() {
    initializeCameraControls();
});

function initializeCameraControls() {
    const camera1 = document.getElementById('camera1');
    const camera2 = document.getElementById('camera2');
    
    // Add camera status indicators
    addCameraStatusIndicator(camera1, 'Camera 1');
    addCameraStatusIndicator(camera2, 'Camera 2');
    
    // Add click handlers to both cameras
    
    // Add control buttons
    addCameraControlButtons(camera1);
    addCameraControlButtons(camera2);

    // Add source selection controls
    addCameraSourceControls(camera1, 'camera1');
    addCameraSourceControls(camera2, 'camera2');

    // Add placeholders for waiting cameras
    setTimeout(() => {
        addCameraPlaceholder(camera1);
        addCameraPlaceholder(camera2);
    }, 1000);
}

function addCameraStatusIndicator(cameraElement, label) {
    if (!cameraElement) return;

    // Create status indicator element
    const statusIndicator = document.createElement('div');
    statusIndicator.className = 'camera-status';
    statusIndicator.textContent = label;
    
    // Append to camera container
    cameraElement.parentElement.style.position = 'relative';
    cameraElement.parentElement.appendChild(statusIndicator);
    
    // Update status based on video state
    cameraElement.addEventListener('playing', () => {
        statusIndicator.classList.add('active');
        statusIndicator.textContent = `${label} (Active)`;
    });
    
    cameraElement.addEventListener('error', () => {
        statusIndicator.classList.add('inactive');
        statusIndicator.textContent = `${label} (Error)`;
    });
    
    cameraElement.addEventListener('stalled', () => {
        statusIndicator.classList.add('inactive');
        statusIndicator.textContent = `${label} (Stalled)`;
    });
}

function setupCameraClickHandler(cameraElement) {
    if (!cameraElement) return;

    cameraElement.addEventListener('click', function(event) {
        // Prevent click when in fullscreen mode (since we'll have our own controls)
        if (document.fullscreenElement || 
            document.webkitFullscreenElement || 
            document.mozFullScreenElement) {
            return;
        }
        
        // If the camera is already enlarged (has fullscreen-video class)
        if (this.classList.contains('fullscreen-video')) {
            exitCameraFullView(this);
        } else {
            enterCameraFullView(this);
        }
        
        // Stop propagation to prevent other handlers
        event.stopPropagation();
    });
}

function enterCameraFullView(cameraElement) {
    // Stop plate capturing when viewing camera in fullscreen
    if (typeof window.stopCapturing === 'function') {
        window.stopCapturing();
    }
    
    // Create fullscreen container
    const fullscreenContainer = document.createElement('div');
    fullscreenContainer.className = 'fullscreen-video';
    document.body.appendChild(fullscreenContainer);
    
    // Clone the camera element and append to fullscreen container
    const clonedCamera = cameraElement.cloneNode(true);
    fullscreenContainer.appendChild(clonedCamera);
    
    // Add close button
    const closeButton = document.createElement('button');
    closeButton.className = 'close-fullscreen';
    closeButton.innerHTML = '&times;';
    closeButton.addEventListener('click', function() {
        document.body.removeChild(fullscreenContainer);
        
        // Resume capturing when exiting fullscreen
        if (typeof window.resumeCapturing === 'function') {
            window.resumeCapturing();
        }
    });
    fullscreenContainer.appendChild(closeButton);
    
    // Add escape key handler
    document.addEventListener('keydown', handleEscapeKey);
    
    // Attempt to play the cloned video if it was playing before
    if (!cameraElement.paused) {
        clonedCamera.play().catch(e => console.error('Error playing cloned video:', e));
    }
}

function exitCameraFullView(cameraElement) {
    cameraElement.classList.remove('fullscreen-video');
    document.removeEventListener('keydown', handleEscapeKey);
    
    // Resume capturing
    if (typeof window.resumeCapturing === 'function') {
        window.resumeCapturing();
    }
}

function handleEscapeKey(event) {
    if (event.key === 'Escape') {
        const fullscreenContainer = document.querySelector('.fullscreen-video');
        if (fullscreenContainer) {
            document.body.removeChild(fullscreenContainer);
            
            // Resume capturing when exiting fullscreen
            if (typeof window.resumeCapturing === 'function') {
                window.resumeCapturing();
            }
        }
    }
}

function addCameraControlButtons(cameraElement) {
    if (!cameraElement) return;

    // Create control container
    const controlsContainer = document.createElement('div');
    controlsContainer.className = 'camera-controls';
    
    // Fullscreen button
    const fullscreenButton = document.createElement('button');
    fullscreenButton.className = 'camera-control-button fullscreen-button';
    fullscreenButton.innerHTML = '<i class="fas fa-expand"></i>';
    fullscreenButton.title = 'Fullscreen';
    fullscreenButton.addEventListener('click', function(event) {
        event.stopPropagation();
        
        if (document.fullscreenElement) {
            exitFullscreen();
        } else {
            requestFullscreen(cameraElement);
        }
    });
    
    // Add buttons to container
    controlsContainer.appendChild(fullscreenButton);
    
    // Add container to camera parent
    cameraElement.parentElement.style.position = 'relative';
    cameraElement.parentElement.appendChild(controlsContainer);
}

function requestFullscreen(element) {
    if (element.requestFullscreen) {
        element.requestFullscreen();
    } else if (element.webkitRequestFullscreen) {
        element.webkitRequestFullscreen();
    } else if (element.msRequestFullscreen) {
        element.msRequestFullscreen();
    }
}

function exitFullscreen() {
    if (document.exitFullscreen) {
        document.exitFullscreen();
    } else if (document.webkitExitFullscreen) {
        document.webkitExitFullscreen();
    } else if (document.msExitFullscreen) {
        document.msExitFullscreen();
    }
}

// Handle browser fullscreen change events
document.addEventListener('fullscreenchange', handleFullscreenChange);
document.addEventListener('webkitfullscreenchange', handleFullscreenChange);
document.addEventListener('mozfullscreenchange', handleFullscreenChange);
document.addEventListener('MSFullscreenChange', handleFullscreenChange);

function handleFullscreenChange() {
    const isFullscreen = document.fullscreenElement || 
                         document.webkitFullscreenElement || 
                         document.mozFullScreenElement || 
                         document.msFullscreenElement;
    
    // Toggle controls visibility
    const fullscreenButtons = document.querySelectorAll('.fullscreen-button i');
    
    fullscreenButtons.forEach(icon => {
        if (isFullscreen) {
            icon.classList.remove('fa-expand');
            icon.classList.add('fa-compress');
        } else {
            icon.classList.remove('fa-compress');
            icon.classList.add('fa-expand');
        }
    });
}

// Add camera source selection controls
function addCameraSourceControls(cameraElement, cameraId) {
    if (!cameraElement) return;

    // Create source selection container
    const sourceContainer = document.createElement('div');
    sourceContainer.className = 'camera-source-control';

    // Create source selection dropdown
    const sourceSelect = document.createElement('select');
    sourceSelect.id = `${cameraId}-source`;
    sourceSelect.className = 'camera-source-select';

    // Add default option
    const defaultOption = document.createElement('option');
    defaultOption.value = '';
    defaultOption.textContent = 'Select Camera Source';
    sourceSelect.appendChild(defaultOption);

    // Add change event handler
    sourceSelect.addEventListener('change', function () {
        const selectedDeviceId = this.value;
        if (selectedDeviceId) {
            navigator.mediaDevices.getUserMedia({ video: { deviceId: { exact: selectedDeviceId } } })
                .then(stream => {
                    // Stop any existing tracks
                    if (cameraElement.srcObject) {
                        cameraElement.srcObject.getTracks().forEach(track => track.stop());
                    }
                    cameraElement.srcObject = stream;
                    cameraElement.play().catch(e => console.error('Error playing video:', e));
                })
                .catch(err => {
                    console.error('Error accessing selected camera:', err);
                });
        }
    });

    // Add label
    const sourceLabel = document.createElement('label');
    sourceLabel.htmlFor = `${cameraId}-source`;
    sourceLabel.className = 'camera-source-label';
    sourceLabel.textContent = 'Source:';

    // Add to container
    sourceContainer.appendChild(sourceLabel);
    sourceContainer.appendChild(sourceSelect);

    // Add container to camera parent
    cameraElement.parentElement.appendChild(sourceContainer);

    // Request permission and enumerate devices
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(() => navigator.mediaDevices.enumerateDevices())
        .then(devices => {
            const videoDevices = devices.filter(device => device.kind === 'videoinput');
            videoDevices.forEach(device => {
                const option = document.createElement('option');
                option.value = device.deviceId;
                option.textContent = device.label || `Camera ${sourceSelect.length}`;
                sourceSelect.appendChild(option);
            });
        })
        .catch(err => {
            console.error('Error enumerating devices:', err);
        });
}


// Add placeholder content for cameras that are waiting for connection
function addCameraPlaceholder(cameraElement) {
    if (!cameraElement) return;
    
    // Check if camera is actually playing before adding placeholder
    if (cameraElement.readyState === 0) {
        const placeholder = document.createElement('div');
        placeholder.className = 'camera-placeholder';
        
        // Add SVG icon
        placeholder.innerHTML = `
            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="12" r="8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12 8V12L14 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Waiting for camera connection...</span>
        `;
        
        // Add to camera container
        cameraElement.parentElement.appendChild(placeholder);
        
        // Remove placeholder when video starts playing
        cameraElement.addEventListener('playing', () => {
            if (placeholder.parentNode) {
                placeholder.parentNode.removeChild(placeholder);
            }
        });
    }
}
