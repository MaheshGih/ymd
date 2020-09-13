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
    
    $help_amount=1000; // Help amount to provide for registration complete
    $help_commission = $help_amount * 10/100; // 10% of commission will add wellet to 3 level of parents(immediate parrent(10%),sponsor(10%),sponsors_sponsor(10%))
    $help_exp_time = 48;
    $user_block_penalty = -200; 
    $BASE_URL = "http://localhost/ymd/";
    
?>