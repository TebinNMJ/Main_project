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
<table class="table table-bordered table-striped table-hover">
	<h1 style="text-align: center;">View Users</h1>
	<hr>
	<tr>
		<th>Name</th>
		<th>Email</th>
		<th>Phone</th>
		<th>Address</th>
		<th>Status</th>
		<!-- <th>Action</th> -->
	</tr>
	<?php
	$sql = mysqli_query($con, "SELECT * FROM `tbl_users` join tbl_login on tbl_users.login_id = tbl_login.login_id where tbl_login.uid=2");
	while ($res = mysqli_fetch_assoc($sql)) {
		$oid = $res['uid'];
		$lid=$res['login_id'];
	?>
		<tr>
			
			<td><?php echo $res['name']; ?></td>
			<td><?php echo $res['email']; ?></td>
			<td><?php echo $res['phone']; ?></td>
			<td><?php echo $res['address']; ?></td>
			<td><form method="POST" action="index.php?option=vw&id=<?php echo $res['login_id']; ?>"><input class="button-24" type="submit"  id ="update" name="update" value="<?php echo $res['status'] ? 'Approve' : 'Block'; ?>"></form></td>
		</tr>
	<?php
	}
	?>
</table>






<?php
 include 'config.php';
if(isset($_POST['update']))
{
		$id = $_GET['id'];
		$sql1 = "select status from tbl_login where login_id=$id";
		$qry =mysqli_query($con,$sql1);
		$row1=mysqli_fetch_assoc($qry);
		$status=$row1['status'];
		if ($status==1) {
          $sql = "UPDATE tbl_login SET status = 0 where login_id=$id";
		   
		 $qry =mysqli_query($con,$sql);
		 echo "<script> alert('User Unblocked');</script>";
			echo "<meta http-equiv='refresh' content='0'>";			
		}
		elseif($status==0){
					 $sql = "UPDATE tbl_login SET status = 1 where login_id=$id";
		   
		 $qry =mysqli_query($con,$sql);
		 echo "<script> alert('User Blocked');</script>";
		 echo "<meta http-equiv='refresh' content='0'>";

		} 
		else{
			echo "<script> alert('status is not set');</script>";
		}

		 
		

}

// mysql_query($sql) or die(mysql_error());
// else if(isset($_POST['deny']))
// {
// $sql = "UPDATE `tbl_users` SET `status` = 0 WHERE `uid` = '${post['uid']}'";
// }
?>