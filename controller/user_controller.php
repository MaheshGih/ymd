<?php
include('../include/session.php');
include("../model/login_model.php");
include('../model/withdraw_model.php');

?>
<?php
$uploadOk = 1;
if(isset($_POST['getuserdata'])){
        $res = $objUserModel->GetUserDetails($_SESSION['loginid']);
        echo json_encode($res);
}

if(isset($_POST['btnSearchUserData'])){
    $res = $objUserModel->GetUserDetailsByLoginId($_POST['loginId']);
    echo json_encode($res);
}

if(isset($_POST['btnMobileUpdateOtpValidate'])){
    $otp = $_POST['otp'];
    $loginId = $_POST['txtLoginId'];
    $mobile = $_POST['txtMobile'];
    $res = $objUserModel->validateOTP($loginId, $otp);
    if($res){
        $res = $objUserModel->UpdateMobile($loginId,$mobile);
        $objSMS->sendMobileUpdated($mobile, $loginId);
        if($res){
            echo "<script> location.href='../view/users.php?=success=updatemobile';</script>";
        }else{
            echo "<script> location.href='../view/users.php?=failure=updatemobile';</script>";
        }
    }else{
        echo "<script> location.href='../view/mobileupdate_otp.php?=failure=mobileOtpValidate';</script>";
    }
    
}

if(isset($_POST['btnEditMobile'])){
    //$res = $objUserModel->UpdateMobile($_POST['txtLoginId'],$_POST['txtMobile']);
    $loginId = $_POST['txtLoginId'];
    $mobile = $_POST['txtMobile'];
    $full_name = $_POST['txtUserName'];
    $email= $_POST['txtEmail'];
    
    $res = $objUserModel->UpdateUserDetails($loginId, $mobile, $full_name, $email);
    $sms = $objSMS->sendUpdatedUserDetails($mobile, $loginId);
    
    if($res){
        echo "<script> location.href='../view/users.php?=success=updatemobile';</script>";
    }else{
        echo "<script> location.href='../view/users.php?=failure=updatemobile';</script>";
    }
}

