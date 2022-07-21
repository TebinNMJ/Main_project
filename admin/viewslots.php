<?php include 'config.php';
error_reporting(0); ?>
<table class="table table-bordered table-striped table-hover">
	<h1 style="text-align: center;">View Booking</h1>
	<hr>
	<tr>
		<th>Booking ID</th>
		<th>User Name</th>
		<th>wash Type</th>
		<th>Cloth Type</th>
		<th>Booking Date</th>
		<th>Delivery Date</th>
		<th>Quantity</th>
		<th>Laundry Status</th>
		<th>amount</th>
		<th>Del Boy 1</th>
		<th>Del Boy 2</th>
		
		<!-- <th>Cancel</th> -->
	</tr>
	<?php
	$sql =  mysqli_query($con,"SELECT tbl_bookslot.*,tbl_users.* from tbl_bookslot,tbl_users where tbl_bookslot.userid = tbl_users.userid and tbl_bookslot.status=0");
	// while ($res = mysqli_fetch_assoc($sql)) {
	       $amount=0;
	       while ($res = mysqli_fetch_assoc($sql)) {

				$type = $res['wash_type'];
              $clo=$res['cloth_type'];
              $priceSql = "select * from tbl_wash_type where wash_type = '$type'";
              $priceQry = mysqli_query($con,$priceSql);
              $priceFetch=mysqli_fetch_assoc($priceQry);
              $price=$priceFetch['price'];
              $priceteppy = "SELECT * from tbl_cloth where cloth='$clo'";
              $priceQ = mysqli_query($con,$priceteppy);
              $priceF=mysqli_fetch_assoc($priceQ);
              $price_clo=$priceF['price'];
              $quantity = $res['quantity'];
              $bid=$res['booking_id'];
              $amount=$price+$price_clo;
              $kk=$amount * $quantity;
		    $booking_date = $res['booking_date'];
    		$date_now = date("Y-m-d");
   //  		IF($booking_date>=$date_now)
			// {
     		
    

		?>
		<tr>
			<td><?php echo $res['booking_id']; ?></td>
			<td><?php echo $res['name']; ?></td>
			<td><?php echo $res['wash_type']; ?></td>
			<td><?php echo $res['cloth_type']; ?></td>
			<td><?php echo $res['booking_date']; ?></td>
			<td><?php echo $res['delivery_date']; ?></td>
			<td><?php echo $res['quantity']; ?></td>
			<td><?php echo $res['status'] ? 'FINISHED' : 'PENDING'; ?></td>
			<td><?php echo $kk ?> Rs</td>
			<td><button><a href="delassign.php?did=58&&bid=<?php echo $res['booking_id']; ?>&&nm=<?php echo $res['name']; ?>&&ff=<?php echo $res['delivery_date']; ?>">Assign</a></button></td>
		    <td><button><a href="delassign.php?did=59&&bid=<?php echo $res['booking_id']; ?>&&nm=<?php echo $res['name']; ?>&&ff=<?php echo $res['delivery_date']; ?>">Assign</a></button></td>
		</tr>
	<?php
     //}
	}
	?>
</table>