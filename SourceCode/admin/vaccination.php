<?php
session_start();
include_once('includes/config.php');
include('includes/checklogin.php');
check_login();

?>

<?php
if (!empty($_POST['submit']) && !empty($_POST['updateId'])) {
    $status = $_POST['action'];
    $eid = $_POST['updateId'];
    $clinic = $_POST['clinic'];

    $sql = mysqli_query($con, "UPDATE vaccinationappointment SET status = '$status', clinic = '$clinic' where id ='$eid'");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Vaccination</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <style type="text/css">
        .col_width {
            display: block;
            width: 200px;
        }
    </style>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
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
                <a class="nav-link collapsed" href="../mainPage/index.html">
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
                        <h1 class="h3 mb-0 text-gray-800">Vaccination Booking</h1>
                    </div>
                </div>
                <!-- End of Main Content -->
                <table class="table table-hover" id="sample-table-1">
                    <thead>
                        <tr>
                            <th class="center">#</th>
                            <th>Details</th>
                            <th>Dose </th>
                            <th>Appointment Date </th>
                            <th>Apply Date </th>
                            <th>Status </th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    <?php
                    $sql = mysqli_query($con, "select * from vaccinationappointment order by id desc");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($sql)) {
                        $status = $row['status'];
                        if ($status == "Cancel" || $status == "Rejected" || $status == "Done") {
                        } else {
                    ?>
                            <tbody>
                                <tr>
                                    <td class="center">
                                        <?php echo $cnt; ?>.
                                    </td>
                                    <td class="col_width">
                                        <?php echo $row['name']; ?>
                                        <br><br>
                                        <?php echo $row['email']; ?>
                                        <br><br>
                                        <?php echo $row['phoneNumber']; ?>
                                        <br><br>
                                        <?php echo $row['address']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['num_dose']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['appointmentDate'];
                                        echo "\n";
                                        echo $row['appointmentTime']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['applyDate']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['status']; ?>
                                        <br><br>
                                        <?php echo $row['clinic']; ?>
                                        <br>
                                        <?php $ret = mysqli_query($con, "select * from clinic");
                                        while ($rows = mysqli_fetch_array($ret)) {
                                            if ($rows['clinic_name'] == $row['clinic']) {
                                                echo $rows['clinic_address'];
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <div class="visible-md visible-lg hidden-sm hidden-xs">
                                            <form action="vaccination.php" method="post">
                                                <input id="updateId" name="updateId" value="<?php echo $row['id'] ?>" / hidden>

                                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                                    <select name="clinic" id="clinic" required="required">
                                                        <option value="">Select Clinic</option>
                                                        <?php $ret = mysqli_query($con, "select * from clinic");
                                                        while ($rows = mysqli_fetch_array($ret)) {
                                                            if ($rows['state'] == $row['state']) {
                                                        ?>
                                                                <option value="<?php echo htmlentities($rows['clinic_name']); ?>">
                                                                    <?php echo htmlentities($rows['clinic_name']); ?>
                                                                    <br>
                                                                </option>
                                                        <?php }
                                                        } ?>
                                                    </select>

                                                </div>
                                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                                    <select name="action" required>
                                                        <option value="">Select:</option>
                                                        <option value="Approved" name="approved">Approved</option>
                                                        <option value="Rejected" name="rejected">Rejected</option>
                                                        <option value="Done" name="rejected">Done</option>
                                                        <option value="Pending" name="rejected">Pending</option>
                                                        <option value="Cancel" name="rejected">Cancel</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                        <?php }
                        $cnt = $cnt + 1;
                    } ?>
                            </tbody>
                </table>

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &#169; Covid-19 Vaccination Booking System 2022</span>
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