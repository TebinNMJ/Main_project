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
	<table class="table table-bordered table-striped table-hover">
		<h1>View Booking  </h1>
		<hr>
		<tr>

			<th>LaundryType</th>
			<th>LaundryDate</th>
			<th>Quantity</th>
			<!-- <th>Status</th> -->
			<th>Amount</th>
			<th>Cancel</th>
			
		</tr>
		<?php
		$sql = mysqli_query($con, "SELECT * FROM tbl_bookslot b,tbl_users l where b.userid=$r[userid] and l.userid=$r[userid] ");
			while ($res = mysqli_fetch_assoc($sql)) {
             $oid=$res['lid'];
             // echo $oid;

			$type = $res['laundry_type'];
			
			$priceSql = "select l_price from tbl_laundry_type where l_type = '$type'";

			$priceQry = mysqli_query($con,$priceSql);

			$priceFetch=mysqli_fetch_assoc($priceQry);
			$price=$priceFetch['l_price'];
		    $quantity = $res['quantity'];
		  
		    $amount=$price*$quantity;
		    $status = $res['status'];
    		$status_now = date("Y-m-d");
    		IF($booking_date==$date_now)
    {
     		
    

		?>

			<tr>
				

				<td><?php echo $res['laundry_type']; ?></td>
				<td><?php echo $res['booking_date']; ?></td>
				<td><?php echo $res['quantity']; ?></td>
				<!-- <td><?php echo $res['status'] ? 'FINISHED' : 'PENDING'; ?></td> -->
				<td><?php echo $amount ?> Rs</td>
				<td><a style="color:red" href="cancel_order.php?id=<?php echo $oid ?>">Cancel</a></td>
				
			</tr>
		    
		     
	<?php
			}
	
		}
		?>
	</table>
	<td><button class="button-24"><a href="index.php?option=vw" style="text-decoration: none; color:red;">Add Another item</a></button>
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