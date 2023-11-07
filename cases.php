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

        <!-- <div class="row portfolio-container" data-aos="fade-up">
          <div class="col-lg-1 col-md-6 portfolio-item filter-app">
          </div>
          <div class="col-lg-10 col-md-6 portfolio-item filter-app">
          <table class="table">
            <thead class="table-success text-center">
              <tr>
                <th>Case Title</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <tr>
                <td>John versus heirs of Juana</td>
                <td>active</td>
              </tr>
              <tr>
                <td>Mary versus ben</td>
                <td>active</td>
              </tr>
            </tbody>
          </table>
          </div> -->

          <div class="row">

            <!-- <div class="col-md-12 mb-5">
            <form action="" id="manage-case">
					    <div class="card">
						  <div class="card-header">
							  <h4><b>Case Form</b></h4>
						  </div>
						  <div class="card-body">
						  	<input type="hidden" name="id">
						  	<label class="control-label"><b>Case Label:</b></label>
							  <input type="text" class="form-control mb-2" name="label" required>


							<label class="control-label"><b>Status:</b></label><br>
              <select name="status" id="status">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
              </select>

						</div>

                <div class="card-footer">
                  <div class="row">
                    <div class="col-md-12">
                      <button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>
                      <button class="btn btn-sm btn-default col-sm-3" type="button" onclick="$('#manage-case').get(0).reset()"> Cancel</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            </div> -->

            <?php
              if(isset($_SESSION['user_id']) != 0){ 
            ?>

            <div class="col-md-12 mb-5">
                <form action="process_form.php" method="POST">
                    <div class="card">
                        <div class="card-header">
                            <h4><b>Case Form</b></h4>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="id">
                            <label class="control-label"><b>Case Label:</b></label>
                            <input type="text" class="form-control mb-2" name="label" required>

                            <label class="control-label"><b>Status:</b></label><br>
                            <select name="status" id="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            
                            <button type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

            <?php } ?>
            

            <div class="col-md-12">
              <div class="card md-3">
                <div class="card-body">
                  <table id="myTable" class="table table-bordered">
                    <thead>
                      <th class="text-center">#</th>
                      <th class="text-center">Cases</th>
                      <th class="text-center">Status</th>
                      <?php 
                        if(isset($_SESSION['user_id'])  != 0){
                          //echo $_SESSION['user_id'];
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
                          <td class="text-center">
                            <b><?php echo $row['case_desc'] ?></b>
                          </td>
                          <td class="text-center">
                            <?php 
                              if($row['stat'] == 1){
                                echo '<h5><span class="badge bg-success">Active</span></h5>';
                            } else if($row['stat'] == 0){
                                echo '<h5><span class="badge bg-danger">Inactive</span></h5>';
                            }
                            
                            if(isset($_SESSION['user_id']) != 0){
                            ?>
                          </td>
                          <td class="text-center">
                            <button class="btn btn-sm btn-primary edit_supplier" type="button" data-id="<?php echo $row['case_id'] ?>" data-name="<?php echo $row['case_desc'] ?>">Edit</button>
                            <button class="btn btn-sm btn-danger delete_supplier" type="button" data-id="<?php echo $row['case_id'] ?>">Delete</button>
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


</body>

</html>

<script>
  	$('#manage-case').submit(function(e) {
		e.preventDefault()
		start_load()
		$.ajax({
			url: 'ajax.php?action=save_case',
			data: new FormData($(this)[0]),
			cache: false,
			contentType: false,
			processData: false,
			method: 'POST',
			type: 'POST',
			success: function(resp) {
				if (resp == 1) {
					alert_toast("Data successfully added", 'success')
					setTimeout(function() {
						location.reload()
					}, 1500)

				} else if (resp == 2) {
					alert_toast("Data successfully updated", 'success')
					setTimeout(function() {
						location.reload()
					}, 1500)

				}
			}
		})
	})
</script>