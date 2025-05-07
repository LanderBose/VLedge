<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V-Chain Registration</title>
    <link href="../css/reg.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <!-- Left Panel - Owner Information -->
            <div class="panel owner-panel" id="ownerPanel">
                <!-- <div class="logo-container">
                    <img src="../images/logo.png" alt="" class="logo">
                </div> -->
                
                <h1 class="form-title">Registration Form</h1>
                
                <div class="section-header">
                    <h2>OWNER INFORMATION</h2>
                    <div class="underline"></div>
                </div>
                
                <div class="input-group">
                    <div class="form-field">
                        <input type="text" id="fullName" name="full_name" placeholder=" " required>
                        <label for="fullName">Full name</label>
                    </div>
                </div>
                
                <div class="input-group">
                    <div class="form-field">
                        <input type="text" id="contactNumber" name="contact_number" maxlength="11" pattern="\d{11}" placeholder=" " required>
                        <label for="contactNumber">Contact Number</label>
                    </div>
                </div>
                
                <div class="input-group">
                    <div class="form-field">
                        <input type="text" id="houseAddress" name="house_address" placeholder=" " required>
                        <label for="houseAddress">House Address</label>
                    </div>
                </div>
                
                <div class="input-group">
                    <div class="form-field select-field">
                        <select id="registrationType" name="registration_type" required>
                            <option value="" disabled selected></option>
                            <option value="new">Residents</option>
                            <option value="renewal">Guest</option>
                        </select>
                        <label for="registrationType">Registration Type</label>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
                
                <div class="next-btn-container">
                    <button type="button" class="next-btn" id="nextBtn">
                        Next
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
            
            <!-- Divider -->
            <div class="divider"></div>
            
            <!-- Right Panel - Vehicle Information -->
            <div class="panel vehicle-panel" id="vehiclePanel">
                <div class="section-header">
                    <h2>VEHICLE INFORMATION</h2>
                    <div class="underline"></div>
                </div>
                
                <div class="input-group">
                    <div class="form-field">
                        <input type="text" id="plateNumber" name="plate_number" maxlength="9" placeholder=" " required>
                        <label for="plateNumber">Vehicle Plate Number</label>
                    </div>
                </div>
                
                <div class="input-group">
                    <div class="form-field select-field">
                        <select id="plateType" name="plate_type" required>
                            <option value="" disabled selected></option>
                            <option value="standard">Private Vehicles</option>
                            <option value="personalized">PUV</option>
                            <option value="special_government">Government Vehicles</option>
                            <option value="special_motorcycle">Motorcycle Plate</option>
                            <option value="special_temporary">Temporary and Special Plates</option>
                        </select>
                        <label for="plateType">Vehicle Plate Type</label>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
                
                <div class="input-group">
                    <div class="form-field select-field">
                        <select id="vehicleType" name="vehicle_type" required>
                            <option value="" disabled selected></option>
                            <option value="commercial">PUV</option>
                            <option value="private">Private Vehicles</option>
                            <option value="truck">Industrial and Commercial Vehicles</option>
                            <option value="government">Special Vehicles</option>
                            <option value="motorcycle">Two-Wheeler</option>
                        </select>
                        <label for="vehicleType">Vehicle Type</label>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
                
                <div class="input-group">
                    <div class="form-field select-field">
                        <select id="vehicleColor" name="vehicle_color" required>
                            <option value="" disabled selected></option>
                            <option value="black">Black</option>
                            <option value="white">White</option>
                            <option value="silver">Silver</option>
                            <option value="red">Red</option>
                            <option value="blue">Blue</option>
                            <option value="green">Green</option>
                            <option value="yellow">Yellow</option>
                            <option value="other">Other</option>
                        </select>
                        <label for="vehicleColor">Vehicle Color</label>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
                
                <div class="section-header">
                    <h2>VEHICLE IMAGE</h2>
                    <div class="underline"></div>
                </div>
                
                <div class="image-upload-container">
                    <div class="image-upload" id="imageUploadArea">
                        <input type="file" id="vehicleImage" name="vehicle_images[]" accept="image/*" multiple hidden>
                        <div class="upload-icon">
                            <i class="fas fa-upload"></i>
                        </div>
                        <p>Choose Image</p>
                    </div>
                    <div id="imagePreview" class="image-preview"></div>
                </div>
                
                <div class="terms-container">
                    <label class="terms-label">
                        <input type="checkbox" name="terms" required>
                        <span class="checkmark"></span>
                        Terms and Conditions
                    </label>
                </div>
                
                <div class="register-btn-container">
                    <button type="submit" class="register-btn">REGISTER</button>
                </div>
                
                <div class="back-btn-container">
                    <button type="button" id="backBtn" class="back-btn">
                        <i class="fas fa-chevron-left"></i>
                        Back
                    </button>
                </div>
            </div>
        </div>
        
        <form id="registrationForm" action="save_registration.php" method="post" enctype="multipart/form-data" style="display: none;">
            <!-- Hidden form to contain all data when submitting -->
        </form>
    </div>
    
    <script src="../js/registration.js"></script>
</body>
</html>
