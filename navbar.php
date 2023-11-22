

<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.php" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
      <!-- <h6>DENR-CAR CENRO BAGUIO</h6> -->
      <nav id="navbar" class="navbar order-last order-lg-0">
      <?php include "header.php";
      session_start();
      ?>
        <ul>
          <li><a href="index.php" class="<?= ($activePage == 'index') ? 'active':''; ?>">Home</a></li>

          <li class="dropdown" ><a href="#"><span>About</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a class="<?= ($activePage == 'about') ? 'active':''; ?>" href="about.php">About Us</a></li>
              <li><a href="team.php">Team</a></li>
              
              
            </ul>
          </li>

          <li class="dropdown"><a href="services.php"><span>Services</span></a></li>
          <li><a class="<?= ($activePage == 'portfolio') ? 'active':''; ?>" href="Cases.php">Case Status</a></li>
          <li><a class="<?= ($activePage == 'blog') ? 'active':''; ?>" href="blog.php">Activities</a></li>
          <li><a class="<?= ($activePage == 'contact') ? 'active':''; ?>" href="contact.php">Contact</a></li>

        </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="header-social-links d-flex">
        <a href="#" class="twitter"><i class="bu bi-twitter"></i></a>
        <a href="https://www.facebook.com/profile.php?id=100066644125217" class="facebook"><i class="bu bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bu bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bu bi-linkedin"></i></i></a>
      </div>

      <div class="header d-flex ms-4">
        <?php 
          if(isset($_SESSION['user_id']) != 0){
        ?>
        <?php echo "<a href='ajax.php?action=logout'>Sign out</a>"; ?>
        <?php } ?>
      </div>

    </div>
  </header>