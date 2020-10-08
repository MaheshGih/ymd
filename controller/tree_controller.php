<?php
include("../model/login_model.php");
?>
<?php
if(isset($_POST['hdnSignupBtn'])){
    $spillId = $_POST['hdnSpillId'];
    $side = $_POST['ddlSide'];
    $spillUsers = $objLoginModel->GetUsersBySpillId($spillId);
    $cnt = 0;
    
    while($r=mysqli_fetch_assoc($spillUsers)){
        $cnt=$cnt+1;
        if($cnt>=2){
            echo "<script> location.href='../view/tree.php?=failure=insert';</script>";
            return;
        }else if($side == $r['side']){
            echo "<script> location.href='../view/tree.php?=failure=insert';</script>";
            return;
        }
    }
    
    $full_name = $_POST['txtFirstName'];
    $objLoginModel->setName($full_name);
    $objLoginModel->setEmail($_POST['txtEmail']);
    $mobile = $_POST['txtMobile'];
    $objLoginModel->setMobile($mobile);
    $objLoginModel->setTxnPassword($_POST['txnPassword']);
    $spons_res = $objLoginModel->GetUserById($_POST['txtSponsorId']);
    $objLoginModel->setSponsorId(($spons_res['id']=="")?0:$spons_res['id']);
    $objLoginModel->setSide($side);
    $objLoginModel->setSpillId($spillId);
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
        echo "<script> location.href='../view/tree_reg_otp_validate.php?status=success&from=tree&type=OTPValidate&msg=".$msg."&mobile=".$mobile."&login_id=".$login_id."';</script>";
    }else{
        echo "<script> location.href='../view/tree.php?=failure=insert';</script>";
    }
}
if(isset($_GET['send_reg_verify_otp'])){
    $user_id = $_GET['user_id'];
    $full_name = $_GET['full_name'];
    $login_id = $_GET['login_id'];
    $mobile = $_GET['mobile'];
    
    $objUserModel->sendRegOtpAndUpdate($mobile, $full_name, $login_id);
    $msg = $objSMS->getMobileEndDigitMsg($mobile);
    echo "<script> location.href='../view/tree_reg_otp_validate.php?status=success&from=send_reg_verify_otp&type=OTPValidate&msg=".$msg."&mobile=".$mobile."&login_id=".$login_id."';</script>";
    
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
        $tree_data = $objUserModel->GetUserTreeAndChildCount($sponsor_id);
        /* $data = array();
        while($row = $tree_data->fetch_assoc()) {
            array_push($data,$row);
        } */
        
        //To-do
        /* foreach($data as $r){
            $id = $r['id'];
            $l = '';
            $r = '';
            foreach($data as $cr){
                if($id==$cr['spill_id']&& $cr['side'] == 'left'){
                   $l = 'left';
                }else if($id==$cr['spill_id']&& $cr['side'] == 'right'){
                   $r = 'right'; 
                }
                if(!empty($l) && !empty($r)){
                    break;
                }
            }
        } */
        $masterLR = array("lsize" => $tree_data['master_lsize'], "rsize" => $tree_data['master_rsize']);
        $user = array_merge($user, $masterLR);
        $res = array("master"=>$user,"tree"=>$tree_data['users']);
        
        // set response code - 200 OK
        http_response_code(200);
        $res = json_encode($res);
    }else {
        $res='';
    }
    
    echo $res;
}

if(isset($_POST['btnOTPValidate'])){
    $login_id = $_POST['otpLoginId'];
    $otpFrom = $_POST['otpFrom'];
    $mobile = $_POST['otpMobile'];
    $res = $objUserModel->validateRegOTP($_POST['otpLoginId'], $_POST['otp']);
    if($res){
        $user = $objUserModel->GetUserDetails($_POST['otpLoginId']);
        $objSMS->sendWelcomeMsg($user['mobile'], $login_id, $user['full_name'], $user['password'], $user['txn_password']);
        $msg = "Registion done successfully.";
        if($otpFrom == 'tree'){
            echo "<script> location.href='../view/tree.php?=success=OTPValidated=msg=".$msg."';</script>";
        }else if($otpFrom == 'send_reg_verify_otp'){
            echo "<script> location.href='../view/inactive_users.php?=success=OTPValidated=msg=".$msg."';</script>";
        }
        
    }else{
        $msg = "Invalid OTP!.";
        if($otpFrom == 'tree'){            
            echo "<script> location.href='../view/tree_reg_otp_validate.php?status=failure&from=tree&type=OTPValidate&msg=".$msg."&mobile=".$mobile."&login_id=".$login_id."';</script>";
        }else if($otpFrom == 'send_reg_verify_otp'){
            echo "<script> location.href='../view/tree_reg_otp_validate.php?status=failure&from=send_reg_verify_otp&type=OTPValidate&msg=".$msg."&mobile=".$mobile."&login_id=".$login_id."';</script>";
        }
    }
}
if(isset($_POST['resendRegOtp'])){
    $mobile = $_POST['mobile'];
    $login_id = $_POST['login_id'];
    $user = $objUserModel->GetUserBasicDetailsByLoginId($login_id);
    $res = $objUserModel->sendRegOtpAndUpdate($mobile, $user['full_name'], $login_id);
    $msg = $objSMS->getResentMobileEndDigitMsg($mobile);
    if($res){
        echo $msg;
    }else{
        echo "";
    }
}
?>