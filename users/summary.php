<?php include 'config.php'; ?>


<style>
.button-24{
    background: #FF4742;
  border: 1px solid #FF4742;
  border-radius: 6px;
  box-shadow: rgba(0, 0, 0, 0.1) 1px 2px 4px;
  box-sizing: border-box;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: nunito,roboto,proxima-nova,"proxima nova",sans-serif;
  font-size: 14px;
  line-height: 16px;
  min-height: 30px;
  outline: 0;
  padding: 12px 14px;
  text-align: center;
  text-rendering: geometricprecision;
  text-transform: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: middle;
}

.button-24:hover,
.button-24:active {
  background-color: initial;
  background-position: 0 0;
  color: #FF4742;
}

.button-24:active {
  opacity: .5;
}

</style>
<?php include 'config.php';
if (isset($_SESSION['user'])) {
	$id = $_SESSION['user'];
	$sql = mysqli_query($con, "select * from tbl_users where login_id='$id'");

	$r = mysqli_fetch_array($sql); ?>
	<table class="table table-bordered table-striped table-hover" style="width: 1100px;margin-left: 80px">
		<h1 style="text-align: center;">Bookings</h1>
		<hr>
		<tr>
           <th>Booking ID</th>
			<th>Wash Type</th>
			<th>Cloth Type</th>
			<th>BookingDate</th>
			<th>DeliveryDate</th>
			<th>Quantity</th>
			<th>amount</th>
			<th>Laundry Status</th>
			<th>Payment Status</th>
            <th>Action</th>
			
		</tr>
		<?php
		$sql = mysqli_query($con, "SELECT tbl_bookslot.*,tbl_orders.* from tbl_bookslot,tbl_orders where tbl_bookslot.booking_id=tbl_orders.booking_id and tbl_orders.login_id='$id' and tbl_bookslot.status='0'");

			while ($res = mysqli_fetch_assoc($sql)) {
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
    {
     		
    

		?>

			<tr>
				
                <td><?php echo $res['booking_id']; ?></td>
				<td><?php echo $res['wash_type']; ?></td>
				<td><?php echo $res['cloth_type']; ?></td>
				<td><?php echo $res['booking_date']; ?></td>
				<td><?php echo $res['delivery_date']; ?></td>
				<td><?php echo $res['quantity']; ?></td>
				<td><?php echo $kk ?> Rs</td>
				<td><?php echo $res['status'] ? 'FINISHED' : 'PENDING'; ?></td>
				<td><?php echo $res['transaction'] ?></td>
				<td><button><a href="receipts.php?oid=<?php echo $res['booking_id']; ?>&&amount=<?php echo $kk ?>&&type=<?php echo $res['wash_type']; ?>">Get Report</a></button></td>
				
			</tr>
		    
		     
	<?php
			}
	
		}
		?>
	</table>
	<!-- <td><form  action="index.php"><input class="button-24" type="submit"  id ="update" name="proceed" value="Proceed To Checkout" style="float: left;"> </form></td> -->
	<!-- <button class="button-24" style="margin-left: 770px;" onclick="window.location.href = 'report.php'">Report</button> -->
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