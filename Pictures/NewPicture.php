<?php
require_once('DatabasePicture.php');
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

  <title></title>

  <!-- Bootstrap CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="../css/elegant-icons-style.css" rel="stylesheet" />
  <link href="../css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
</head>

<body>
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

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <!-- task notificatoin start -->
          <li id="task_notificatoin_bar" class="dropdown">

            
          <!-- alert notification end-->
          <!-- user login dropdown start-->
          <li class="dropdown">
            
            
            <li>
              <?php include('../sharesession.php'); ?> 
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
              <li><a class="" href="../Service/IndexService.php">Service</a></li>
              <li><a class="" href="IndexPicture.php">Pictures</a></li>
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
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-user-o"></i> Form Pictures</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="../home.php">Home</a></li>
              <li><i class="icon_document_alt"></i>Forms</li>
              <li><i class="fa fa-files-o"></i>New Pictures</li>
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
                  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="form-validate form-horizontal " id="register_form" method="post">
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2">Name <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="fullname" name="Name" type="text" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="username" class="control-label col-lg-2">Picture <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="username" name="URL" type="file" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="password" class="control-label col-lg-2">Sport <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select class="form-control " id="password" name="ServiceID">
                          <option value="1" <?php if (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == '1') echo 'selected' ?>>Cầu Lông</option>
                          <option value="2" <?php if (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == '2') echo 'selected' ?>>Bóng Chuyền</option>
                          <option value="3" <?php if (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == "3") echo 'selected' ?>>Bóng Rổ</option>
                          <option value="4" <?php if (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == "4") echo 'selected' ?>>Bóng Bàn</option>
                          <option value="5" <?php if (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == '5') echo 'selected' ?>>Đấu Kiếm</option>
                          <option value="6" <?php if (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == '6') echo 'selected' ?>>Đá Cầu</option>
                          <option value="7" <?php if (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == '7') echo 'selected' ?>>Bóng Đá</option>
                          <option value="8" <?php if (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == '8') echo 'selected' ?>>Quần Vợt</option>
                          <option value="9" <?php if (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == '9') echo 'selected' ?>>Nhảy xa</option>
                          <option value="10" <?php if (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == '10') echo 'selected' ?>>Bóng Chày</option>
                          <option value="11" <?php if (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == '11') echo 'selected' ?>>Điền Kinh</option>
                          <option value="12" <?php if (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == '12') echo 'selected' ?>>Bơi Lội</option>
                          <option value="13" <?php if (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == '13') echo 'selected' ?>>Food</option>
                          <option value="14" <?php if (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == '14') echo 'selected' ?>>Massage</option>
                          <option value="15" <?php if (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == '15') echo 'selected' ?>>Bi-a</option>
                          <option value="17" <?php if (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == '17') echo 'selected' ?>>Xông Hơi</option>
                          <option value="18" <?php if (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == '18') echo 'selected' ?>>Yoga</option>
                          <option value="19" <?php if (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == '19') echo 'selected' ?>>Movie</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <button class="btn btn-default" type="reset">Cancel</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </section>
          </div>
        </div>
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
  </section>
  <!-- container section end -->

  <!-- javascripts -->
  <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="../js/jquery.scrollTo.min.js"></script>
  <script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- jquery validate js -->
  <script type="text/javascript" src="js/jquery.validate.min.js"></script>

  <!-- custom form validation script for this page-->
  <script src="../js/form-validation-script.js"></script>
  <!--custome script for all page-->
  <script src="../js/scripts.js"></script>

  </form>
        <?php if ($_SERVER["REQUEST_METHOD"] == 'POST'): ?> 
        <?php 
        $picture = [];
        $picture['Name'] = $_POST['Name'];
        $picture['ServiceID'] = $_POST['ServiceID'];
        $picture['URL'] = $_POST['URL'];
        $result = insert_picture($picture);
        $newPictureID = mysqli_insert_id($db);
        ?>
    <?php endif; ?>


</body>

</html>

<?php
db_disconnect($db);
?>