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
            $_SESSION['role'] = $details['role'];
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (1440* 60);
            
            $page = "index.php";
            if($_SESSION['role']=='ROLE_USER'){
                $page="index_user.php";
                //$_SESSION['expired_date'] = $details['expired_date'];
                $exp = $objUtilModel->formatStrDate($details['expired_date'], $objUtilModel->date_format);
                $cur_date = $objUtilModel->getCurDate($objUtilModel->date_format);
                
                $cur_date = date_create($cur_date);
                $exp = date_create($exp);
                
                $diff = date_diff($exp,$cur_date );
                $_SESSION['expiredin'] = $diff->format("%r%a days");
                
            }else if($_SESSION['role']=='ROLE_ADMIN'){
                $page="index_user.php";
            }else if($_SESSION['role']=='ROLE_EMP'){
                $page="index_user.php";
            }
            echo "<script> location.href='../view/".$page."?=success=login';</script>";
        }else{
            echo "<script> location.href='../view/login.php?=failure=login';</script>";
        }
    }
    if(isset($_POST['btnForgotPwd'])){
        //txtRegMobile txtLogId
        $mobile = $_POST['txtRegMobile'];
        $login_id = $_POST['txtLogId'];
        $res = $objLoginModel->IsUserExist($login_id,$_POST['txtRegMobile']);
        if($res){
            $otp = $objLoginModel->generateOTP();
            $msg = "Dear ".$_POST['txtLogId'].", your Otp is ".$otp." for Reset password. Thank you for joining us.Visit www.ymdonate.us/login/";    //Message Here
            $url = "http://smslogin.mobi/spanelv2/api.php?username=donatesms&password=Donate@2020&to=".$mobile."&from=DONATE&message=".urlencode($msg);    //Store data into URL variable
            $ret = file($url);    //Call Url variable by using file() function
            //print_r($ret);    //$ret stores the msg-id
            $objUserModel->updateUserOTP($login_id,$otp);
            $mobileEnd = substr($mobile, -3);
            $smsmsg = 'We have send an OTP to your registered mobile number *******'.$mobileEnd.' for Verification';
            
            echo "<script> location.href='../view/otp_validate.php?success=OTPValidate&msg=".$smsmsg."&mobile=".$mobile."&login_id=".$login_id."';</script>";
            
        }else{
            echo "<script> location.href='../view/forgot_password.php?=failure=invalid';</script>";
        }
    }
    
    if(isset($_POST['btnOTPValidate'])){
        $login_id = $_POST['otpLoginId'];
        $res = $objUserModel->validateOTP($login_id, $_POST['otp']);
        if($res){
            $msg = "OTP verified successfully.";
            echo "<script> location.href='../view/reset_password.php?success=OTPValidated&msg=".$msg."&login_id=".$login_id."';</script>";
        }else{
            $msg = "OTP validation failed.";
            echo "<script> location.href='../view/otp_validate.php?=failure=OTPValidationFailed=msg=".$msg."';</script>";
        }
    }
    
    if(isset($_POST['resetPasswordBtn'])){
        $res = $objUserModel->changePassword($_POST['txtLogId'],$_POST['password']);
        if($res){
            echo "<script> location.href='../view/login.php?=success=resetpassword';</script>";
        }else{
            echo "<script> location.href='../view/login.php?=failure=resetpassword';</script>";
        }
    }
    
?>