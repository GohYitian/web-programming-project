<?php
session_start();
include_once('includes/config.php');
include('includes/checklogin.php');
check_login();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="clinic management" content="information of clinic">
    <meta name="CVBS" content="clinic management">

    <title>Clinic</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicon-32x32.png">
    <link rel="manifest" href="../assets/img/site.webmanifest">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-syringe"></i>
                </div>
                <div class="sidebar-brand-text mx-3">CVBS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Management Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Management</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Components:</h6>
                        <a class="collapse-item" href="user.php">Users</a>
                        <a class="collapse-item" href="clinic.php">Clinic</a>
                        <a class="collapse-item" href="vaccination.php">Vaccination</a>
                        <a class="collapse-item" href="feedback.php">Feedback</a>
                        <a class="collapse-item" href="hotspot.php">Hotspot Tracking</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Log Out -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="logout.php">
                    Log Out
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Topbar Search -->
                    <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        Covid-19 Vaccination Booking System
                    </div>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Clinic Information</h1>
                    </div>
                </div>
                <!-- End of Main Content -->

                <!-- Begin of clinic management-->
                <form action="clinic.php" method="POST">
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                        <select name="state">
                            <option value="">Select State</option>
                            <?php $ret = mysqli_query($con, "select * from state");
                            while ($rows = mysqli_fetch_array($ret)) {
                            ?>
                                <option value="<?php echo htmlentities($rows['state']); ?>">
                                    <?php echo htmlentities($rows['state']); ?>
                                    <br>
                                </option>
                            <?php
                            } ?>
                        </select>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="submit" class="btn btn-primary" name="search" value="Search">
                    </div>
                </form>

                <table class="table table-hover" id="sample-table-1">
                    <thead>
                        <tr>
                            <th>Clinic</th>
                            <th>Clinic Address </th>
                            <th>Clinic Phone Number </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($_POST['search'])) {
                            $state = $_POST['state'];
                            $sqlState = mysqli_query($con, "select * from clinic");
                            $cnt = 1;
                            while ($rowState = mysqli_fetch_array($sqlState)) {
                                if ($rowState['state'] == $state) {
                        ?>
                                    <tr>
                                        <td>
                                            <?php echo $rowState['clinic_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $rowState['clinic_address']; ?>
                                        </td>
                                        <td>
                                            <?php echo $rowState['contact']; ?>
                                        </td>
                                    </tr>

                        <?php }
                            }
                        } ?>
                    </tbody>
                </table>

                <br>
                <hr class="sidebar-divider my-0">
                <br>

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Insert Clinic</h1>
                </div>

                <form action="clinic.php" method="POST">
                    <div class="form-group">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <select name="state" required>
                                <option value="">Select State</option>
                                <?php $ret = mysqli_query($con, "select * from state");
                                while ($rows = mysqli_fetch_array($ret)) {
                                ?>
                                    <option value="<?php echo htmlentities($rows['state']); ?>">
                                        <?php echo htmlentities($rows['state']); ?>
                                        <br>
                                    </option>
                                <?php
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" name="clinicName" placeholder="Clinic Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" name="contact" placeholder="Clinic Contact" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" name="clinicAddress" placeholder="Clinic Address" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="Submit">
                        </div>
                    </div>
                </form>

                <?php
                if (isset($_POST['submit'])) {
                    $state = $_POST["state"];
                    $clinicName = $_POST["clinicName"];
                    $contact = $_POST["contact"];
                    $clinicAddress = $_POST["clinicAddress"];

                    $query = "INSERT INTO clinic (clinic_name, contact, clinic_address, state) VALUES ('$clinicName', '$contact', '$clinicAddress', '$state')";
                    $result = mysqli_query($con, $query);
                    if ($result) {
                        echo '<script>alert("Update successfully.")</script>';
                    } else {
                        echo '<script>alert("Try again.")</script>';
                    }
                }
                ?>
                 <!-- End of clinic management -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &#169;Covid-19 Vaccination Booking System (CVBS) 2022</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

</body>

</html>