if(isset($_POST['btnSendInvitation'])){
    $provide_help = $_POST['txtProvideHelp'];
    $msg = $_POST['txtMessage'];    //Message Here
    $url = "http://smslogin.mobi/spanelv2/api.php?username=donatesms&password=Donate@2020&to=".trim($_POST['provideHelpMobile'])."&from=DONATE&message=".urlencode($msg);    //Store data into URL variable
    $ret = file($url);    //Call Url variable by using file() function
    //print_r($ret);
    // this link is used to get delivery result
    //http://smslogin.mobi/spanelv2/api.php?username=xxxx&password=xxxx&msgid=417a3b098442ba35
    $del_url= "http://smslogin.mobi/spanelv2/api.php?username=donatesms&password=Donate@2020&msgid=".$ret[0];
    $del_ret = file($del_url);
    //print_r($del_ret);
    $rep = explode('-',$del_ret[0]);
    if($rep[1] == "Submitted;"){
        $objUserModel->setToMobile(trim($_POST['provideHelpMobile']));
        $objUserModel->setProvideHelp(trim($_POST['txtProvideHelp']));
        $objUserModel->setDate();
        $rest = $objUserModel->AddInvitation();
        if($rest){
            echo "<script> location.href='../view/invitation.php?=success=invitation';</script>";
        }else{
            echo "<script> location.href='../view/invitation.php?=failure=invitation';</script>";
        }
    }
}
if(isset($_POST['btnGetProvideHelp'])){
        // txtMessage provideHelpMobile
        $withdrawReqId = $_POST['withdrawReqId'];
        $getHelper = ["getHelpId"=>$_POST['getHelpId'], 'getHelpMobile'=> $_POST['hdnGetHelpMobile'], 'getHelpName'=> $_POST['getHelpName']];
        $provideHelper = ['provideHelpId'=> $_POST['provideHelpId'], "provideHelpMobile"=>$_POST['provideHelpMobile'], "provideHelpName"=>$_POST['provideHelpName'] ];
        $provide_help = $_POST['getHelpId'];
        $get_help_mobile = $_POST['hdnGetHelpMobile'];

        $provide_msg = $_POST['txtMessage'];    //Message Here
        $get_msg = $_POST['txtGethelpMessage'];

        $provide_url = "http://smslogin.mobi/spanelv2/api.php?username=donatesms&password=Donate@2020&to=".trim($getHelper['getHelpMobile'])."&from=DONATE&message=".urlencode($provide_msg);    //Store data into URL variable
        $provide_ret = file($provide_url);    //Call Url variable by using file() function

        // this link is used to get delivery result
        //http://smslogin.mobi/spanelv2/api.php?username=xxxx&password=xxxx&msgid=417a3b098442ba35

        $provide_del_url= "http://smslogin.mobi/spanelv2/api.php?username=donatesms&password=Donate@2020&msgid=".$provide_ret[0];
        $provide_del_ret = file($provide_del_url);
        $provide_rep = explode('-',$provide_del_ret[0]);

        if($provide_rep[1] == "Submitted;"){
            $get_url = "http://smslogin.mobi/spanelv2/api.php?username=donatesms&password=Donate@2020&to=".trim($provideHelper['provideHelpMobile'])."&from=DONATE&message=".urlencode($get_msg);    //Store data into URL variable
            $get_ret = file($get_url);
            $get_del_url =  "http://smslogin.mobi/spanelv2/api.php?username=donatesms&password=Donate@2020&msgid=".$get_ret[0];
            $get_del_ret = file($get_del_url);

            $get_rep = explode('-',$get_del_ret[0]);
            if($get_rep[1] == "Submitted;"){
                
                $rest = $objUserModel->AddUserInvitation($provideHelper,$getHelper,$withdrawReqId);
            }
            if($rest){
                    echo "<script> location.href='../view/invitation_master.php?=success=invitation';</script>";
            }else{
                    echo "<script> location.href='../view/invitation_master.php?=failure=invitation';</script>";
            }
        }
}
if(isset($_POST['btnProvideHelp'])){
    
    $phlist = $objWithdrawModel->GetProvideHelpersList();
    $gh_list = $objWithdrawModel->GetRequestHelpers();
    $ph_list  = array();
    while($r=mysqli_fetch_assoc($phlist)){
        array_push($ph_list,$r);
    }
    $gh_send_list = array();
    foreach ($gh_list as $gh_key=>$gh_row){
        if(empty($ph_list)){
            break;
        }
        $req_invs = $gh_row['req_invs'];
        $ph_rows = [];
        foreach (range(1, $req_invs) as $i) {
            if(empty($ph_list)){
                break;
            }
            $ph_row =  array_shift($ph_list);
            array_push($ph_rows,$ph_row);
        }
        $r = array_merge($gh_row,array('ph_list'=>$ph_rows));
        array_push($gh_send_list,$r);
    }
    $rest = $objUserModel->AddUserInvitations($gh_send_list);
    $rest = $objUserModel->smsSendInvitations($gh_send_list);
    echo "<script> location.href='../view/invitation_master.php?=success=invitation';</script>";
}
if(isset($_POST['reciverId'])){
        $res_provide_help_user = $objUserModel->GetUserDetailsById($_POST['helperid']);
        $res_get_help_user = $objUserModel->GetUserDetailsById($_POST['gethelperid']);
        $provide_help_mesage =  "You have to Provide help Rs.1,000/- to ".$res_provide_help_user['full_name']." (".$res_provide_help_user['login_id'].").Please Contact ".$res_provide_help_user['mobile'].".Thanking you www.ymd1000us.com";
        $get_help_message = "Hello '".$res_provide_help_user['login_id']."', You will get Help of Rs 1000/- ($14.2) from '".$res_get_help_user['full_name']."' ('".$res_get_help_user['login_id']."').Please Contact '".$res_get_help_user['mobile']."' .Thanking you www.ymd1000us.com";
        echo $provide_help_mesage."@@@@".$get_help_message;
 }
 
 if(isset($_POST['provideHelpMsg'])){
     $res_provide_help_user = $objUserModel->GetUserDetailsByUserId($_POST['helperid']);
     $res_get_help_user = $objUserModel->GetUserDetailsByUserId($_POST['gethelperid']);
     $provide_help_mesage =  "You have to Provide help Rs.1,000/- to ".$res_get_help_user['full_name']." (".$res_get_help_user['login_id'].").Please Contact ".$res_get_help_user['mobile'].".Thanking you www.ymd1000us.com";
     $get_help_message = "Hello '".$res_get_help_user['login_id']."', You will get Help of Rs 1000/- ($14.2) from '".$res_provide_help_user['full_name']."' ('".$res_provide_help_user['login_id']."').Please Contact '".$res_provide_help_user['mobile']."' .Thanking you www.ymd1000us.com";
     echo $provide_help_mesage."@@@@".$get_help_message;
 }
 
 if(isset($_POST['loginid'])){
        $res_conc = $objUserModel->GetPopUpDetails($_POST['loginid']);
        $exp_res = explode('-',$res_conc);
        $str_pop = "";
        $str_pop .= $exp_res[0]."-";
        $str_pop .= $exp_res[1]."-";
        $str_pop .= $exp_res[2];
        echo $str_pop;
}

