<?php
require_once('DatabaseAdmin.php');
require_once('../initialize.php');
$errors = [];

function isFormValidated()
{
  global $errors;
  return count($errors) == 0;
}
//alkdjlfajsl;fjas;lkf

function checkForm()
{
  global $errors;
  $username = $_POST['username'];
  if (empty($_POST['username'])) {
    $errors[] = 'Username is required';
  }

  if (!empty($_POST['username']) && find_all_admin_different($username)) {
    $error[] = 'Username must be different';
  }

  if (empty($_POST['password'])) {
    $errors[] = 'Password is required';
  }
  if (empty($_POST['fullname'])) {
    $errors[] = 'fullname is required';
  }
  if (empty($_POST['email'])) {
    $errors[] = 'email is required';
  }

  if (empty($_POST['phone'])) {
    $errors[] = 'Phone is required';
  } else {
    if (!empty($_POST['phone']) && !is_numeric($_POST['phone']) == 1) {
      $errors[] = "Phone must be number!";
    } else {
      if (!empty($_POST['phone']) && count((str_split($_POST['phone']))) != 10) {
        $errors[] = 'Phone must have 10 number!';
      }
    }
  }
}

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
  checkForm();
  if (isFormValidated()) {

    $admin_set = find_ADMIN_by_USE();
    $ADMIN = mysqli_fetch_assoc($admin_set);

    $admin = [];
    $admin['USE'] = $ADMIN['username'];
    $admin['username'] = $_POST['username'];
    $admin['password'] = sha1($_POST['password']);
    $admin['fullname'] = $_POST['fullname'];
    $admin['email'] = $_POST['email'];
    $admin['phone'] = $_POST['phone'];
    $admin['pass'] = $_POST['password'];

    Update_admin($admin);
    redirect_to('IndexAdmin.php');
  }
} else { // form loaded
  if (!isset($_GET['username'])) {
    redirect_to('IndexAdmin.php');
  }
  $username = $_GET['username'];
  $admin = find_admin_by_id($username);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Edit admin</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/nen2.jpg">

  <title>Edit Admin</title>

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

<body>

  <!-- <?php if (!isset($_SESSION['username'])) :
          redirect_to('LoginRYAN.php');
        endif; ?> -->
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
        
      </li> -->
          <li>
            <?php include('../shareadminMenu.php'); ?>
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
            <a class="" href="index.php">
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
              <li><a class="" href="NewAdmin.php">Admin</a></li>
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
              <li><a class="" href="IndexAdmin.php">Admin</a></li>
              <li><a class="" href="../Service/IndexService.php">Service</a></li>
              <li><a class="" href="../Pictures/IndexPicture.php">Pictures</a></li>
              <li><a class="" href="../Categories/IndexCategories.php">Categories</a></li>
            </ul>
          </li>



        </ul>

        <!-- sidebar menu end-->
      </div>
    </aside>

    <br><br>
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-user-o"></i>Admin</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="icon_document_alt"></i>Forms</li>
              <li><i class="fa fa-files-o"></i>New Admin</li>
            </ol>
          </div>
        </div>
        <!-- Form validations -->

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Enter Form Admin
              </header>
              <div class="panel-body">
                <div class="form">
                  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="form-validate form-horizontal " method="post">
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2">Full name <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="fullname" name="fullname" type="text"value="<?php echo isFormValidated() ? $admin['fullname'] : $_POST['fullname']; ?>">
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="username" class="control-label col-lg-2">Username <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="username" name="username" type="text" value="<?php echo isFormValidated() ? $admin['username'] : $_POST['username']; ?>">
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="password" class="control-label col-lg-2">Password <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="password" name="password" type="" value="<?php echo isFormValidated() ? $admin['pass'] : $_POST['pass']; ?>">
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="email" class="control-label col-lg-2">Email <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="email" name="email" type="email"value="<?php echo isFormValidated() ? $admin['email'] : $_POST['email']; ?>">
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="phone" class="control-label col-lg-2">Phone <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="phone" name="phone" type="text"value="<?php echo isFormValidated() ? $admin['phone'] : $_POST['phone']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button type="submit" class="btn btn-primary">Save</button>

                      </div>
                    </div>
                  </form>
                  <?php if ($_SERVER["REQUEST_METHOD"] == 'POST') : ?>
                      <?php
                      $admin = [];
                      $admin['fullname'] = $_POST['fullname'];
                      $admin['username'] = $_POST['username'];
                      $admin['password'] = sha1($_POST['password']);
                      $admin['email'] = $_POST['email'];
                      $admin['phone'] = $_POST['phone'];

                      $admin['pass'] = $_POST['password'];

                      $result = insert_admin($admin);
                      $newadminID = mysqli_insert_id($db);
                      ?>
                  <?php endif; ?>


                </div>
              </div>
            </section>
          </div>
        </div>
        <!-- page end-->
      </section>
    </section>




    <br><br>
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