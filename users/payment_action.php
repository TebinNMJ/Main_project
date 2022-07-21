<?php 
include 'config.php';
session_start();
$session=$_SESSION['user'];
$bid=$_GET['bid'];
$amount=$_GET['id'];



$sql="INSERT into tbl_payment(`userid`,`booking_id`,`amount`,`pay_status`)VALUES('$session','$bid','$amount','success')";

mysqli_query($con,$sql);
$sqlyy="UPDATE tbl_orders SET transaction='success' where login_id='$session' and transaction='pending' ";
mysqli_query($con,$sqlyy);

  echo "<script>alert('Transaction succesfull');
  location='index.php?option=summary';
  </script>";

?>