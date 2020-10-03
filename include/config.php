<?php
    //local
    $con = "";
    $server ="localhost";
    $user = "root";
    $pwd = "Quad@access";
    $db ="ymd";
    
    //Server 
    /* $server ="166.62.28.113";
    $user = "ymd_new";
    $pwd = "#Veera123";
    $db ="ymd_new"; */
    
    
    $con = mysqli_connect($server,$user,$pwd,$db);
    if(mysqli_connect_errno()){
        die("Connection failed due to : ".mysqli_connect_error());
    }
    
    $help_amount = 1000; // Help amount to provide for registration complete
    $help_commission = $help_amount * 10/100; // 10% of commission will add wellet to 3 level of parents(immediate parrent(10%),sponsor(10%),sponsors_sponsor(10%))
    $help_exp_time = 48;
    $inactive_user_exp_time = 48;
    $user_block_penalty = -200;
    $royalty_amnt = 500; // every month roaylty user can get 
    $housefull_amount = 1000; //after house full he will get
    $housefull_in_days = 4; // today + 4days back
    $housefull_size = 10;
    $royalty_points=12; //12 months
    $user_expired_in_months = 12;
    
    $BASE_URL = "http://localhost/ymd/";
?>