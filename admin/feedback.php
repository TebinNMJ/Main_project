<?php include 'config.php';
 if (isset($_POST['update'])) {
    $id = $_POST['reply'];
     $fid = $_POST['id'];
    $reply=$_POST['feedback'];
    mysqli_query($con,"UPDATE feedback set `feedback_reply`='$reply',`status`='0' where userid='$id' and fid='$fid'");
    
       echo "<script>alert('Reply Send');</script>";
       echo "<script>location=index.php?option=feed.php</script>";
 

  }
 ?>
 <form method="POST" >
<table class="table table-bordered table-striped table-hover">
	<h1 style="text-align: center;">View Feedbacks</h1>
	<hr>
	<tr>
		<th>Name</th>
		<th>Email</th>
		<th>Phone</th>
		<th>Feedback</th>
		<th>Booking Date</th>
		<th>Feedback Reply</th>
		<th>Submit</th>
		
		<!-- <th>Cancel</th> -->
	</tr>
	<?php
	$sql = mysqli_query($con, "SELECT * FROM feedback b,tbl_users u where  b.userid=u.userid  ");
	// while ($res = mysqli_fetch_assoc($sql)) {
	       while ($res = mysqli_fetch_assoc($sql)) {

			// 	$type = $res['laundry_type'];

			// $priceSql = "select l_price from tbl_laundry_type where l_type = '$type'";


			// $priceQry = mysqli_query($con,$priceSql);

			// $priceFetch=mysqli_fetch_assoc($priceQry);
			// $price=$priceFetch['l_price'];
		 //    $quantity = $res['quantity'];
		  
		 //    $amount=$price*$quantity;
		 //    $booking_date = $res['booking_date'];
   //  		$date_now = date("Y-m-d");
   //  		IF($booking_date>=$date_now)
			// {
     		

		?>
		<tr>
			<td><?php echo $res['name']; ?></td>
			<td><?php echo $res['address']; ?></td>
			<td><?php echo $res['phone']; ?></td>
			<td><?php echo $res['feedback']; ?></td>
			<td><?php echo $res['date']; ?></td>
			<input class="" type="hidden" name="reply" value="<?php echo $res['userid']; ?>">
    
			
        <td><textarea type="text" name="feedback" class="form-control"  required ></textarea>
        </td>
        <input class="" type="hidden" name="id" value="<?php echo $res['fid']; ?>" >
        <td><input 

				class="button-24" type="submit"  id ="update" name="update" value="Reply"></td>
		
			
			  
		
		</tr>

	<?php


     //}
	}
	?>
	

</table>
</form>
