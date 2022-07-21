<?php
error_reporting(0);
 session_start();
 $ui=$_SESSION['del_boy'];
 include 'config.php'; ?>
<table class="table table-bordered table-striped table-hover">
	<h1 style="text-align: center;">View Booking</h1>
	<hr>
	<tr>
		
		
		<th>Booking ID</th>
		<th>Customer Name</th>
		<th>Address</th>
		<th>Mobile Number</th>
		<th>Booking Date</th>
		<th>Action</th>
		
	   
	</tr>
	<?php
	$sql =  mysqli_query($con, "SELECT tbl_bookslot.booking_id,tbl_bookslot.booking_date,tbl_bookslot.quantity,tbl_bookslot.delivery_date,tbl_bookslot.status,tbl_assign.booking_id,tbl_assign.name,tbl_assign.date,tbl_assign.name,tbl_assign.delboy,tbl_assign.status,tbl_users.name,tbl_users.address,tbl_users.phone from tbl_bookslot join tbl_assign on tbl_bookslot.booking_id=tbl_assign.booking_id join tbl_users on tbl_assign.name=tbl_users.name where tbl_bookslot.status ='0' and tbl_assign.delboy='$ui' and tbl_assign.status='assigned'");
	// while ($res = mysqli_fetch_assoc($sql)) {
           $amount=0;
	       while ($res = mysqli_fetch_assoc($sql)) {

			
     		
    

		?><form method="POST" action="asaction.php?id=<?php echo $res['booking_id']; ?>">
		<tr>
			<td><?php echo $res['booking_id']; ?></td>
			<td><?php echo $res['name']; ?></td>
			<td><?php echo $res['address']; ?></td>
			<td><?php echo $res['phone']; ?></td>
			<td><?php echo $res['booking_date']; ?></td>
			<!-- <td><?php echo $amount ?> Rs</td> -->
			
			
			
			<td><input 
				class="button-24" type="submit"  id ="update" name="get" value="Update"></td>
		
		</tr>
	</form>
	<?php
     //}
	}

	include 'config.php';
if(isset($_POST['update']))
{
		$id = $_GET['id'];
		$status = $_POST['status'];
		
		// echo $id;
		// echo $status;
		$sql = "UPDATE tbl_bookslot SET status = $status where booking_id=$id";
		$qry =mysqli_query($con,$sql);
		 echo "<script> alert('Status Updated');</script>";
		// echo "<meta http-equiv='refresh' content='0'>";

         //header('location:verify.php?eml=<?php echo $em ');
         echo "<script>window.location.href='verify.php?eml=$em'</script>";
} 


		 
	
	?>
</table>