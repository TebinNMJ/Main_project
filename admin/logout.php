<?php 
session_start();
session_destroy();
// $_SESSION['create_account_logged_in']=$eid;  
header('location:../login.html'); 
?>