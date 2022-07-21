<?php include 'config.php'; ?>
<table class="table table-bordered table-striped table-hover" style="width: 1100px;margin-left: 70px">
	<h1 style="text-align: center;">View Booking</h1>
	<hr>
	<tr>
		
		<th>Name</th>
		<th>Email</th>
		<th>Cloth Type</th>
		<th>Wash Type</th>
		<th>Booking Date</th>
		<th>Quantity</th>
		<th>Update Status</th>
		<!-- <th></th> -->
	    <th> Status</th>
		<!-- <th>Cancel</th> -->
	</tr>
	<?php
	$sql =  mysqli_query($con, "SELECT tbl_bookslot.*,tbl_users.*,tbl_login.* from tbl_bookslot,tbl_users,tbl_login where tbl_bookslot.userid=tbl_users.userid and tbl_login.login_id=tbl_users.login_id and tbl_bookslot.status=0");
	// while ($res = mysqli_fetch_assoc($sql)) {
           $amount=0;
	       while ($res = mysqli_fetch_assoc($sql)) {

			
		   
		 //    $booking_date = $res['booking_date'];
   //  		$date_now = date("Y-m-d");
   //  		IF($booking_date>=$date_now)
			// {
     		
    

		?><form method="POST" action="index.php?option=vb&&id=<?php echo $res['booking_id']; ?>">
		<tr>
			
			
			<td><?php echo $res['name']; ?></td>
			<td><?php echo $res['email']; ?></td>
			<td><?php echo $res['cloth_type']; ?></td>
			<td><?php echo $res['wash_type']; ?></td>
			<td><?php echo $res['booking_date']; ?></td>
			<td><?php echo $res['quantity']; ?></td>
			<!-- <td><?php echo $amount ?> Rs</td> -->
			<td><select class="text w3lpass"  name="status" id="status">
                           <option value="select">Select Status</option> 
                           <option value="0">Pending</option>
                           <option value="1">Finished</option>
                     
                        </select></td>
			
			
			<td><input 
				class="button-24" style="margin-left: 30px" type="submit"  id ="update" name="update" value="Update"></td>
		
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