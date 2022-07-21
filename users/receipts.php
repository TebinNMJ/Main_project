<?php
session_start();
include 'config.php';
$id = $_SESSION['user'];
$oid = $_GET['oid'];
$amount=$_GET['amount'];
$wash=$_GET['type'];


$sub_detail = mysqli_query($con,"SELECT tbl_bookslot.*,tbl_orders.* from tbl_bookslot,tbl_orders where tbl_bookslot.booking_id=tbl_orders.booking_id and tbl_orders.login_id='$id' and tbl_bookslot.booking_id='$oid'");


$row1 = mysqli_fetch_array($sub_detail);

 

if(isset($_POST['finish'])){

   

    header("location:index.php?option=summary");

}

 

?>

<html>

    <head>

        <title>Invoice</title>

        <style>

        .ord-inv-cont{

            margin-left: 30%;
             margin-top: 8%;

           

}

.inv-body{

    margin-top: 30px;

 background-color: whitesmoke;

 box-shadow: 1px 1px 1px 1px;

 width: 55%;

 

}

.inv-dtls{

    text-align: center;

}

.inv-dtls h2{

    padding-top:4%;

    font-style: bold;

    color:black;

}

.inv-dtls p{

    font-size: 12px;

    font-style: italic;

    margin-top:-5px;

}

.inv-conts{

    margin: 50px;

}

 

.inv-head h5{

    margin-bottom: 20px;

}

.inv-addr{

    margin-left: 30%;

    margin-bottom: 10%;

}

.inv-tbl table{

   width: 100%;

}

.inv-tbl table tr{

    width: 100%;

}.inv-tbl table th{

    width: 10%;

 

}.inv-tbl table td{

    width: 10%;

    margin-left: 100px;

}

.inv-tot{

    margin-top: 20px;

}

.inv-tot text{

    float: left;

    text-align: inline;

}

 

.pay-stat{

    margin-top: 40px;

    width: 30%;

    background-color: #5cf78d;

    height: 30px;

    margin-left: 200px;
    border-radius: round;

    color: black;

    text-align: center;

    margin-bottom: 10px;

}

.ord-stat{

    width: 70%;

    background-color: #2cf56c;

    height: 30px;

    margin-left: 60px;

    color: black;

    text-align: center;

    margin-bottom: 30px;

}

.inv-footer{

    margin-top:15px;

    padding-bottom: 10px;

    text-align: center;

}

.inv-btn{

    border: none;

    width: 150px;

    height:30px;

    border-radius:6px;

    background-color:#8FBC8F;

    color: black;

    margin-left: 25%;

}

.inv-btn:hover{

    border: none;

    border-radius:6px;

    background-color:lawngreen;

    color: black;

}

.inv-btn1{

    border: none;

    width: 150px;

    height:30px;

    border-radius:6px;

    background-color:#8FBC8F;

    color: black;

}

.inv-btn1:hover{

    border: none;

    border-radius:6px;

    background-color:lawngreen;

    color: black;

}

 

    </style>

    </head>

    <body>

<div class="ord-inv-cont"  >

            <div class="inv-body" id="invoice" >

                <div class="inv-dtls">

                   

                    <h2>DUST 2 SHINE</h2>

                    <p>Make Your Day Fresh</p>

                </div>

                <form method="post">

                <div class="inv-conts">

                    <div class="inv-head">

                    <h5>Booking id:&nbsp; <?php echo $oid ?></h5>


                    <h5>Booking Date:&nbsp; <?php echo $row1['booking_date']; ?></h5>
                    <h5>Delivery Date:&nbsp; <?php echo $row1['delivery_date']; ?></h5>

                    </div>

                 

                    <div class="inv-tbl">

                       

                        <table>

                            <tr>
                                <th>Cloth Type</th>

                                <th>Wash Type</th>

                                <th>Quantity</th>

                                <th>Price</th>

                            </tr>

                           
<tr>


                                 <td><?php echo $row1['cloth_type']; ?></td>

                                <td><?php echo $row1['wash_type']; ?></td>

                                <td><?php echo $row1['quantity']; ?></td>

                                <td><?php echo $amount ?></td>

                                </tr>

                           

                       

                        </table>

                    </div>

                    <div class="inv-tot">

                        <text>Total amount: <?php echo $amount?></text><br>

                        

                    </div>

                    <div class="inv-pay-stat">

                        <div class="pay-stat">

                            <text><?php echo $row1['transaction']?></text>

                        </div>

                    </div>

                    <div class="inv-footer">

                        <text>Thank you for Being a part Of Dust 2 Shine.</text>

                    </div>

                </div>

               

            </div>

            <p>

 

            <button class="inv-btn" type="submit" onclick="printDiv('invoice')">Download Invoice</button>

            <button class="inv-btn1" type="submit" name="finish">Exit</button></p>

           

     </div>

</form>
</div>
</div>


<!-- print screen -->

<script type="text/javascript">

      function printDiv(divName) {

     var printContents = document.getElementById(divName).innerHTML;

     var originalContents = document.body.innerHTML;

 

     document.body.innerHTML = printContents;

 

     window.print();

 

     document.body.innerHTML = originalContents;

}

    </script>

    </body></html>

 