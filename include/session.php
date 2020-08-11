<?php
session_start();
 if (!isset($_SESSION['uname'])) {
        header( 'Location:../view/login.php' );
    }
else {
    $now = time(); // Checking the time now when home page starts.

    if ($now > $_SESSION['expire']) {
        unset($_SESSION['uname']);
        unset($_SESSION['fname']);
        unset($_SESSION['userid']);
        unset( $_SESSION["loginid"] );
        // session_destroy();
        header('Location:../view/login.php');
    }
}
?>