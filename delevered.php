<!DOCTYPE html>
<html lang="en">
<?php include_once('config.php'); ?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
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
                            <h1 class="mt-4">Delevered Information</h1>
                            <hr>
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    DataTable Example
                                </div>
                                <div class="card-body">
                                    <table id="datatablesSimple">
                                        <thead>
                                            <tr>
                                                <th>Customer Name</th>
                                                <th>Phone</th>
                                                <th>Device Type</th>
                                                <th>Description</th>
                                                <th>Date</th>
                                                <th></th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>

                                                <th>Customer Name</th>
                                                <th>Phone</th>
                                                <th>Device Type</th>
                                                <th>Description</th>
                                                <th>Date</th>
                                                <th></th>


                                            </tr>
                                        </tfoot>
                                        <?php


                                        if (isset($_GET['delete'])) {
                                            $id = $_GET['delete'];
                                            $sqldelete = "DELETE FROM `order` WHERE `id`= $id";
                                            if (mysqli_query($conn, $sqldelete)) {
                                        ?>
                                                <div class='alert alert-danger'>Delete Successfully!</div>
                                                <meta http-equiv='refresh' content='2'>
                                        <?php
                                            }
                                        }


                                        $sql = "SELECT * FROM `order` WHERE `status` = 'delevered'";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // Only tbody part of the table
                                            echo "<tbody>";

                                            // Output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>
                                                        <td>{$row['c_name']}</td>
                                                        <td>{$row['c_phone']}</td>
                                                        <td>{$row['device_type']}</td>
                                                        <td>{$row['description']}</td>
                                                         
                                                        <td>{$row['date']}</td>
                                                        <td>
                    <div class='btn-group' role='group'>
                       <a href='view.php?id={$row['id']}' class='btn btn-info'>
                            <i class='fas fa-eye'></i> 
                        </a>
    
                        <a href='?delete={$row['id']}' class='btn btn-danger' >
                            <i class='fas fa-trash'></i> 
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