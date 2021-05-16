<?php
require_once('DatabaseAdmin.php');
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

  <title>Index Admin</title>

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

    <?php include_once('../header.php'); ?>

    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-user-o"></i>Admin</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="../home.php">Home</a></li>
              <li><i class="icon_document_alt"></i>Table</li>
              <li><i class="fa fa-files-o"></i>Index Admin</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th><i class="icon_profile"></i> User Name</th>
                    <th><i class="icon_calendar"></i> Password</th>
                    <th><i class="icon_mail_alt"></i> Full Name</th>

                    <th><i class="icon_mobile"></i> Phone</th>
                    <th><i class="icon_pin_alt"></i> email</th>
                  </tr>
                  <?php
                  $admin_set = find_all_admin();
                  $count = mysqli_num_rows($admin_set);
                  for ($i = 0; $i < $count; $i++) :
                    $admin = mysqli_fetch_assoc($admin_set);
                  ?>
                    <tr>
                      <td><?php echo $admin['username']; ?></td>
                      <td><?php echo $admin['password']; ?></td>
                      <td><?php echo $admin['fullname']; ?></td>
                      <td><?php echo $admin['phone']; ?></td>
                      <td><?php echo $admin['email']; ?></td>
                      <td>
                        <div class="btn-group">
                          <a class="btn btn-primary" href="NewAdmin.php"><i class="icon_plus_alt2"></i></a>
                          <a class="btn btn-success" href="<?php echo 'EditRYAN.php?username=' . $admin['username']; ?>"><i class="icon_check_alt2"></i></a>
                          <a class="btn btn-danger" href="<?php echo 'DeleteRYAN.php?username=' . $admin['username']; ?>"><i class="icon_close_alt2"></i></a>
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
    </section>

  </section>

  <!-- javascripts -->
  <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="../js/jquery.scrollTo.min.js"></script>
  <script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- jquery validate js -->
  <script type="text/javascript" src="../js/jquery.validate.min.js"></script>

  <!-- custom form validation script for this page-->
  <script src="../js/form-validation-script.js"></script>
  <!--custome script for all page-->
  <script src="../js/scripts.js"></script>


</body>

</html>
<?php
db_disconnect($db);
?>