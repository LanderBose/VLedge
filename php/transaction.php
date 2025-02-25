<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
    <link rel="stylesheet" href="/CC106/css/transaction.css">
    <link rel="stylesheet" href="/CC106/css/sidebar.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<?php include 'sidebar.php'; ?>  <!-- Sidebar Included -->

<!-- Main Content -->
<div class="main-content">
<span class="transactions-title">Transactions</span>
    
    <!-- Charts Section -->
    <div class="charts">
        <div class="chart-container pie">
            <canvas id="pieChart"></canvas>
        </div>
        <div class="chart-container bar">
            <canvas id="barChart"></canvas>
        </div>
    </div>

    <!-- Transactions Table -->
    <div class="table-container">
        <h2>Transactions</h2>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Plate No.</th>
                        <th>Plate Type</th>
                        <th>Date</th>
                        <th>TimeStamp</th>
                        <th>Access Point</th>
                        <th>Color</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $transactions = [
                            ["f74...", "ABC 1234", "Standard", "2-14-25", "12:30:00", "Entry", "Red"],
                            ["f75...", "DEF 5678", "Premium", "2-14-25", "12:45:00", "Exit", "Blue"],
                            ["f76...", "GHI 9101", "Standard", "2-14-25", "13:00:00", "Entry", "Black"],
                            ["f77...", "JKL 1121", "Commercial", "2-14-25", "13:15:00", "Exit", "White"],
                            ["f78...", "MNO 3141", "VIP", "2-14-25", "13:30:00", "Entry", "Gray"],
                            ["f79...", "PQR 5161", "Standard", "2-14-25", "13:45:00", "Exit", "Green"],
                        ];

                        foreach ($transactions as $row) {
                            echo "<tr>";
                            foreach ($row as $cell) {
                                echo "<td>$cell</td>";
                            }
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="/CC106/js/transaction.js"></script>

</body>
</html>