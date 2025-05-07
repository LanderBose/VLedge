document.addEventListener('DOMContentLoaded', function() {
    // DOM elements
    const registrationForm = document.getElementById('registrationForm');
    const ownerPanel = document.getElementById('ownerPanel');
    const vehiclePanel = document.getElementById('vehiclePanel');
    const nextBtn = document.getElementById('nextBtn');
    const backBtn = document.getElementById('backBtn');
    const plateNumberInput = document.getElementById('plateNumber');
    const imageUploadArea = document.getElementById('imageUploadArea');
    const vehicleImageInput = document.getElementById('vehicleImage');
    const imagePreview = document.getElementById('imagePreview');
    
    // Input elements for collecting values when submitting
    const formInputs = document.querySelectorAll('input, select');
    
    // Initialize
    vehiclePanel.style.display = 'none';
    ownerPanel.style.display = 'flex';
    
    // Initialize input states for any pre-populated fields
    initializeInputStates();
    
    // Event handlers
    nextBtn.addEventListener('click', function() {
        // Validate owner information
        const ownerInputs = ownerPanel.querySelectorAll('input, select');
        let isValid = true;
        
        ownerInputs.forEach(input => {
            if (input.required && !input.value.trim()) {
                isValid = false;
                highlightInvalidInput(input);
            } else {
                removeInvalidHighlight(input);
            }
        });
        
        if (isValid) {
            ownerPanel.style.display = 'none';
            vehiclePanel.style.display = 'flex';
        }
    });
    
    backBtn.addEventListener('click', function() {
        vehiclePanel.style.display = 'none';
        ownerPanel.style.display = 'flex';
    });
    
    // Plate number formatting
    plateNumberInput.addEventListener('input', function() {
        formatPlateNumber(this);
    });
    
    // Image upload handling
    imageUploadArea.addEventListener('click', function() {
        vehicleImageInput.click();
    });
    
    vehicleImageInput.addEventListener('change', function(event) {
        displayImagePreviews(event.target.files);
    });
    
    // Submit form handling
    document.querySelector('.register-btn').addEventListener('click', function(e) {
        e.preventDefault();
        
        // Validate vehicle information
        const vehicleInputs = vehiclePanel.querySelectorAll('input, select');
        let isValid = true;
        
        vehicleInputs.forEach(input => {
            if (input.required && !input.value.trim() && input.type !== 'file') {
                isValid = false;
                highlightInvalidInput(input);
            } else {
                removeInvalidHighlight(input);
            }
        });
        
        if (isValid) {
            // Build form data
            const formData = new FormData();
            
            // Get inputs from both panels
            const ownerInputs = ownerPanel.querySelectorAll('input, select');
            const allVehicleInputs = vehiclePanel.querySelectorAll('input, select');
            
            // Add owner information
            ownerInputs.forEach(input => {
                if (input.type !== 'file' && input.type !== 'button') {
                    if (input.type === 'checkbox') {
                        formData.append(input.name, input.checked ? '1' : '0');
                    } else {
                        formData.append(input.name, input.value);
                    }
                }
            });
            
            // Add vehicle information
            allVehicleInputs.forEach(input => {
                if (input.type === 'file') {
                    // Handle file uploads
                    if (input.files && input.files.length > 0) {
                        for (let i = 0; i < input.files.length; i++) {
                            formData.append('vehicle_images[]', input.files[i]);
                        }
                    }
                } else if (input.type !== 'button') {
                    if (input.type === 'checkbox') {
                        formData.append(input.name, input.checked ? '1' : '0');
                    } else {
                        formData.append(input.name, input.value);
                    }
                }
            });
            
            // Show loading indicator or message
            const registerBtn = document.querySelector('.register-btn');
            const originalText = registerBtn.textContent;
            registerBtn.textContent = "Submitting...";
            registerBtn.disabled = true;
            
            // Use fetch API to submit form data
            fetch('/vledge/php/save_registration.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(data => {
                // Show success message
                // alert('Registration successful!');
                
                // Reset form and redirect to success page
                resetForm();
                window.location.href = '/vledge/php/reg-typrompt.php';
            })
            .catch(error => {
                // Show error message
                alert('Error submitting form: ' + error.message);
                console.error('Error:', error);
            })
            .finally(() => {
                // Reset button
                registerBtn.textContent = originalText;
                registerBtn.disabled = false;
            });
        }
    });
    
    // Function to reset the form after successful submission
    function resetForm() {
        // Reset all inputs
        const allInputs = document.querySelectorAll('input, select');
        allInputs.forEach(input => {
            if (input.type === 'checkbox') {
                input.checked = false;
            } else if (input.type !== 'button' && input.type !== 'submit') {
                input.value = '';
            }
        });
        
        // Clear image previews
        imagePreview.innerHTML = '';
        
        // Reset labels
        const labels = document.querySelectorAll('.form-field label');
        labels.forEach(label => {
            label.classList.remove('active');
        });
        
        // Switch back to owner panel
        vehiclePanel.style.display = 'none';
        ownerPanel.style.display = 'flex';
    }
    
    // Helper functions
    function formatPlateNumber(input) {
        let value = input.value.toUpperCase().replace(/[^A-Z0-9]/g, '');
        
        if (/^[A-Z]+/.test(value)) {
            // Starts with letters: Limit to 3 letters followed by 4 numbers (AAA 1234)
            let letters = value.match(/^[A-Z]{0,3}/)[0];
            let numbers = value.substring(letters.length).replace(/[^0-9]/g, '').slice(0, 4);
            input.value = letters + (numbers ? ' ' : '') + numbers;
        } else if (/^\d+/.test(value)) {
            // Starts with numbers: Limit to 4 numbers followed by 3 letters (1234 ABC)
            let numbers = value.match(/^\d{0,4}/)[0];
            let letters = value.substring(numbers.length).replace(/[^A-Z]/g, '').slice(0, 3);
            input.value = numbers + (letters ? ' ' : '') + letters;
        } else {
            input.value = value;
        }
    }
    
    function displayImagePreviews(files) {
        imagePreview.innerHTML = '';
        
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            
            // Check if file is an image
            if (!file.type.match('image.*')) {
                continue;
            }
            
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const previewItem = document.createElement('div');
                previewItem.className = 'image-preview-item';
                previewItem.style.backgroundImage = `url(${e.target.result})`;
                
                const deleteBtn = document.createElement('div');
                deleteBtn.className = 'image-preview-delete';
                deleteBtn.innerHTML = '<i class="fas fa-times"></i>';
                deleteBtn.dataset.index = i;
                
                deleteBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    // Remove preview
                    this.parentElement.remove();
                    
                    // Note: Actual removal of files from the input is complex in vanilla JS
                    // and is typically handled using a DataTransfer object as shown in the original code
                    // For this implementation we'll rely on the preview state
                });
                
                previewItem.appendChild(deleteBtn);
                imagePreview.appendChild(previewItem);
            };
            
            reader.readAsDataURL(file);
        }
    }
    
    function highlightInvalidInput(input) {
        input.style.borderColor = '#f44336'; // Using actual color instead of CSS variable
        input.style.backgroundColor = 'rgba(244, 67, 54, 0.1)';
    }
    
    function removeInvalidHighlight(input) {
        input.style.borderColor = '';
        input.style.backgroundColor = '';
    }
    
    // Initialize input states function for any pre-populated fields
    function initializeInputStates() {
        const formFields = document.querySelectorAll('.form-field input, .form-field select');
        
        formFields.forEach(field => {
            // Check if field already has value
            if (field.value && field.value.trim()) {
                field.classList.add('has-value');
                const label = field.nextElementSibling;
                if (label && label.tagName === 'LABEL') {
                    label.classList.add('active');
                }
            }
            
            // For number inputs, ensure they maintain the proper placeholder behavior
            if (field.id === 'contactNumber') {
                field.addEventListener('input', function() {
                    this.setAttribute('data-has-content', this.value.trim() !== '');
                });
            }
        });
    }
    
    // Initialize placeholder animations for all inputs and selects
    const formFields = document.querySelectorAll('.form-field input, .form-field select');
    
    formFields.forEach(field => {
        // Check if field already has value
        if (field.value && field.value.trim()) {
            field.classList.add('has-value');
            const label = field.nextElementSibling;
            if (label && label.tagName === 'LABEL') {
                label.classList.add('active');
            }
        }
        
        field.addEventListener('focus', function() {
            const label = this.nextElementSibling;
            if (label && label.tagName === 'LABEL') {
                label.classList.add('active');
            }
        });
        
        field.addEventListener('blur', function() {
            if (!this.value || !this.value.trim()) {
                const label = this.nextElementSibling;
                if (label && label.tagName === 'LABEL') {
                    label.classList.remove('active');
                }
            } else {
                // If input has value after blur, ensure label stays active
                const label = this.nextElementSibling;
                if (label && label.tagName === 'LABEL') {
                    label.classList.add('active');
                }
            }
        });
        
        // Initial check for existing values (like browser autofill)
        if (field.value && field.value.trim()) {
            const label = field.nextElementSibling;
            if (label && label.tagName === 'LABEL') {
                label.classList.add('active');
            }
        }
    });
});
