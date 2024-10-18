<!DOCTYPE html>
<html lang="en">
<?php include_once('config.php'); ?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard</title>
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
                            <h1 class="mt-4">Dashboard</h1>
                            <hr>
                            <div class="row">
                                <div class="col-xl-4 col-md-6">
                                    <div class="card bg-primary text-white mb-4">
                                        <div class="card-body">Pending Details

                                            <?php
                                            $sql = "SELECT COUNT(*) AS pending_count FROM `order` WHERE `status` = 'Pending'";
                                            $result = $conn->query($sql);

                                            // Check if the query was successful
                                            if ($result->num_rows > 0) {
                                                // Fetch the result
                                                $row = $result->fetch_assoc();
                                                $pendingCount = $row['pending_count'];
                                            ?>
                                                <h2><?php echo $pendingCount; ?></h2>
                                            <?php
                                            }
                                            ?>

                                        </div>

                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="pending.php">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card bg-warning text-white mb-4">
                                        <div class="card-body">In Process

                                            <?php
                                            $sql = "SELECT COUNT(*) AS pending_count FROM `order` WHERE `status` = 'inprogress'";
                                            $result = $conn->query($sql);

                                            // Check if the query was successful
                                            if ($result->num_rows > 0) {
                                                // Fetch the result
                                                $row = $result->fetch_assoc();
                                                $pendingCount = $row['pending_count'];
                                            ?>
                                                <h2><?php echo $pendingCount; ?></h2>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="process.php">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card bg-success text-white mb-4">
                                        <div class="card-body">Completed
                                            <?php
                                            $sql = "SELECT COUNT(*) AS pending_count FROM `order` WHERE `status` = 'completed'";
                                            $result = $conn->query($sql);

                                            // Check if the query was successful
                                            if ($result->num_rows > 0) {
                                                // Fetch the result
                                                $row = $result->fetch_assoc();
                                                $pendingCount = $row['pending_count'];
                                            ?>
                                                <h2><?php echo $pendingCount; ?></h2>
                                            <?php
                                            }
                                            ?>

                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="completed.php">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-6">
                                    <div class="card bg-info text-white mb-4">
                                        <div class="card-body">Return

                                        <?php
                                            $sql = "SELECT COUNT(*) AS pending_count FROM `order` WHERE `status` = 'return'";
                                            $result = $conn->query($sql);

                                            // Check if the query was successful
                                            if ($result->num_rows > 0) {
                                                // Fetch the result
                                                $row = $result->fetch_assoc();
                                                $pendingCount = $row['pending_count'];
                                            ?>
                                                <h2><?php echo $pendingCount; ?></h2>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="return.php">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-6">
                                    <div class="card bg-danger text-white mb-4">
                                        <div class="card-body">Delevered

                                        <?php
                                            $sql = "SELECT COUNT(*) AS pending_count FROM `order` WHERE `status` = 'delevered'";
                                            $result = $conn->query($sql);

                                            // Check if the query was successful
                                            if ($result->num_rows > 0) {
                                                // Fetch the result
                                                $row = $result->fetch_assoc();
                                                $pendingCount = $row['pending_count'];
                                            ?>
                                                <h2><?php echo $pendingCount; ?></h2>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="delevered.php">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-6">
                                    <div class="card bg-success text-white mb-4">
                                        <div class="card-body">Customers

                                        <?php
                                            $sql = "SELECT COUNT(*) AS pending_count FROM `order`";
                                            $result = $conn->query($sql);

                                            // Check if the query was successful
                                            if ($result->num_rows > 0) {
                                                // Fetch the result
                                                $row = $result->fetch_assoc();
                                                $pendingCount = $row['pending_count'];
                                            ?>
                                                <h2><?php echo $pendingCount; ?></h2>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="customer.php">Add Customer</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>



                            </div>

                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    New Repair Devices List
                                </div>
                                <div class="card-body">
                                    <table id="datatablesSimple">
                                        <thead>
                                            <tr>
                                                <th>Customer Name & Date</th>
                                                <th>Phone</th>
                                                <th>Device Type</th>
                                                <th>Description</th>
                                                <th>Request Date</th>
                                                <th></th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>

                                                <th>Customer Name & Date</th>
                                                <th>Phone</th>
                                                <th>Device Type</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <?php
                                        $sql = "SELECT * FROM `order` order by `id` desc";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // Only tbody part of the table
                                            echo "<tbody>";

                                            // Output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>
                                                        <td>{$row['c_name']} - {$row['date']}</td>
                                                        <td>{$row['c_phone']}</td>
                                                        <td>{$row['device_type']}</td>
                                                        <td>{$row['description']}</td>
                                                        <td>{$row['status']}</td>
                                                        
                                                       <td>
                                                       
                                                       <div class='btn-group' role='group'>
                                                       <a href='confirmation.php?id={$row['id']}' class='btn btn-info'>
                                                       <i class='fas fa-print'></i></a>
                                                       <a href='edit.php?id={$row['id']}' class='btn btn-warning'>
                                                       <i class='fas fa-edit'></i> 
                                                       </a>
                                                      </div>
                                                       </td>
                                                      </tr>";
                                            }
                                            echo "</tbody>";
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
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