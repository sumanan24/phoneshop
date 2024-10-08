<!DOCTYPE html>
<html lang="en">
<?php include_once('config.php');

?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script>
        // JavaScript to set today's date as default value
        document.addEventListener('DOMContentLoaded', function() {
            var today = new Date();
            var year = today.getFullYear();
            var month = String(today.getMonth() + 1).padStart(2, '0'); // Months are 0-based
            var day = String(today.getDate()).padStart(2, '0');

            var todayDate = year + '-' + month + '-' + day;

            document.getElementById('dateInput').value = todayDate;
        });
    </script>
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
                            <h1 class="mt-4">Customer</h1>
                            <hr>
                            <?php
                            if (isset($_POST['create'])) {
                                $c_name = $_POST['cname'];
                                $c_phone = $_POST['phone'];
                                $device_type = $_POST['device'];
                                $description = $_POST['problem'];
                                $status = $_POST['status'];
                                $date = $_POST['rdate'];
                                $completion_date = $_POST['rcdate'];
                                $advance = $_POST['advance'];
                                $cost = !empty($_POST['cost']) ? $_POST['cost'] : 0; // Set default value 0 if cost is empty
                                $hired_out = $_POST['hname'];
                                $hire_cost = !empty($_POST['hcost']) ? $_POST['hcost'] : 0; // Set default value 0 if hire_cost is empty
                                $profit = $cost - $hire_cost;

                                // SQL Insert query
                                $sql = "INSERT INTO `order`(`c_name`, `c_phone`, `device_type`, `description`, `status`, `date`, `completion_date`, `cost`,`advance`, `hired_out`,`hire_out_cost`, `profit`) 
                                 VALUES ('$c_name', '$c_phone', '$device_type', '$description', '$status', '$date', '$completion_date', '$cost','$advance', '$hired_out', '$hire_cost','$profit')";

                                // Execute query
                                if (mysqli_query($conn, $sql)) {
                                    
                            ?>
                                    <div class='alert alert-success'>Record Add Successfully!</div>
                                    <meta http-equiv='refresh' content='2'>
                            <?php
                              
                            } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                }
                            }
                            ?>
                            <form action="" method="POST">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control form-control-sm" type="text" placeholder="Enter your Full Name" name="cname" required>
                                            <label for="inputFirstName">Full Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input class="form-control form-control-sm" type="number" name="phone" placeholder="Enter your Phone" required>
                                            <label for="inputLastName">Phone Number</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control form-control-sm" type="text" placeholder="Enter your Device Name" name="device" required>
                                            <label for="inputFirstName">Device Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <select class="form-control form-control-sm" name="status" id="" required>
                                                <option value="" selected disabled>Choose Status</option>
                                                <option value="pending">Pending</option>
                                                <option value="inprogress">In progress</option>
                                                <option value="completed">Completed</option>
                                                <option value="delevered">delevered</option>
                                            </select>
                                            <label for="inputFirstName">Repair Status</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="">
                                            <textarea class="form-control " name="problem" id="" rows="3" cols="50" placeholder="Problem_description"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input class="form-control form-control-sm" id="dateInput" type="date" name="rdate" placeholder="Enter Date" required>
                                            <label for="inputLastName">Repair Date</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control form-control-sm" type="date" placeholder="Enter your Full Name" name="rcdate">
                                            <label>Completion Date</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control form-control-sm" type="number" placeholder="Enter your Device Name" name="advance" required>
                                            <label for="inputFirstName">Advance Payment</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input class="form-control form-control-sm" maxlength="10" type="number" name="cost" placeholder="Enter your Phone">
                                            <label for="inputLastName">Payment</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control form-control-sm" type="text" placeholder="Enter your Full Name" name="hname">
                                            <label for="inputFirstName">Hired Out Person</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input class="form-control form-control-sm" maxlength="10" id="inputLastName" type="number" name="hcost" placeholder="Enter your Phone">
                                            <label for="inputLastName">Hired Out Cost</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-9">

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating">
                                            <input class="btn bg-success" style="width: 100%;" type="submit" name="create" value="Add Customer">
                                        </div>
                                    </div>
                                </div>


                            </form>

                        </div>
                    </main>
                    <footer class="py-4 bg-light mt-auto">
                        <div class="container-fluid px-4">
                            <div class="d-flex align-items-center justify-content-between small">
                                <div class="text-muted">Copyright &copy; SI CODE Pvt (Ltd)</div>
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