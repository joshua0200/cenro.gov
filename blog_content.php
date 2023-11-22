
<?php
  include "config.php";
    $i = 1;
    $sql = "SELECT * FROM blog order by post_id asc";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0){
    while ($row = $result->fetch_assoc()) :
  ?>

<article class="entry">

<div class="entry-img">
  <img src="assets/img/blog/tree.jpg" alt="" class="img-fluid">
  <?php echo $row['photo']; ?>
</div>

<h2 class="entry-title">
  <?php echo $row['postCaption']; ?>
</h2>

<div class="entry-meta">
  <ul>
    <!-- <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a></li> -->
    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">Jan 15, 2022</time></a></li>
    <!-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li> -->
  </ul>
</div>

<div class="entry-content">
  <p>
      <?php echo $row['postDescription']; ?>
  </p>
</div>

</article><!-- End blog entry -->
<?php
                            
    endwhile;
  }?>