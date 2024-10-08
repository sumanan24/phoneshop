<?php
include_once('config.php');

// Initialize variables for profits
$daily_profit = 0;
$monthly_profit = 0;
$annual_profit = 0;

// Default to the current date, month, and year
$selected_date = date('Y-m-d');
$selected_month = date('Y-m');
$selected_year = date('Y');

// Check if form has been submitted
if (isset($_POST['filter'])) {
    if (!empty($_POST['date'])) {
        $selected_date = $_POST['date'];
        
        // Daily Profit Calculation
        $sql_daily = "SELECT SUM(profit) AS daily_profit FROM `order` WHERE DATE(completion_date) = '$selected_date'";
        $result_daily = mysqli_query($conn, $sql_daily);
        if ($row_daily = mysqli_fetch_assoc($result_daily)) {
            $daily_profit = $row_daily['daily_profit'];
        }
    }

    if (!empty($_POST['month'])) {
        $selected_month = $_POST['month'];
        
        // Monthly Profit Calculation
        $sql_monthly = "SELECT SUM(profit) AS monthly_profit FROM `order` WHERE DATE_FORMAT(completion_date, '%Y-%m') = '$selected_month'";
        $result_monthly = mysqli_query($conn, $sql_monthly);
        if ($row_monthly = mysqli_fetch_assoc($result_monthly)) {
            $monthly_profit = $row_monthly['monthly_profit'];
        }
    }

    if (!empty($_POST['year'])) {
        $selected_year = $_POST['year'];
        
        // Annual Profit Calculation
        $sql_annual = "SELECT SUM(profit) AS annual_profit FROM `order` WHERE DATE_FORMAT(completion_date, '%Y') = '$selected_year'";
        $result_annual = mysqli_query($conn, $sql_annual);
        if ($row_annual = mysqli_fetch_assoc($result_annual)) {
            $annual_profit = $row_annual['annual_profit'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Profit Filter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="container my-4">
    <h1 class="mb-4">Filter Profits</h1>

    <form action="" method="POST">
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" type="date" name="date" value="">
                    <label for="date">Choose Date</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" type="month" name="month" value="">
                    <label for="month">Choose Month</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input class="form-control" type="number" name="year" min="2000" max="<?php echo date('Y'); ?>" value="">
                    <label for="year">Choose Year</label>
                </div>
            </div>
        </div>
        <input type="submit" name="filter" class="btn btn-primary" value="Filter">
    </form>

    <?php if (isset($_POST['filter'])): ?>
        <h2 class="mt-4">Profit Report</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Time Period</th>
                    <th>Profit</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($_POST['date'])): ?>
                    <tr>
                        <td>Daily Profit (<?php echo date('F d, Y', strtotime($selected_date)); ?>)</td>
                        <td><?php echo number_format($daily_profit, 2); ?> LKR</td>
                    </tr>
                <?php endif; ?>
                <?php if (!empty($_POST['month'])): ?>
                    <tr>
                        <td>Monthly Profit (<?php echo date('F Y', strtotime($selected_month . '-01')); ?>)</td>
                        <td><?php echo number_format($monthly_profit, 2); ?> LKR</td>
                    </tr>
                <?php endif; ?>
                <?php if (!empty($_POST['year'])): ?>
                    <tr>
                        <td>Annual Profit (<?php echo htmlspecialchars($selected_year); ?>)</td>
                        <td><?php echo number_format($annual_profit, 2); ?> LKR</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <div class="mt-4">
        <button class="btn btn-primary" onclick="window.print()">Print Report</button>
        <a href="dashboard.php" class="btn btn-secondary">Back</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
