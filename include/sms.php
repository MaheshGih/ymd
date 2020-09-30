<?php
class SMS{
    
    public function sendSms($mobile, $msg) {
        $url = "http://smslogin.mobi/spanelv2/api.php?username=donatesms&password=Donate@2020&to=".trim($mobile)."&from=DONATE&message=".urlencode($msg);    //Store data into URL variable
        $ret = file($url);    //Call Url variable by using file() function
        return $ret;
    }
    
    public function smsDeliveryStatus($smsid) {
        // this link is used to get delivery result
        //http://smslogin.mobi/spanelv2/api.php?username=xxxx&password=xxxx&msgid=417a3b098442ba35
        $del_url= "http://smslogin.mobi/spanelv2/api.php?username=donatesms&password=Donate@2020&msgid=".$smsid;
        $del_ret = file($del_url);
        return $del_ret;
    }
    
    public function sendForgotTxnPasswordOTP($mobile,$otp,$loginId){
        $msg = "Dear ".$loginId.", your Otp is ".$otp." for Reset Tranaction password. Don't share it with anyother. Visit www.ymd1000us.com";    //Message Here
        $res = self::sendSms($mobile, $msg);
        return $res;
    }
    
    public function sendForgotTxnPassword($mobile,$password,$loginId){
        $msg = "Dear ".$loginId.", your Transaction Password is '".$password."'. Don't share it with anyother. Visit www.ymd1000us.com";    //Message Here
        $res = self::sendSms($mobile, $msg);
        return $res;
    }
    
    public function sendForgotPassword($mobile,$password,$loginId){
        $msg = "Dear ".$loginId.", your Password is '".$password."'. Don't share it with anyother. Visit www.ymd1000us.com";    //Message Here
        $res = self::sendSms($mobile, $msg);
        return $res;
    }
    
    public function sendUpdateMobileOTP($mobile,$otp,$loginId){
        $msg = "Dear ".$loginId.", your Otp is ".$otp." for update mobile number. Don't share it with anyother. Visit www.ymd1000us.com";    //Message Here
        $res = self::sendSms($mobile, $msg);
        return $res;
    }
    
    public function sendUpdatedUserDetails($mobile,$loginId){
        $msg = "Dear ".$loginId.", your details updated successfully. Thank you for joining us.Visit www.ymd1000us.com";    //Message Here
        $res = self::sendSms($mobile, $msg);
        return $res;
    }
    
    public function sendRegVerificationOtp($mobile,$otp,$full_name){
        $msg = "Dear ".$full_name." your OTP is ".$otp.". Don't share it with anyother. Visit www.ymd1000us.com";    //Message Here
        $res = self::sendSms($mobile, $msg);
        return $res;
    }
    
    public function sendWelcomeMsg($mobile, $loginId, $full_name, $password, $txn_password){
        $msg = "Congratulations ! Dear ".$full_name.". Thank you for joining us.Your Login Id is ".$loginId.", Password is '".$password."' and Transaction Password is '".$txn_password."'. With in 24 hours you will receive a provide help message. After payment done your YMD account will activate.";    //Message Here
        $res = self::sendSms($mobile, $msg);
        return $res;
    }
    
    public function sendActivationMsg($mobile, $loginId, $full_name){
        $msg = "Congratulations ! Dear ".$full_name."('".$loginId."') your YMD account activated successfully. Visit www.ymd1000us.com";    //Message Here
        $res = self::sendSms($mobile, $msg);
        return $res;
    }
    
    public function getMobileEndDigitMsg($mobile){
        $mobileEnd = substr($mobile, -3);
        $msg = 'We have sent an OTP to your registered mobile number *******'.$mobileEnd.' for Verification';
        return $msg;
    }
    
    public function getResentMobileEndDigitMsg($mobile){
        $mobileEnd = substr($mobile, -3);
        $msg = 'We have resent an OTP to your registered mobile number *******'.$mobileEnd.' Please validate with latest otp';
        return $msg;
    }
}
$objSMS = new SMS();
?>