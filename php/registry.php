<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/registry.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
<?php include 'sidebar.php'; ?>  <!-- Include the sidebar -->

<main class="content">
            <header class="top-bar">
                <span class="dashboard-title">Registry</span>
                <div class="date-time">&nbsp;</div>
            </header>
    <section class="stats-container">
    <div class="stat-card">
            <div class="stat-icon folder-icon">
                <i class="fas fa-folder"></i>
            </div>
            <div class="stat-info">
                <div class="stat-label">Total Vehicle Registered</div>
                <div class="stat-value">293</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon house-icon">
                <i class="fas fa-house"></i>
            </div>
            <div class="stat-info">
                <div class="stat-label">Total HO Registered</div>
                <div class="stat-value">102</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon guest-icon">
                <i class="fas fa-person"></i>
            </div>
            <div class="stat-info">
                <div class="stat-label">Total Guest Registered</div>
                <div class="stat-value">34</div>
            </div>
        </div>

        
    </section>
    <section class="register">
    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <th>Registration Type</th>
                    <th>Vehicle Plate Number</th>
                    <th>Vehicle Type</th>
                    <th>Plate Type</th>
                    <th>Vehicle Color</th>
                </tr>
            </thead>
            <tbody>
            <tr>
    <td>a82c7b3e-5d14-42f8-9e67-1d5f8b03c4e2</td>
    <td>Maria Santos</td>
    <td>+63 917 456 7890</td>
    <td>Brgy. Poblacion, Taguig City, Metro Manila</td>
    <td>Visitor</td>
    <td>XYZ 5678</td>
    <td>SUV</td>
    <td>Special</td>
    <td>Silver</td>
</tr>

<tr>
    <td>a82c7b3e-5d14-42f8-9e67-1d5f8b03c4e2</td>
    <td>Maria Santos</td>
    <td>+63 917 456 7890</td>
    <td>Brgy. Poblacion, Taguig City, Metro Manila</td>
    <td>Visitor</td>
    <td>XYZ 5678</td>
    <td>SUV</td>
    <td>Special</td>
    <td>Silver</td>
</tr>
            </tbody>
        </table>
    </div>
    </section>
</div>

<script>
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