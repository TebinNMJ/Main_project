<?php include 'config.php';

if (isset($_SESSION['del_boy'])) {
	$id = $_SESSION['del_boy'];
	$sql = mysqli_query($con, "select * from tbl_users where login_id='$id'");

	$r = mysqli_fetch_array($sql); ?>
	<table class="table table-bordered table-striped table-hover">
		<h1 style="text-align: center;"> Booking History </h1>
		<hr>
		<tr>
            
		<th>Booking ID</th>
		<th>Customer Name</th>
		<th>Address</th>
		<th>Mobile Number</th>
		<th>Booking Date</th>
		<th>Status</th>
			
		</tr>
		<?php
		$ss=mysqli_query($con, "SELECT tbl_bookslot.booking_id,tbl_bookslot.booking_date,tbl_bookslot.quantity,tbl_bookslot.delivery_date,tbl_bookslot.status,tbl_assign.booking_id,tbl_assign.name,tbl_assign.date,tbl_assign.name,tbl_assign.delboy,tbl_assign.status,tbl_users.name,tbl_users.address,tbl_users.phone from tbl_bookslot join tbl_assign on tbl_bookslot.booking_id=tbl_assign.booking_id join tbl_users on tbl_assign.name=tbl_users.name where tbl_bookslot.status ='0' and tbl_assign.delboy='$id' and tbl_assign.status='Pickup complete'");
		// $sql = mysqli_query($con, "SELECT * FROM tbl_bookslot b ,tbl_users l where b.userid='$r[userid]' and l.userid='$r[userid]' ");
			while ($res = mysqli_fetch_assoc($ss)) {
		
		  //    $booking_date = $res['booking_date'];
    // 		$date_now = date("Y-m-d");
    // 		IF($booking_date<$date_now)
    // {
     		
    

		?>

			<tr>
				
               <td><?php echo $res['booking_id']; ?></td>
			<td><?php echo $res['name']; ?></td>
			<td><?php echo $res['address']; ?></td>
			<td><?php echo $res['phone']; ?></td>
			<td><?php echo $res['booking_date']; ?></td>
				<td><?php echo $res['status']; ?></td>
				
			</tr>
		<?php
	//}
		}
		?>
	</table>
<?php
} else {
	if (headers_sent()) {
		die('<script type="text/javascript">window.location.href="../login.html?e=1"</script>');
	} else {
		header("location:../login.html?e=1");
		die();
	}
}

?>