 <?php
SESSION_START();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laundry";
$conn = new mysqli($servername, $username, $password, $dbname);
// $email=sha1($_POST['email']);
$email = $_POST['email'];
// $newpassword=sha1($_POST['password']);
$password = $_POST['password'];
// $status=$_POST['status'];
$query = "SELECT * FROM `tbl_login` WHERE email='$email'and password='$password' ";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$value =  mysqli_fetch_array($result);
if (mysqli_num_rows($result) > 0) {
      if ($value['uid'] == 1 && $value['status']==0) {
            $_SESSION['admin'] = $value['login_id'];
            header('Location:../admin/index.php?option=dash');
      } else if ($value['uid'] == 2 && $value['status']==0) {
            $_SESSION['user'] = $value['login_id'];
            header('Location:../users/index.php?option=home');
      }
      else if ($value['uid'] == 3 && $value['status']==1) {
            $_SESSION['worker'] = $value['login_id'];
            header('Location:../worker/index.php?option=dash');
      }
      else if ($value['uid'] == 4 && $value['status']==1) {
            $_SESSION['del_boy'] = $value['login_id'];
            header('Location:../delivery/index.php?option=dash');
      }
       else {
?> <script>
                  alert("invalid user");
                  window.location.href="../login.html";
            </script><?php
                  }
            } else {
                        ?> <script>
            alert("invalid username or password");
            window.location.href="../login.html";
      </script><?php
            }

            mysqli_close($conn);
