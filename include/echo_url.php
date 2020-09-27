<?php 
    //$_URL = "http://localhost/ymd/";
    $_URL = "https://ymd.v2softwaresolutions.com/";
    //$_URL = "http://admin.ymd1000us.com/";
    $pre = "<script> location.href='";
    $suff = "';</script>";
    
    function echo_url($redi_url){
        global $_URL;
        global $pre;
        global $suff;
        
        $href = $pre.$_URL.$redi_url.$suff;
        echo $href;
    }
?>