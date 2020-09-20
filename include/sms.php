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
        $msg = "Dear ".$loginId.", your Otp is ".$otp." for Reset Tranaction password. Thank you for joining us.Visit www.ymdonate.us/login/";    //Message Here
        $res = self::sendSms($mobile, $msg);
        return $res;
    }
    
    public function sendUpdateMobileOTP($mobile,$otp,$loginId){
        $msg = "Dear ".$loginId.", your Otp is ".$otp." for update mobile number. Thank you for joining us.Visit www.ymdonate.us/login/";    //Message Here
        $res = self::sendSms($mobile, $msg);
        return $res;
    }
    
    public function sendMobileUpdated($mobile,$loginId){
        $msg = "Dear ".$loginId.", your new mobile number ".$mobile." verified and updated successfully. Thank you for joining us.Visit www.ymdonate.us/login/";    //Message Here
        $res = self::sendSms($mobile, $msg);
        return $res;
    }
}
$objSMS = new SMS();
?>