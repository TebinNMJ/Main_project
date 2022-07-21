 

<head><style>
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

</head>
<?php include 'config.php';
// session_start();


    $id = $_SESSION['user'];
    $sql = mysqli_query($con, "select * from tbl_users where login_id='$id'");

    $r = mysqli_fetch_array($sql); ?>
    <form method="post" action="">

    <table class="table table-bordered table-striped table-hover" style="width: 1200px;margin-left: 60px">
        <h1 style="text-align: center;">Laundry Bag</h1>
        <hr>
        <tr>
            <th>Booking ID</th>
            
            <th>Cloth Type</th>
            <th>Wash Type</th>
            <th>Quantity</th>
            <th>BookingDate</th>
            <th>amount</th>
            <th>Action</th>
            <th>Action</th>
            

            
        </tr>
        <?php
        if(!isset($_POST['proceed'])){
          $sql = mysqli_query($con, "SELECT * FROM `tbl_bookslot`, tbl_users WHERE tbl_users.userid = tbl_bookslot.userid AND tbl_bookslot.userid =$r[userid] and tbl_bookslot.booking_date >=CURDATE() and placed=0");

        }
        else{
          if(isset($_POST['proceed'])){
             session_start();
            
    

        for($i=0;$i<count($_POST['id']);$i++){
        $bid = $_POST['id'][$i];
        $num= $_POST['amount'][$i];
      
        $vv="INSERT INTO tbl_orders(booking_id,login_id,amount,transaction)values('$bid','$id','$num','pending')";
         $stmt=$con->prepare($vv);
         $stmt->execute();
  
           
            $vt="UPDATE tbl_bookslot set placed=1 where booking_id='$bid'";
             $stmti=$con->prepare($vt);
            $stmti->execute();
            
           
    }



    




  echo "<script>alert('order placed succesfully');
  location='index.php?option=tran';
  </script>";





}
          

        }
        

            while ($res = mysqli_fetch_assoc($sql)) {
              $amount=0;
              $type = $res['wash_type'];
              $clo=$res['cloth_type'];
              $priceSql = "SELECT * from tbl_wash_type where wash_type='$type'";
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
              
    
            
    

        ?>
 
            <tr>
                
                <td><?php echo $res['booking_id']; ?></td>
                <input type="hidden" name="id[]" value="<?php echo $res['booking_id']; ?>" >
                <td><?php echo $res['cloth_type']; ?></td>
               
                <td><?php echo $res['wash_type']; ?></td>
                
                <td><input type="number" name="qt" style="margin-left: 30px" value="<?php echo $res['quantity']; ?>" ></td>
                <td><?php echo $res['booking_date']; ?></td>
                <td><?php echo $kk ?> Rs</td>
                <input type="hidden" name="amount[]" value="<?php echo $kk ?>">
                <td><input type="submit" name="update" value="update"></td>
                <td><a style="color:red" href="cancel_order.php?id=<?php echo $res['booking_id'];  ?>">Delete</a></td>
                <!-- <td><?php //echo $amount ?> Rs</td> -->
                
            </tr>
            
             
    <?php
            
     
        }
        ?>
        <?php
if(isset($_POST['update'])){
$quantity=$_POST['qt'];

    $sqll = "UPDATE tbl_bookslot SET quantity='$quantity' where booking_id='$bid'";
    mysqli_query($con,$sqll);
echo"<script>window.location='index.php?option=vc';</script>";



}

?>
    </table>
    <td><input class="button-24" type="submit"  id ="update" name="proceed" value="Proceed " style="float: left; margin-left: 80px"> </form></td>
    <!-- <script>
      function click(){
     window.location.href='index.php?option=summary'
   }
    </script> -->
    <button class="button-24" style="margin-left: 1000px;" onclick="window.location.href = 'index.php?option=vw'">Add more</button>

<?php

?>