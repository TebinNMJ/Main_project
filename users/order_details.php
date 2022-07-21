


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
	// $sql = mysqli_query($con, "select * from tbl_users where login_id='$id'");

	// $r = mysqli_fetch_array($sql); ?>
	<table class="table table-bordered table-striped table-hover" style="width: 1100px;margin-left: 80px">
		<h1 style="text-align: center;">Orders</h1>
		<hr>
		<tr>
            <th>Booking ID</th>
			<th>Address</th>
			<th>Cloth Type</th>
			<th>Wash Type</th>
			<th>Quantity</th>
			<th>Amount</th>
			<th>Delivery Date</th>
			<th>Booking Date</th>
			<th>Status</th>

			
		</tr>
		<?php
		if(!isset($_POST['proceed'])){
		$sql = mysqli_query($con, "SELECT tbl_orders.booking_id,tbl_orders.login_id,tbl_orders.amount,tbl_orders.transaction,tbl_users.address,tbl_users.name,tbl_users.phone,tbl_bookslot.booking_id,tbl_bookslot.quantity,tbl_bookslot.cloth_type,tbl_bookslot.wash_type,tbl_bookslot.booking_date,tbl_bookslot.delivery_date from tbl_users join tbl_orders on tbl_users.login_id=tbl_orders.login_id join tbl_bookslot on tbl_orders.booking_id=tbl_bookslot.booking_id where tbl_orders.login_id='$id'and tbl_orders.transaction='pending' ");
while ($res = mysqli_fetch_assoc($sql)) 
			
    {
     		
    

		?>

			<tr>
				<td><?php echo $res['booking_id']; ?></td>
				<td><?php echo $res['address']; ?></td>
				<td><?php echo $res['cloth_type']; ?></td>
				<td><?php echo $res['wash_type']; ?></td>
				<td><?php echo $res['quantity']; ?></td>
				<td><?php echo $res['amount'];?> Rs</td>
				<td><?php echo $res['booking_date'];?></td>
				<td><?php echo $res['delivery_date'];?></td>
				<td><?php echo $res['transaction'];?></td>
				
			</tr>
		    
		     
	<?php
			}
	
		}
		?>
	</table>
	<td><button class="button-24" name="lid" style="margin-left: 90px;"><a href="payment.php">Proceed To Checkout</a></button></td>
	<td><button class="button-24" name="lid" style="margin-left: 800px;" onclick='window.location.href = "report.php"'>Report</button></td>
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
<?php
if(isset($_POST['proceed'])){
  echo "<script>alert('order placed succesfully');
  location='index.php?option=pay';
  </script>";

}

?>