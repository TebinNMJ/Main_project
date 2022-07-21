<?php include 'config.php';

if (isset($_SESSION['del_boy'])) {
	$id = $_SESSION['del_boy'];
	$sql = mysqli_query($con, "select * from tbl_users where login_id='$id'");

	$r = mysqli_fetch_array($sql); ?>

	<table class="table table-bordered table-striped table-hover">
	
        
     
		<h1 style="text-align: center;"> View Deliveries </h1>
		<hr>
		<tr>
            <th>Booking ID</th>
            <th>Email ID</th>
			<th>Cloth Type</th>
			<th>Wash Type</th>
			<th>BookingDate</th>
			
			<th>Quantity</th>
			<th>amount</th>
			<th>Laundry status</th>
			<th>Del Boy 1</th>
		    
			
		</tr>
		<?php
		$ss=mysqli_query($con, "SELECT tbl_bookslot.booking_id,tbl_bookslot.booking_date,tbl_bookslot.cloth_type,tbl_bookslot.wash_type,tbl_bookslot.quantity,tbl_bookslot.booking_date,tbl_bookslot.delivery_date,tbl_bookslot.status,tbl_order.transaction,tbl_order.address,tbl_order.name,tbl_order.booking_id,tbl_order.login_id,tbl_login.login_id,tbl_login.email from tbl_bookslot join tbl_order on tbl_bookslot.booking_id=tbl_order.booking_id join tbl_login on tbl_order.login_id=tbl_login.login_id where tbl_bookslot.status ='1'  ");
		// $sql = mysqli_query($con, "SELECT * FROM tbl_bookslot b ,tbl_users l where b.userid='$r[userid]' and l.userid='$r[userid]' ");
           $amount=0;
			while ($res = mysqli_fetch_assoc($ss)) {
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
    		// $date_now = date("Y-m-d");
    		// IF($booking_date<$date_now)
    // {
     		
    

		?>

			<tr>
				
                <td><?php echo $res['booking_id']; ?></td>
                <td><?php echo $res['email']; ?></td>
				
				<td><?php echo $res['cloth_type']; ?></td>
				<td><?php echo $res['wash_type']; ?></td>
				<td><?php echo $res['booking_date']; ?></td>
				
				<td><?php echo $res['quantity']; ?></td>
				<td><?php echo $kk ?> Rs</td>
				<td>Finished</td>
				<td><input 
				class="button-24" type="submit"  id ="update" name="get" value="Update"></td>
				
			</tr>
		<?php
	//}
     //}
	}

	include 'config.php';
if(isset($_POST['get']))
{
		$id = $_GET['id'];
		$status = $_POST['status'];
		
		// echo $id;
		// echo $status;
		$sql = "UPDATE tbl_bookslot SET status = $status where booking_id=$id";
		$qry =mysqli_query($con,$sql);
		 echo "<script> alert('Delivery Status Updated');</script>";
		// echo "<meta http-equiv='refresh' content='0'>";

         //header('location:verify.php?eml=<?php echo $em ');
         echo "<script>window.location.href='verify.php?eml=$em'</script>";
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