<?php
include_once('config.php');

// Fetch customer details from the database
if (isset($_GET['id'])) {
    $id = $_GET['id'];

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
        $advance = $row['advance'];
    } else {
        echo "No record found for the given ID!";
        exit();
    }
} else {
    echo "No ID provided!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Customer Confirmation Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        @media print {
            body {
                margin: 0;
                padding: 0;
                width: 105mm; /* A6 width */
                height: 148mm; /* A6 height */
                font-size: 12px; /* Adjust font size for a smaller print */
            }
            .no-print {
                display: none;
            }
            .confirmation-form {
                padding: 10px; /* Reduce padding for compactness */
                border: none;
                margin: 0;
            }
            .shop-info h1 {
                font-size: 16px; /* Adjust heading size */
            }
            .shop-info p, .row p, label {
                font-size: 12px;
                margin: 2px 0;
            }
            .row div {
                margin-bottom: 5px;
            }
            hr {
                margin: 5px 0;
            }
        }

        .confirmation-form {
            border: 1px solid #000;
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
        }

        .shop-info {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>

<body class="container my-4">

    <div class="confirmation-form">
        <div class="shop-info">
            <h1 style="font-family: Footlight MT Light; font-weight: bold;">Tharuna Digital Media Works</h1>
            <p>No:03,Bus Stand , Paranthan Junction , Kilinochchi<br>Phone: +94 77 569 0418<br>Email: Nitharsanroy97@gmail.com <br>
            Bill - <b><?php echo "Order ID".$id; ?></b> </p>
        </div>
        <hr>

        <div class="row mb-3">
            <div class="col-md-6">
                <label><strong>Customer Name:</strong></label>
                <p><?php echo $c_name; ?></p>
            </div>
            <div class="col-md-6">
                <label><strong>Phone Number:</strong></label>
                <p><?php echo $c_phone; ?></p>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label><strong>Device Type:</strong></label>
                <p><?php echo $device_type; ?></p>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label><strong>Description of the Problem:</strong></label>
                <p><?php echo $description; ?></p>
            </div>

            <div class="col-md-6">
                <label><strong>Amount:</strong></label>
                <p><?php echo "Rs." .$cost; ?></p>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label><strong>Advance:</strong></label>
                <p><?php echo "Rs." . ($advance); ?></p>
            </div>
            
            <div class="col-md-6">
                <label><strong>Balance:</strong></label>
                <p><?php echo "Rs." . ($cost-$advance); ?></p>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label><strong>Repair Date:</strong></label>
                <p><?php echo date('F j, Y', strtotime($date)); ?></p>
            </div>
            <div class="col-md-6">
                <label><strong>Estimated Completion Date:</strong></label>
                <p><?php echo date('F j, Y', strtotime($completion_date)); ?></p>
            </div>
        </div>
        <hr>

        <div class="shop-info">
            <p style="font-weight: bold; font-size: 12px;">Thank you for doing business with us! <br></p>
        </div>

        <div class="no-print mt-4">
            <button class="btn btn-primary" onclick="window.print()">Print Confirmation</button>
            <a href="dashboard.php" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
