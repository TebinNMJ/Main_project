<?php
if(isset($_POST['proceed'])){
             session_start();
             $id = $_SESSION['user'];
    
            $hh=$_POST['id'];
            $sqli = mysqli_query($con, "select * from tbl_users where login_id='$id'");

    $r = mysqli_fetch_array($sqli);
$nm=$r['name'];
$add=$r['address'];
            $sql = mysqli_query($con, "SELECT * FROM `tbl_bookslot`, tbl_users WHERE tbl_users.userid = tbl_bookslot.userid AND tbl_bookslot.userid =$r[userid] and tbl_bookslot.booking_date >=CURDATE() and placed=0 and tbl_bookslot.booking_id='$hh'");
           
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


               $vv="INSERT INTO tbl_order(booking_id,name,login_id,address,quantity,amount,transaction)values('$bid','$nm','$hh','$add','$quantity','$kk','pending')";
            mysqli_query($con,$vv);
            $vt="UPDATE tbl_bookslot set placed=1 where booking_id='$hh'";
            mysqli_query($con,$vt);
    }




  echo "<script>alert('order placed succesfully');
  location='index.php?option=tran';
  </script>";





}
?>