<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

$login_id = $_SESSION['id'];
//if submit,update table
if (isset($_POST["updateDT"])) {
    //save  
    $appointmentDate = $_POST['date'];
    $appointmentTime = $_POST['time'];
    $vaid = $_POST["vaid"];
    $query = "UPDATE vaccinationappointment SET appointmentDate='$appointmentDate',appointmentTime='$appointmentTime' WHERE id='$vaid'";

    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<script>alert('Your Appointment Time and Date Changed Successful, Thank You!');
		window.location.href = 'appointment_history.php';
		</script>";
    } else {
        echo "<script>alert('Appointment date and time update failure, please try again!');
		window.location.href = 'appointment_history.php';
		</script>";
    }
}

if (isset($_POST["cancelApp"])) {
    $vaid = $_POST["vaid"];
    $status = $_POST["status"];
    if ($status == "Pending") {
        $query = "UPDATE vaccinationappointment SET status='Cancel' WHERE id='$vaid'";
    } else {
        $query = "UPDATE vaccinationappointment SET status='TBC' WHERE id='$vaid'";
    }
    // echo $query;
    // return;
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<script>
            alert('Your Appointment Cancelled Successful, Thank You!');
		    window.location.href = 'appointment_history.php';
		</script>";
    } else {
        echo "<script>
            alert('Appointment cancel failed, please try again!');
            window.location.href = 'appointment_history.php';
		</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment History</title>

    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
    <link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="assets1/css/styles.css">
    <link rel="stylesheet" href="assets1/css/plugins.css">
    <link rel="stylesheet" href="assets1/css/themes/theme-1.css" id="skin_color" />

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicon-32x32.png">
    <link rel="manifest" href="../assets/img/site.webmanifest">


</head>

<body>
    <div id="app">
        <?php include('includes/sidebar.php'); ?>
        <div class="app-content">


            <?php include('includes/header.php'); ?>
            <!-- end: TOP NAVBAR -->
            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <!-- start: PAGE TITLE -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">User | Manage Vaccination Appointment</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>User </span>
                                </li>
                                <li class="active">
                                    <span>Vaccination Appointment </span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <!-- end: PAGE TITLE -->

                    <!-- start: Appointment History -->
                    <div class="container-fluid container-fullw bg-white">
                        <div class="section-title">
                            <h2>Manage Vaccination Appointment</h2>
                            <p></p>
                        </div>
                        <div class="row">
                            <div class="col-md-12">

                                <p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
                                    <?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
                                <button class="btn btn-primary" id="editBtn">Edit <span class='ti-pencil-alt'></span></button>
                                <table class="table table-hover" id="sample-table-1">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>

                                            <th>No. of Dose</th>
                                            <th>Appointment Date / Time </th>
                                            <th>Apply Date </th>
                                            <th>Current Status</th>
                                            <th>Clinic</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT vaccinationappointment.*, clinic.clinic_address  
                                    FROM vaccinationappointment
                                    LEFT JOIN clinic ON vaccinationappointment.clinic = clinic.clinic_name
									where vaccinationappointment.userid=$login_id";
                                        $sql = mysqli_query($con, $query);
                                        $count = 0;
                                        while ($data = mysqli_fetch_array($sql)) {
                                            echo "
										<tr>
											<td>" . ($count + 1) . "</td>
											
											<td>" . $data["num_dose"] . "</td>
											<td><div class='appointment-content'>" . $data["appointmentDate"] . " " . $data["appointmentTime"];
                                            if ($data["status"] == "Pending") {
                                                echo "<button class='btn btn-secondary btn-sm btn-edit hidden' data-aid='" . $data["id"] . "' data-index='$count'><span class='ti-pencil-alt'></span></button>";
                                            }
                                            echo "</div><div class='edit-form'></div></td>
											<td>" . $data["applyDate"] . "</td>
											<td> 
                                                <form action='appointment_history.php' method='POST'>
                                                    " . $data["status"] . "
                                                    <input type='hidden' name='vaid' value='" . $data["id"] . "'>
                                                    <input type='hidden' name='status' value='" . $data["status"] . "'>";
                                            if ($data["status"] !== "Done" && $data["status"] !== "TBC" && $data["status"] !== "Cancel" && $data["status"] !== "Reject") {
                                                echo "<button class='btn btn-danger btn-sm hidden cancelBtn' type='submit' name='cancelApp'>Cancel Request</button>";
                                            }
                                            echo "
                                                </form>
                                            </td>
                                            <td>" . $data["clinic"] . "
                                            <p>" . $data["clinic_address"] . "</p>
                                            </td>
										</tr>";
                                            $count++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <h5>Status Description</h5>
                                <p>
                                <ul>
                                    <li>Done: Done taking the dose</li>
                                    <li>Cancel: Appointment has been cancelled</li>
                                    <li>Pending: Appointment pending approved</li>
                                    <li>Rejected: Appointment rejected by admin</li>
                                    <li>TBC: Cancellation to be confirmed by admin</li>
                                    <li>Approved: Appointment approved by admin</li>
                                </ul>
                                </p>

                                <h5>Attention</h5>
                                <p>
                                <ul>
                                    <li>When status is Pending, user can directly cancel that appointment.</li>
                                    <li>User can change the date and time of appointment if the status is Pendng.</li>
                                    <li>If the appointment is approved, user need to cancel appointment if need to change appointment date/ time.</li>
                                    <li>When user cancel the approved appointment, status will become TBC (to be confirmed by admin)</li>
                                </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end: Appointment History -->

        <!-- start: FOOTER -->
        <?php include('includes/footer.php'); ?>
        <!-- end: FOOTER -->
    </div>
    <!-- end: Appointment History -->
    <!-- start: MAIN JAVASCRIPTS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="vendor/switchery/switchery.min.js"></script>
    <!-- end: MAIN JAVASCRIPTS -->
    <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
    <script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="vendor/autosize/autosize.min.js"></script>
    <script src="vendor/selectFx/classie.js"></script>
    <script src="vendor/selectFx/selectFx.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <!-- start: CLIP-TWO JAVASCRIPTS -->
    <script src="assets1/js/main.js"></script>
    <!-- start: JavaScript Event Handlers for this page -->
    <script src="assets1/js/form-elements.js"></script>
    <script>
        jQuery(document).ready(function() {
            Main.init();
            FormElements.init();
        });
    </script>
    <!-- end: JavaScript Event Handlers for this page -->
    <!-- end: CLIP-TWO JAVASCRIPTS -->
    <script>
        document.getElementById("editBtn").addEventListener('click', showEdit);
        var btnEdit = document.getElementsByClassName("btn-edit");
        for (var i = 0; i < btnEdit.length; i++) {
            btnEdit[i].addEventListener('click', editForm);
        }

        var cancelBtn = document.getElementsByClassName("cancelBtn");

        function showEdit() {
            for (var i = 0; i < btnEdit.length; i++) {
                btnEdit[i].classList.remove("hidden");
            }
            for (var i = 0; i < cancelBtn.length; i++) {
                cancelBtn[i].classList.remove("hidden");
            }
        }


        function editForm() {
            vaid = this.getAttribute("data-aid");
            htmlForm = '<form action="appointment_history.php" method="POST">';
            htmlForm += '<input type="date" name="date" class="date" required>';
            htmlForm += '<input type="time" name="time" min="09:00" max="18:00" required>';
            htmlForm += '<input type="hidden" name="vaid" value="' + vaid + '">';
            htmlForm += '<button type="submit" name="updateDT" class="btn btn-primary btn-sm" >Save</button>';
            htmlForm += '</form>';

            //remove appointment content of time and date
            document.getElementsByClassName("appointment-content")[this.getAttribute("data-index")].innerHTML = "";

            //insert edit-form
            document.getElementsByClassName("edit-form")[this.getAttribute("data-index")].innerHTML = htmlForm;
            var today = new Date().toISOString().split('T')[0];
            document.getElementsByName("date")[1].setAttribute('min', today);
        }
    </script>

</body>

</html>