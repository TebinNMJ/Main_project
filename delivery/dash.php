<style type="text/css">
  .card-counter{
    box-shadow: 2px 2px 10px #DADADA;
    margin: 10px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: .3s linear all;
  }

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #007bff;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #ef5350;
    color: #FFF;
  }  

  .card-counter.success{
    background-color: #66bb6a;
    color: #FFF;
  }  

  .card-counter.info{
    background-color: #26c6da;
    color: #FFF;
  }  

  .card-counter i{
    font-size: 5em;
    opacity: 0.2;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
  }

  .card-counter .count-name{
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: Arial;
    text-transform: capitalize;
    opacity: 0.5;
    /*display: block;*/
    font-size: 18px;
  }

</style>
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" -->
                       <?php
                            include ('config.php');
                            $query = "SELECT * FROM tbl_login WHERE uid=2";  
                            $query_run = mysqli_query($con, $query);
                            $row = mysqli_num_rows($query_run);
                        ?>
                        <?php
                            include ('config.php');
                            $query = "SELECT status FROM tbl_assign where status='assigned'";  
                            $query_run = mysqli_query($con, $query);
                            $result = mysqli_num_rows($query_run);
                        ?>
                        <?php
                            include ('config.php');
                            $query = "SELECT status FROM tbl_assign where status='Pickup complete'";  
                            $query_run = mysqli_query($con, $query);
                            $res = mysqli_num_rows($query_run);
                        ?>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<!-- <div class="container"> -->

    <br>
    <br>
  
    <div class="row">
    <div class="col-md-3">
      <div class="card-counter primary">
        <i class="fa fa-code-fork"></i>
        <span class="count-numbers"><?php echo $result ; ?></span>
        <span class="count-name">BOOKINGS</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter danger">
        <i class="fa fa-users"></i>
        <span class="count-numbers"><?php echo $res ; ?></span>
        <span class="count-name">Finished</span>
      </div>
    </div>

  

   
    

   <!--  <div class="col-md-3">
      <div class="card-counter success">
        <i class="fa fa-database"></i>
        <span class="count-numbers">6875</span>
        <span class="count-name">Data</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter info">
        <i class="fa fa-users"></i>
        <span class="count-numbers">35</span>
        <span class="count-name">Users</span>
      </div> -->
<!--     </div> -->
  <!-- </div> -->
<!-- </div> -->
