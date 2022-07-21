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
    $null=mysqli_query($con,"select * from tbl_cloth where cloth='$laundry_type'");
    if(mysqli_num_rows($null)>0)
    {
       echo "<script>alert('laundry type already exists');</script>";
       echo "<script>location=add_service.php</script>";
    }else if(mysqli_query($con, "insert into tbl_cloth (cloth,price)values('$laundry_type','$laundry_price')"))

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
      $sql="UPDATE tbl_cloth SET cloth='$vt' where cloth='$vy'";
      mysqli_query($con,$sql);
       echo "<script>
        alert('Material Name Updated Succesfully');
      </script>";  
   }
   elseif($vt==""){
    $sqly="UPDATE tbl_cloth SET price='$vd' where cloth='$vy'";
      mysqli_query($con,$sqly);
       echo "<script>
        alert('Cloth Price Updated Succesfully');
      </script>"; 

   }else{
    $sql="UPDATE tbl_cloth SET cloth='$vt' where cloth='$vy'";
      mysqli_query($con,$sql);
    $sqly="UPDATE tbl_cloth SET price='$vd' where cloth='$vy'";
      mysqli_query($con,$sqly);
       echo "<script>
        alert('Material Updated Succesfully');
      </script>"; 

   }
 }

  ?>
  
    
  
  <form action="" method="POST" enctype="multipart/form-data"/>
    <table class="table table-bordered">
      <h1 style="text-align: center;">Cloth Type</h1>
      <hr>


      <tr>
        <th>Enter Cloth Type</th>
        <td><input type="text" name="ltype" id="ltype" class="form-control" />
        </td>
      </tr>
        <th>Enter  Price</th>
        <td><input type="text" name="lprice" id="lprice" class="form-control" required="" />
        </td>
      </tr>
      

    

      <tr>
        <td colspan="2">
          <input type="submit" class="btn btn-primary" value="Add" name="add" />
        </td>
      </tr>
    </table>
    <table class="table table-bordered">
      <h1 style="text-align: center;">Edit Cloth Type</h1>
      <hr>
      <tr>
        <th>Select Cloth Type</th>
        <td>
          <?php
        $sql= "select * from tbl_cloth";
        $all_categories = mysqli_query($con,$sql);  
         ?>

          <select class="form-control" name="cloth" id="cloth">
            <option value="">Select type</option>
            <?php 
            while ($category = mysqli_fetch_array(
                        $all_categories,MYSQLI_ASSOC)):; 

          ?>
          
          <option value="<?php echo $category["cloth"];?>"><?php echo $category["cloth"];?>  Price:<?php echo $category["price"];?></option>


          <?php 
    endwhile; 
    ?>
          </select>
        </td>
       

      </tr>
      
        <tr>
        <th>Edit Cloth Name</th>
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
    <table class="table table-bordered table-striped table-hover" style="width:500px ;width:500px; margin-left: 400px">
  <h1 style="margin-left: 550px" > Cloth & Price</h1>
  <br>
  <tr>
    <th style="text-align: center;">Cloth Type</th>
    <th style="text-align: center;">Cloth Price </th>
    
  </tr>
  <?php
  $sql = mysqli_query($con, "SELECT * from tbl_cloth");
         while ($res = mysqli_fetch_assoc($sql)) {

  

    ?>
     <tr>
      <td><?php echo $res['cloth']; ?></td>
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