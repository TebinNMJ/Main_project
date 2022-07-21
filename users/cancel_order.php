<?php 
include('config.php');
	$oid=$_GET['id'];
	$sql="delete from  tbl_bookslot where booking_id='$oid' ";
$q=mysqli_query($con,$sql);
if($q)
{
header('location:index.php?option=vc');
}


