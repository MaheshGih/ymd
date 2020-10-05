<?php
    include("../model/login_model.php");
?>
<?php
   
    if(isset($_POST['txtLoginId'])){
        session_start();
        $res = $objLoginModel->CheckLogin($_POST['txtLoginId'],$_POST['txtLogPassword']);
        if($res>0){
            $details = $objLoginModel->GetLogUserDetails($_POST['txtLoginId']);
            if($details['role']=='ROLE_USER'){
                if($details['is_active']){
                    //$_SESSION['expired_date'] = $details['expired_date'];
                    $exp = $objUtilModel->formatStrDate($details['expired_date'], $objUtilModel->date_format);
                    $cur_date = $objUtilModel->getCurDate($objUtilModel->date_format);
                    
                    $cur_date = date_create($cur_date);
                    $exp = date_create($exp);
                    
                    $diff = date_diff($exp,$cur_date );
                    $_SESSION['expiredin'] = $diff->format("%r%a days");
                    
                }else{
                    
                    $date_created = $details['date_created'];
                    //date("Y-m-d H:i:s", strtotime($date_created,strtotime('+5 hours')));
                    $cur_date = $objUtilModel->getCurDate($objUtilModel->datetime_format);
                    $diff = strtotime($cur_date) - strtotime($date_created);
                    $hours = $diff/3600;
                    $hourdiff = round($hours, 2);
                    $expTime = 0;
                    if($hourdiff<$inactive_user_exp_time){
                        $expTime = $inactive_user_exp_time - $hourdiff;
                    }else{
                        echo "<script> location.href='../view/login.php?=failure=account_expired';</script>";
                        return;
                    }
                    $_SESSION['expiredin'] = $expTime.' Hours';
                    $_SESSION['expTime'] = $expTime;
                }
                
            }
            if($details['is_active']){
                $_SESSION['profileUrl'] = '../assets/images/man.png';
            }else{
                $_SESSION['profileUrl'] = '../assets/images/maninactive.png';
            }
            $_SESSION["uname"] = $details['sponsorid'];  
            $_SESSION["loginid"] = $details['login_id'];  
            $_SESSION["fname"] = $details['fname'];  
            $_SESSION['userid'] = $details['userid'];
            $_SESSION['mobile'] = $details['mobile'];
            $_SESSION['role'] = $details['role'];
            $_SESSION['kyc_done'] = $details['kyc_done'];
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (1440* 60);
            $user_lvl = $objUserModel->GetLevelById($details['lvl_id']);
            $_SESSION['lvl_name'] = $user_lvl['level_name'];
            
            echo "<script> location.href='../view/index.php?=success=login';</script>";
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
        $mobile = $_POST['otpMobile'];
        $res = $objUserModel->validateOTP($login_id, $_POST['otp']);
        if($res){
            $msg = "OTP verified successfully.";
            echo "<script> location.href='../view/reset_password.php?success=OTPValidated&msg=".$msg."&login_id=".$login_id."';</script>";
        }else{
            $msg = "OTP validation failed.";
            echo "<script> location.href='../view/otp_validate.php?failure=OTPValidationFailed&msg=".$msg."&mobile=".$mobile."&login_id=".$login_id."';</script>";
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
    
    if(isset($_GET['forgot_passsword'])){
        $res = array( "status" => "success", "msg" => "");
        $user = $objUserModel->GetUserDetails($_GET['login_id']);
        if(!$user){
         $res['status'] = "invalid_id";
         $res['msg'] = "Please enter a valid login id";
        }else{
            $sms = $objSMS->sendForgotPassword($user['mobile'], $user['password'], $user['login_id']);
            if($sms){
                $res['status'] = "success";
                $res['msg'] = "Password send as sms successfully";
            }else{
                $res['status'] = "failure";
                $res['msg'] = "Password send as sms failed";
            }
        }
                
        echo json_encode($res);
    }
    
?>