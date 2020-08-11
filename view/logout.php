<?php
session_start();
unset($_SESSION['uname']);
unset($_SESSION['fname']);
session_destroy();
header('Location:login.php');
?>