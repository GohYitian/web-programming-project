<?php
session_start();
include('includes/checklogin.php');
include_once('includes/config.php');
check_login();

$login_id = $_SESSION['id'];
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phoneNumber'];
    $issues = $_POST['issues'];
    $message = $_POST['message'];
    $query = mysqli_query($con, "insert into contactus(name, email, phoneNumber,issues,description)  
    values('$name', '$email', '$phonenumber', '$issues','$message' )");
    if ($query) {
        echo "<script>alert('Your message has been sent. Thank you!');</script>";
        echo "<script>window.location.href ='contactus.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

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
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

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
                                <h1 class="mainTitle">User | Contact Us </h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>User </span>
                                </li>
                                <li class="active">
                                    <span>Contact Us</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <!-- end: PAGE TITLE -->
                    <!-- ======= Contact Section ======= -->
                    <section id="contact" class="contact">
                        <div class="container-fluid container-fullw bg-white">

                            <div class="section-title">
                                <h2>Contact Us</h2>
                            </div>
                        </div>

                        <div>
                            <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <hr>
                        <div class="container">
                            <div class="row mt-5">

                                <div class="col-lg-4">
                                    <div class="info">
                                        <div class="address">
                                            <i class="bi bi-geo-alt"></i>
                                            <h4>Location:</h4>
                                            <p>No 19, Jalan Kuala, 53000, Kuala Lumpur, Malaysia</p>
                                        </div>

                                        <div class="email">
                                            <i class="bi bi-envelope"></i>
                                            <h4>Email:</h4>
                                            <p>cvbs@gmail.com</p>
                                        </div>

                                        <div class="phone">
                                            <i class="bi bi-phone"></i>
                                            <h4>Call:</h4>
                                            <p>+1 5589 55488 55</p>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-8 mt-5 mt-lg-0">
                                    <?php
                                    $sql = mysqli_query($con, "select * from user where id='$login_id'");

                                    $data = mysqli_fetch_array($sql);
                                    ?>
                                    <form action="contactus.php" method="post" role="form" class="php-email-form">
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <input type="text" name="name" class="form-control" id="name" value="<?php echo htmlentities($data['name']); ?>" placeholder="Your Name" required>
                                                <div class="validate"></div>
                                            </div>
                                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                                <input type="email" class="form-control" name="email" id="email" value="<?php echo htmlentities($data['email']); ?>" placeholder="Your Email" required>
                                                <div class="validate"></div>
                                            </div>
                                        </div>

                                        <div class="form-group mt-3">
                                            <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" value="<?php echo htmlentities($data['phoneNumber']); ?>" placeholder="Your phone number" required>
                                            <div class="validate"></div>
                                        </div>

                                        <div class="form-group mt-3">
                                            <select name="issues" class="form-control" required="required">
                                                <option value="">select your issues</option>
                                                <option value="Book vaccination problem">Book vaccination problem</option>
                                                <option value="Unable to login">Unable to register</option>
                                                <option value="Unable to login">Unable to login</option>
                                                <option value="Unable to reset password">Unable to reset password</option>
                                                <option value="Another problem from the list">Another problem from the list</option>
                                            </select>
                                            <div class="validate"></div>
                                        </div>


                                        <div class="form-group mt-3">
                                            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                                            <div class="validate"></div>
                                        </div>

                                        <div class="form-group mt-3">
                                            <input type="submit" id="submit" name="submit" class="btn btn-o btn-primary btn-user btn-block" value=" submit" />
                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>
                </div>
            </div>
        </div>

        </section><!-- End Contact Section -->

        <!-- start: FOOTER -->
        <?php include('includes/footer.php'); ?>
    </div>
    <!-- end: FOOTER -->
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