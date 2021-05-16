<?php

require_once('DatabaseAdmin.php');
require_once('../initialize.php');
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
  if (empty($_POST['username'])) {
    $errors[] = 'Username is required';
  }
  if (empty($_POST['password'])) {
    $errors[] = 'Password is required';
  }
}
function isFormValidated()
{
  global $errors;
  return count($errors) == 0;
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
  <link rel="shortcut icon" href="img/ronaldo.jpg">

  <title>Login </title>

  <!-- Bootstrap CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="../css/elegant-icons-style.css" rel="stylesheet" />
  <link href="../css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet" />
  <style>
    .login-img3-body{

      background: url('../img/bg-2.jpg') no-repeat center center fixed;

      -webkit-background-size: cover; /*hỗ trợ cho chrome*/

      -moz-background-size: cover;/*hỗ trợ cho firefox*/

      -o-background-size: cover;  /*hỗ trợ cho opera*/

      background-size: cover;
    }
  </style>

</head>

<body class="login-img3-body">
  <div class="container ">

    <form class="login-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control" placeholder="Username" autofocus name="username" value="<?php echo isFormValidated() ? '' : $_POST['username'] ?>">
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" placeholder="Password" name="password">
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
        <!-- <button class="btn btn-primary btn-lg btn-block" type="submit">Sign up</button> -->
        <a class="sign_up" href="./Signup.php"><img style="width: 100%; height: 100%;" src="../img/signup.png" onmouseover="this.src='../img/signup-hover.png'" onmouseout="this.src='../img/signup.png'"></a>
      </div>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == 'POST' && !isFormValidated()) : ?>
      <div class="error">
        <span> Please fix the following errors </span>
        <ul>
          <?php
          foreach ($errors as $key => $value) {
            if (!empty($value)) {
              echo '<li>', $value, '</li>';
            }
          }
          ?>
        </ul>
      </div><br><br>
    <?php endif; ?>

    <br>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == 'POST' && isFormValidated()) {
      $username = $_POST['username'];
      $Login = find_usenmae($username);
      if ($Login['Password'] === sha1($_POST['password'])) {
        $_SESSION['username'] = $username;
        redirect_to('../home.php');
        // echo "Ban Da Dang Nhap Thanh Cong";
      } else {
        echo "Username or Password wrong!";
      }
    }
    ?>

  </div>
</body>

</html>