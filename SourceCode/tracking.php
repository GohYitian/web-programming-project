<?php
session_start();
include_once('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tracking Hotspot</title>
  <meta content="tracking hotspot" name="track Covid-19 hotspot">
  <meta content="tracking hotspot" name="hotspot">

  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
  <link rel="manifest" href="assets/img/site.webmanifest">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medilab - v4.7.1
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="tracking-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:cvbs@gmail.com">cvbs@gmail.com</a>
        <i class="bi bi-phone"></i> +1 5589 55488 55
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">


      <div class="logo me-auto">

        <h1 class="logo me-auto">
          <img src="assets/img/Covid19VaccinationBookingSystem.png" alt="logo">
          <a href="index.php">CVBS</a>
        </h1>
      </div>


      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="index.php">Back to Home</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="admin/login.php" class="appointment-btn scrollto"><span class="d-none d-md-inline">Admin Login </span></a>
      <a href="login.php" class="appointment-btn scrollto"><span class="d-none d-md-inline">Login </span>/ Sign In</a>

    </div>
  </header><!-- End Header -->
  <main id="main">
    <!-- ======= Tracking Hotspot Section ======= -->
    <section id="tracking" class="tracking">
      <div class="container">
        <br /><br /><br />
        <div class="section-title">
          <h2>Tracking</h2>
        </div>
      </div>

      <div>
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container">
        <div class="row mt-5">

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form method="post">
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
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
                  <input type="date" class="form-control" name="date" id="date" required="required">
                </div>
              </div>
              <br />
              <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="submit">
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
    </section><!-- End Tracking Hotspot Section Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Covid-19 Vaccination Booking System (CVBS) 2022</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>