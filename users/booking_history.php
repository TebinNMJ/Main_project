<?php include 'config.php';
if (isset($_SESSION['user'])) {
	$id = $_SESSION['user'];
	$sql = mysqli_query($con, "select * from tbl_users where login_id='$id'");

	$r = mysqli_fetch_array($sql); ?>
	<table class="table table-bordered table-striped table-hover" style="width: 1100px;margin-left: 80px">
		<h1 style="text-align: center;"> Booking History & Status </h1>
		<hr>
		<tr class="table-primary">
            
			<th>Wash Type</th>
			<th>Cloth Type</th>
			<th>LaundryDate</th>
			<th>Quantity</th>
			<th>amount</th>
			<th>Laundry Status</th>
			
		</tr>
		<?php
		$sqlll = mysqli_query($con, "SELECT tbl_bookslot.*,tbl_orders.* from tbl_bookslot,tbl_orders where tbl_bookslot.booking_id=tbl_orders.booking_id and tbl_orders.login_id='$id' and tbl_bookslot.status='1'");

			while ($res = mysqli_fetch_assoc($sqlll)) {
			$amount=0;
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
		    // $booking_date = $res['booking_date'];
    		// $date_now = date("Y-m-d");
    		// IF($booking_date<$date_now)
    {
     		
    

		?>

			<tr>
			 
                
				<td><?php echo $res['wash_type']; ?></td>
				<td><?php echo $res['cloth_type']; ?></td>
				<td><?php echo $res['booking_date']; ?></td>
				<td><?php echo $res['quantity']; ?></td>
				<td><?php echo $kk ?> Rs</td>
				<td><?php echo $res['status'] ? 'FINISHED' : 'PENDING'; ?></td>
				
			</tr>
		<?php
	}
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