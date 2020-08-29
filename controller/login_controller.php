<?php
    include("../model/login_model.php");
?>
<?php
   
    if(isset($_POST['txtLoginId'])){
        session_start();
        $res = $objLoginModel->CheckLogin($_POST['txtLoginId'],$_POST['txtLogPassword']);
        if($res>0){
            $details = $objLoginModel->GetLogUserDetails($_POST['txtLoginId']);
            $_SESSION["uname"] = $details['sponsorid'];  
            $_SESSION["loginid"] = $_POST['txtLoginId'];  
            $_SESSION["fname"] = $details['fname'];  
            $_SESSION['userid'] = $details['userid'];
            $_SESSION['mobile'] = $details['mobile'];
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (1440* 60);
            echo "<script> location.href='../view/index.php?=success=login';</script>";
        }else{
            echo "<script> location.href='../view/login.php?=failure=login';</script>";
        }
    }
    if(isset($_POST['btnForgotPwd'])){
        //txtRegMobile txtLogId
        $res = $objLoginModel->ForgotPassword($_POST['txtLogId'],$_POST['txtRegMobile']);
        if($res != "invalid"){
                $msg = "Dear ".$_POST['txtLogId'].", your login password is ".$res." Thank you for joining us.Visit www.ymdonate.us/login/";    //Message Here
                $url = "http://smslogin.mobi/spanelv2/api.php?username=donatesms&password=Donate@2020&to=".$_POST['txtRegMobile']."&from=DONATE&message=".urlencode($msg);    //Store data into URL variable
                $ret = file($url);    //Call Url variable by using file() function
                print_r($ret);    //$ret stores the msg-id
        }
    }

?>