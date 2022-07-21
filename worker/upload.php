<?php
//session_start();
// error_reporting(1);
include('config.php');
if (isset($_SESSION['worker'])) {
  $id = $_SESSION['worker'];
  extract($_REQUEST);
  if (isset($update)) {
   

    
    mysqli_query($con, "select * from tbl_login where login_id='$id'");
    $r = mysqli_fetch_array($sql);
     if (mysqli_query($con, "insert into tbl_login (id_proof )values('$id_proof','$r[userid]')")) {

      echo "<script>
        alert('Feedback Added succesfully');
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
    <table class="table table-bordered" style="width: 800px" >
      <br>
      <br>
      <h4 style="font-weight: bolder;">Update profile</h4>
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
          <input type="submit" class="button-24" value="update" name="add" />
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