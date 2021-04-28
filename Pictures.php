<?php
require_once('Pictures/DatabasePicture.php');
require_once('initialize.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>view Pictures</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
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
        .img{
            text-align:array_multisort;
            height: 150px;
            width: 150px;
        }
        body,html{
            height: 110%;
            margin: 0;
        }
        body{
            /* background-color: blue; */
            background-image: url("../imgs/nen1.jpg");
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

    <br><br><br>
            <table class="table table-striped table-advance table-hover">
              <tbody>
                <!-- <tr>
                  <th><i class="icon_profile"></i> Name</th>
                  <th><i class="icon_calendar"></i> URL</th>
                  <th><i class="icon_mail_alt"></i> Name_Service</th>
                  <th><i class="icon_pin_alt"></i> New</th>
                  <th><i class="icon_cogs"></i> Edit</th>
                  <th><i class="icon_cogs"></i> Delete</th>
                </tr> -->
                <?php  
                    $picture_set = find_all_picture();
                    $count = mysqli_num_rows($picture_set);
                    for ($i = 0; $i < $count; $i++):
                        $picture = mysqli_fetch_assoc($picture_set); 
                ?>
                <tr>
                    <td><?php echo $picture['Name']; ?></td>
                    <td class="img"><img class="img" src="<?php echo 'img/'.$picture['URL']; ?>"></td>
                    <td><?php echo $picture['name']; ?></td>
                  <td>
                    <div class="btn-group">
                      <a class="btn btn-primary" href="NewPicture.php"><i class="icon_plus_alt2"></i></a>
                      <a class="btn btn-success" href="<?php echo " EditPicture.php ? PictureID=".$picture['PictureID']; ?>"><i class="icon_check_alt2"></i></a>
                      <a class="btn btn-danger" href="<?php echo 'DeletePicture.php?PictureID='.$picture['PictureID']; ?>"><i class="icon_close_alt2"></i></a>
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
    <!--main content end-->
  </section>
    
<script src="../js/jquery-2.2.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
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