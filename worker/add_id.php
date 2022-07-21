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
if (isset($_SESSION['worker'])) {
  $id = $_SESSION['worker'];
  extract($_REQUEST);
  if (isset($_POST["add"])) {
   $donation = basename($_FILES["phone"]["name"]);
   $target_dir = "proof/";

    $targetFilePath1=$target_dir.$donation;
    move_uploaded_file($_FILES["phone"]["tmp_name"],$targetFilePath1);

   $sql=mysqli_query($con, "select * from tbl_login where login_id='$id'");
    $r = mysqli_fetch_array($sql);
     if (mysqli_query($con,"UPDATE tbl_login SET id_proof='$donation' where login_id='$id'")) {

      echo "<script>
        alert('Id Added succesfully');
      </script>";
      // header('location:index.php?option=vs');
    }
  }
?>
  <?php
  $sql = mysqli_query($con, "SELECT * FROM tbl_users u,tbl_login l WHERE  u.login_id=$id and l.login_id=$id ");
  $result = mysqli_fetch_assoc($sql);
  ?>
  <html>

  <head>
    <style>
      table {
        border-collapse: collapse;
        width: 100%;
      }

      th,
      td {
        text-align: left;
        padding: 8px;
      }

      tr:nth-child(even) {
        background-color: #f2f2f2;
      }
    </style>

  </head>

  </html>
  
  <form method="POST" enctype="multipart/form-data">
    <table class="table table-bordered" style="width: 800px ; margin-left: 300px;" >
      <br>
      <br>
      <h4 style="font-weight: bolder; margin-left: 600px ">Update profile</h4>
      <hr>
      
      <tr>
        <th>Add Id</th>
        <td><input type="file" name="phone" class="form-control"  />
        </td>
      </tr>
      <tr>

      </tr>
      


      <tr>
        <td colspan="2">
          <input type="submit" class="button-24" value="Add" name="add" />
        </td>
      </tr>
    </table>
  </form>

  </html>
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