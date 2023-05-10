<?php
session_start();
include_once('includes/config.php');
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
    echo "<script>window.location.href ='index.php'</script>";
  } else {
    echo "<script>alert('Error occur, your message have not send. Please try again!');</script>";
    echo "<script>window.location.href ='index.php#contact'</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Covid-19 Vaccination Booking System (CVBS)</title>
  <meta content="Covid-19 Vaccination Booking System (CVBS)" name="Group1_Project">
  <meta content="Covid-19 Vaccination Booking System (CVBS)" name="Group1_Project">

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
      <div class="contact-info d-flex align-items-center">
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
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#Covid19">Covid-19 Information</a></li>
          <li><a class="nav-link scrollto" href="tracking.php">Tracking Hotspots</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact Us</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="admin/login.php" class="appointment-btn scrollto"><span class="d-none d-md-inline">Admin Login </span></a>
      <a href="login.php" class="appointment-btn scrollto"><span class="d-none d-md-inline">Login </span>/ Sign Up</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Welcome to</h1>
      <h1>Covid-19 Vaccination Booking System</h1>
      <h1>(CVBS)</h1>
      <a href="#why-us" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Why Choose CVBS?</h3>
              <p>
                CVBS is fast and efficient in tracking COVID-19 with the tracking hotspots services provided.
                Besides,reigster now to become our user and book the Covid-19 vaccine in here for free.
              </p>
              <div class="text-center">
                <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bi-lightning"></i>
                    <h4>Efficient</h4>
                    <p>Provide services that regarded to Covid-19.</p>
                  </div>
                </div>

                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bi-people"></i>
                    <h4>Care</h4>
                    <p>CVBS care for the public health status.</p>
                  </div>
                </div>


                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bi bi-geo-alt"></i>
                    <h4>Tracking Hotspots</h4>
                    <p>Tracking Covid-19 Hotspots </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-geo-alt"></i></div>
              <h4><a href="tracking.php">Hotspot Tracking</a></h4>
              <p>Tracks the Covid-19 hotspot in your state easily and quickly. </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-notes-medical"></i></div>
              <h4><a href="#vaccine">Book Vaccincation</a></h4>
              <p>Book a COVID-19 vaccine appointment for yourself now !</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <div class="icon"><i class="bi-phone"></i></div>
              <h4><a href="#contact">Contact Us</a></h4>
              <p>Facing any problem? Contact Us for more information ! </p>
            </div>
          </div>

          
        </div>
      </div>
    </section><!-- End Services Section -->

    <!-- ======= Covid19 Section ======= -->
    <section id="Covid19" class="Covid19">
      <div class="container">

        <div class="section-title">
          <h2>COVID-19 Information</h2>
        </div>

        <div class="row gy-4">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">About Coronavirus</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Covid-19 symptoms</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Prevention</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>About Coronavirus</h3>
                    <p class="fst-italic">Coronavirus is a type of virus that will cause the COVID-19.
                      The coronavirus is emerged in the December 2019. The coronavirus had
                      caused millions of death around the world.</p>
                    <p>The coronavirus is spread through virus and droplets particles released
                      into the air when the infected person cough, sneezes, talks, breathes and so on.
                      Larger droplets may fall to the ground in a matter of seconds, but tiny infectious
                      particles can linger in the air and accumulate in enclosed spaces, particularly
                      where a large number of people are gathered and ventilation is poor. COVID-19 prevention
                      requires the use of masks, hand hygiene, and physical separation.</p>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Covid 19 Symptoms</h3>
                    <p class="fst-italic"></p>
                    <p>
                    <ul>
                      <li>Cough</li>
                      <li>Fever or chills</li>
                      <li>Shortness of breath or difficulty breathing</li>
                      <li>Sore throat</li>
                      <li>Muscle or body aches</li>
                      <li>Diarrhea</li>
                      <li>Headache</li>
                      <li>New loss of taste or smell</li>
                      <li>New fatigue</li>
                      <li>Nausea or vomiting</li>
                    </ul>
                    </p>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Prevention</h3>
                    <p class="fst-italic"></p>
                    <p>
                    <ul>
                      <li>Maintain a social distances (1 metres) with others</li>
                      <li>Wear A Face mask</li>
                      <li>Wash your Hands frequently with soap and water, or an alcohol-based hand rub.</li>
                      <li>Avoid close prevention with sick people</li>
                      <li>Always cover your nose and mouth with your bent elbow or a tissue when you cough or sneeze.</li>
                      <li>Get vaccinated when it is your turn.
                    </ul>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Covid19 Section -->


    <!-- ======= bookVaccineInfo Section ======= -->
    <section id="vaccine" class="Covid19">
      <div class="container">

        <div class="section-title">
          <h2>Vaccine Information</h2>
        </div>

        <div class="row gy-4">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-4">How to start booking vaccine?</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Fully vaccinated</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-6">Healthy advise</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-7">Side Effect of Covid-19 Vaccine</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-4">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3 class="fst-italic">Book Vaccine Appointment Online</h3>
                    <p>Login to your account to start booking a vaccine!</p>
                    <p>Do not have an account? <a href="register.php">Register Now!</a></p>
                  </div>

                </div>
              </div>

              <div class="tab-pane" id="tab-5">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>You are considered fully vaccinated when have taking:</h3>
                    <p class="fst-italic"></p>
                    <p>
                    <ul>
                      <li>2 doses of Pfizer-BioNTech or Comirnaty for at least 21 days apart</li>
                      <li>3 doses of Sinovac-CoronaVac.
                        <i><br /> second dose should be 28 days after
                          the first dose and the third dose should be 90 days after the
                          second dose.</i>
                      </li>
                      <li>1 booster dose of an mRNA vaccine or the Nuvaxoid vaccine taken within
                        270 days from the last dose of your primary vaccination series</li>
                    </ul>
                    </p>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-6">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>When should you not take the Covid-19 vaccine?</h3>
                    <p class="fst-italic"></p>
                    <p>
                    <ul>
                      <li>Individuals below 5 years of age for the Pfizer-BioNTech /
                        Comirnaty vaccine
                      </li>
                      <li>Individuals below 18 years of age for the Moderna / SpikeVax,
                        Nuvaxovid and Sinovac-CoronaVac vaccines</li>
                    </ul>
                    </p>
                  </div>
                </div>
              </div>

              <div class="tab-pane" id="tab-7">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Side Effect of Covid-19 Vaccine</h3>
                    <p class="fst-italic"></p>
                    <p>
                    <ul>
                      <li>Pain</li>
                      <li>Redness</li>
                      <li>Swelling</li>
                      <li>Tiredness</li>
                      <li>Chills</li>
                      <li>Fever</li>
                      <li>Nausea</li>
                    </ul>
                    </p>
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>
    </section><!-- End bookVaccineInfo Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact Us</h2>
        </div>
      </div>

      <div>
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
      </div>

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

            <form method="post" role="form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>

              <div class="form-group mt-3">
                <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="Your phone number (e.g, 018-4433567)" maxlength="12" required>
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
              </div>

              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>

              <div class="form-group mt-3">
                <input type="submit" id="submit" name="submit" class="btn btn-primary btn-user btn-block" value=" submit" />
              </div>

            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

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