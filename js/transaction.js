document.addEventListener("DOMContentLoaded", function() {
    // Pie Chart (Legend on Right)
    var pieCtx = document.getElementById('pieChart').getContext('2d');
    new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: ['PUV', 'Private Vehicles', 'Industrial and Commercial Vehicles', 'Special Vehicles', 'Two-wheeler'],
            datasets: [{
                data: [12, 8, 8, 8, 64],  
                backgroundColor: ['blue', 'orange', 'green', 'yellow', 'purple']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            layout: {
                padding: 10
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'right'  // Moves the legend to the right side
                }
            }
        }
    });

    // Bar Chart (No changes)
    var barCtx = document.getElementById('barChart').getContext('2d');
    new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: ['2004/05', '2005/06', '2006/07', '2007/08', '2008/09'],
            datasets: [
                {
                    label: 'Passenger',
                    data: [100, 200, 150, 180, 220],
                    backgroundColor: 'blue'
                },
                {
                    label: 'Private Vehicles',
                    data: [400, 420, 430, 410, 415],
                    backgroundColor: 'orange'
                },
                {
                    label: 'Industrial and Commercial Vehicles',
                    data: [300, 320, 310, 330, 340],
                    backgroundColor: 'green'
                },
                {
                    label: 'Special Vehicles',
                    data: [500, 550, 530, 540, 560],
                    backgroundColor: 'yellow'
                },
                {
                    label: 'Two-wheeler',
                    data: [250, 270, 260, 280, 290],
                    backgroundColor: 'purple'
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});