<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>DENR-CAR CENRO</title>
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

  <!-- dataTable -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" /> -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

  <script src="assets/js/script.js"> 
  </script>

  
</head>

<body>

  <!-- ======= Header ======= -->
  <?php 
  include "navbar.php";
  include "config.php";
  session_start();
  ?>
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Claims and Conflicts</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Claims and Conflicts</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">
          <div class="row">
            <?php
              if(isset($_SESSION['user_id']) != 0){ 
            ?>

            <div class="col-md-12 mb-5">
                <form id="form" action="process_form.php" method="POST">
                    <div class="card">
                        <div class="card-header">
                            <h4><b>Case Form</b></h4>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="id">


                            <div class="row">
                                <input type="hidden" name="id">
                                <!-- <label class="control-label"><b>Case Label:</b></label> -->
                              <div class="col-4">
                                <label class="control-label"><b>Case Number:</b></label><br>
                                <input type="text" class="form-control mb-2" name="caseNum" required>
                              </div>
                              <div class="col-8">
                                <label class="control-label"><b>Case Label:</b></label>
                                <input type="text" class="form-control mb-2" name="label" required>
                              </div>
                              <div class="col-8">
                                <label class="control-label"><b>Description:</b></label>
                                <textarea  class="form-control mb-2" name="caseDetails" required></textarea>
                                <!-- <input type="text" class="form-control mb-2" name="caseDetails" required> -->
                              </div>
                              <div class="col-auto">
                                <label class="control-label"><b>Status:</b></label><br>
                                <select class="form-select" name="status" id="status">
                                    <option value="2">Endorsed</option>
                                    <option value="1">Active</option>
                                    <option value="0">Resolved</option>
                                </select>
                              </div>
                            </div>
                            <br>
                            <button class="btn btn-success" type="submit" id="submitButton">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

            <?php } ?>

            <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this case?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="col-md-12">
              <div class="card md-3">
                <div class="card-body">
                  <table id="myTable" class="table table-bordered">
                    <thead>
                      <th class="text-center">#</th>
                      <th class="text-center">Case Number</th>
                      <th class="text-center">Cases</th>
                      <th class="text-center">Status</th>
                      
                      <?php 
                        if(isset($_SESSION['user_id'])  != 0){
                          //echo $_SESSION['user_id'];
                          echo '<th class="text-center">Details</th>';
                          echo '<th class="text-center">Actions</th>';
                        }
                      ?>
                      
                    </thead>
                    <tbody>
                      <?php
                      $i = 1;
                      $sql = "SELECT * FROM cases order by case_id asc";
                      $result = $mysqli->query($sql);

                      if ($result->num_rows > 0){
                      while ($row = $result->fetch_assoc()) :
                      ?>
                        <tr>
                          <td class="text-center"><?php echo $i++ ?></td>
                          <td class="text-center"><?php echo $row['case_number']; ?></td>
                          <td class="text-center">
                            <b><?php echo $row['case_desc'] ?></b>
                          </td>
                          <td class="text-center">
                            <?php 
                              if($row['stat'] == 1){
                                echo '<h5><span class="badge bg-success">ACTIVE</span></h5>';
                            } else if($row['stat'] == 0){
                                echo '<h5><span class="badge bg-danger">RESOLVED</span></h5>';
                            } else if($row['stat'] == 2){
                              echo '<h5><span class="badge bg-warning ">ENDORSED</span></h5>';
                            }
                            
                            if(isset($_SESSION['user_id']) != 0){
                            ?>
                          </td>
                          <td class="text-center">
                              <?php echo $row['case_details']; ?>

                          </td>
                          <td class="text-center">
                              <button class="btn btn-sm btn-primary edit_case" type="button" 
                              data-id="<?php echo $row['case_id'] ?>" 
                              data-case_number="<?php echo $row['case_number'] ?>" 
                              data-name="<?php echo $row['case_desc'] ?>" 
                              data-case_details="<?php echo $row['case_details'] ?>"
                              >Edit</button>
                              <button class="btn btn-sm btn-danger delete_case" type="button" data-id="<?php echo $row['case_id'] ?>">Delete</button>
                          </td>
                        </tr>
                      <?php
                            }
                        endwhile;
                      }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>


        </div>

      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include "footer.php";?><!-- End Footer -->

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
      var caseNum = $(this).data("case_number");
      var name = $(this).data("name");
      var caseDetails = $(this).data("case_details");

      // Set the form fields with the data
      $("form").attr("action", "process_form.php");
      $("input[name='id']").val(id);
      $("input[name='caseNum']").val(caseNum);
      $("input[name='label']").val(name);
      $("textarea[name='caseDetails']").val(caseDetails);

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
          // Handle the response from process_form.php
          alert(response);
          location.reload()

          // You can also reload the page or update the case list here
        },
        error: function (error) {
          alert("Error: " + error);
        },
      });
    });

    // Handle the Delete button click event
    $(".delete_case").on("click", function () {
            var caseId = $(this).data("id");

            // Set the data-id attribute of the delete button in the modal
            $("#confirmDeleteBtn").data("id", caseId);

            // Show the delete confirmation modal
            $("#deleteConfirmationModal").modal("show");
        });

        // Confirm delete button click event
        $("#confirmDeleteBtn").on("click", function () {
            var caseId = $(this).data("id");

            // Make an AJAX request to delete the case
            $.ajax({
                url: "delete_case.php", // Create a separate PHP file for deleting cases
                type: "POST",
                data: { id: caseId },
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
