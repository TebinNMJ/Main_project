<?php
// Include the database config file
include_once'config.php';
if(isset($_POST['data'])){
    // Fetch state data based on the specific country
    $query="SELECT price FROM tbl_category WHERE material=".$_POST['data']."";
    $result=$con->query($query);
    // Generate HTML of state options list
    if($result->rowCount()>0){         

            echo $result->rowCount();

    }else{
        echo 0 ;
}
}