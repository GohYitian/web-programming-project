<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

$login_id = $_SESSION['id'];


if (isset($_POST['submit'])) {

	$userid = $login_id;
	$name = $_POST['name'];
	$phoneNumber = $_POST['phoneNumber'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$appointmentDate = $_POST['date'];
	$appointmentTime = $_POST['time'];
	$num_dose = $_POST['num_dose'];
	$applyDate = date("Y/m/d H:m:s");
	$state = $_POST['state'];
	$query = "SELECT * FROM vaccinationappointment 
				WHERE name='$name' AND (status='Pending' OR status='TBC' OR status='Approved')";
	$result = mysqli_query($con, $query);
	if ($result->num_rows > 0) {
		echo "<script>
				alert('Sorry, you are currently holding an appointment!');
				window.location.href = 'vaccine_appointment.php';
			</script>";
	} else {

		$query = "INSERT INTO vaccinationappointment(userid, name, phoneNumber, email, address, state, num_dose, appointmentDate, appointmentTime, applyDate, status)
		VALUES ('$userid', '$name', '$phoneNumber', '$email', '$address', '$state', '$num_dose', '$appointmentDate','$appointmentTime', '$applyDate', 'Pending')";

		// echo $query;
		$sql = mysqli_query($con, $query);
		if ($sql) {
			echo "<script>alert('Your Vaccination Appointment Added Successfully, Thank You!');
			window.location.href = 'vaccine_appointment.php';
			</script>";
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>User | Vaccination Appointment </title>

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
								<h1 class="mainTitle">User | Vaccination Appointment </h1>
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

					<!-- ======= Appointment Section ======= -->
					<section id="appointment" class="appointment section-bg">
						<div class="container-fluid container-fullw bg-white">

							<div class="section-title">
								<h2>Vaccination Appointment</h2>
								<p></p>
							</div>

							<?php
							$sql = mysqli_query($con, "select * from user where id='$login_id'");
							$data = mysqli_fetch_array($sql);
							?>
							<form action="vaccine_appointment.php" method="post" role="form" class="php-email-form">
								<div class="row">
									<div class="col-md-4 form-group">
										<label for="name">Name</label>
										<input type="text" name="name" value="<?php echo htmlentities($data['name']); ?>" class="form-control" id="name" placeholder="Your Name" readonly>
										<div class="validate"></div>
									</div>

									<div class="col-md-4 form-group mt-3 mt-md-0">
										<label for="email">Email</label>
										<input type="email" class="form-control" name="email" value="<?php echo htmlentities($data['email']); ?>" id="email" placeholder="Your Email" readonly>
										<div class="validate"></div>
									</div>
									<div class="col-md-4 form-group mt-3 mt-md-0">
										<label for="phoneNumber">Phone Number</label>
										<input type="tel" class="form-control" name="phoneNumber" value="<?php echo htmlentities($data['phoneNumber']); ?>" id="phoneNumber" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
										<div class="validate"></div>
									</div>
								</div>

								<div class="row">

									<div class="col-md-4 form-group mt-3">
										<label for="date">Appointment Date</label>
										<input type="date" name="date" class="form-control" id="date" placeholder="Appointment Date" min=today required data-msg="Please select a date">
										<div class="validate"></div>
									</div>
									<script>
										var today = new Date().toISOString().split('T')[0];
										document.getElementsByName("date")[0].setAttribute('min', today);
									</script>
									<div class="col-md-4 form-group mt-3">
										<label for="time">Appointment Time (9.00a.m. - 18.00p.m.)</label>
										<input type="time" name="time" class="form-control timepicker" id="time" placeholder="Appointment Time" min="09:00" max="18:00" required data-msg="Please select a time">
										<div class="validate"></div>
									</div>


									<div class="col-md-4 form-group mt-3">
										<label for="num_dose">No. of Dose</label>
										<select name="num_dose" id="dose" class="form-select form-control" required>
											<option disabled>Select No. of Dose</option>
											<?php
											$sql2 = mysqli_query($con, "select * from vaccinationappointment where userid='$login_id' AND status!='Cancel' AND status!='Rejected' order by num_dose desc limit 1");

											if ($sql2->num_rows > 0) {
												$data2 = mysqli_fetch_array($sql2);


												if ($data2["num_dose"] >= 1) {
													echo "<option value='1' disabled>1</option>";
												} else {
													echo '<option value="1">1</option>';
												}

												if ($data2["num_dose"] >= 2) {
													echo '<option value="2" disabled>2</option>';
												} else {
													echo '<option value="2">2</option>';
												}

												if ($data2["num_dose"] != 2) {
													echo '<option value="3" disabled>3</option>';
												} else {
													echo '<option value="3">3</option>';
												}
											?>
											<?php
											} else {
												echo '<option value="1">1</option>
														<option disabled>2</option>
														<option disabled>3</option>
													';
											}
											?>
										</select>
									</div>


									<div class="validate"></div>
								</div>
								<div class="row">
									<div class="col-md-4 form-group mt-3 ">

										<label for="state">Your Current State</label>
										<select name="state" class="form-control">
											<?php
											$state = mysqli_query($con, "select * from state");
											while ($data3 = mysqli_fetch_array($state)) {
												echo "<option value='" . $data3['state'] . "' >" . $data3['state'] . "</option>";
											}
											?>
										</select>
										<div class="validate"></div>
									</div>

									<div class="col-md-8 form-group mt-3 ">
										<label for="address">Your Current Address</label>
										<input type="text" class="form-control" name="address" value="<?php echo htmlentities($data['address']); ?>" id="address" placeholder="Your Current Address" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
										<div class="validate"></div>
									</div>
								</div>



								<div class="text-center"><button type="submit" name="submit" class="btn btn-primary btn-o">Make an Appointment</button></div>
							</form>
							<h5><b>Attention</b></h5>
							<p>
							<ul>
								<li>User can only make appointment for themselves.</li>
								<li>User can only make appointment if the previous appointment is done/ cancelled.</li>
								<li>Example: If dose 1 appointment is cancel, user can select again dose 1.</li>
								<li>Example: User can only select dose 2 if dose 1 is done, user can select dose 3 if dose 2 is done.</li>
								<li>After done the 3rd dose, user cannot make appointment again.</li>
							</ul>
							</p>

					</section><!-- End Appointment Section -->

					<!-- start: Appointment History -->
					<br>

					<div class="container-fluid">
						<div class="section-title">
							<h2>Vaccination Appointment History</h2>
							<p></p>
						</div>

						<div class="row">
							<div class="col-md-12">

								<p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
									<?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
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
											echo "</div><div class='edit-form'></div></td>
											<td>" . $data["applyDate"] . "</td>
											<td> " . $data["status"] . "</td>
                                            <td>" . $data["clinic"] . "<p>" . $data["clinic_address"] . "</p>
                                            </td>
										</tr>";
											$count++;
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
						<h5><b>Status Description</b></h5>
						<p>
						<ul>
							<li>Done: Done taking the dose</li>
							<li>Cancel: Appointment has been cancelled</li>
							<li>Pending: Appointment pending approved</li>
							<li>Rejected: Appointment rejected by admin</li>
							<li>Approved: Appointment approved by admin</li>
							<li>TBC: Cancellation to be confirmed by admin</li>
							<li>TBC is when an appointment has been approved, but user cancel it</li>
						</ul>
						</p>


					</div>
					<!-- End Appointment History -->
				</div>
			</div>
		</div>


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
</body>

</html>