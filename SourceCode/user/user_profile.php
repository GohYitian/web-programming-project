<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

$login_id = $_SESSION['id'];

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$address = $_POST['address'];
	$icNumber = $_POST['icNumber'];
	$gender = $_POST['gender'];
	$phoneNumber = $_POST['phoneNumber'];
	$email = $_POST['email'];
	$query = "Update user set name='$name', address='$address',phoneNumber='$phoneNumber',icNumber='$icNumber',gender='$gender', email = '$email' where id='$login_id'";
	$sql = mysqli_query($con, $query);
	if ($sql) {
		echo "<script>alert('User Details updated Successfully');
		window.location.href = 'user_profile.php';
		</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>User | Edit User Details</title>

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
			<div class="main-content">
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle">User | Edit User Details</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>User</span>
								</li>
								<li class="active">
									<span>Edit User Details</span>
								</li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->

					<!-- start: PROFILE UPDATE -->
					<section id="profile" class="profile">
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">

									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Edit User</h5>
												</div>
												<div class="panel-body">
													<?php $sql = mysqli_query($con, "select * from user where id='" . $login_id . "'");
													while ($data = mysqli_fetch_array($sql)) {
													?>
														<h4><?php echo htmlentities($data['name']); ?>'s Profile</h4>

														<hr />
														<form action="user_profile.php" role="form" name="adddoc" method="post" onSubmit="return valid();" class="php-email-form">


															<div class="form-group">
																<label for="name">
																	User Name
																</label>
																<input type="text" name="name" class="form-control" value="<?php echo htmlentities($data['name']); ?>">
															</div>

															<div class="form-group">
																<label for="gender">
																	Gender
																</label>

																<select name="gender" id="gender" class="form-select form-control" value="<?php echo htmlentities($data['gender']); ?>" <option>Select Gender</option>
																	<option value="male">Male</option>
																	<option value="female">Female</option>
																</select>
															</div>

															<div class="form-group">
																<label for="address">
																	User Address
																</label>
																<input type="text" name="address" class="form-control" required="required" value="<?php echo htmlentities($data['address']); ?>">
															</div>

															<div class="form-group">
																<label for="phoneNumber">
																	User Phone Number
																</label>
																<input type="text" name="phoneNumber" class="form-control" required="required" value="<?php echo htmlentities($data['phoneNumber']); ?>">
															</div>

															<div class="form-group">
																<label for="icNumber">
																	User IC Number
																</label>
																<input type="text" name="icNumber" class="form-control" required="required" value="<?php echo htmlentities($data['icNumber']); ?>">
															</div>

															<div class="form-group">
																<label for="email">
																	User Email
																</label>
																<input type="email" name="email" class="form-control" value="<?php echo htmlentities($data['email']); ?>">
															</div>
														<?php } ?>
														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Update
														</button>
														</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
					</section>
					<!-- end: PROFILE UPDATE -->

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