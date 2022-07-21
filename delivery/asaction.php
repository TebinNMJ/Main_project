<?php
session_start();
 $ui=$_SESSION['del_boy'];
 include 'config.php'; 

$vy=$_GET['id'];
    
      $sql="UPDATE tbl_assign SET status='Pickup complete' where booking_id='$vy'";
      mysqli_query($con,$sql);
       echo "<script>alert('Status updated Successfully');
  location='index.php?option=bookinghist';
  </script>";

      ?>