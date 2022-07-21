<?php
session_start();
extract($_REQUEST);

$con=mysqli_connect("localhost","root","","laundry") or die('DATABASE connection failed');


if (isset($_SESSION['worker'])) {
    $id = $_SESSION['worker'];
    //$admin=$_SESSION['admin_logged_in'];  
    // if($admin=="")
    // {
    //   header('location:index.php');
    // }

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
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <!-- FONTAWESOME STYLES-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
        <link href="assets/css/custom.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>

    <body>



        <div id="wrapper">
            <div class="navbar navbar-inverse navbar-fixed-top">
                <div class="adjust-nav">
                    <div class="navbar-header">
                         <h5 style="font-weight: bolder;font-size: 25px;color: #ffffff">Dust 2 Shine</h5>
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
                        <a  href="logout.php" style="color: white"><li style="font-weight: bolder;font-size: 25px;margin-top: 20px; "class="fas fa-power-off"></li></a>
                    </span>
                </div>
            </div>

            <!-- /. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">

                         <li>
                            <a href="index.php?option=dash"><i class="fa fa-desktop "></i>Dashboard <span class="badge"></span></a>
                        </li>
                        <li class="">
                            <a href="index.php?option=pro"><i class=" fas fa-portrait "></i><span class="badge">Profile</span></a>
                        </li>
                        <!-- <li class="">
                            <a href="index.php?option=add_id"><i class="fas fa-address-card"></i><span class="badge">Add ID</span></a>
                        </li> -->
                        <li class="">
                            <a href="index.php?option=vu"><i class=" fas fa-users "></i><span class="badge">View Users</span></a>
                        </li>
                        <li>
                            <a href="index.php?option=vb"><i class="    fas fa-envelope-open-text "></i><span class="badge">View Bookings</span></a>
                        </li>
                        <!-- <li>
                            <a href="index.php?option=vd"><i class="    fas fa-envelope-open-text "></i><span class="badge">View Delivery</span></a>
                        </li> -->
                        <li class="">
                            <a href="index.php?option=bookinghist"><i class="fas fa-search-dollar"></i><span class="badge">Booking History</span></a>
                        </li>
                        <!-- <li class="">
                            <a href="index.php?option=delhist"><i class="fas fa-search-dollar"></i><span class="badge">Delivery History</span></a>
                        </li> -->
                        
                    



                        <!-- 
                 <li>
                        <a href="#"><i class="fa fa-qrcode "></i>My Link One</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o"></i>My Link Two</a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-edit "></i>My Link Three </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table "></i>My Link Four</a>
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-edit "></i>My Link Five </a>
                    </li> -->
                    </ul>
            </nav>

            <!-- /. NAV SIDE  -->
            <div id="page-wrapper">
                <div id="page-inner" >
                    <div class="row">
                        <div class="col-md-12">
                            <h2></h2>
                            <h2><?php echo 'WELCOME &nbsp;' . $f['name']; ?></h2>

                            <?php
                            @$opt = $_GET['option'];
                            if ($opt == "dash") {
                                include('dash.php');
                            } else if ($opt == "add_id") {
                                include('add_id.php');
                            }else if ($opt == "pro") {
                                include('Profile.php');
                            }else if ($opt == "vu") {
                                include('viewusers.php');
                            } else if ($opt == "vb") {
                                include('viewbooking.php');
                            } else if ($opt == "vd") {
                                include('delivery.php');
                            } else if ($opt == "bookinghist") {
                                include('bookinghistory.php');
                            }else if ($opt == "delhist") {
                                include('delivery_history.php');
                            }
                            // else if($opt=="add_slider")
                            // {
                            // include('add_slider.php');  
                            // }
                            // else if($opt=="update_password")
                            // {
                            // include('update_password.php'); 
                            // }
                            // else if($opt=="rooms")
                            // {
                            // include('rooms.php'); 
                            // }

                            // else if($opt=="add_rooms")
                            // {
                            // include('add_rooms.php'); 
                            // }
                            // else if($opt=="delete_room")
                            // {
                            // include('delete_room.php'); 
                            // }

                            // else if($opt=="update_room")
                            // {
                            //   include('update_room.php');
                            // }
                            // else if($opt=="booking_details")
                            // {
                            //   include('booking_details.php');
                            // }
                            // else if($opt=="user_registration")
                            // {
                            //   include('user_registration.php');
                            // }
                            // else if($opt=="admin_profile")
                            // {
                            //   include('admin_profile.php');
                            // }
                            
                            ?>

                        </div>

                    </div>
                    <!-- /. ROW  -->
                    <img src="assets/img/gif.gif" width="20%" style="margin-left: 500px;margin-top: 110px;border-radius: 50px;opacity: 0.5      ">

                    <!-- /. ROW  -->
                      
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