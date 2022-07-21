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
  <?php
//session_start();
// error_reporting(1);
include('config.php');
if (isset($_SESSION['user'])) {
  $id = $_SESSION['user'];

  if (isset($_POST['add'])) {
    // $laundry_type = $_POST['laundry_type'];
    $cloth_type = $_POST['cloth_type'];
    $wash_type = $_POST['wash_type'];
    $booking_date = $_POST['booking_date'];
    $delivery_date = $_POST['delivery_date'];
    $quantity = $_POST['quantity'];
    $date_now = date("Y-m-d");
    if($booking_date<$date_now)
    {
      echo "<script>alert('Date should be greater than today');</script>";
    }else if($delivery_date<$booking_date)
    {
      echo "<script>alert('Delivery date should be greater than booking date');</script>";
    }
    else
    {
       $sql = mysqli_query($con, "select * from tbl_users where login_id='$id'");

    $r = mysqli_fetch_array($sql);


    if (mysqli_query($con, "insert into tbl_bookslot (cloth_type,wash_type,quantity,booking_date,delivery_date,userid)values('$cloth_type','$wash_type','$quantity','$booking_date','$delivery_date','$r[userid]')")) {
?>
      <script>//alert('order placed succesfully');
      window.location.href='index.php?option=vc'
      </script>;
         <!-- <script>window.location="location:index.php?option=vc";</script> -->
        <?php
       

       //window("location:index.php?option=vc");
       //header('location:index.php?option=vc');
    }

    }
  }
  ?>
  <form action="#" method="POST" enctype="multipart/form-data">
    <table class="table table-bordered">
      <h1 style="text-align: center;">Book Your Laundry </h1>
      <hr>
      <tr>
        <th>Wash Type</th>
        
        <td>
          <?php
        $sqli= "select wash_type,price from tbl_wash_type";
        $all_categories = mysqli_query($con,$sqli);
          
         ?>
             

          <SELECT class="form-control" name="wash_type" required>
          <option value="">Select type</option>
          <?php 
            while ($categoryy = mysqli_fetch_array(
                        $all_categories,MYSQLI_ASSOC)):;

          ?>
          <option value="<?php echo $categoryy["wash_type"];
                ?>">
                    <?php echo $categoryy["wash_type"];
                    ?>&nbsp Rs<?php echo $categoryy["price"];
                    ?>
                </option>
            <?php 
                endwhile; 
            ?>
          </SELECT>
        </td>
      </tr>
        <tr>
        <th>Cloth Type</th>
        
        <td>
          <?php
        $sqli= "select cloth,price from tbl_cloth";
        $all_categories = mysqli_query($con,$sqli);
          
         ?>
             

          <SELECT class="form-control" name="cloth_type" required>
          <option value="">Select type</option>
          <?php 
            while ($categoryy = mysqli_fetch_array(
                        $all_categories,MYSQLI_ASSOC)):;

          ?>
          <option value="<?php echo $categoryy["cloth"];
                ?>"><?php echo $categoryy["cloth"];
                ?>&nbspRs:<?php echo $categoryy["price"];?>
                </option>
            <?php 
                endwhile; 
            ?>
          </SELECT>
        </td>
      </tr>
      <tr>
        <th>Quantity</th>
        <td><input type="number" name="quantity" class="form-control" min="1" max="20" value="0" required />
        </td>
      </tr>
      <tr>
        <th>Pickup  Date:</th>
        <td><input  type="date" name="booking_date" id="shootdate" class="form-control" min="<?php echo date('Y-m-d'); ?>"/></td>
      </tr>
      <tr>
        <th>Expected Delivery</th>
        <td><input type="Date" name="delivery_date" class="form-control" max="<?php echo date('-m-d'); ?>" />
        </td>
      </tr>
      <tr>
        <th>Choose Your Delivery Option</th>
        
        <td>
          <select class="form form-control" name="type" id="type"  >
                           <option value="select" >select</option> 
                           <option >Fast Mode </option>
                           <option >Normal Mode</option>
    
                        </select>
      </tr>
      <tr>
        <th style="color: red"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp *Free Ironing For Every Laundry.<br><br> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp*Pickup Only Available for orders more than 5.<br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp* For Fast proccesing Choose your Delivery Option.</th>
      </tr>
      
      <tr>
        <td colspan="2">
          <input type="submit" class="button-24" value="Add To Bag" name="add" />
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