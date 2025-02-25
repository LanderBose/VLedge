<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CC106/css/registry.css">
    <link rel="stylesheet" href="/CC106/css/sidebar.css">
</head>
<body>
<?php include 'sidebar.php'; ?>  <!-- Include the sidebar -->

    <div class="content">
*    <span class="registry-title">Registry</span>
                
        <h2>Vehicle Registration Log</h2>
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
                    <td>f74d8d6a-98f6-4f49-b1b0-cfd8270c3c9a</td>
                    <td>Juan Dela Cruz</td>
                    <td>+63 912 345 6789</td>
                    <td>Brgy...</td>
                    <td>Residence</td>
                    <td>ABC 1234</td>
                    <td>Passenger</td>
                    <td>Standard</td>
                    <td>Red</td>
                </tr>
                <tr>
                    <td>f74d8d6a-98f6-4f49-b1b0-cfd8270c3c9a</td>
                    <td>Juan Dela Cruz</td>
                    <td>+63 912 345 6789</td>
                    <td>Brgy...</td>
                    <td>Guest</td>
                    <td>ABC 1234</td>
                    <td>Passenger</td>
                    <td>Standard</td>
                    <td>Red</td>
                </tr>
                <tr>
                    <td>f74d8d6a-98f6-4f49-b1b0-cfd8270c3c9a</td>
                    <td>Juan Dela Cruz</td>
                    <td>+63 912 345 6789</td>
                    <td>Brgy...</td>
                    <td>Guest</td>
                    <td>ABC 1234</td>
                    <td>Commercial</td>
                    <td>Standard</td>
                    <td>Red</td>
                </tr>
            </tbody>
        </table>
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