if(isset($_POST['changePasswordBtn'])){
    $res = $objUserModel->isPasswordValid($_POST['loginId'],$_POST['oldPassword']);
    if(!$res || $res['cnt']==0){
        echo "<script> location.href='../view/changepassword.php?=failure=invalid_oldpassword';</script>";
        return;
    }
    $res = $objUserModel->changePassword($_POST['loginId'],$_POST['password']);
    if($res){
        echo "<script> location.href='../view/changepassword.php?=success=changepassword';</script>";
    }else{
        echo "<script> location.href='../view/changepassword.php?=failure=changepassword';</script>";
    }
}

if(isset($_GET['forgot_txn_passsword'])){
    $user = $objUserModel->GetUserDetailsById($_SESSION['userid']);
    $res = $objSMS->sendForgotTxnPassword($user['mobile'], $user['txn_password'], $user['login_id']);
    return $res;
}

if(isset($_POST['changeTxnPasswordBtn'])){
    $res = $objUserModel->changeTxnPassword($_SESSION['userid'],$_POST['oldTxnPassword'], $_POST['txnPassword']);
    if($res){
        echo "<script> location.href='../view/changepassword.php?=success=txn-changepassword';</script>";
    }else{
        echo "<script> location.href='../view/changepassword.php?=failure=txn-changepassword';</script>";
    }
}

if(isset($_POST['forgotTxnPassOTPSendBtn'])){    
    $mobile = $_POST['mobile'];
    $loginId = $_SESSION['loginid'];
    $res = $objLoginModel->IsUserExist($loginId,$mobile);
    if($res){
        $otp = $objUtilModel->generateOTP();
        $objSMS->sendForgotTxnPasswordOTP($mobile, $otp, $loginId);
        $res = $objUserModel->updateUserOTP($loginId,$otp);
        $mobileEnd = substr($mobile, -3);
        $smsmsg = 'We have send an OTP to your registered mobile number *******'.$mobileEnd.' for Verification';
        echo "<script> location.href='../view/forgot_txn_password_otp.php?success=OTPValidate&msg=".$smsmsg."';</script>";
    }else{
        echo "<script> location.href='../view/forgot_txn_password.php?=failure=invalid';</script>";
    }
}

if(isset($_POST['forgotTxnPassOTPValidateBtn'])){
    $otp = $_POST['otp'];
    $loginId = $_SESSION['loginid'];
    $res = $objUserModel->validateOTP($loginId, $otp);
    if($res){
        $msg = "OTP verified successfully.";
        echo "<script> location.href='../view/reset_forgot_txn_password.php?success=OTPValidated&msg=".$msg."&login_id=".$loginId."';</script>";
    }else{
        $msg = "Invalid otp.";
        echo "<script> location.href='../view/forgot_txn_password_otp.php?failure=OTPValidationFailed&msg=".$msg."';</script>";
    }
}

if(isset($_POST['resetTxnPasswordBtn'])){
    $res = $objUserModel->resetTxnPassword($_SESSION['loginid'],$_POST['txnPassword']);
    if($res){
        echo "<script> location.href='../view/reset_forgot_txn_password.php?=success=resettxnpassword';</script>";
    }else{
        echo "<script> location.href='../view/reset_forgot_txn_password.php?=failure=resettxnpassword';</script>";
    }
}

if(isset($_POST['hdnBlockUsers'])){
    $userIds = $_POST['userIds'];
    $loginIds = explode(",",$userIds);
    $res = $objUserModel->blockUser($loginIds);
    if($res){
        echo "<script> location.href='../view/inactive_users_admin.php?success=block&expiryTime=".$_POST['expiryTime']."';</script>";
    }else{
        echo "<script> location.href='../view/inactive_users_admin.php?failure=block&expiryTime=".$_POST['expiryTime']."';</script>";
    }
}


?>
