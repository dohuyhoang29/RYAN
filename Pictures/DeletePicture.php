<?php
require_once('DatabasePicture.php');
require_once('../initialize.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    //db delete
    Delete_Picture($_POST['PictureID']);
    redirect_to('Pictures.php');
} else { // form loaded
    if(!isset($_GET['PictureID'])) {
        redirect_to('Pictures.php');
    }
    $pictureID = $_GET['PictureID'];
    $picture = find_picture_by_id($pictureID);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title></title>

    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="../css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="../css/elegant-icons-style.css" rel="stylesheet" />
    <link href="../css/font-awesome.min.css" rel="stylesheet" />
    <!-- full calendar css-->
    <link href="../assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
    <link href="../assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
    <!-- owl carousel -->
    <link rel="stylesheet" href="../css/owl.carousel.css" type="text/css">
    <link href="../css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" href="../css/fullcalendar.css">
    <link href="../css/widgets.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/style-responsive.css" rel="stylesheet" />
    <link href="../css/xcharts.min.css" rel=" stylesheet">
    <link href="../css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    
    <style>
        .label {
            font-weight: bold;
            font-size: large;
        }
    </style>
</head>
<body>
    <?php if(!isset($_SESSION['username'])):
        redirect_to('Admin/LoginRYAN.php');
    endif;?>

<section id="container" class="">


<header class="header dark-bg">
  <div class="toggle-nav">
    <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
  </div>

  <!--logo start-->
  <a href="../home.php" class="logo"><img style="padding-bottom: 10px;" src="../img/L.png" alt=""></a>
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

      
      <li class="dropdown">
        
        
            
          <li>
          <?php include('../shareadminMenu.php'); ?>
          </li>
          
       
      </li>
      <!-- user login dropdown end -->
    </ul>
    <!-- notificatoin dropdown end-->
  </div>
</header>
<!--header end-->


<!--sidebar start-->
<aside>
  <div id="sidebar" class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu">
      <li class="active">
        <a class="" href="../home.php">
                      <i class="icon_house_alt"></i>
                      <span>Dashboard</span>
                  </a>
      </li>
      <li class="sub-menu">
        <a href="javascript:;" class="">
                      <i class="icon_document_alt"></i>
                      <span>Forms</span>
                      <span class="menu-arrow arrow_carrot-right"></span>
                  </a>
        <ul class="sub">
          <li><a class="" href="../Admin/NewAdmin.php">Admin</a></li>
          <li><a class="" href="../Service/NewService.php">Service</a></li>
          <li><a class="" href="NewPicture.php">Pictures</a></li>
          <li><a class="" href="../Categories/NewCategories.php">Categories</a></li>
        </ul>
      </li>
      
      <li class="sub-menu">
        <a href="javascript:;" class="">
                      <i class="icon_table"></i>
                      <span>Tables</span>
                      <span class="menu-arrow arrow_carrot-right"></span>
                  </a>
        <ul class="sub">
          <li><a class="" href="../Admin/IndexAdmin.php">Admin</a></li>
          <li><a class="" href="../Service/IndexService.php">Service</a></li>
          <li><a class="" href="../Categories/IndexCategories.php">Categories</a></li>
          <li><a class="" href="IndexPicture.php">Pictures</a></li>
        </ul>
      </li>

      

    </ul>
    <!-- sidebar menu end-->
  </div>
</aside>
<!--sidebar end-->

<!--main content start-->
<section id="main-content">
  
  <div class="text-right">
    <div class="credits">
   
    </div>
  </div>
</section>
<!--main content end-->
<section id="main-content">
<div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-user-o"></i>Admin</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="../home.php">Home</a></li>
          <li><i class="icon_document_alt"></i>Table</li>
          <li><i class="fa fa-files-o"></i>Delete Pictures</li>
        </ol>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
   <h1>Delete Picture</h1>
    <h2>Are you sure you want to delete this Picture?</h2>
    <p><span class="label">Name: </span><?php echo $picture['Name']; ?></p>
    <p><span class="label">ServiceID: </span><?php echo $picture['ServiceID']; ?></p>
    <p><span class="label">URL: </span><?php echo $picture['URL']; ?></p>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <input type="hidden" name="PictureID" value="<?php echo $picture['PictureID']; ?>" >
     
        <input type="submit" name="submit" value="Delete Picture">

<br><br>
            <!-- <label class="control-label col-xs-1">Name:</label>
            <div class="col-xs-2">
                <button class="form-control"><?php echo $picture['Name']; ?></button>
            </div>

            <br><br>
            <label class="control-label col-xs-1">ServiceID:</label>
            <div class="col-xs-2">
                <button class="form-control"><?php echo $picture['ServiceID']; ?></button>
            </div>

            <br><br>
            <label class="control-label col-xs-1">URL:</label>
            <div class="col-xs-2">
                <button class="form-control"><?php echo $picture['URL']; ?></button>
            </div>
            <br><br> -->
     
    </form>
    </table>
            </section>
          </div>
        </div>
      </section>
  </section>
    
    <br><br>
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery-ui-1.10.4.min.js"></script>
    <script src="../js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="../js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="../js/jquery.scrollTo.min.js"></script>
    <script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="../assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="../js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="../js/owl.carousel.js"></script>
    <!-- jQuery full calendar -->
    <script src="../js/fullcalendar.min.js"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="../assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="../js/calendar-custom.js"></script>
    <script src="../js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="../js/jquery.customSelect.min.js"></script>
    <script src="../assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="../js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="../js/sparkline-chart.js"></script>
    <script src="../js/easy-pie-chart.js"></script>
    <script src="../js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../js/xcharts.min.js"></script>
    <script src="../js/jquery.autosize.min.js"></script>
    <script src="../js/jquery.placeholder.min.js"></script>
    <script src="../js/gdp-data.js"></script>
    <script src="../js/morris.min.js"></script>
    <script src="../js/sparklines.js"></script>
    <script src="../js/charts.js"></script>
    <script src="../js/jquery.slimscroll.min.js"></script>
</body>
</html>


<?php
db_disconnect($db);
?>