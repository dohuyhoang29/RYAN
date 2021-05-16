<?php
require_once('DatabaseAdmin.php');
require_once('../initialize.php');
$errors = [];

function isFormValidated()
{
  global $errors;
  return count($errors) == 0;
}

function checkForm()
{
  global $errors;
  $username = $_POST['username'];
  if (empty($_POST['username'])) {
    $errors[] = 'Username is required';
  }

  if (!empty($_POST['new']) && !empty($_POST['confirm'])) {
    if ($_POST['new'] == $_POST['confirm']) {
      $error[] = 'Passwords are not the same';
    }
  }

  if (!empty($_POST['username']) && find_all_admin_different($username)) {
    $error[] = 'Username must be different';
  }

  if (empty($_POST['password'])) {
    $errors[] = 'Password is required';
  }

  // if(sha1($_POST['password']) != sha1($_POST['new'])){
  //   $error[] = 'mk sai';
  // }
  // if(!sha1($_POST['password'])) {
  //   $error[] = 'mk sai';
  // }

  if (empty($_POST['new'])) {
    $errors[] = 'Password is required';
  }
  if (empty($_POST['confirm'])) {
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
  $username = $_POST['username'];
  $Login = find_usenmae($username);

  if (isFormValidated()) {
    $username = $_SESSION['editadmin'];
    $admin_set = find_admin_by_id($username);
    $admin = [];
    $admin['USE'] = $admin_set['username'];
    $admin['username'] = $_POST['username'];
    $admin['password'] = sha1($_POST['new']);
    $admin['fullname'] = $_POST['fullname'];
    $admin['email'] = $_POST['email'];
    $admin['phone'] = $_POST['phone'];

    if ($Login['Password'] === sha1($_POST['password'])) {

      Update_admin($admin);
      redirect_to('IndexAdmin.php');
    }
  }
} else { // form loaded
  if (!isset($_GET['username'])) {
    redirect_to('IndexAdmin.php');
  }
  $username = $_GET['username'];
  $_SESSION['editadmin'] = $username;
  $admin = find_admin_by_id($username);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
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

  <section id="container" class="">

  <?php include_once('../header.php'); ?>

    <br><br>
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-user-o"></i>Admin</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="../home.php">Home</a></li>
              <li><i class="icon_document_alt"></i><a href="IndexAdmin.php">Index</a></li>
              <li><i class="fa fa-files-o"></i>Edit Admin</li>
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
                  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" onsubmit="return isFormValidation();" class="form-validate form-horizontal " method="post">
                    <input type="hidden" name="username" value="<?php echo isFormValidated() ? $admin['username'] : $_POST['username']; ?>">
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2">Full name <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="fullname" name="fullname" type="text" value="<?php echo isFormValidated() ? $admin['fullname'] : $_POST['fullname']; ?>">
                        <span id="errorFullName"></span>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="username" class="control-label col-lg-2">Username <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="username" name="username" type="text" value="<?php echo isFormValidated() ? $admin['username'] : $_POST['username']; ?>">
                        <span id="errorUserName"></span>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="password" class="control-label col-lg-2">Current Password <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="password" name="password" type="">
                        <span id="errorPassword"></span>
                        <?php if($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
                          <?php
                            $username = $_POST['username'];
                            $pass = find_usenmae($username);
                          ?>
                          <?php if($pass['Password'] !== sha1($_POST['password'])): ?>
                              <span style="color: red;">The new password is not the same as the old password</span>
                          <?php endif; ?>
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="new" class="control-label col-lg-2">New Password <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="new" name="new" type="password" onkeyup='check();' />
                        <span id="errorNewPassword"></span>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="confirm" class="control-label col-lg-2">Confirm Password <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="confirm" name="confirm" type="password" onkeyup='check();' />
                        <span id='errorConfirmPassword'></span>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="email" class="control-label col-lg-2">Email <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="email" name="email" type="email" value="<?php echo isFormValidated() ? $admin['email'] : $_POST['email']; ?>">
                        <span id="errorEmail"></span>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="phone" class="control-label col-lg-2">Phone <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="phone" name="phone" type="text" value="<?php echo isFormValidated() ? $admin['phone'] : $_POST['phone']; ?>">
                        <span id="errorPhone"></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button type="submit" class="btn btn-primary">Save</button>

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

    <br><br>
 
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

    <script type="text/javascript">
      var check = function() {
        if (document.getElementById('new').value ==
          document.getElementById('confirm').value) {
          document.getElementById('errorConfirmPassword').style.color = 'blue';
          document.getElementById('errorConfirmPassword').innerHTML = '';
          document.getElementById('confirm').style.border = '1px solid #ceced2';
        } else {
          document.getElementById('errorConfirmPassword').style.color = 'red';
          document.getElementById('errorConfirmPassword').innerHTML = 'not Invalid';
          document.getElementById('confirm').style.border = '1px solid red';
        }
      }

      function matchpass() {
        var firstpassword = document.register.new.value;
        var secondpassword = document.register.confirm.value;

        if (firstpassword == secondpassword) {
          document.getElementById('errorConfirmPassword').style.color = 'blue';
          document.getElementById('errorConfirmPassword').innerHTML = 'Invalid';
          return true;
        } else {
          document.getElementById('confirm').style.border = '1px solid red';
          return false;
        }
      }

      function isFormValidation() {
        var fullName = document.getElementById('fullname').value;
        var  userName = document.getElementById('username').value;
        var  password = document.getElementById('password').value;
        var  newPassword = document.getElementById('new').value;
        var  confirmPassword = document.getElementById('confirm').value;
        var  email = document.getElementById('email').value;
        var  phone = document.getElementById('phone').value;

        if (fullName == '') {
          document.getElementById('errorFullName').innerHTML = 'Full Name cannot be left blank';
          document.getElementById('errorFullName').style.color = 'red';
          document.getElementById('fullname').style.border = '1px solid red';
        } else {
          document.getElementById('errorFullName').innerHTML = '';
          document.getElementById('fullname').style.border = '1px solid #ceced2';
        }
        if (fullName == '') {
          document.getElementById('errorUserName').innerHTML = 'User Name cannot be left blank';
          document.getElementById('errorUserName').style.color = 'red';
          document.getElementById('username').style.border = '1px solid red';
        } else {
          document.getElementById('errorUserName').innerHTML = '';
          document.getElementById('username').style.border = '1px solid #ceced2';
        }

        if (password == '') {
          document.getElementById('errorPassword').innerHTML = 'Current Password cannot be left blank';
          document.getElementById('errorPassword').style.color = 'red';
          document.getElementById('password').style.border = '1px solid red';
        } else {
          document.getElementById('errorPassword').innerHTML = '';
          document.getElementById('password').style.border = '1px solid #ceced2';
        }

        if (newPassword == '') {
          document.getElementById('errorNewPassword').innerHTML = 'New Password cannot be left blank';
          document.getElementById('errorNewPassword').style.color = 'red';
          document.getElementById('new').style.border = '1px solid red';
        } else {
          document.getElementById('errorNewPassword').innerHTML = '';
          document.getElementById('new').style.border = '1px solid #ceced2';
        }

        if (confirmPassword == '') {
          document.getElementById('errorConfirmPassword').innerHTML = 'Confirm Password cannot be left blank';
          document.getElementById('errorConfirmPassword').style.color = 'red';
          document.getElementById('confirm').style.border = '1px solid red';
        } else {
          document.getElementById('errorConfirmPassword').innerHTML = '';
          document.getElementById('confirm').style.border = '1px solid #ceced2';
        }

        if (email == '') {
          document.getElementById('errorEmail').innerHTML = 'Email cannot be left blank';
          document.getElementById('errorEmail').style.color = 'red';
          document.getElementById('email').style.border = '1px solid red';
        } else {
          document.getElementById('errorEmail').innerHTML = '';
          document.getElementById('email').style.border = '1px solid #ceced2';
        }

        if (phone == '') {
          document.getElementById('errorPhone').innerHTML = 'Phone cannot be left blank';
          document.getElementById('errorPhone').style.color = 'red';
          document.getElementById('phone').style.border = '1px solid red';
        } else {
          document.getElementById('errorPhone').innerHTML = '';
          document.getElementById('phone').style.border = '1px solid #ceced2';
        }


        if (fullName != '' && userName != '' && password != '' && newPassword != '' && confirmPassword != '' && email != '' && phone != '') {

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