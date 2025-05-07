<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistics Dashboard</title>
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/statistics.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<?php include 'sidebar.php'; ?>

<main class="content">
    <header class="top-bar">
        <span class="dashboard-title">Dashboard</span>
        <div class="date-time">&nbsp;</div>
    </header>

    <!-- Time Period Filter -->
    <div class="time-filter">
        <button class="time-btn active" data-period="daily">Daily</button>
        <button class="time-btn" data-period="weekly">Weekly</button>
        <button class="time-btn" data-period="monthly">Monthly</button>
    </div>

    <!-- Stats Cards -->
    <div class="stats-container">
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
                <div class="stat-label">Total HOs Vehicle Inside</div>
                <div class="stat-value">191</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon guest-icon">
                <i class="fas fa-person"></i>
            </div>
            <div class="stat-info">
                <div class="stat-label">Total Guest Vehicle Inside</div>
                <div class="stat-value">34</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon car-icon">
                <i class="fas fa-car"></i>
            </div>
            <div class="stat-info">
                <div class="stat-label">Four Wheel Vehicle Inside</div>
                <div class="stat-value">102</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon motorcycle-icon">
                <i class="fas fa-motorcycle"></i>
            </div>
            <div class="stat-info">
                <div class="stat-label">Motorcycle Inside</div>
                <div class="stat-value">191</div>
            </div>
        </div>

        
    </div>

    <!-- Charts Section -->
    <div class="charts-container">
        <div class="chart-card bar-chart-container">
            <h3>Bar Graph</h3>
            <canvas id="barChart"></canvas>
        </div>

        <div class="chart-card pie-chart-container">
            <h3>Pie Chart</h3>
            <canvas id="pieChart"></canvas>
        </div>
    </div>

    <!-- Data Tables Section -->
    <div class="tables-container">
        <div class="data-table registered-table">
            <h3>Registered Vehicle</h3>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Plate No.</th>
                        <th>Registration Type</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>MimiOT</td>
                        <td>ABC3265</td>
                        <td>Resident</td>
                    </tr>
                    <!-- Additional rows would be populated from the database -->
                </tbody>
            </table>
        </div>

        <div class="access-log">
            <h3>Access Log</h3>
            <div class="access-counters">
                <div class="counter-card">
                    <div class="counter-label">ENTRY</div>
                    <div class="counter-value">102</div>
                </div>
                <div class="counter-card">
                    <div class="counter-label">EXIT</div>
                    <div class="counter-value">67</div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="../js/statistics.js"></script>
<script>
    // Update date and time
    function updateDateTime() {
        const now = new Date();
        const formattedDate = now.toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' });
        const formattedTime = now.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
        document.querySelector('.date-time').innerHTML = `${formattedDate} &nbsp; ${formattedTime}`;
    }

    setInterval(updateDateTime, 1000);
    updateDateTime();

    // Initialize charts when DOM is loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Bar Chart
        const barCtx = document.getElementById('barChart').getContext('2d');
        const barChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'],
                datasets: [
                    {
                        label: 'Entry',
                        data: [30, 120, 60, 90, 20, 80, 110, 100, 70, 90],
                        backgroundColor: '#4CAF50', // Green
                        barPercentage: 0.6,
                        categoryPercentage: 0.7
                    },
                    {
                        label: 'Exit',
                        data: [20, 90, 40, 60, 110, 90, 70, 40, 30, 100],
                        backgroundColor: '#F44336', // Red
                        barPercentage: 0.6,
                        categoryPercentage: 0.7
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            color: '#b0b0b0'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#b0b0b0'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Pie Chart
        const pieCtx = document.getElementById('pieChart').getContext('2d');
        const pieChart = new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: ['Residents', 'Guests', 'Employees', 'Visitors'],
                datasets: [{
                    data: [624, 322, 890, 780],
                    backgroundColor: [
                        '#4e81ee', // Blue
                        '#a7cb4e', // Green
                        '#d76c6c', // Red
                        '#e782c9'  // Pink
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            color: '#b0b0b0',
                            padding: 20,
                            font: {
                                size: 12
                            }
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `${context.label}: ${context.raw}`;
                            }
                        }
                    }
                }
            }
        });

        // Time period filter buttons
        const timeButtons = document.querySelectorAll('.time-btn');
        timeButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                timeButtons.forEach(btn => btn.classList.remove('active'));
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // Get the selected period
                const period = this.dataset.period;
                
                // Here you would update charts and data based on selected period
                // For demonstration, we'll just log the period
                console.log(`Period changed to: ${period}`);
                
                // In a real implementation, you would call functions to update the data
                // updateChartsAndStats(period);
            });
        });
    });
</script>
</body>
</html>