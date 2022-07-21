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
<table class="table table-bordered table-striped table-hover" id="myTable" >
	<input style="border: 2px solid #5299d5; border-radius: 10px;" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search User " title="Type in a name">
	<h1 style="text-align: center;">View Transaction</h1>
	<hr>
	<tr>
		<th>Booking ID</th>
		<!-- <th>UserID</th> -->
		<th>Email</th>
		<th>Date</th>
		<th>Amount</th>
		<th>Transaction Status</th>
		
		
		<!-- <th>Cancel</th> -->
	</tr>
	<?php
	$sql = mysqli_query($con, "SELECT tbl_payment.booking_id,tbl_payment.userid,tbl_payment.date,tbl_payment.amount,tbl_payment.pay_status,tbl_login.email,tbl_login.login_id from tbl_payment join tbl_login on tbl_payment.userid=tbl_login.login_id");
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
			<td><?php echo $res['booking_id']; ?></td>
			
			<td><?php echo $res['email']; ?></td>
			<td><?php echo $res['date']; ?></td>
			<td><?php echo $res['amount']; ?></td>
			<td><?php echo $res['pay_status']; ?></td>
			
        
		
			
			
		</tr>

	<?php


     //}
	}
	?>

</table>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<td><button class="btn btn-danger" style="margin-left: 1200px" onclick="window.location.href = 'pdf/index.php';">
                        Report <i class="fa fa-arrow-right"></i>
                      </button></td>