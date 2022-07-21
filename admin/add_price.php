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
    $null=mysqli_query($con,"select * from tbl_category where material='$laundry_type'");
    if(mysqli_num_rows($null)>0)
    {
       echo "<script>alert('laundry type already exists');</script>";
       echo "<script>location=add_service.php</script>";
    }else if(mysqli_query($con, "insert into tbl_category (material,price)values('$laundry_type','$laundry_price')"))

      {
        echo "<script>
        alert('Type added succesfully');
      </script>";

  
      //header('location:index.php?option=as');
    }
    
  }
   if (isset($_POST['sumit'])) {
    
    $vy=$_POST['cloth'];
    $vd=$_POST['mtype'];
    $vp=$_POST['prici'];
    if($vy==""){
      $sql="UPDATE tbl_category SET price='$vp' where material='$vd'";
      mysqli_query($con,$sql);
       echo "<script>
        alert('Material Price Updated Succesfully');
      </script>";  
   }
   elseif($vd==""){
    $sqly="UPDATE tbl_cloth SET price='$vp' where cloth='$vy'";
      mysqli_query($con,$sqly);
       echo "<script>
        alert('Cloth Price Updated Succesfully');
      </script>"; 

   }elseif($vd==""){
    $sqly="UPDATE tbl_wash_type SET price='$vp' where wash_type='$vy'";
      mysqli_query($con,$sqly);
       echo "<script>
        alert('Wash Price Updated Succesfully');
      </script>"; 

   }
   else{

       echo "<script>
        alert('Please Enter Price');
      </script>"; 

   }
 }

  ?>
  
    
  
  <form action="" method="POST" enctype="multipart/form-data"/>
    
    <table class="table table-bordered">
      <h1 style="text-align: center;">Edit Material price</h1>
      <hr>
       <tr>
        <th>Select Wash Type</th>
        <td>
          <?php
        $sql= "select * from tbl_wash_type";
        $all_categories = mysqli_query($con,$sql);  
         ?>

          <select class="form-control" name="mtype" id="cloth">
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
        <th>Select cloth Type</th>
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
          
          <option value="<?php echo $category["cloth"];?>"><?php echo $category["cloth"];?></option>


          <?php 
    endwhile; 
    ?>
          </select>
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
  </form>
  <div style="text-align: center;">
 <div style="margin-left: 70px;float: left;">
<table class="table table-bordered table-striped table-hover" style="width:500px">
  <h1 > Cloth & Price</h1>
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
</div>
 <div style="margin-right: 60px;float: right;">
<table class="table table-bordered table-striped table-hover" style="width:500px">
  <h1 > Wash Type & Price</h1>
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
</div>

</div>


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