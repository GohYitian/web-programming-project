<?php
session_start();
include_once('includes/config.php');
include('includes/checklogin.php');
check_login();

if (isset($_GET['del'])) {
    mysqli_query($con, "DELETE FROM hotspot WHERE (state = '" . $_GET['state'] . "' and date = '" . $_GET['date'] . "')");
    echo "<script>alert('The state is successfully deleted !!');</script>";
    echo "<script>window.location.href ='hotspot.php'</script>";
} ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="hotspot management" content="admin update Covid-19 hotspot">
    <meta name="CVBS" content="hotspot management">

    <title>Tracking Covid-19 Hotspot</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Update Covid-19 Cases for Tracking Hotspot Purpose</h1>
                    </div>
                </div>
                <!-- End of Main Content -->

                <!-- Begin Update hotspot -->
                <form action="hotspot.php" method="post">
                    <div class="form-group">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <select name="State" class="form-control" required="required">
                                <option value="">Select state</option>
                                <?php $ret = mysqli_query($con, "select * from state");
                                while ($row = mysqli_fetch_array($ret)) {
                                ?>
                                    <option value="<?php echo htmlentities($row['state']); ?>">
                                        <?php echo htmlentities($row['state']); ?>
                                    </option>
                                <?php } ?>

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="date" class="form-control form-control-user" name="Date" placeholder="dd-mm-yyyy" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" name="case" placeholder="cases of Covid-19" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="submit" class="form-control form-control-user" name="submit" value="Submit">
                        </div>
                    </div>
                </form>

                <?php
                if (isset($_POST['submit'])) {
                    $state = $_POST['State'];
                    $date = $_POST['Date'];
                    $case = $_POST['case'];

                    $query = "INSERT INTO hotspot (state, date, totalCase) VALUES ('$state', '$date', '$case')";
                    $result = mysqli_query($con, $query);
                    if ($result) {
                        echo '<script>alert("Update successfully.")</script>';
                        echo "<script>window.location.href ='hotspot.php'</script>";
                    } else {
                        echo '<script>alert("Try again.")</script>';
                        echo "<script>window.location.href ='hotspot.php'</script>";
                    }
                }

                ?>

                <table class="table table-hover" id="sample-table-1">
                    <thead>
                        <tr>
                            <th class="center">#</th>
                            <th>State</th>
                            <th>Date </th>
                            <th>Total Cases </th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = mysqli_query($con, "SELECT * FROM hotspot ORDER by date DESC,state ASC");
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($sql)) {
                        ?>

                            <tr>
                                <td class="center">
                                    <?php echo $cnt; ?>.
                                </td>
                                <td>
                                    <?php echo $row['state']; ?>
                                </td>
                                <td>
                                    <?php echo $row['date']; ?>
                                </td>
                                <td>
                                    <?php echo $row['totalCase']; ?>
                                </td>
                                <td>
                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                        <a href="hotspot.php?state=<?php echo $row['state'] ?>&date=<?php echo $row['date'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?');" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
                                    </div>
                                </td>
                            </tr>

                        <?php
                            $cnt = $cnt + 1;
                        } ?>
                    </tbody>
                </table>
                <!-- End of update hotspot-->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &#169; Covid-19 Vaccination Booking System (CVBS) 2022</span>
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