<?php
require_once('DatabasePicture.php');
require_once('../initialize.php');



if ($_SERVER["REQUEST_METHOD"] == 'POST') {

  $picture = [];
  $picture['PictureID'] = $_POST['PictureID'];
  $picture['Name'] = $_POST['Name'];
  $picture['URL'] = $_POST['URL'];
  $picture['ServiceID'] = $_POST['ServiceID'];

  Delete_Picture($picture);
  redirect_to('IndexPicture.php');
} else { // form loaded
  if (!isset($_GET['PictureID'])) {
    redirect_to('IndexPicture.php');
  }
  $pictureID = $_GET['PictureID'];
  $picture = find_picture_by_id($pictureID);
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Edit Picture</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/nen2.jpg">

  <title>Delete Pictures</title>

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
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    * {
      box-sizing: border-box;
    }

    .input-container {
      display: -ms-flexbox;
      /* IE10 */
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

    .input-field {
      width: 100%;
      padding: 10px;
      outline: none;
    }

    .input-field:focus {
      border: 2px solid dodgerblue;
    }

    /* Set a style for the submit button */
    .ltn {
      background-color: dodgerblue;
      color: white;
      padding: 15px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      opacity: 0.9;
    }

    .btn:hover {
      opacity: 1;
    }

    .imgcontainer {
      text-align: center;
      margin: 24px 0 12px 0;
    }

    img.avatar {
      width: 40%;
      border-radius: 50%;
    }

    body,
    html {
      height: 110%;
      margin: 0;
    }

    body {
      /* background-color: blue; */
      background-image: url("../imgs/nen2.jpg");
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
    redirect_to('Admin/LoginRYAN.php');
  endif; ?>

  <section id="container" class="">


  <?php include_once('../header.php'); ?>

    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-user-o"></i> Form Pictures</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="../home.php">Home</a></li>
              <li><i class="icon_document_alt"></i><a href="IndexPicture.php">Forms</a></li>
              <li><i class="fa fa-files-o"></i>Delete Pictures</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Enter Form Admin
              </header>
              <div class="panel-body">
                <div class="form">
                  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="form-validate form-horizontal " id="register_form" method="post">
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2">Name <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input disabled class=" form-control" id="fullname" name="Name" type="text" value="<?php echo $picture['Name'] ?>" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="username" class="control-label col-lg-2">Picture <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <img style="width: 50%; height: 50%;" src="<?php echo '../img/' . $picture['URL']; ?>">
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="password" class="control-label col-lg-2">Sport <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select disabled class="form-control " id="password" name="ServiceID">
                          <option value="1" <?php if ((!empty($picture['ServiceID']) && $picture['ServiceID'] == '1') || (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == "1")) echo 'selected' ?>>Cầu Lông</option>
                          <option value="2" <?php if ((!empty($picture['ServiceID']) && $picture['ServiceID'] == '2') || (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == "2")) echo 'selected' ?>>Bóng Chuyền</option>
                          <option value="3" <?php if ((!empty($picture['ServiceID']) && $picture['ServiceID'] == "3") || (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == "3")) echo 'selected' ?>>Bóng Rổ</option>
                          <option value="4" <?php if ((!empty($picture['ServiceID']) && $picture['ServiceID'] == "4") || (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == "4")) echo 'selected' ?>>Đấu Kiếm</option>
                          <option value="5" <?php if ((!empty($picture['ServiceID']) && $picture['ServiceID'] == '5') || (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == "5")) echo 'selected' ?>>Bóng Bàn</option>
                          <option value="6" <?php if ((!empty($picture['ServiceID']) && $picture['ServiceID'] == '6') || (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == "6")) echo 'selected' ?>>Đá Cầu</option>
                          <option value="7" <?php if ((!empty($picture['ServiceID']) && $picture['ServiceID'] == '7') || (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == "7")) echo 'selected' ?>>Bóng Đá</option>
                          <option value="8" <?php if ((!empty($picture['ServiceID']) && $picture['ServiceID'] == '8') || (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == "8")) echo 'selected' ?>>Quần Vợt</option>
                          <option value="9" <?php if ((!empty($picture['ServiceID']) && $picture['ServiceID'] == '9') || (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == "9")) echo 'selected' ?>>Nhảy xa</option>
                          <option value="10" <?php if ((!empty($picture['ServiceID']) && $picture['ServiceID'] == '10') || (!empty($_POST['ServiceID']) && $_POST['ServiceID'] = "10")) echo 'selected' ?>>Bóng Chày</option>
                          <option value="11" <?php if ((!empty($picture['ServiceID']) && $picture['ServiceID'] == '11') || (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == "11")) echo 'selected' ?>>Điền Kinh</option>
                          <option value="12" <?php if ((!empty($picture['ServiceID']) && $picture['ServiceID'] == '12') || (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == "12")) echo 'selected' ?>>Bơi Lội</option>
                          <option value="14" <?php if ((!empty($picture['ServiceID']) && $picture['ServiceID'] == '13') || (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == "13")) echo 'selected' ?>>Food</option>
                          <option value="15" <?php if ((!empty($picture['ServiceID']) && $picture['ServiceID'] == '14') || (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == "14")) echo 'selected' ?>>Massage</option>
                          <option value="15" <?php if ((!empty($picture['ServiceID']) && $picture['ServiceID'] == '15') || (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == "15")) echo 'selected' ?>>Bi-a</option>
                          <option value="16" <?php if ((!empty($picture['ServiceID']) && $picture['ServiceID'] == '16') || (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == "16")) echo 'selected' ?>>Bar</option>
                          <option value="17" <?php if ((!empty($picture['ServiceID']) && $picture['ServiceID'] == '17') || (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == "17")) echo 'selected' ?>>Xông Hơi</option>
                          <option value="18" <?php if ((!empty($picture['ServiceID']) && $picture['ServiceID'] == '18') || (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == "18")) echo 'selected' ?>>Yoga</option>
                          <option value="19" <?php if ((!empty($picture['ServiceID']) && $picture['ServiceID'] == '19') || (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == "19")) echo 'selected' ?>>Movie</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">

                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                          <div class="col-lg-offset-2 col-lg-10">

                            <input type="hidden" name="PictureID" value="<?php echo $picture['PictureID'] ?>">

                            <input class="btn btn-primary" type="submit" value="Delete" name="submit"></input>
                          </div>
                        </form>
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