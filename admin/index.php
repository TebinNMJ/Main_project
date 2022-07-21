    
<?php
session_start();
// extract($_REQUEST);
include('config.php');
if ($_SESSION['admin']) {


    // if($admin=="")
    // {
    //   header('location:index.php');
    // }
?>

    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Admin</title>
        <!-- BOOTSTRAP STYLES-->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
        <link href="assets/css/custom.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    </head>

    <body>



        <div id="wrapper">
            <div class="navbar navbar-inverse navbar-fixed-top">
                <div class="adjust-nav">
                    <div class="navbar-header">
                        <h5 style="font-weight: bolder;font-size: 25px;color: #ffffff"> Dust 2 Shine</h5>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">
                            <!-- <img src="" /> -->
                        </a>
                    </div>

                    <span class="logout-spn">

                        <a  href="logout.php" style="color: white"><li style="font-weight: bolder;font-size: 25px; margin-top: 20px"class="fas fa-power-off"></li></a>
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
                        <li>
                            <a href="index.php?option=vw"><i class=" glyphicon glyphicon-user "></i><span class="badge">ViewUsers</span></a>
                        </li>
                        <li>
                            <a href="index.php?option=worker"><i class="glyphicon glyphicon-wrench "></i><span class="badge">View Workers</span></a>
                        </li>
                         <li>
                            <a href="index.php?option=delboy"><i class="glyphicon glyphicon-wrench "></i><span class="badge">Pickup & Delivery team</span></a>
                        </li>
                        <li class="">
                            <a href="index.php?option=vs"><i class="glyphicon glyphicon-tasks"></i><span class="badge">View Bookings</span></a>
                        </li>
                        <!-- <li class="">
                            <a href="index.php?option=as"><i class="glyphicon glyphicon-collapse-down "></i><span class="badge">Add material</span></a>
                        </li> -->
                        <li class="">
                            <a href="index.php?option=wt"><i class="fas fa-tshirt"></i><span class="badge">Add Wash type</span></a>
                        </li>
                         <li class="">
                            <a href="index.php?option=ac"><i class="fas fa-tshirt"></i><span class="badge">Add cloth</span></a>
                        </li>
                        <!-- <li class="">
                            <a href="index.php?option=ap"><i class="fas fa-rupee-sign "></i><span class="badge">Manage Price</span></a>
                        </li> -->
                        <li class="">
                            <a href="index.php?option=book"><i class="  fas fa-history "></i><span class="badge">Booking History</span></a>
                        </li>
                        <li class="">
                            <a href="index.php?option=cash"><i class="fas fa-search-dollar "></i><span class="badge">View Transaction</span></a>
                        </li>
                        <li class="">
                            <a href="index.php?option=feed"><i class="  fas fa-envelope-square "></i><span class="badge">View Feedback</span></a>
                        </li>
                       <!--  <li class="">
                            <a href="index.php?option=us"><i class="fa fa-edit "></i><span class="badge">User Approval</span></a>
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
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Admin</h2>

                            <?php

                            @$opt = $_GET['option'];
                            if ($opt == "dash") {
                                include('dash.php');
                            }  else if ($opt == "vs")  {
                                include('viewslots.php');
                            }else if ($opt == "ac") {
                                include('add_cloth.php');
                            }else if ($opt == "wt") {
                                include('wash_type.php');
                            }else if ($opt == "ap") {
                                include('add_price.php');
                            }else if($opt=="vw"){
                                include('viewusers.php'); 
                            }else if($opt=="delboy"){
                                include('viewdelboy.php'); 
                            }else if($opt=="worker"){
                                include('ViewWorker.php'); 
                            }else if($opt== "book"){
                                include('admin_booking_hist.php'); 
                            }else if($opt== "cash"){
                                include('transaction.php'); 
                            }else if($opt== "feed"){
                                include('feedback.php'); 
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
                    <img src="assets/img/gif.gif" width="20%" style="margin-left: 500px;margin-top: 110px;border-radius: 50px;opacity: 0.5;
}">

                    <!-- /. ROW  -->
                </div>
                
                <!-- <h2>VIEW LAUNDRY BOOKINGS AND USERS</h2> -->
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
        <div class="footer">
            <div class="row">
                <div class="col-lg-12">
                    <a href="http://binarytheme.com" style="color:#fff;" target="_blank"></a>
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