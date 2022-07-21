<?php include 'config.php';
error_reporting(0); ?>
<table class="table table-bordered table-striped table-hover">
	<h1 style="text-align: center;">View Booking</h1>
	<hr>
	<tr>
		<th>Booking ID</th>
		<th>User Name</th>
		<th>Material Type</th>
		<th>Cloth Type</th>
		<th>Booking Date</th>
		<th>Delivery Date</th>
		<th>Quantity</th>
		<th>Status</th>
		<th>amount</th>
		
		<!-- <th>Cancel</th> -->
	</tr>
	<?php
	$sql =  mysqli_query($con, "SELECT tbl_bookslot.booking_id,tbl_bookslot.booking_date,tbl_bookslot.laundry_type,tbl_bookslot.cloth_type,tbl_bookslot.quantity,tbl_bookslot.booking_date,tbl_bookslot.delivery_date,tbl_bookslot.status,tbl_order.transaction,tbl_order.address,tbl_order.name,tbl_order.booking_id from tbl_bookslot join tbl_order on tbl_bookslot.booking_id=tbl_order.booking_id where tbl_bookslot.status ='0'");
	// while ($res = mysqli_fetch_assoc($sql)) {
	       $amount=0;
	       while ($res = mysqli_fetch_assoc($sql)) {

				$type = $res['laundry_type'];

			$priceSql = "select price from tbl_category where material = '$type'";


			$priceQry = mysqli_query($con,$priceSql);

			$priceFetch=mysqli_fetch_assoc($priceQry);
			$price=$priceFetch['price'];
		    $quantity = $res['quantity'];
		  
		    $amount=$price*$quantity;
		    $booking_date = $res['booking_date'];
    		$date_now = date("Y-m-d");
   //  		IF($booking_date>=$date_now)
			// {
     		
    

		?>
		<tr>
			<td><?php echo $res['booking_id']; ?></td>
			<td><?php echo $res['name']; ?></td>
			<td><?php echo $res['laundry_type']; ?></td>
			<td><?php echo $res['cloth_type']; ?></td>
			<td><?php echo $res['booking_date']; ?></td>
			<td><?php echo $res['delivery_date']; ?></td>
			<td><?php echo $res['quantity']; ?></td>
			<td><?php echo $res['status'] ? 'FINISHED' : 'PENDING'; ?></td>
			<td><?php echo $amount ?> Rs</td>
			
		</tr>
	<?php
     //}
	}
	?>
</table>