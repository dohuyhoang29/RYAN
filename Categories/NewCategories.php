<?php
require_once('DatabaseCategories.php');
require_once('../initialize.php');

$error = [];

function isFormValidated(){
  global $error;

  return count($error) == 0;
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(empty($_POST['name'])){
    $error[] = '';
  }
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

  <title>New Categories</title>

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

</head>

<body>

  <section id="container" class="">

<<<<<<< HEAD
    <?php include_once('../header.php'); ?>
=======
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
              <li><a class="" href="../Pictures/IndexPicture.php">Pictures</a></li>
              <li><a class="" href="IndexCategories.php">Categories</a></li>
            </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
>>>>>>> 93f67a27f17e7550a0ae0d311573f193d6ef3a6c

    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-user-o"></i> Form Categories</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="../home.php">Home</a></li>
              <li><i class="icon_document_alt"></i>Forms</li>
              <li><i class="fa fa-files-o"></i>New Categories</li>
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
                  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" onsubmit="return isFormValidation();" class="form-validate form-horizontal " id="register_form" method="post">
                    <div class="form-group ">
                      <?php if ($_SERVER["REQUEST_METHOD"] == 'POST') : ?>
                        <?php
                        $categories = [];
                        $categories['name'] = $_POST['name'];

                        $result = insert_categories($categories);
                        $NewcategoriesID = mysqli_insert_id($db);

                        ?>
                      <?php endif; ?>
                      <label for="fullname" class="control-label col-lg-2">Name <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="name" name="name" type="text" />
                        <span id="errorName"></span>
                      </div>
                    </div>
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

    </section>
  </section>

  </section>


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
  
  <script>
    var name = document.getElementById('name').value;

    function isFormValidation(){
      if(name == ''){
        document.getElementById('errorName').innerHTML = 'Name cannot be left blank';
        document.getElementById('errorName').style.color = 'red';
        document.getElementById('name').style.border = '1px solid red';
      } else {
        document.getElementById('errorName').innerHTML = '';
        document.getElementById('name').style.border = '1px solid #ceced2';
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