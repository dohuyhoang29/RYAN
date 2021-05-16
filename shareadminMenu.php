<link rel="stylesheet" href="../RYAN_SPORT_CLUB/Bootstrap 3/css/bootstrap.min.css">
<span>
<p style="padding-top: 20px;" class="fa fa-user-o"></p>
    <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>
    &emsp;
    <a href="Admin/LogoutRYAN.php"><i class="fa fa-sign-out"></i></a>
</span>