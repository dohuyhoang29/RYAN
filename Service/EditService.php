<?php
require_once('../Service/DatabaseService.php');
require_once('../initialize.php');

$error = [];

function checkForm()
{
  global $error;

  if (empty('Name')) {
    $error[] = 'Name must be required';
  }

  if (empty('Time')) {
    $error[] = 'Time must be required';
  }

  if (empty('Famous_Players')) {
    $error[] = 'Famous Players must be required';
  }

  if (empty('Rules')) {
    $error[] = 'Rules must be required';
  }
}

function isFormValidated()
{
  global $error;

  return count($error) == 0;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isFormValidated()) {
  checkForm();

  if (isFormValidated()) {
    $service = [];
    $service['ServiceID'] = $_POST['ServiceID'];
    $service['Name'] = $_POST['Name'];
    $service['Rules'] = htmlspecialchars($_POST['Rules'], ENT_QUOTES);
    $service['Time'] = $_POST['Time'];
    $service['Famous_Players'] = $_POST['Famous_Players'];
    $service['CategoryID'] = $_POST['CategoryID'];

    update_service($service);
    redirect_to('IndexService.php');
  }
} else {
  if (!isset($_GET['ServiceID'])) {
    redirect_to('IndexService.php');
  }

  $serviceID = $_GET['ServiceID'];
  $service = find_service_by_id($serviceID);
}
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

  <title>Edit Service</title>

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

  <section id="container" class="">
    <?php include_once('../header.php'); ?>


    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-user-o"></i> Form Service</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
              <li><i class="icon_document_alt"></i><a href="IndexService.php"></a></li>
              <li><i class="fa fa-files-o"></i>Edit Service</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Edit Form Service
              </header>
              <div class="panel-body">
                <div class="form">
                  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" onsubmit="return isFormValidation()" class="form-validate form-horizontal " id="register_form" method="post">
                    <input type="hidden" name="ServiceID" value="<?php echo $service['ServiceID'] ?>">
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2">Name <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="name" name="Name" type="text" value="<?php echo isFormValidated() ? $service['Name'] : $service['Name']; ?>" />
                        <span id="errorName"></span>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="password" class="control-label col-lg-2">Categories <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select class="form-control " id="categories" name="CategoryID">
                          <?php
                          $categories_set = find_all_categories();
                          $count = mysqli_num_rows($categories_set);
                          for ($i = 0; $i < $count; $i++) :
                            $categories = mysqli_fetch_assoc($categories_set);
                          ?>
                          <option value="<?php echo $categories['CategoryID']; ?>" <?php if(!empty($service['CategoryID']) && $service['CategoryID'] == $categories['CategoryID'] || !empty($_POST['CategoryID']) && $_POST['CategoryID'] == $categories['CategoryID']) echo 'selected'; ?>><?php echo $categories['Name']; ?></option>
                          <?php
                          endfor;
                          mysqli_free_result($categories_set);
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="password" class="control-label col-lg-2">Time <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="time" name="Time" type="text" value="<?php echo isFormValidated() ? $service['Time'] : $_POST['Time'] ?>" />
                        <span id="errorTime"></span>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="email" class="control-label col-lg-2">Famous_Players <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="famous" name="Famous_Players" type="text" value="<?php echo isFormValidated() ? $service['Famous_Players'] : $_POST['Famous_Players'] ?>" />
                        <span id="errorFamous"></span>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="phone" class="control-label col-lg-2">Rules <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <textarea class="form-control " id="rules" name="Rules" type="text"><?php echo isFormValidated() ? $service['Rules'] : $_POST['Rules'] ?></textarea>
                        <span id="errorRules"></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit" value="submit" name="submit">Save</button>
                        <button class="btn btn-default" type="reset" value="reset" name="reset">Cancel</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </section>
          </div>
        </div>

      </section>
    </section>
    </div>
    </div>
  </section>
  </section>

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

      function isFormValidation() {
        // lay gia tri cua cac input
        var name = document.getElementById('name').value;
        var categories = document.getElementById('categories').value;
        var time = document.getElementById('time').value;
        var famous = document.getElementById('famous').value;
        var rules = document.getElementById('rules').value;

        // kiem tra du lieu

        if (name == '') {
          document.getElementById('errorName').innerHTML = 'Name cannot be left blank';
          document.getElementById('errorName').style.color = 'red';
          document.getElementById('name').style.border = '1px solid red';
        } else {
          document.getElementById('errorName').innerHTML = '';
          document.getElementById('name').style.border = '1px solid #ceced2';
        }
        if (time == '') {
          document.getElementById('errorTime').innerHTML = 'Time cannot be left blank';
          document.getElementById('errorTime').style.color = 'red';
          document.getElementById('time').style.border = '1px solid red';
        } else {
          document.getElementById('errorTime').innerHTML = '';
          document.getElementById('time').style.border = '1px solid #ceced2';
        }
        if (famous == '') {
          document.getElementById('errorFamous').innerHTML = 'Famous Players cannot be left blank';
          document.getElementById('errorFamous').style.color = 'red';
          document.getElementById('famous').style.border = '1px solid red';
        } else {
          document.getElementById('errorFamous').innerHTML = '';
          document.getElementById('famous').style.border = '1px solid #ceced2';
        }
        if (rules == '') {
          document.getElementById('errorRules').innerHTML = 'Famous Players cannot be left blank';
          document.getElementById('errorRules').style.color = 'red';
          document.getElementById('rules').style.border = '1px solid red';
        } else {
          document.getElementById('errorRules').innerHTML = '';
          document.getElementById('rules').style.border = '1px solid #ceced2';
        }
        if (name != '' && time != '' && famous != '' && rules != '') {

          return true;
        }

        return false;
      }
    </script>

</body>

</html>

<?php
db_disconnect($db);
?>