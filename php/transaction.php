<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
    <link rel="stylesheet" href="/v-chain/css/transaction.css">
    <link rel="stylesheet" href="/v-chain/css/sidebar.css">
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
                        <th>Name</th>
                        <th>Registration Type</th>
                        <th>Date</th>
                        <th>TimeStamp</th>
                        <th>Access Point</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $transactions = [
                            ["f74123...", "ABC 1234", "John Doe", "Resident", "2-14-25", "12:30:00", "Entry"],
                            ["f75124...", "DEF 5678", "Jane Smith", "Guest", "2-14-25", "12:45:00", "Exit"],
                            ["f76125...", "GHI 9101", "Alice Brown", "Resident", "2-14-25", "13:00:00", "Entry"],
                            ["f77126...", "JKL 1121", "Bob Johnson", "Guest", "2-14-25", "13:15:00", "Exit"],
                            ["f78127...", "MNO 3141", "Charlie Lee", "Resident", "2-14-25", "13:30:00", "Entry"],
                            ["f79128...", "PQR 5161", "Diana Ross", "Guest", "2-14-25", "13:45:00", "Exit"],
                            ["f80129...", "STU 7181", "Ethan Hunt", "Resident", "2-14-25", "14:00:00", "Entry"],
                            ["f81130...", "VWX 9202", "Frank Castle", "Guest", "2-14-25", "14:15:00", "Exit"],
                            ["f82131...", "YZA 1123", "Grace Kelly", "Resident", "2-14-25", "14:30:00", "Entry"],
                            ["f83132...", "BCD 3145", "Hank Pym", "Guest", "2-14-25", "14:45:00", "Exit"]
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

<script src="/v-chain/js/transaction.js"></script>

</body>
</html>
