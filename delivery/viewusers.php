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
		<th>User Id</th>
		<th>Name</th>
		<th>Email</th>
		<th>Phone</th>
		<th>Address</th>
		<!-- <th>Status</th> -->
		<!-- <th>Action</th> -->
	</tr>
	<?php
	$sql = mysqli_query($con, "SELECT * FROM `tbl_users` join tbl_login on tbl_users.login_id = tbl_login.login_id where tbl_login.uid=2");
	while ($res = mysqli_fetch_assoc($sql)) {
		$oid = $res['uid'];
		$lid=$res['login_id'];
	?>
		<tr>
			<td><?php echo $res['userid']; ?></td>
			<td><?php echo $res['name']; ?></td>
			<td><?php echo $res['email']; ?></td>
			<td><?php echo $res['phone']; ?></td>
			<td><?php echo $res['address']; ?></td>
			<!-- <td><form method="POST" action="index.php?option=vw&id=<?php echo $res['login_id']; ?>"><input class="button-24" type="submit"  id ="update" name="update" value="<?php echo $res['status'] ? 'Unblock' : 'Block'; ?>"></form></td> -->
		</tr>
	<?php
	}
	?>
</table>






