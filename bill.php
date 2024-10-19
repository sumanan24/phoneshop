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
    <title>Customer Bill Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        @media print {
            body {
                width: 74mm;
                /* A7 width */
                height: 105mm;
                /* A7 height */
                font-size: 12px;
                /* Adjust font size for A7 */
            }

            .no-print {
                display: none;
            }

            .confirmation-form {
                border: none;
            }

            .shop-info h1 {
                font-size: 14px;
            }

            .shop-info p {
                font-size: 12px;
            }

            .row p,
            label {
                font-size: 12px;
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

        <div class="row">
            <div class="col-md-6 mb-1">
                <label><strong>Customer Name:</strong> <?php echo $c_name; ?></label>
                
            </div>
            <div class="col-md-6 mb-1">
                <label><strong>Phone Number:</strong> <?php echo $c_phone; ?></label>
               
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-1">
                <label><strong>Device Type:</strong> <?php echo $device_type; ?></label>
                
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-1">
                <label><strong>Description of the Problem:</strong> <?php echo $description; ?></label>
               
            </div>

            <div class="col-md-6 mb-1">
                <label><strong>Amount:</strong> <?php echo "Rs." .$cost; ?></label>
                
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-1">
                <label><strong>Advance:</strong> <?php echo "Rs." . ($advance); ?></label>
               
            </div>
            
            <div class="col-md-6 mb-1">
                <label><strong>Balance:</strong> <?php echo "Rs." . ($cost-$advance); ?></label>
                
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-1">
                <label><strong>Repair Date:</strong> <?php echo date('F j, Y', strtotime($date)); ?></label>
               
            </div>
            <div class="col-md-6 mb-1">
                <label><strong>Estimated Completion Date:</strong> <?php echo date('F j, Y', strtotime($completion_date)); ?></label>
                
            </div>
        </div>
        <hr>

        <div class="shop-info">
            <p style="font-weight: bold; font-size: 12px;">Thank you for doing business with us! <br></p>
        </div>

        <div class="no-print mt-4">
            <button class="btn btn-primary" onclick="window.print()">Print Bill</button>
            <a href="dashboard.php" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
