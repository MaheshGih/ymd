<?php
    $con = "";
    $server ="localhost";
    $user = "root";
    $pwd = "Quad@access";
    $db ="ymd";
    
    $con = mysqli_connect($server,$user,$pwd,$db);
    if(mysqli_connect_errno()){
        die("Connection failed due to : ".mysqli_connect_error());
    }
    
?>