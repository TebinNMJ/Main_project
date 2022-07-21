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
if (isset($_SESSION['del_boy'])) {
  $id = $_SESSION['del_boy'];
  extract($_REQUEST);
  if (isset($update)) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    // $idp = $_POST['id_proof'];
    $phone = $_POST['phone'];
    $que = "update tbl_users set name='$name',phone='$phone',address='$address' where login_id='$id' ";
    mysqli_query($con, $que);
    $msg = "<h3 style='color:blue'>Profile Updated successfully</h3>";
  }
?>
  <?php
  $sql = mysqli_query($con, "SELECT * FROM tbl_users u,tbl_login l WHERE  u.login_id=$id and l.login_id=$id ");
  // $sqly = mysqli_query($con, "insert into tbl_login (id_proof)values('$idp') where uid=4");
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
  <div style="position: relative;top:20px;padding:20px;margin-bottom:100px;">
    <h3>Profile</h3>
    <table style="border:1px solid lightgrey;">
      <tr>
        <th>Name</th>
        <td><?php echo $result['name']; ?></td>
      </tr>
      <tr>
        <th>Address</th>
        <td><?php echo $result['address']; ?></td>
      </tr>
      <tr>
        <th>Email</th>
        <td><?php echo $result['email']; ?></td>
      </tr>
      <tr>
        <th>Phone</th>
        <td><?php echo $result['phone']; ?></td>
      </tr>
    </table>
  </div>
  <form method="POST" enctype="multipart/form-data">
    <table class="table table-bordered">
      <h4 style="font-weight: bolder;">Update profile</h4>
      <hr>
      <tr>
        <th>Name</th>
        <td><input type="text" name="name" class="form-control" value="<?php echo $result['name']; ?>" />
        </td>
      </tr>
      <tr>
        <th>Address</th>
        <td><input type="text" name="address" class="form-control" value="<?php echo $result['address']; ?>" />
        </td>
      </tr>
      <tr>
        <th>Phone</th>
        <td><input type="text" name="phone" class="form-control" value="<?php echo $result['phone']; ?>" />
        </td>
      </tr>
      
      


      <tr>
        <td colspan="2">
          <input type="submit" class="button-24" value="update" name="update" />
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