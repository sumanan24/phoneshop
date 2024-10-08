<?php
include_once('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch customer data based on the ID
    $sql = "SELECT * FROM `order` WHERE `id` = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $c_name = $row['c_name'];
        $c_phone = $row['c_phone'];
        $device_type = $row['device_type'];
        $description = $row['description'];
        $status = $row['status'];
        $date = $row['date'];
        $completion_date = $row['completion_date'];
        $cost = $row['cost'];
        $advance = $row['advance']; // Add advance field
        $hire_out_cost = $row['hire_out_cost'];
        $profit = $row['profit'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>View Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        /* Print styling: Hide buttons, navigation bars, etc. */
        @media print {
            body * {
                visibility: hidden;
            }
            #printable, #printable * {
                visibility: visible;
            }
            #printable {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%; /* Ensure full-width for the printable area */
            }
            /* Print-specific header and footer */
            .print-header, .print-footer {
                display: block;
                text-align: center;
                width: 100%;
                font-size: 14px;
            }
            .print-header {
                margin-bottom: 20px;
            }
            .print-footer {
                position: fixed;
                bottom: 0;
                width: 100%;
                padding-top: 20px;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                border: 1px solid black;
            }
            table, th, td {
                border: 1px solid black;
            }
            th, td {
                padding: 8px;
                text-align: left;
            }
            .no-print {
                display: none;
            }
        }

        /* Table styling for larger width even in non-print view */
        table {
            width: 100%;
            margin-bottom: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .no-print {
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="container my-4">
    <div class="no-print">
        <button class="btn btn-primary" onclick="window.print()">Print</button>
        <a href="dashboard.php" class="btn btn-secondary">Back</a>
    </div>

    <div id="printable">
        <!-- Print Header with shop information -->
        <div class="print-header">
            <h2>Shop Name</h2>
            <p>Address, City, Phone Number</p>
        </div>

        <!-- Customer Details Table -->
        <h3>Customer Details</h3>
        <table class="table table-bordered mt-4">
            <tr>
                <th>Full Name</th>
                <td><?php echo htmlspecialchars($c_name); ?></td>
            </tr>
            <tr>
                <th>Phone Number</th>
                <td><?php echo htmlspecialchars($c_phone); ?></td>
            </tr>
            <tr>
                <th>Device Type</th>
                <td><?php echo htmlspecialchars($device_type); ?></td>
            </tr>
            <tr>
                <th>Description</th>
                <td><?php echo htmlspecialchars($description); ?></td>
            </tr>
            <tr>
                <th>Status</th>
                <td><?php echo ucfirst(htmlspecialchars($status)); ?></td>
            </tr>
            <tr>
                <th>Repair Date</th>
                <td><?php echo htmlspecialchars($date); ?></td>
            </tr>
            <tr>
                <th>Completion Date</th>
                <td><?php echo htmlspecialchars($completion_date); ?></td>
            </tr>
            <tr>
                <th>Repair Cost</th>
                <td><?php echo htmlspecialchars($cost); ?> LKR</td>
            </tr>
            <tr>
                <th>Advance</th>
                <td><?php echo htmlspecialchars($advance); ?> LKR</td>
            </tr>
            <tr>
                <th>Hire Out Cost</th>
                <td><?php echo htmlspecialchars($hire_out_cost); ?> LKR</td>
            </tr>
            <tr>
                <th>Profit</th>
                <td><?php echo htmlspecialchars($profit); ?> LKR</td>
            </tr>
        </table>

        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
