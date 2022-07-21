<?php
ob_start() ;
//session_start();
error_reporting(0);
include('config.php');
if (isset($_SESSION['admin'])) {
  $id = $_SESSION['admin'];

  if (isset($_POST['add'])) {
    $laundry_type = $_POST['ltype'];
    $laundry_price = $_POST['lprice'];
    $lcloth = $_POST['l_cloth'];
    $null=mysqli_query($con,"select * from tbl_wash_type where wash_type='$laundry_type'");
    if(mysqli_num_rows($null)>0)
    {
       echo "<script>alert('laundry type already exists');</script>";
       echo "<script>location=wash_type.php</script>";
    }else if(mysqli_query($con, "insert into tbl_wash_type (wash_type,price)values('$laundry_type','$laundry_price')"))

      {
        echo "<script>
        alert('Type added succesfully');
      </script>";

  
      //header('location:index.php?option=as');
    }
    
  }
   if (isset($_POST['sumit'])) {
    
    $vy=$_POST['cloth'];
    $vt=$_POST['mtype'];
    $vd=$_POST['prici'];
    if($vd==""){
      $sql="UPDATE tbl_wash_type SET wash_type='$vt' where wash_type='$vy'";
      mysqli_query($con,$sql);
       echo "<script>
        alert('Wash Mode Name Updated Succesfully');
      </script>";  
   }
   elseif($vt==""){
    $sqly="UPDATE tbl_wash_type SET price='$vd' where wash_type='$vy'";
      mysqli_query($con,$sqly);
       echo "<script>
        alert('Wash Mode Price Updated Succesfully');
      </script>"; 

   }else{
    $sql="UPDATE tbl_wash_type SET wash_type='$vt' where wash_type='$vy'";
      mysqli_query($con,$sql);
    $sqly="UPDATE tbl_wash_type SET price='$vd' where wash_type='$vy'";
      mysqli_query($con,$sqly);
       echo "<script>
        alert(' Updated Succesfully');
      </script>"; 

   }
 }

  ?>
  
    
  
  <form action="" method="POST" enctype="multipart/form-data"/>
    <table class="table table-bordered">
      <h1 style="text-align: center;">Wash Type</h1>
      <hr>


      <tr>
        <th>Enter Wash Mode</th>
        <td><input type="text" name="ltype" id="ltype" class="form-control" required="" />
        </td>
      </tr>
        <th>Enter  Price</th>
        <td><input type="text" name="lprice" id="lprice" class="form-control"  required="" />
        </td>
      </tr>
      

    

      <tr>
        <td colspan="2">
          <input type="submit" class="btn btn-primary" value="Add" name="add" />
        </td>
      </tr>
    </table>
    <table class="table table-bordered">
      <h1 style="text-align: center;">Edit Wash Type</h1>
      <hr>
      <tr>
        <th>Select Wash Mode</th>
        <td>
          <?php
        $sql= "select * from tbl_wash_type";
        $all_categories = mysqli_query($con,$sql);  
         ?>

          <select class="form-control" name="cloth" id="cloth">
            <option value="">Select type</option>
            <?php 
            while ($category = mysqli_fetch_array(
                        $all_categories,MYSQLI_ASSOC)):; 

          ?>
          
          <option value="<?php echo $category["wash_type"];?>"><?php echo $category["wash_type"];?></option>


          <?php 
    endwhile; 
    ?>
          </select>
        </td>
       

      </tr>
      
        <tr>
        <th>Edit Wash Mode Name</th>
        <td><input type="text" name="mtype" id="ltype" class="form-control"/>
        </td>
      </tr>
        <th>Edit  Price</th>
        <td><input type="text" name="prici" id="lprice" class="form-control"/>
        </td>
      </tr>
       <td colspan="2">
          <input type="submit" class="btn btn-primary" value="Edit" name="sumit" />
        </td>
      
      

    </table>
    <table class="table table-bordered table-striped table-hover" style="width:500px; margin-left: 400px" >
  <h1 style="margin-left: 500px"> Wash Type & Price</h1>
  <br>
  <tr>
    <th style="text-align: center;">Wash Type</th>
    <th style="text-align: center;">Wash Price </th>
    
  </tr>
  <?php
  $sql = mysqli_query($con, "SELECT * from tbl_wash_type");
         while ($res = mysqli_fetch_assoc($sql)) {

  

    ?>
     <tr>
      <td><?php echo $res['wash_type']; ?></td>
      <td><?php echo $res['price']; ?></td>

        
    
      
      
    </tr> 

  <?php
     //}
  }
  ?>

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