<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Contact - Company Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/fav.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Company
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <?php include "navbar.php";?><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Contact</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Contact</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <div class="map-section">
      <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/place/CENRO+Baguio/@16.4170553,120.6173898,17z/data=!4m6!3m5!1s0x3391a1c0f3415113:0xb0b15a140bce3db9!8m2!3d16.4170296!4d120.6171216!16s%2Fg%2F11tnfpxjm9?entry=ttu" frameborder="0" allowfullscreen></iframe>
    </div>

    <section id="contact" class="contact">
      <div class="container">

        <div class="row justify-content-center" data-aos="fade-up">

          <div class="col-lg-10">

            <div class="info-wrap">
              <div class="row">
                <div class="col-lg-4 info">
                  <i class="bi bi-geo-alt"></i>
                  <h4>Location:</h4>
                  <p>Gibraltar Road, Baguio City<br>Philippines, 2600</p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p>cenrobaguio@denr.gov.ph<br>cenrobaguio@denr.gov.ph</p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i class="bi bi-phone"></i>
                  <h4>Call:</h4>
                  <p>(074) 447 0398<br>(074) 447 0398</p>
                </div>
              </div>
            </div>

          </div>

        </div>

        <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <div class="col-lg-10">
          <?php
              use PHPMailer\PHPMailer\PHPMailer;
              $msg = '';
              if (array_key_exists('email', $_POST)) {
                  require 'vendor/autoload.php';
                  $mail = new PHPMailer;
                  $mail->isSMTP();
                  $mail->Host = 'smtp.gmail.com';
                  $mail->Port = 587;
                  $mail->SMTPDebug = 0;
                  $mail->SMTPAuth = true;
                  $mail->Username = 'psumedict@gmail.com';
                  $mail->Password = 'etqfrxmazfojybpz';
                  $mail->setFrom('psumedict@gmail.com', 'CENRO WEBSITE');
                  $mail->addAddress('johnryanlagnayo@gmail.com', 'CENRO BAGUIO');
                  if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
                      $mail->Subject = 'PHPMailer contact form';
                      $mail->isHTML(false);
                      $mail->Body = <<<EOT
                          Email: {$_POST['email']}
                          Name: {$_POST['name']}
                          Message: {$_POST['message']}
              EOT;
                      if (!$mail->send()) {
                          $msg = 'Sorry, something went wrong. Please try again later.';
                      } else {
                          $msg = 'Message sent! Thanks for contacting us.';
                      }
                  } else {
                      $msg = 'Share it with us!';
                  }
              }
              ?>
            <!-- Email Form -->
            <form  method="post" role="form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <!-- <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required> -->
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required></<br>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <!-- <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div> -->
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <!-- <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div> -->
              </div>
              <div class="text-center"><button class="btn col-sm-3 btn-block float-right " style="background-color: #4bb543; color: white;" type="submit">Send Message</button></div>
            </form>
            <!-- <form method="POST">
              <label for="name">Name: <input type="text" name="name" id="name"></label><br>
              <label for="email">Email address: <input type="email" name="email" id="email"></label><br>
              <label for="message">Message: <textarea name="message" id="message" rows="8" cols="20"></textarea></label><br>
              <input type="submit" value="Send">
            </form> -->
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
  include "footer.php";
  ?>
<!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>