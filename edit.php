<!DOCTYPE html>
<html lang="en">
<?php include_once('config.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch existing data for the selected customer
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
        $advance=$row['advance'];
        $hired_out = $row['hired_out'];
        $hire_cost = $row['hire_out_cost'];
    }
}

?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

</head>

<body class="sb-nav-fixed">
    <?php include_once('nav.php'); ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <?php include_once('sidenav.php'); ?>
                </div>
                <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Edit Customer</h1>
                    <hr>
                    <?php 
                    if (isset($_POST['update'])) {
                        $id = $_POST['id'];
                        $c_name = $_POST['cname'];
                        $c_phone = $_POST['phone'];
                        $device_type = $_POST['device'];
                        $description = $_POST['problem'];
                        $status = $_POST['status'];
                        $date = $_POST['rdate'];
                        $completion_date = $_POST['rcdate'];
                        $cost = $_POST['cost'];
                        $advance = $_POST['advance'];
                        $hired_out = $_POST['hname'];
                        $hire_cost = $_POST['hcost'];
                        $profit = $cost - $hire_cost;
                        if($status == "return")
                        {
                            $advance = 0;
                            $cost = 0;
                            $hire_cost = 0;
                            $profit = 0;
                        }
                    
                        // Update query
                        $sql = "UPDATE `order` SET `c_name`='$c_name', `c_phone`='$c_phone', `device_type`='$device_type', 
                                `description`='$description', `status`='$status', `date`='$date', `completion_date`='$completion_date', 
                                `cost`='$cost', `hired_out`='$hired_out', `hire_out_cost`='$hire_cost', `profit`='$profit' 
                                WHERE `id`=$id";
                    
                        if (mysqli_query($conn, $sql)) {
                            echo "<div class='alert alert-success'>Record updated successfully!</div>";
                        } else {
                            echo "<div class='alert alert-danger'>Error updating record: " . mysqli_error($conn) . "</div>";
                        }
                    }
                    ?>
                    <form action="" method="POST" class="row g-3">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">

                        <div class="col-md-6">
                            <label for="cname" class="form-label">Full Name:</label>
                            <input type="text" name="cname" class="form-control" value="<?php echo $c_name; ?>" required>
                        </div>

                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone Number:</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo $c_phone; ?>" required>
                        </div>

                        <div class="col-md-6">
                            <label for="device" class="form-label">Device Type:</label>
                            <input type="text" name="device" class="form-control" value="<?php echo $device_type; ?>" required>
                        </div>

                        <div class="col-md-6">
                            <label for="status" class="form-label">Status:</label>
                            <select name="status" class="form-select" required>
                                <option value="pending" <?php if ($status == 'pending') echo 'selected'; ?>>Pending</option>
                                <option value="inprogress" <?php if ($status == 'inprogress') echo 'selected'; ?>>In Progress</option>
                                <option value="completed" <?php if ($status == 'completed') echo 'selected'; ?>>Completed</option>
                                <option value="return" <?php if ($status == 'return') echo 'selected'; ?>>Return</option>
                                <option value="delevered" <?php if ($status == 'delevered') echo 'selected'; ?>>Delevered</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="problem" class="form-label">Description:</label>
                            <textarea name="problem" class="form-control" rows="3"><?php echo $description; ?></textarea>
                        </div>

                        

                        <div class="col-md-6">
                            <label for="rdate" class="form-label">Repair Date:</label>
                            <input type="date" name="rdate" class="form-control" value="<?php echo $date; ?>">
                        </div>

                        <div class="col-md-6">
                            <label for="rcdate" class="form-label">Completion Date:</label>
                            <input type="date" name="rcdate" class="form-control" value="<?php echo $completion_date; ?>">
                        </div>

                        <div class="col-md-6">
                            <label for="cost" class="form-label">Advance Payment:</label>
                            <input type="number" name="advance" class="form-control" value="<?php echo $advance; ?>">
                        </div>

                        <div class="col-md-6">
                            <label for="cost" class="form-label">Repair Cost:</label>
                            <input type="number" name="cost" class="form-control" value="<?php echo $cost; ?>">
                        </div>

                        <div class="col-md-6">
                            <label for="hname" class="form-label">Hired Out Person:</label>
                            <input type="text" name="hname" class="form-control" value="<?php echo $hired_out; ?>">
                        </div>

                        <div class="col-md-6">
                            <label for="hcost" class="form-label">Hire Out Cost:</label>
                            <input type="number" name="hcost" class="form-control" value="<?php echo $hire_cost; ?>">
                        </div>

                        <div class="col-12">
                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </main>
                    <footer class="py-4 bg-light mt-auto">
                        <div class="container-fluid px-4">
                            <div class="d-flex align-items-center justify-content-between small">
                                <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            </div>
                        </div>
                    </footer>
                </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
</body>

</html>