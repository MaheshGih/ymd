<?php
include('../include/session.php');
include("../model/user_model.php");
?>
<?php
$uploadOk = 1;
if(isset($_POST['getuserdata'])){
        $res = $objUserModel->GetUserDetails($_SESSION['loginid']);
        $str = $res['fname']."+";
        $str .= $res['email']."+";
        $str .= $res['mobile']."+";
        $str .= $res['loginid']."+";
        $str .= $res['accname']."+";
        $str .= $res['accno']."+";
        $str .= $res['bankname']."+";
        $str .= $res['ifsc']."+";
        $str .= $res['address1']."+";
        $str .= $res['address2']."+";
        $str .= $res['gpay']."+";
        $str .= $res['phonepe']."+";
        $str .= $res['paytm']."+";
        $str .= $res['city']."+";
        $str .= $res['state'];
        echo $str;
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
if(isset($_POST['reciverId'])){
        $res_provide_help_user = $objUserModel->GetUserDetailsById($_POST['helperid']);
        $res_get_help_user = $objUserModel->GetUserDetailsById($_POST['gethelperid']);
        $provide_help_mesage =  "You have to Provide help Rs.1,000/- ($14.2) to ".$res_provide_help_user['full_name']." (".$res_provide_help_user['login_id'].").Please Contact ".$res_provide_help_user['mobile'].".Thanking you www.ymd1000us.com";
        $get_help_message = "Hello '".$res_provide_help_user['login_id']."', You will get Help of Rs 1000/- ($14.2) from '".$res_get_help_user['full_name']."' ('".$res_get_help_user['login_id']."').Please Contact '".$res_get_help_user['mobile']."' .Thanking you www.ymd1000us.com";
        echo $provide_help_mesage."@@@@".$get_help_message;
 }
 
 if(isset($_POST['provideHelpMsg'])){
     $res_provide_help_user = $objUserModel->GetUserDetailsByUserId($_POST['helperid']);
     $res_get_help_user = $objUserModel->GetUserDetailsByUserId($_POST['gethelperid']);
     $provide_help_mesage =  "You have to Provide help Rs.1,000/- ($14.2) to ".$res_get_help_user['full_name']." (".$res_get_help_user['login_id'].").Please Contact ".$res_get_help_user['mobile'].".Thanking you www.ymd1000us.com";
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
?>
