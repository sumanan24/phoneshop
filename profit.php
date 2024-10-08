<?php
include_once('config.php');

// Initialize variables for profits
$daily_profit = 0;
$monthly_profit = 0;
$annual_profit = 0;

// Get the current date, month, and year
$current_date = date('Y-m-d');
$current_month = date('Y-m');
$current_year = date('Y');

// Daily Profit Calculation
$sql_daily = "SELECT SUM(profit) AS daily_profit FROM `order` WHERE DATE(completion_date) = '$current_date'";
$result_daily = mysqli_query($conn, $sql_daily);
if ($row_daily = mysqli_fetch_assoc($result_daily)) {
    $daily_profit = $row_daily['daily_profit'];
}

// Monthly Profit Calculation
$sql_monthly = "SELECT SUM(profit) AS monthly_profit FROM `order` WHERE DATE_FORMAT(completion_date, '%Y-%m') = '$current_month'";
$result_monthly = mysqli_query($conn, $sql_monthly);
if ($row_monthly = mysqli_fetch_assoc($result_monthly)) {
    $monthly_profit = $row_monthly['monthly_profit'];
}

// Annual Profit Calculation
$sql_annual = "SELECT SUM(profit) AS annual_profit FROM `order` WHERE DATE_FORMAT(completion_date, '%Y') = '$current_year'";
$result_annual = mysqli_query($conn, $sql_annual);
if ($row_annual = mysqli_fetch_assoc($result_annual)) {
    $annual_profit = $row_annual['annual_profit'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Profit Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="container my-4">
    <h1 class="mb-4">Profit Report</h1>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Time Period</th>
                <th>Profit</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Daily Profit (<?php echo date('Y-m-d'); ?>)</td>
                <td><?php echo number_format($daily_profit, 2); ?> LKR</td>
            </tr>
            <tr>
                <td>Monthly Profit (<?php echo date('F Y'); ?>)</td>
                <td><?php echo number_format($monthly_profit, 2); ?> LKR</td>
            </tr>
            <tr>
                <td>Annual Profit (<?php echo date('Y'); ?>)</td>
                <td><?php echo number_format($annual_profit, 2); ?> LKR</td>
            </tr>
        </tbody>
    </table>

    <div class="mt-4">
        <button class="btn btn-primary" onclick="window.print()">Print Report</button>
        <a href="dashboard.php" class="btn btn-secondary">Back</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
