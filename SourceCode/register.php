<?php
session_start();
error_reporting(0);
include_once('includes/config.php');
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $password = md5($_POST['inputpwd']);
    $icNumber = $_POST['ic_number'];
    $query = mysqli_query($con, "insert into user(name, address, icNumber,gender,email,password,phoneNumber)  
    values('$name', '$address', '$icNumber', '$gender', '$email','$password', '$phonenumber')");
    if ($query) {
        echo "<script>alert('Successfully register. Login now!');</script>";
        echo "<script>window.location.href ='login.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="registeration" content="user register">
    <meta name="CVBS" content="user register">

    <title>User - Register</title>

    <!-- Custom fonts for this template-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
    <link rel="manifest" href="assets/img/site.webmanifest">

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block  ">
                        <img src="assets/img/Covid19VaccinationBookingSystem.png" alt="CVBS_logo">
                        <div class="p-5">
                            <div class="text-center ">
                                <h1 class="h4 text-gray-900 mb-4"> </h1>
                                <p>Welcome to the <br /><b> Covid-19 Vaccination Booking System (CVBS).</b><br />
                                    Sign up now!
                                    Your account can be used to book vaccine for yourself.
                                    If you experience any difficulties please <a href="index.php#contact">contact us</a>.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an User Account!</h1>
                            </div>
                            <form class="user" name="newpassword" method="post" onSubmit="return valid();">
                                <div class="form-group ">
                                    <div>
                                        <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Enter Your Name" required="true">
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div>
                                        <select name="gender" id="gender" value="gender" class="form-control" required="true">
                                            <option value="">Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div>
                                        <input type="text" class="form-control form-control-user" id="ic_number" name="ic_number" placeholder="IC Number (e.g.,xxxxxx-xx-xxxx)" maxlength="14" required="true">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <input type="text" class="form-control form-control-user" id="phonenumber" name="phonenumber" placeholder="Your phone number (e.g., xxx-xxxxxxx) " maxlength="11" required="true">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" onBlur="userAvailability()" required="true">
                                    <span id="user-availability-status1" style="font-size:12px;"></span>
                                </div>


                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="address" name="address" placeholder="Your Address" required="true">

                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="inputpwd" name="inputpwd" placeholder="Password" required="true">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="re_inputpwd" name="re_inputpwd" placeholder="Repeat Password" required>
                                    </div>
                                </div>
                                <input type="reset" name="reset" class="btn btn-primary btn-user btn-block" value="Reset">
                                <input type="submit" id="register" name="register" class="btn btn-primary btn-user btn-block" value=" Register Account" />

                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.php">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin/js/sb-admin-2.min.js"></script>
    <script type="text/javascript">
        function valid() {
            if (document.newpassword.inputpwd.value != document.newpassword.re_inputpwd.value) {
                alert("Password and Confirm Password Field do not match !!!");
                document.newpassword.re_inputpwd.focus();
                return false;
            }
            return true;
        }
    </script>

    <script>
        function userAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_availability.php",
                data: 'email=' + $("#email").val(),
                type: "POST",
                success: function(data) {
                    $("#user-availability-status1").html(data);
                    $("#loaderIcon").hide();
                },
                error: function() {}
            });
        }
    </script>

</body>

</html>