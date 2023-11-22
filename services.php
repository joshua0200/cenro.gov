<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Services - Company Bootstrap Template</title>
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


</head>

<body>

  <!-- ======= Header ======= -->
  <?php
    include "navbar.php";
    include "config.php";
  ?>
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Services</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Services</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->
    <!-- <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
        
      </div>
    </section>End Services Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container" data-aos="fade-up">
      <div class="row">
      <?php
              if(isset($_SESSION['user_id']) != 0){ 
            ?>

            <div class="col-md-12 mb-5">
                <form id="form" action="saveService.php" method="POST">
                    <div class="card">
                        <div class="card-header">
                            <h4><b>Services Form</b></h4>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="id">


                            <div class="row">
                                <input type="hidden" name="id">
                                <!-- <label class="control-label"><b>Case Label:</b></label> -->
                              <div class="col-8">
                                <label class="control-label"><b>Service Label:</b></label>
                                <input type="text" class="form-control mb-2" name="label" required>
                              </div>
                              <div class="col-8">
                                <label class="control-label"><b>Steps:</b></label>
                                <textarea  class="form-control mb-2" name="serviceSteps" required></textarea>
                                <!-- <input type="text" class="form-control mb-2" name="caseDetails" required> -->
                              </div>
                            </div>
                            <br>
                            <button class="btn btn-success" type="submit" id="submitButton">Submit</button>
                        </div>
                    </div>
                </form>
            </div>


            <!-- PHP FUNCTION -->
            <?php


              // Call the function
              // save_service();
?>

            <!-- END PHP FUNCTION -->


            <?php } ?>
          </div>
        <div class="section-title">
          <h2>Applications</h2>
          <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
        </div>

        <div class="row">

          <?php
            $i = 1;
            $sql = "SELECT * FROM services order by service_id asc";
            $result = $mysqli->query($sql);

            if ($result->num_rows > 0){
              while ($row = $result->fetch_assoc()) :
          ?>          

          <div class="col-lg-3 col-md-4 m-0">
            <form action="steps.php" method="post">
            <button class="btn " type="submit" name="stepsValue" value="<?php echo $row['service_id'] ?>">
              <div class="icon-box">
                <i class="ri-file-list-3-line" style="color: #5578ff;"></i>
                <h3><?php echo $row['serviceLabel'] ?></h3>
              </div>
            </button>
            </form>
          </div>

          <?php 
            endwhile;
          }
          ?>


          </div>
        </div>

      </div>
    </section><!-- End Features Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
    include 'footer.php';
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
  
  <script>
  $(document).ready(function () {
    // Handle the Edit button click event
    $(".edit_case").click(function () {
      var id = $(this).data("id");
      var name = $(this).data("serviceLabel");
      var serviceSteps = $(this).data("serviceSteps");

      // Set the form fields with the data
      $("form").attr("action", "saveService.php");
      $("input[name='id']").val(id);
      $("input[name='label']").val(name);
      $("textarea[name='caseDetails']").val(serviceSteps );

      // You can set the select option here too if needed
      // var status = ...; // Get status value
      // $("#status").val(status);

      // Scroll to the form
      $("html, body").animate({
        scrollTop: $("form").offset().top,
      });
    });

    // Handle the Form submission
    $("form").submit(function (e) {
      e.preventDefault(); // Prevent the default form submission

      var formData = $(this).serialize();

      $.ajax({
        type: "POST",
        url: $(this).attr("action"),
        data: formData,
        success: function (response) {
          // Handle the response from services.php
          
          location.reload()
          alert('Data saved successfully');

          // You can also reload the page or update the case list here
        },
        error: function (error) {
          alert("Error: " + error);
        },
      });
    });

    // Handle the Delete button click event
    $(".delete_case").on("click", function () {
            var service_id = $(this).data("id");

            // Set the data-id attribute of the delete button in the modal
            $("#confirmDeleteBtn").data("id", service_id);

            // Show the delete confirmation modal
            $("#deleteConfirmationModal").modal("show");
        });

        // Confirm delete button click event
        $("#confirmDeleteBtn").on("click", function () {
            var service_id = $(this).data("id");

            // Make an AJAX request to delete the case
            $.ajax({
                url: "delete_case.php", // Create a separate PHP file for deleting cases
                type: "POST",
                data: { id: service_id },
                success: function (response) {
                    // Handle the response (e.g., reload the page)
                    location.reload();
                },
                error: function (error) {
                    console.error("Error deleting case:", error);
                }
            });
        });
  });
</script>


</body>

</html>