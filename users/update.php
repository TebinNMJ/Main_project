<?php 
include('config.php');
	$oid=$_GET['id'];
	$sql="UPDATE `tbl_bookslot` SET `quantity` = '4' WHERE `tbl_bookslot`.`booking_id` = 166; ";
$q=mysqli_query($con,$sql);
if($q)
{
header('location:index.php?option=vc');
}
