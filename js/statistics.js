/**
 * Statistics Dashboard JavaScript 
 * Handles data fetching, chart updates, and interaction
 */

// Global variables for charts
let barChart;
let pieChart;

// Function to fetch statistics data (in a real implementation this would call the API)
async function fetchStatistics(period = 'daily') {
    try {
        // This would be an API call in a real implementation
        // const response = await fetch(`/api/statistics?period=${period}`);
        // const data = await response.json();
        // return data;
        
        // For demonstration purposes, return sample data
        return {
            totalVehicles: 293,
            guestVehicles: 34,
            fourWheelVehicles: 102,
            motorcycles: 191,
            barData: {
                labels: ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'],
                entry: [30, 120, 60, 90, 20, 80, 110, 100, 70, 90],
                exit: [20, 90, 40, 60, 110, 90, 70, 40, 30, 100]
            },
            pieData: {
                labels: ['Residents', 'Guests', 'Employees', 'Visitors'],
                values: [624, 322, 890, 780]
            },
            accessLog: {
                entry: 102,
                exit: 67
            },
            registeredVehicles: [
                { name: 'MimiOT', plateNo: 'ABC3265', registrationType: 'Resident' },
                { name: 'JohnDoe', plateNo: 'XYZ789', registrationType: 'Employee' },
                { name: 'JaneSmith', plateNo: 'DEF456', registrationType: 'Guest' }
            ]
        };
    } catch (error) {
        console.error('Error fetching statistics:', error);
        return null;
    }
}

// Function to update the statistics UI
async function updateStatistics(period = 'daily') {
    const data = await fetchStatistics(period);
    if (!data) return;
    
    // Update stat cards
    document.querySelector('.stats-container .stat-card:nth-child(1) .stat-value').textContent = data.totalVehicles;
    document.querySelector('.stats-container .stat-card:nth-child(2) .stat-value').textContent = data.guestVehicles;
    document.querySelector('.stats-container .stat-card:nth-child(3) .stat-value').textContent = data.fourWheelVehicles;
    document.querySelector('.stats-container .stat-card:nth-child(4) .stat-value').textContent = data.motorcycles;
    
    // Update bar chart
    if (barChart) {
        barChart.data.labels = data.barData.labels;
        barChart.data.datasets[0].data = data.barData.entry;
        barChart.data.datasets[1].data = data.barData.exit;
        barChart.update();
    }
    
    // Update pie chart
    if (pieChart) {
        pieChart.data.labels = data.pieData.labels;
        pieChart.data.datasets[0].data = data.pieData.values;
        pieChart.update();
    }
    
    // Update access counters
    document.querySelector('.counter-card:nth-child(1) .counter-value').textContent = data.accessLog.entry;
    document.querySelector('.counter-card:nth-child(2) .counter-value').textContent = data.accessLog.exit;
    
    // Update registered vehicles table
    const tableBody = document.querySelector('.registered-table tbody');
    tableBody.innerHTML = '';
    
    data.registeredVehicles.forEach(vehicle => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${vehicle.name}</td>
            <td>${vehicle.plateNo}</td>
            <td>${vehicle.registrationType}</td>
        `;
        tableBody.appendChild(row);
    });
}

// Initialize the dashboard
document.addEventListener('DOMContentLoaded', function() {
    // Set up event listeners for period buttons
    document.querySelectorAll('.time-btn').forEach(button => {
        button.addEventListener('click', function() {
            const period = this.dataset.period;
            updateStatistics(period);
            
            // Update active button
            document.querySelectorAll('.time-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            this.classList.add('active');
        });
    });
    
    // Call initial update with default period (daily)
    updateStatistics('daily');
});

// Function to format date for display
function formatDate(date) {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return date.toLocaleDateString('en-US', options);
}

// Function to format time for display
function formatTime(date) {
    const options = { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true };
    return date.toLocaleTimeString('en-US', options);
}
