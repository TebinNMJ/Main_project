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
<table class="table table-bordered table-striped table-hover" style="width: 1100px;margin-left: 80px">
  <h1 style="text-align: center;">View Feedbacks</h1>
  <hr>
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Feedback</th>
    <th>Feedback Reply</th>
    <th>Date</th>
    
    <!-- <th>Cancel</th> -->
  </tr>
  <?php
   $id = $_SESSION['user'];
  $sql = mysqli_query($con, "SELECT * FROM feedback b,tbl_login l,tbl_users u where  b.userid=u.userid and l.login_id=u.login_id and l.login_id='$id'");
  // while ($res = mysqli_fetch_assoc($sql)) {
         while ($res = mysqli_fetch_assoc($sql)) {

      //  $type = $res['laundry_type'];

      // $priceSql = "select l_price from tbl_laundry_type where l_type = '$type'";


      // $priceQry = mysqli_query($con,$priceSql);

      // $priceFetch=mysqli_fetch_assoc($priceQry);
      // $price=$priceFetch['l_price'];
     //    $quantity = $res['quantity'];
      
     //    $amount=$price*$quantity;
     //    $booking_date = $res['booking_date'];
   //     $date_now = date("Y-m-d");
   //     IF($booking_date>=$date_now)
      // {
        
    

    ?>
    <tr>
      <td><?php echo $res['name']; ?></td>
      <td><?php echo $res['email']; ?></td>
      <td><?php echo $res['phone']; ?></td>
      <td><?php echo $res['feedback']; ?></td>
      <?php 
      if($res['status']=  1){ ?>
        <td><?php echo $res['feedback_reply']; ?></td>
     <?php }else{ ?>
        <td><?php echo 'Not Yet Replied'; ?></td>
    <?php  } ?>
      </td>

      <td><?php echo $res['date']; ?></td>
        
    </tr>

  <?php


     //}
  }
  ?>

</table>
  <?php
//session_start();
// error_reporting(1);
include('config.php');
if (isset($_SESSION['user'])) {
  $id = $_SESSION['user'];


  if (isset($_POST['add'])) {
    $feedback = $_POST['feedback'];
    $date_now = date("Y-m-d");
    
       $sql = mysqli_query($con, "select * from tbl_users where login_id='$id'");

    $r = mysqli_fetch_array($sql);


    if (mysqli_query($con, "insert into feedback (feedback,date,userid)values('$feedback','$date_now','$r[userid]')")) {

      echo "<script>
        alert('Feedback Added succesfully');
      </script>";
      // header('location:index.php?option=vs');
    }
  }
  ?>
  <form action="#" method="POST" enctype="multipart/form-data">
    <table class="table table-bordered" style="width: 700px;margin-left: 300px">
      <h1 style="text-align: center;">Write Your Feedback</h1>
      <hr>
      <tr>
        <th>Frequently Asked Queries.</th>
        <td><select class="form-control" name="type" id="type" style="width: 450px;" >
                           <option value="select" >select</option> 
                           <option >Cloth realated query</option>
                           <option >Payment Related Issues</option>
                           <option >Delivery Related Issues </option>
    
                        </select>
        </td>
      </tr>
      <tr>
        <th>Feedback</th>
        <td><textarea type="text" name="feedback" class="form-control" style="width: 450px;"  required ></textarea>
        </td>
      </tr>
     
      
      <tr>
        <td colspan="2">
          <input type="submit" class="button-24" value="Add" name="add" />
        </td>
      </tr>
    </table>
  </form>

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