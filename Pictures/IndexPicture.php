<?php
require_once('../Pictures/DatabasePicture.php');
require_once('../initialize.php');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/nen2.jpg">

  <title>Edit Categoires</title>

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
    table {
      border-collapse: collapse;
      vertical-align: top;
    }

    table.list {
      width: 100%;
    }

    table.list tr td {
      border: 1px solid #999999;
    }

    table.list tr th {
      border: 1px solid #0055DD;
      background: #0055DD;
      color: white;
      text-align: center;
    }

    .img {
      text-align: array_multisort;
      height: 150px;
      width: 150px;
    }

    body,
    html {
      height: 110%;
      margin: 0;
    }

    body {
      /* background-color: blue; */
      background-image: url("../imgs/nen1.jpg");
      height: 90%;

      /* Center and scale the image nicely */
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }

    .table {
      background-color: white;
    }
  </style>
</head>

<body>
  <?php if (!isset($_SESSION['username'])) :
    redirect_to('../Admin/login.php');
  endif; ?>
  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->
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

          <li>
            <?php include('../sharesession.php'); ?>
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
          <li class="">
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
              <li><a class="" href="../Pictures/NewPicture.php">Pictures</a></li>
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
              <li><a class="" href="IndexPicture.php">Pictures</a></li>
              <li><a class="" href="../Categories/IndexCategories.php">Categories</a></li>
            </ul>
          </li>



        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>

    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-user-o"></i>Admin</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="../home.php">Home</a></li>
              <li><i class="icon_document_alt"></i>Table</li>
              <li><i class="fa fa-files-o"></i>Index Pictures</li>
            </ol>
          </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
              <section class="panel">
                <header class="panel-heading">
                  Pictures Table
                </header>

                <table class="table table-striped table-advance table-hover">
                  <tbody>
                    <tr>
                      <th>Name</th>
                      <th>Picture</th>
                      <th>Sport</th>
                    </tr>
                    <?php
                    $picture_set = find_all_picture();
                    $count = mysqli_num_rows($picture_set);
                    for ($i = 0; $i < $count; $i++) :
                      $picture = mysqli_fetch_assoc($picture_set);
                    ?>
                      <tr>
                        <td><?php echo $picture['Name']; ?></td>
                        <td class="img" ><img style="width: 80%; height: 80%;" src="<?php echo $picture['URL']; ?>"></td>
                        <!-- <td><img src="../img/cau_long1.jpg" alt=""></td> -->
                        <td><?php echo $picture['name']; ?></td>
                        <td>
                          <div class="btn-group" style="float: right;">
                            <a class="btn btn-primary" href="NewPicture.php"><i class="icon_plus_alt2"></i></a>
                            <a class="btn btn-success" href="<?php echo 'EditPicture.php?PictureID=' . $picture['PictureID']; ?>"><i class="icon_pencil"></i></a>
                            <a class="btn btn-danger" href="<?php echo 'DeletePicture.php?PictureID=' . $picture['PictureID']; ?>"><i class="icon_close_alt2"></i></a>
                          </div>
                        </td>
                      </tr>
                    <?php
                    endfor;
                    mysqli_free_result($picture_set);
                    ?>
                  </tbody>
                </table>
              </section>
            </div>
          </div>
      </section>
    </section>
    <!--main content end-->
  </section>

  <script src="../js/jquery-2.2.4.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
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