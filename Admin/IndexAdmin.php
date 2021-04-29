<?php
    require_once('Admin/DatabaseRYAN.php');
    require_once('initialize.php');
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

  <title>Admin</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body>
<?php if(!isset($_SESSION['username'])):
  redirect_to('login.php');
  endif;?>
  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->
    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index.php" class="logo">Nice <span class="lite">Admin</span></a>
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
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="">
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
              <li><a class="" href="Pictures.php">Pictures</a></li>
            </ul>
          </li>

          

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>

    <!--main content start-->
    <section id="main-content">
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading">
              Advanced Table
            </header>

            <table class="table table-striped table-advance table-hover">
              <tbody>
                <tr>
                  <th><i class="icon_profile"></i> User Name</th>
                  <th><i class="icon_calendar"></i> Password</th>
                  <th><i class="icon_mail_alt"></i> Full Name</th>
                  <th><i class="icon_pin_alt"></i> email</th>
                  <th><i class="icon_mobile"></i> Phone</th>
                  <th><i class="icon_cogs"></i> Edit</th>
                  <th><i class="icon_cogs"></i> Delete</th>
                </tr>
                <?php
                  $admin_set = find_all_admin();
                  $count = mysqli_num_rows($admin_set);
                  for($i = 0; $i < $count; $i++):
                    $admin = mysqli_fetch_assoc($admin_set);
                ?>

                <tr>
                  <td><?php echo $admin['username'];?></td>
                  <td><?php echo $admin['pass'];?></td>
                  <td><?php echo $admin['fullname'];?></td>
                  <td><?php echo $admin['phone'];?></td>
                  <td><?php echo $admin['email'];?></td>
                  <td>
                    <div class="btn-group">
                      <a class="btn btn-primary" href="RegistrationRYAN.php"><i class="icon_plus_alt2"></i></a>
                      <a class="btn btn-success" href="<?php echo 'EditRYAN.php?username='.$admin['username']; ?>"><i class="icon_check_alt2"></i></a>
                      <a class="btn btn-danger" href="<?php echo 'DeleteRYAN.php?username='.$admin['username']; ?>"><i class="icon_close_alt2"></i></a>
                    </div>
                  </td>
                </tr>

                <?php
                  endfor;
                  mysqli_free_result($admin_set);
                ?>
                
              </tbody>
            </table>
          </section>
        </div>
      </div>
    </section>
    <!--main content end-->
  </section>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nicescroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>


</body>

</html>
<?php
    db_disconnect($db);
?>
