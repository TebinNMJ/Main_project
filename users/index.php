<?php
session_start();
//extract($_REQUEST);

include('config.php');

if (isset($_SESSION['user'])) {
    $id = $_SESSION['user'];

    $sel = mysqli_query($con, "select * from tbl_users where login_id=$id");
    $f = mysqli_fetch_array($sel);
?>


    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title></title>
        <!-- BOOTSTRAP STYLES-->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <!-- CUSTOM STYLES-->
        <link href="assets/css/custom.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    </head>

    <body>



        <div id="wrapper">
            <div class="navbar navbar-inverse navbar-fixed-top">
                <div class="adjust-nav">
                    <div class="navbar-header">
                         <h5 style="font-weight: bolder;font-size: 30px ;color: #ffffff"> Dust 2 Shine</h5>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <a class="navbar-brand" href="#">
                            <img src="" />
                        </a>

                    </div>


                    <span class="logout-spn">
                        <a  href="logout.php" style="color: white"><li style="font-weight: bolder;font-size: 25px;  margin-top: 20px;" class="fas fa-power-off"></li></a>
                    </span>
                </div>
            </div>

            <!-- /. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">


                        <li>
                            <a href="index.php?option=profile"><i class="fa fa-desktop "></i>Dashboard <span class="badge"></span></a>
                        </li>
                        <li>
                            <a href="index.php?option=home"><i class="fas fa-home"></i>Home <span class="badge"></span></a>
                        </li>
                        <li>
                            <a href="index.php?option=vw"><i class="fas fa-business-time "></i><span class="badge">Bookslot</span></a>
                        </li>
                        <li class="">
                            <a href="index.php?option=vc"><i class="fas fa-shopping-bag "></i><span class="badge">Laundry Bag</span></a>
                        </li>
                        <!-- <li class="">
                            <a href="index.php?option=tran"><i class="  fas fa-file-alt"></i><span class="badge">Order Details</span></a>
                        </li>
 -->                        <li class="">
                            <a href="index.php?option=summary"><i class="   fas fa-search-dollar"></i><span class="badge">Bookings</span></a>
                        </li>
                        <li class="">
                            <a href="index.php?option=history"><i class="   fas fa-warehouse "></i><span class="badge">Booking History</span></a>
                        </li>
                        <!-- <li class="">
                            <a href="index.php?option=pay"><i class="fa fa-table "></i><span class="badge">Payment</span></a>
                        </li> -->
                        <li class="">
                            <a href="index.php?option=feed"><i class="fa fa-table"></i><span class="badge">Feedback</span></a>
                        </li>
                        <!-- <li class="">
                            <a href="index.php?option=vp"><i class="fa fa-table"></i><span class="badge">View Payment</span></a>
                        </li> -->

                    </ul>
            </nav>

            <!-- /. NAV SIDE  -->
            <div id="page-wrapper">
                <div id="page-inner" >
                    <div class="row">
                        <div class="col-md-12">
                            <h2></h2>
                            <h2><?php echo 'WELCOME &nbsp&nbsp&nbsp;' . $f['name']; ?></h2>
                            <?php
                            @$opt = $_GET['option'];
                            if ($opt == "home") {
                                include('home.php');
                            }else if ($opt == "vw") {
                                include('bookslot.php');
                            }else if ($opt == "home") {
                                include('home.php');
                            }else if ($opt == "vc") {
                                include('cart.php');
                            } else if ($opt == "profile") {
                                include('progile.php');
                            }else if ($opt == "history") {
                                include('booking_history.php');
                            }else if ($opt == "summary") {
                                include('summary.php');
                            }else if ($opt == "feed") {
                                include('user_feedback.php');   
                           
                            }else if ($opt == "tran") {
                                include('order_details.php');   
                           
                            }else if ($opt == "pay") {
                                include('payment.php');   
                           
                            }
                            ?>
                        </div>
                    </div>
            
                    <!-- /. ROW  -->
                    

                    <!-- /. ROW  -->
                      
                      <img src="assets/img/gif.gif" width="20%" style="margin-left: 550px;margin-top: 110px;border-radius: 50px;opacity: 0.5;">
                </div>


                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
        <div class="footer">
            <div class="row">
                <div class="col-lg-12">
                    &copy; <a href="http://binarytheme.com" style="color:#fff;" target="_blank"></a>
                </div>
            </div>
        </div>

        </div>


        <!-- /. WRAPPER  -->
        <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
        <!-- JQUERY SCRIPTS -->
        <script src="assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- CUSTOM SCRIPTS -->
        <script src="assets/js/custom.js"></script>


    </body>

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