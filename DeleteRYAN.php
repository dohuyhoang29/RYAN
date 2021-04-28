<?php
require_once('Admin/DatabaseRYAN.php');
require_once('initialize.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    
    delete_admin($_POST['username']);
    redirect_to('Admin.php');
} else { 
    if(!isset($_GET['username'])) {
        redirect_to('Admin.php');
    }
    $username = $_GET['username'];
    $admin = find_admin_by_id($username);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Delete admin</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/nen2.jpg">

  <title>Delete Admin</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="css/widgets.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/xcharts.min.css" rel=" stylesheet">
  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
<style>
    body {font-family: Arial, Helvetica, sans-serif;}
    * {box-sizing: border-box;}

    #input-container {
    display: -ms-flexbox; /* IE10 */
    display: flex;
    width: 100%;
    margin-bottom: 15px;
    }

    .icon {
    padding: 14px;
    background: dodgerblue;
    color: white;
    min-width: 50px;
    text-align: center;
    }

    /* .col-xs-2{
    width: 50%;
    padding: 10px;
    outline: none;
    } */


    .col-xs-2:focus {
    border: 2px solid dodgerblue;
    }

    /* Set a style for the submit button */
    .ltn {
    background-color: dodgerblue;
    color: white;
    padding: 15px 20px;
    border: none;
    cursor: pointer;
    width: 50%;
    opacity: 0.9;
    }

    /* .btn:hover {
    opacity: 1;
    } */
    .imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    }

    img.avatar {
    width: 18%;
    border-radius: 50%;
    }
    body,html{
        height: 100%;
        margin: 0;
    }
    body{
        /* background-color: blue; */
        background-image: url("../imgs/nen2.jpg");
        height: 90%;

  /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    .table{
        background-color: white;
    }
</style>
</head>
<body>
    <?php 
        if($admin['username'] === $_SESSION['username']){
            $_SESSION['Delete']; //= 'You cannot delete your name!';
            redirect_to('IndexRYAN.php');
        }else{
            unset($_SESSION['delete']);
        }
    ?>

    <!-- <?php if(!isset($_SESSION['username'])):
        redirect_to('LoginRYAN.php');
    endif;?> -->

<section id="container" class="">


<header class="header dark-bg">
  <div class="toggle-nav">
    <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
  </div>

  <!--logo start-->
  <a href="index.php" class="logo"><img style="padding-bottom: 10px;" src="img/logo1.svg" alt=""></a>
  <!--logo end-->

  <div class="nav search-row" id="top_menu">
    <!--  search form start -->
    <ul class="nav top-menu">
      <li>
        <form class="navbar-form">
          <input class="form-control" placeholder="Search" type="text">
        </form>
      </li>
    </ul>
    <!--  search form end -->
  </div>

  <div class="top-nav notification-row">
    <!-- notificatoin dropdown start-->
    <ul class="nav pull-right top-menu">

    
      <!-- <li class="dropdown">
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="profile-ava">
                            <img alt="" src="img/avatar01.jpg">
                        </span>
                        <span class="username"></span>
                        <b class="caret"></b>
                    </a>
        <ul class="dropdown-menu extended logout">
          <div class="log-arrow-up"></div>
          <li class="eborder-top">
            
          <li>
            <a href="login.php"><i class="icon_key_alt"></i> Log Out</a>
          </li>
          
        </ul>
      </li> -->
      <!-- <li>
        <?php include('shareadminMenu.php'); ?>
      </li> -->
      <li>
        <a href="login.php"><i class="icon_key_alt"></i></a>
      </li>
      <!-- user login dropdown end -->
    </ul>
    <!-- notificatoin dropdown end-->
  </div>
</header>
<!--header end-->

<!--sidebar start-->
<aside>
  <div id="sidebar" class="nav-collapse " >
    <!-- sidebar menu start-->
    <ul class="sidebar-menu">
      <li class="active">
        <a class="" href="index.php">
                      <i class="icon_house_alt"></i>
                      <span>Dashboard</span>
                  </a>
      </li>
      <li class="active">
        <a class="" href="form_validation.html">
                      <i class="icon_document_alt"></i>
                      <span>Dashboard</span>
                  </a>
      </li>
      
      <li class="sub-menu">
        <a href="javascript:;" class="">
                      <i class="icon_table"></i>
                      <span>Tables</span>
                      <span class="menu-arrow arrow_carrot-right"></span>
                  </a>
        <ul class="sub">
          <li><a class="" href="Admin.php">Admin</a></li>
          <li><a class="" href="basic_table.html">Service</a></li>
          <li><a class="" href="basic_table.html">Categories</a></li>
          <li><a class="" href="basic_table.html">Pictures</a></li>
        </ul>
      </li>

      

    </ul>

    <!-- sidebar menu end-->
  </div>
</aside>
<br><br>
   <div class="imgcontainer">
      <img src="img/logo.svg" alt="Avatar" class="avatar">
    </div>
    <div class="col-lg-8 col-lg-offset-4">
        
    <a href="Admin.php" class="btn btn-primary">Back to Index</a> 
 
        </div>
<br>
   
    <div class="col-lg-4 col-lg-offset-4">
    <label class="control-label " id="input-container"></label>
        <div class="">
            <button class="form-control"><?php echo $admin['username']; ?></button>
        </div>
    <label class="control-label " id="input-container"></label>
        <div class="">
            <button class="form-control"><?php echo $admin['pass']; ?></button>
        </div>
    <label class="control-label " id="input-container"></label>
        <div class="">
            <button class="form-control"><?php echo $admin['fullname']; ?></button>
        </div>
    <label class="control-label " id="input-container"></label>
        <div class="">
            <button class="form-control"><?php echo $admin['email']; ?></button>
        </div>
    <label class="control-label " id="input-container"></label>
        <div class="">
            <button class="form-control"><?php echo $admin['phone']; ?></button>
        </div>
        
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <input type="hidden" name="username" value="<?php echo $admin['username']; ?>" >
     
    <label class="control-label" id="input-container"></label>

        <div class="col-lg-4 col-lg-offset-4">
            <button class="form-control" type="submit">Delete</button>
 
        </div>

     
    </form>
    
    <br><br>

    <br><br>


<script src="../js/jquery-2.2.4.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="js/jquery.js"></script>
<script src="js/jquery-ui-1.10.4.min.js"></script>
<script src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
<!-- bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- nice scroll -->
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<!-- charts scripts -->
<script src="assets/jquery-knob/js/jquery.knob.js"></script>
<script src="js/jquery.sparkline.js" type="text/javascript"></script>
<script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="js/owl.carousel.js"></script>
<!-- jQuery full calendar -->
<<script src="js/fullcalendar.min.js"></script>
<!-- Full Google Calendar - Calendar -->
<script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
<!--script for this page only-->
<script src="js/calendar-custom.js"></script>
<script src="js/jquery.rateit.min.js"></script>
<!-- custom select -->
<script src="js/jquery.customSelect.min.js"></script>
<script src="assets/chart-master/Chart.js"></script>

<!--custome script for all page-->
<script src="js/scripts.js"></script>
<!-- custom script for this page-->
<script src="js/sparkline-chart.js"></script>
<script src="js/easy-pie-chart.js"></script>
<script src="js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="js/jquery-jvectormap-world-mill-en.js"></script>
<script src="js/xcharts.min.js"></script>
<script src="js/jquery.autosize.min.js"></script>
<script src="js/jquery.placeholder.min.js"></script>
<script src="js/gdp-data.js"></script>
<script src="js/morris.min.js"></script>
<script src="js/sparklines.js"></script>
<script src="js/charts.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>

    
</body>
</html>


<?php
db_disconnect($db);
?>