<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

$login_id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>User | HOTSPOT TRACKING </title>

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
								<h1 class="mainTitle">User | HOTSPOT TRACKING </h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>User </span>
								</li>
								<li class="active">
									<span>HOTSPOT TRACKING </span>
								</li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->

					<!-- ======= Tracking Section ======= -->
					<section id="tracking" class="tracking">
						<div class="container-fluid container-fullw bg-white">

							<div class="section-title">
								<h2>Tracking</h2>
							</div>
						</div>

						<div>
							<iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
						</div>
						<hr>
						<div class="container">
							<div class="row mt-5">

								<div class="col-md-12">

									<form method="post" role="form">
										<div class="row">
											<div class="col-md-9 form-group mt-3 mt-md-0">
												<select name="state" class="form-control" required="required">
													<option value="">Select state</option>
													<?php $ret = mysqli_query($con, "select * from state");
													while ($row = mysqli_fetch_array($ret)) {
													?>
														<option value="<?php echo htmlentities($row['state']); ?>">
															<?php echo htmlentities($row['state']); ?>
														</option>
													<?php } ?>
												</select>
												<br />
												<input type="date" class="form-control" name="date" id="date" placeholder="date" required="required">
												<br />
												<input type="submit" name="submit" class="btn btn-o btn-primary btn-user btn-block " value="submit">
											</div>
										</div>


									</form>
									<br />
									<br />
									<br />
									<div class="row">
										<?php
										$connection = mysqli_connect("localhost", "root", "");
										$db = mysqli_select_db($connection, 'cvbsdatabase');

										if (isset($_POST['submit'])) {
											$state = $_POST['state'];
											$date = $_POST['date'];

											$query = "SELECT * FROM hotspot where state = '$state' && date = '$date'";
											$query_run = mysqli_query($connection, $query);

											if ($row = mysqli_fetch_array($query_run)) {
										?>
												<form method="POST">
													<table class="col-md-6 form-group">
														<tr>
															<th>State: </th>
															<td><input type="text" name="state" value="<?php echo $row['state'] ?>" /> </td>
														</tr>
														<tr>
															<th>Date: </th>
															<td><input type="text" name="date" value="<?php echo $row['date'] ?>" /></td>
														</tr>

														<tr>
															<th>Number of Cases: </th>
															<td><input type="text" name="cases" value="<?php echo $row['totalCase'] ?>" /></td>
														</tr>
													</table>
												</form>

										<?php
											} else {
												echo "<script>alert('number of cases has not updated.');</script>";
											}
										}
										?>
									</div>

								</div>

							</div>

						</div>
					</section><!-- End Tracking Section -->


				</div>
			</div>
		</div>
		<!-- start: FOOTER -->
		<?php include('includes/footer.php'); ?>
		<!-- end: FOOTER -->


	</div>
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