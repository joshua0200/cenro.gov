<?php 
      if(isset($_SESSION['login_id']) != 0){
    
        //header('location:login.php');
        echo include("admin_nav.php");
      }
      else {
       echo include("navbar.php");
      }
?>