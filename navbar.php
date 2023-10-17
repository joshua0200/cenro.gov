<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        
      <!-- <h1 class="logo me-auto"><a href="index.html"><img style="size: 100px;" class="img-fluid" src="assets/img/logo.png" alt=""></a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.php" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
      <?php include "header.php" ?>
        <ul>
          <li><a href="index.php" class="<?= ($activePage == 'index') ? 'active':''; ?>">Home</a></li>

          <li class="dropdown" ><a href="#"><span>About</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a class="<?= ($activePage == 'about') ? 'active':''; ?>" href="about.php">About Us</a></li>
              <li><a href="team.php">Team</a></li>
              <li><a href="testimonials.php">Testimonials</a></li>
              
            </ul>
          </li>

        <li class="dropdown"><a href="services.php"><span>Services</span><i class="bi bi-chevron-down"></i></a>
            <ul>
                <li><a href="#">APPLICATION FOR SURVEY AUTHORITY <i class="bi bi-chevron-right"></a></i></li>
                <li><a href="#">APPLICATION FOR TREE CUTTING PERMIT <i class="bi bi-chevron-right"></a></i></li>
                <li><a href="#">CHECKLIST FOR 211 VALIDATION <i class="bi bi-chevron-right"></i></a></li>
                <li><a href="#">TOWNSITE SALE APLICATION (TSA) <i class="bi bi-chevron-right"></i></a></li>
                <li><a href="#">MISCELLANEOUS SALES APPLICATION (MSA) <i class="bi bi-chevron-right"></i></a></li>
                <li><a href="#">AGRICULTURAL FREE PATENT APPLICATION (FPA) <i class="bi bi-chevron-right"></i></a></li>
                <li><a href="#">RESIDENTIAL FREE PATENT APPLICATION (RFPA) <i class="bi bi-chevron-right"></i></a></li>
                <li><a href="steps.php">CHAINSAW REGISTRATION APPLICATION<i class="bi bi-chevron-right"></i></a></li>
            </ul>
        </li>

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

    </div>
  </header>