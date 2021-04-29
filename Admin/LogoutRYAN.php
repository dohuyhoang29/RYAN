<?php 
require_once('../initialize.php');

unset($_SESSION['username']);

redirect_to('../login.php');
exit;

?>