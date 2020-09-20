<?php
include("../model/login_model.php");
?>
<?php
if(isset($_POST['txtFirstName'])){
    $objLoginModel->setName($_POST['txtFirstName']);
    $objLoginModel->setEmail($_POST['txtEmail']);
    $mobile = $_POST['txtMobile'];
    $objLoginModel->setMobile($mobile);
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
        $otp = $objLoginModel->generateOTP();
        $smsMsg = "Congratulations ! ".$_POST['txtFirstName'].". Thank you for joining us.Your OTP is ".$otp." Login Id is ".$_POST['txtUserId'].". and Password is ".$_POST['txtPassword']." Visit www.ymdonate.us";    //Message Here
        //$url = "http://smslogin.mobi/spanelv2/api.php?username=donatesms&password=Donate@2020&to=".$_POST['txtMobile']."&from=DONATE&message=".urlencode($msg);    //Store data into URL variable
        //$ret = file($url);    //Call Url variable by using file() function
       // print_r($ret);    //$ret stores the msg-id
        $smsids = $objUserModel->sendSms($mobile, $smsMsg);
        $deliveryStatus = $objUserModel->smsDeliveryStatus($smsids[0]);
        $rep = explode('-',$deliveryStatus[0]);
        $smsmsg = '';
        
        if( strpos($rep[1] , "Delivered")!== false || strpos($rep[1] , "Submitted")!== false){
            
            $objUserModel->updateUserOTP($login_id,$otp);
            $mobileEnd = substr($mobile, -3);
            $smsmsg = 'We have send an OTP to your registered mobile number *******'.$mobileEnd.' for Verification';
        }else{
            $smsmsg = 'Sms delivering failed , Please click on resend button';
        }
        
         
        echo "<script> location.href='../view/tree.php?=success=OTPValidate=msg=".$smsmsg."=mobile=".$mobile."=login_id=".$login_id."';</script>";
    }else{
        echo "<script> location.href='../view/tree.php?=failure=insert';</script>";
    }
}
if(isset($_GET['loadspills'])){
    //$tree_data = $objUserModel->GetSponsorChilds($_GET['sponsor_id']);
    $sponsor_id = '';
    $user='';
    if(isset($_GET['login_id'])){
        $user = $objUserModel->GetUserBasicDetailsByLoginId($_GET['login_id']);
        $sponsor_id = $user['id'];
    }else if(isset($_GET['sponsor_id'])){
        $sponsor_id = $_GET['sponsor_id'];
        $user = $objUserModel->GetUserBasicDetailsById($sponsor_id);
    }
    if(!empty($sponsor_id)){
        $tree_data = $objUserModel->GetUserTree($sponsor_id);
        $data = array();
        while($row = $tree_data->fetch_assoc()) {
            array_push($data,$row);
        }
        $res = array("master"=>$user,"tree"=>$data);
        
        // set response code - 200 OK
        http_response_code(200);
        $res = json_encode($res);
    }else {
        $res='';
    }
    
    echo $res;
}

if(isset($_POST['btnOTPValidate'])){
    $res = $objUserModel->validateOTP($_POST['otpLoginId'], $_POST['otp']);
    if($res){
        $msg = "Registion done successfully.";
        echo "<script> location.href='../view/tree.php?=success=OTPValidated=msg=".$msg."';</script>";
    }else{
        $msg = "OTP validation failed.";
        echo "<script> location.href='../view/tree.php?=failure=OTPValidationFailed=msg=".$msg."';</script>";
    }
}
?>