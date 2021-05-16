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
    <link rel="shortcut icon" href="img/ronaldo.jpg">

    <title>Login Page </title>

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
        .login-img3-body {

            background: url('../img/bg-2.jpg') no-repeat center center fixed;

            -webkit-background-size: cover;
            /*hỗ trợ cho chrome*/

            -moz-background-size: cover;
            /*hỗ trợ cho firefox*/

            -o-background-size: cover;
            /*hỗ trợ cho opera*/

            background-size: cover;
        }

        .login-form {

            max-width: 350px;

            margin: 100px auto 0;

            background: #d5d7de;

        }
    </style>

</head>

<body class="login-img3-body">
    <div class="container ">

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" id="formSignUp" class="form-validate login-form form-horizontal " method="post">
            <div class="login-wrap">
                <p class="login-img"><i class="icon_lock_alt"></i></p>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <input class=" form-control" required pattern="^[A-Za-z ]+$" title="Chỉ được phép có chữ và khoảng trắng" placeholder="Full Name" id="fullname" name="fullname" type="text">
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input class="form-control " required pattern="^[a-zA-Z0-9]+$" placeholder="User Name" title="Chỉ có thể có chữ và số" id="username" name="username" type="text">
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                    <input class="form-control " required placeholder="Password" id="password" name="password" type="password" name="password" type="password" />
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                    <input class="form-control " required placeholder="Confirm Password" id="confirm_password" name="confirm_password" type="password" />
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input class="form-control " required placeholder="Email" id="email" name="email" type="text">
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input class="form-control " required placeholder="Phone Number" id="phone" name="phone" type="text">
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Sign Up</button>
                <a class="sign_up" href="./login.php"><img style="width: 100%; height: 100%;" src="../img/login.png" onmouseover="this.src='../img/loginhover.png'" onmouseout="this.src='../img/login.png'"></a>
            </div>
        </form>
    </div>
    <script>
        var password = document.getElementById("password"),
            confirm_password = document.getElementById("confirm_password");

        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords không khớp nhau");
            } else {
                confirm_password.setCustomValidity('');
                <?php
                if ($_SERVER["REQUEST_METHOD"] == 'POST') {
                    $admin = [];
                    $admin['fullname'] = $_POST['fullname'];
                    $admin['username'] = $_POST['username'];
                    $admin['password'] = sha1($_POST['password']);
                    $admin['email'] = $_POST['email'];
                    $admin['phone'] = $_POST['phone'];
                    $result = insert_admin($admin);
                    $newadminID = mysqli_insert_id($db);
                }
                ?>
            }
        }

        document.getElementById('formSignUp').addEventListener('submit', function() {
            alert('Sign Up Success. Please return to the login page');
        })


        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
</body>

</html>