<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V-Chain Registration</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f0efe6 0%, #e6e5dc 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        /* New outer panel styling */
        .outer-panel {
            width: 100%;
            max-width: 580px;
            background: linear-gradient(145deg, #ffffff 0%, #f5f5f0 100%);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15), 
                        0 5px 15px rgba(0, 0, 0, 0.07),
                        inset 0 1px 1px rgba(255, 255, 255, 0.6);
            padding: 30px;
            position: relative;
            overflow: hidden;
        }

        /* Decorative elements for the outer panel */
        .outer-panel::before {
            content: '';
            position: absolute;
            top: -50px;
            left: -50px;
            width: 150px;
            height: 150px;
            background: linear-gradient(135deg, rgba(45, 80, 96, 0.2) 0%, rgba(30, 58, 74, 0.1) 100%);
            border-radius: 50%;
            z-index: 0;
        }

        .outer-panel::after {
            content: '';
            position: absolute;
            bottom: -80px;
            right: -80px;
            width: 200px;
            height: 200px;
            background: linear-gradient(135deg, rgba(45, 80, 96, 0.15) 0%, rgba(30, 58, 74, 0.05) 100%);
            border-radius: 50%;
            z-index: 0;
        }

        .container {
            width: 100%;
            max-width: 520px;
            overflow: hidden;
            position: relative;
            z-index: 1;
        }

        .logo-above-form {
            display: block;
            margin: 0 auto 20px auto;
            width: 140px;
            height: auto;
            filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
            transition: transform 0.3s ease;
        }

        .logo-above-form:hover {
            transform: scale(1.05);
        }

        .form-container {
            background: linear-gradient(145deg, #2d5060 0%, #1e3a4a 100%);
            padding: 35px;
            color: white;
            border-radius: 12px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .form-container::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            z-index: 0;
        }

        h1 {
            font-size: 30px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 30px;
            line-height: 1.2;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            letter-spacing: 1px;
            position: relative;
        }

        h1::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: #f0efe6;
            border-radius: 2px;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 14px 18px;
            border: none;
            border-radius: 8px;
            background-color: rgba(240, 239, 230, 0.9);
            font-size: 15px;
            color: #333;
            transition: all 0.3s ease;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus {
            background-color: #fff;
            box-shadow: 0 0 0 3px rgba(240, 239, 230, 0.3), inset 0 2px 4px rgba(0, 0, 0, 0.05);
            outline: none;
        }

        /* Hide number input arrows */
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        select {
            appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg fill="%23333" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>');
            background-repeat: no-repeat;
            background-position: right 15px center;
            color: #666; /* Match placeholder color */
            cursor: pointer;
        }

        /* Style for the first (placeholder) option in dropdowns */
        select option:first-child {
            color: #666;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Style for the actual options */
        select option:not(:first-child) {
            color: #333;
            font-size: 15px;
            text-transform: none;
            letter-spacing: normal;
        }

        /* Add this to make the select element show the placeholder styling when nothing is selected */
        select:invalid {
            color: #666;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .terms {
            display: flex;
            align-items: center;
            margin: 25px 0;
            background: rgba(255, 255, 255, 0.1);
            padding: 12px 15px;
            border-radius: 8px;
        }

        .terms input[type="checkbox"] {
            margin-right: 12px;
            transform: scale(1.3);
            accent-color: #f0efe6;
            cursor: pointer;
        }

        .terms label {
            font-size: 15px;
            cursor: pointer;
        }

        .btn-container {
            text-align: center;
            margin-top: 30px;
        }

        .Submit-btn {
            background: linear-gradient(145deg, #f0efe6 0%, #e0dfd6 100%);
            color: #2d5060;
            border: none;
            padding: 12px 40px;
            width: auto;
            min-width: 180px;
            border-radius: 30px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
            display: inline-block;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin: 0px 5px 5px 250px;
        }

        .Submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
            background: linear-gradient(145deg, #ffffff 0%, #f0efe6 100%);
        }

        .Submit-btn:active {
            transform: translateY(1px);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        ::placeholder {
            color: #666;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.5px;
        }

        /* Style for the file upload section */
        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-size: 15px;
            color: white;
            font-weight: 500;
        }

        input[type="file"] {
            width: 100%;
            padding: 12px 15px;
            border: 2px dashed rgba(240, 239, 230, 0.5);
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-sizing: border-box;
        }

        input[type="file"]:hover {
            border-color: rgba(240, 239, 230, 0.8);
            background-color: rgba(255, 255, 255, 0.15);
        }

        input[type="file"]::-webkit-file-upload-button {
            background: linear-gradient(145deg, #3a6a80 0%, #2d5060 100%);
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s ease;
            margin-right: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        input[type="file"]::-webkit-file-upload-button:hover {
            background: linear-gradient(145deg, #457a90 0%, #3a6a80 100%);
            box-shadow: 0 3px 7px rgba(0, 0, 0, 0.15);
        }

        #image-preview {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 15px;
        }

        #image-preview img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 6px;
            border: 2px solid rgba(240, 239, 230, 0.5);
        }

        /* Decorative elements */
        .corner-decoration {
            position: absolute;
            width: 60px;
            height: 60px;
            z-index: 0;
        }

        .corner-decoration.top-left {
            top: 15px;
            left: 15px;
            border-top: 3px solid rgba(45, 80, 96, 0.3);
            border-left: 3px solid rgba(45, 80, 96, 0.3);
            border-top-left-radius: 10px;
        }

        .corner-decoration.top-right {
            top: 15px;
            right: 15px;
            border-top: 3px solid rgba(45, 80, 96, 0.3);
            border-right: 3px solid rgba(45, 80, 96, 0.3);
            border-top-right-radius: 10px;
        }

        .corner-decoration.bottom-left {
            bottom: 15px;
            left: 15px;
            border-bottom: 3px solid rgba(45, 80, 96, 0.3);
            border-left: 3px solid rgba(45, 80, 96, 0.3);
            border-bottom-left-radius: 10px;
        }

        .corner-decoration.bottom-right {
            bottom: 15px;
            right: 15px;
            border-bottom: 3px solid rgba(45, 80, 96, 0.3);
            border-right: 3px solid rgba(45, 80, 96, 0.3);
            border-bottom-right-radius: 10px;
        }

        /* Media Queries for Mobile View */
        @media (max-width: 600px) {
            body {
                padding: 10px;
                background: #f0efe6;
            }

            .outer-panel {
                padding: 15px;
                border-radius: 15px;
                max-width: 100%;
            }

            .container {
                max-width: 100%;
            }

            .logo-above-form {
                width: 79px;
                margin-bottom: 10px;
            }

            .form-container {
                padding: 0px 18px;
                border-radius: 10px;
            }

            h1 {
                font-size: 24px;
                margin-bottom: 25px;
            }

            h1::after {
                width: 60px;
                bottom: -8px;
            }

            .form-group {
                margin-bottom: 15px;
            }

            input[type="text"],
            input[type="number"],
            select {
                padding: 12px 15px;
                font-size: 14px;
            }

            .terms {
             padding: 9px 13px;
             margin: -20px 0px 0px 0px;
        }

            .Submit-btn {
                padding: 10px 30px;
                font-size: 15px;
                min-width: 160px;
                margin: 0px 155px 14px;
                display: block;
            }
            
            input[type="file"] {
                padding: 10px 12px;
            }
            
            input[type="file"]::-webkit-file-upload-button {
                padding: 8px 12px;
                font-size: 13px;
            }

            .corner-decoration {
                width: 40px;
                height: 40px;
            }
        }
    </style>
</head>
<body>
    <!-- New outer panel -->
    <div class="outer-panel">
        <!-- Decorative corner elements -->
        <div class="corner-decoration top-left"></div>
        <div class="corner-decoration top-right"></div>
        <div class="corner-decoration bottom-left"></div>
        <div class="corner-decoration bottom-right"></div>
        
        <div class="container">
            <!-- Logo is placed above the form -->
            <img src="/v-chain/images/LOGO.png" alt="V-Chain Logo" class="logo-above-form">
            
            <div class="form-container">
                <h1>V-Chain<br>REGISTRATION</h1>
                
                <form id="registrationForm" action="save_registration.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                        <input type="text" name="full_name" placeholder="FULL NAME" required>
                    </div>
                    
                    <div class="form-group">
                        <input type="text" name="contact_number" placeholder="CONTACT NUMBER" required maxlength="11" pattern="\d{11}" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                    </div>
                    
                    <div class="form-group">
                        <input type="text" name="house_address" placeholder="HOUSE ADDRESS" required>
                    </div>
                    
                    <div class="form-group">
                        <select name="registration_type" required>
                            <option value="" disabled selected>REGISTRATION TYPE</option>
                            <option value="new">Residents</option>
                            <option value="renewal">Guest</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <input type="text" name="vehicle_plate_number" placeholder="VEHICLE PLATE NUMBER" required maxlength="9" oninput="formatPlateNumber(this)">
                    </div>
                    
                    <div class="form-group">
                        <select name="vehicle_type" required>
                            <option value="" disabled selected>VEHICLE TYPE</option>
                            <option value="commercial">PUV</option>
                            <option value="private">Private Vehicles</option>
                            <option value="truck">Industrial and Commercial Vehicles</option>
                            <option value="government">Special Vehicles</option>
                            <option value="motorcycle">Two-Wheeler</option>

                        </select>
                    </div>
                    
                    <div class="form-group">
                                <select name="plate_type" required>
                    <option value="" disabled selected>PLATE TYPE</option>
                    <option value="standard">Private Vehicles</option>
                    <option value="personalized">PUV</option>
                    <option value="special_government">Government Vehicles</option>
                    <option value="special_motorcycle">Motorcycle Plate</option>
                    <option value="special_temporary">Temporary and Special Plates</option>
                </select>

                    </div>
                    
                    <div class="form-group">
                        <select name="vehicle_color" required>
                            <option value="" disabled selected>VEHICLE COLOR</option>
                            <option value="black">Black</option>
                            <option value="white">White</option>
                            <option value="silver">Silver</option>
                            <option value="red">Red</option>
                            <option value="blue">Blue</option>
                            <option value="green">Green</option>
                            <option value="yellow">Yellow</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="vehicle_image">Upload Vehicle Images:</label>
                        <input type="file" id="vehicle_image" name="vehicle_images[]" accept="image/*" multiple onchange="previewImages()">
                        <div id="image-preview"></div>
                    </div>
                    

                    <!-- Improved Image Upload Section -->
                    <div class="terms">
                        <input type="checkbox" id="terms" name="terms" required>
                        <label for="terms">Terms and Condition</label>
                    </div>

                    <div class="btn-container">
    <button type="submit" class="Submit-btn" onclick="window.location.href='/v-chain/php/reg-typrompt.php'">Submit</button>
</div>
                </form>
            </div>
        </div>
    </div>
    <script>
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

        let selectedFiles = new DataTransfer(); // Create a DataTransfer object

        document.getElementById('vehicle_image').addEventListener('change', function (event) {
            console.clear();
            
            // Add new files to DataTransfer object
            for (let file of event.target.files) {
                selectedFiles.items.add(file);
            }

            // Update the input file list
            event.target.files = selectedFiles.files;

            console.log(`Total files selected: ${selectedFiles.files.length}`);
            for (let i = 0; i < selectedFiles.files.length; i++) {
                console.log(`File ${i + 1}: ${selectedFiles.files[i].name}`);
            }
        });

        
    </script>
</body>
</html>