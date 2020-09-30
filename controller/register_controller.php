<?php
    include("../model/login_model.php");
?>
<?php
    if(isset($_POST['getlogid'])){
        $logid =  $objLoginModel->UserIdGenerator();
        echo $logid;
    }
    if(isset($_POST['sponsorid'])){
        $res = $objLoginModel->GetUserById($_POST['sponsorid']);
        $res = json_encode($res);
        echo $res;
    }
    if(isset($_POST['mobile'])){
        $cnt = $objLoginModel->GetUserCount($_POST['mobile']);
        if($cnt>0){
            echo "Mobile is already registered.Please login or enter new Mobile number.";
        }
    }
    
    if(isset($_POST['hdnSignupBtn'])){
        $full_name = $_POST['txtFirstName'];
        $objLoginModel->setName($full_name);
        $objLoginModel->setEmail($_POST['txtEmail']);
        $mobile = $_POST['txtMobile'];
        $objLoginModel->setMobile($mobile);
        $objLoginModel->setTxnPassword($_POST['txnPassword']);
        $spons_res = $objLoginModel->GetUserById($_POST['txtSponsorId']);
        $objLoginModel->setSponsorId(($spons_res['id']=="")?0:$spons_res['id']);
        $objLoginModel->setSide($_POST['ddlSide']);
        //$objLoginModel->setSide($_POST['hdnSide']);
        $objLoginModel->setSpillId($_POST['hdnSpillId']);
        $login_id = $_POST['txtUserId'];
        $objLoginModel->setUserId($login_id);
        $objLoginModel->setPassword($_POST['txtPassword']);
        $objLoginModel->setDate();
        $vdate = $objLoginModel->getDate();
        $expr_date = $objLoginModel->getNextYearDate($vdate);
        $objLoginModel->setExpiredDate($expr_date);
        $status = $objUserModel->getStausByKey("REGISTERED");
        $objLoginModel->setStatus($status);
        
        $res = $objLoginModel->AddUserBasic();
        if($res){
            $objUserModel->sendRegOtpAndUpdate($mobile, $full_name, $login_id);
            $msg = $objSMS->getMobileEndDigitMsg($mobile);
            echo "<script> location.href='../view/reg_otp_validate.php?status=success&type=OTPValidate&msg=".$msg."&mobile=".$mobile."&login_id=".$login_id."';</script>";    
        
        }else{
            echo "<script> location.href='../view/registration.php?=failure=insert';</script>";
        }
    }
    if(isset($_POST['btnOTPValidate'])){
        $login_id = $_POST['otpLoginId'];
        $mobile = $_POST['otpMobile'];
        $res = $objUserModel->validateRegOTP($login_id, $_POST['otp']);
        if($res){
            $user = $objUserModel->GetUserDetails($login_id);
            $objSMS->sendWelcomeMsg($user['mobile'], $login_id, $user['full_name'], $user['password'],$user['txn_password']);
            $msg = "OTP verified successfully. Please login with your username and password";
            echo "<script> location.href='../view/login.php?=success=insert';</script>";
        }else{
            $msg = "Please enter a valid OTP.";
            echo "<script> location.href='../view/reg_otp_validate.php?status=failure&type=OTPValidate&msg=".$msg."&mobile=".$mobile."&login_id=".$login_id."';</script>";
        }
    }
    if(isset($_POST['txtFirstNameOld'])){
        $objLoginModel->setName($_POST['txtFirstName']);
        $objLoginModel->setEmail($_POST['txtEmail']);
        $objLoginModel->setMobile($_POST['txtMobile']);
        $spons_res = $objLoginModel->GetUserById($_POST['txtSponsorId']);
        $objLoginModel->setSponsorId(($spons_res['id']=="")?0:$spons_res['id']);
        $objLoginModel->setSide($_POST['ddlSide']);
        $objLoginModel->setUserId($_POST['txtUserId']);
        $objLoginModel->setPassword($_POST['txtPassword']);
        $objLoginModel->setDate();
        $res = $objLoginModel->AddUserBasic();
        if($res){
            $help_res = $objLoginModel->AddHelper();
            $msg = "Congratulations ! ".$_POST['txtFirstName'].". Thank you for joining us.Your Login Id is ".$_POST['txtUserId'].". and Password is ".$_POST['txtPassword']." Visit www.ymdonate.us";    //Message Here
            $url = "http://smslogin.mobi/spanelv2/api.php?username=donatesms&password=Donate@2020&to=".$_POST['txtMobile']."&from=DONATE&message=".urlencode($msg);    //Store data into URL variable
            $ret = file($url);    //Call Url variable by using file() function
            print_r($ret);    //$ret stores the msg-id
           echo "<script> location.href='../view/login.php?=success=insert';</script>";
        }else{
            echo "<script> location.href='../view/registration.php?=failure=insert';</script>";
        }
    }
    
    if(isset($_POST['txtLoginId'])){
        $res = $objLoginModel->CheckLogin($_POST['txtLoginId'],$_POST['txtLogPassword']);
        if($res>0){
            echo "<script> location.href='../view/index.php?=success=login';</script>";
        }else{
            echo "<script> location.href='../view/login.php?=failure=login';</script>";
        }
    }

?>