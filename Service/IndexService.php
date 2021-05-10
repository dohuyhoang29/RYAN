<?php
require_once('../Service/DatabaseService.php');
require_once('../initialize.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Index Service</title>

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

</head>

<body>
  <!-- container section start -->
  <section id="container" class="">


    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="../home.php" class="logo"><img style="padding-bottom: 10px;" src="../img/L.png" alt=""></a>
      <!--logo end-->
      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">


          <?php if (!isset($_SESSION['username'])) :
            redirect_to('../Admin/login.php');
          endif; ?>

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
          <li class="active">
            <a class="" href="../home.php">
              <i class="icon_house_alt"></i>
              <span>Home</span>
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
              <span>Index</span>
              <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a class="" href="../Admin/IndexAdmin.php">Admin</a></li>
              <li><a class="" href="IndexService.php">Service</a></li>
              <li><a class="" href="../Pictures/IndexPicture.php">Pictures</a></li>
              <li><a class="" href="../Categories/IndexCategories.php">Categories</a></li>
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
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-user-o"></i>Admin</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="../home.php">Home</a></li>
              <li><i class="icon_document_alt"></i>Table</li>
              <li><i class="fa fa-files-o"></i>Index Service</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">


              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th>Name</th>
                    <th>Time</th>
                    <th>Famous_Players</th>
                    <th>&nbsp;</th>
                    <th>Rules</th>
                    <th>&nbsp;</th>
                    <th>Category</th>
                    <th>&nbsp;</th>
                  </tr>
                  <?php
                  $service_set = find_all_service();
                  $count = mysqli_num_rows($service_set);
                  for ($i = 0; $i < $count; $i++) :
                    $service = mysqli_fetch_assoc($service_set);
                  ?>

                    <tr>
                      <td><?php echo $service['name']; ?></td>
                      <td><?php echo $service['Time']; ?></td>
                      <td class="famous"><?php echo $service['Famous_Players']; ?></td>
                      <td><button type="button" class="btn btn-link" data-toggle="modal" data-target="#famous">View all</button></td>
                      <td class="rules"><?php echo $service['Rules']; ?></td>
                      <td><button type="button" class="btn btn-link" data-toggle="modal" data-target="#rules">View all</button></td>
                      <td><?php echo $service['Name']; ?></td>
                      <td>
                        <div class="btn-group">
                          <a class="btn btn-primary" href="../Service/NewService.php"><i class="icon_plus_alt2"></i></a>
                          <a class="btn btn-success" href="<?php echo "EditService.php?ServiceID=" . $service['ServiceID']; ?>"><i class="icon_pencil"></i></a>
                          <a class="btn btn-danger" href="<?php echo "DeleteService.php?ServiceID=" . $service['ServiceID']; ?>"><i class="icon_close_alt2"></i></a>
                        </div>
                      </td>
                    </tr>
                    <div class="modal fade" id="famous" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable " role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Famous_Players</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p style="color: black;"><?php echo $service['Famous_Players']; ?></p>
                          </div>
                        </div>
                      </div>
                    </div><!--  -->
                    <div class="modal fade" id="rules" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable " role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Rules</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p style="color: black;"><?php echo $service['Rules']; ?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php
                  endfor;
                  mysqli_free_result($service_set);
                  ?>
                </tbody>
              </table>
            </section>
          </div>
        </div>

        <!-- Modal -->

      </section>
    </section>
    <!-- container section start -->

    <!-- javascripts -->
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
    <<script src="../js/fullcalendar.min.js">
      </script>
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
      <script>
        //knob
        $(function() {
          $(".knob").knob({
            'draw': function() {
              $(this.i).val(this.cv + '%')
            }
          })
        });

        //carousel
        $(document).ready(function() {
          $("#owl-slider").owlCarousel({
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true

          });
        });

        //custom select box

        $(function() {
          $('select.styled').customSelect();
        });

        /* ---------- Map ---------- */
        $(function() {
          $('#map').vectorMap({
            map: 'world_mill_en',
            series: {
              regions: [{
                values: gdpData,
                scale: ['#000', '#000'],
                normalizeFunction: 'polynomial'
              }]
            },
            backgroundColor: '#eef3f7',
            onLabelShow: function(e, el, code) {
              el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
            }
          });
        });
        $(document).ready(function() {

          $('.rules').each(function(f) {

            var newstr = $(this).text().substring(0, 30);
            $(this).text(newstr);

          });
        })
        $(document).ready(function() {

          $('.famous').each(function(f) {

            var newstr = $(this).text().substring(0, 30);
            $(this).text(newstr);

          });
        })
      </script>

</body>

</html>

<?php
db_disconnect($db);
?>