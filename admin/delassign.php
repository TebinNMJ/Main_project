 <?php
  include 'config.php'; 
  $get=$_GET['did'];
  $name=$_GET['nm'];
  $bid=$_GET['bid'];
  $date=$_GET['ff'];

  if($get==58){
  mysqli_query($con,"insert into tbl_assign (booking_id,name,date,delboy,status)values('$bid','$name','$date',58,'assigned')");
  $sql="UPDATE tbl_bookslot SET del_boy=1 where booking_id='$bid'";
      mysqli_query($con,$sql);
echo "<script>alert('Delivery Boy Assigned');
  location='index.php?option=vs';
  </script>";

  }elseif($get==59){
  	mysqli_query($con,"insert into tbl_assign (booking_id,name,date,delboy,status)values('$bid','$name','$date',59,'assigned')");
  	$sql="UPDATE tbl_bookslot SET del_boy=1 where booking_id='$bid'";
      mysqli_query($con,$sql);
 echo "<script>alert('Delivery Boy 1 Assigned');
  location='index.php?option=vs';
  </script>";

  }else{
 echo "<script>alert('Delivery Boy 2 Assigned');
  location='index.php?option=vs';
  </script>";


  }




 ?>
