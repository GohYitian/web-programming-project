<?php
session_start();
error_reporting(0);
include("includes/config.php");
// Code for updating Password
if (isset($_POST['reset'])) {
    $role = $_POST['role'];
    $uname = $_POST['username'];
    $newpassword = md5($_POST['newPassword']);

    $query = mysqli_query($con, "select ID from user where email='$uname' ");
    $ret = mysqli_fetch_array($query);

    if ($ret > 0) {

        $sql = mysqli_query($con, "UPDATE user SET password = '$newpassword' where email ='$uname'");
        echo "<script>alert('Password successfully reset.');</script>";
        echo "<script>window.location.href ='login.php'</script>";
    } else {
        $_SESSION['errmsg'] = "Invalid username (email address) or you does not have an account";
        $extra = "forgot-password.php";
        $host  = $_SERVER['HTTP_HOST'];
        $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        exit();
    }
}
?>

<script type="text/javascript">
    function valid() {
        if (document.passwordreset.newPassword.value != document.passwordreset.password_again.value) {
            alert("Password and Confirm Password Field do not match !!!");
            document.passwordreset.password_again.focus();
            return false;
        }
        return true;
    }
</script>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="user forget password" content="user reset password">
    <meta name="CVBS" content="reset password">

    <title>User - Change Password</title>


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

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="assets/img/Covid19VaccinationBookingSystem.png" alt="CVBS_logo">
                                <div class="p-5">
                                    <div class="text-center">
                                        <p>
                                            If you experience any difficulties please <br /><a href="index.php#contact">contact us</a>.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                        <p class="mb-4">Enter your username and new password !!!</p>
                                    </div>
                                    <form class="user" name="passwordreset" method="post" onSubmit="return valid();">
                                        <div class=" form-group">
                                            <input type="email" class="form-control form-control-user" id="username" name="username" placeholder="Enter Email Address..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="newPassword" name="newPassword" placeholder="Enter New Password..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password_again" name="password_again" placeholder="Password Again" required>
                                        </div>

                                        <div class="form-group">
                                            <span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg'] = ""; ?></span>
                                        </div>
                                        <input type="submit" id="reset" name="reset" class="btn btn-primary btn-user btn-block" value=" Reset Password" />
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="login.php">Already have an account? Login!</a>
                                    </div>
                                </div>
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

</body>

</html>