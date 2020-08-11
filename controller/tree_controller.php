<?php
include("../model/login_model.php");
?>
<?php
if(isset($_POST['txtFirstName'])){
    $objLoginModel->setName($_POST['txtFirstName']);
    $objLoginModel->setEmail($_POST['txtEmail']);
    $objLoginModel->setMobile($_POST['txtMobile']);
    $spons_res = $objLoginModel->GetUserById($_POST['txtSponsorId']);
    $objLoginModel->setSponsorId(($spons_res['id']=="")?0:$spons_res['id']);
   // $objLoginModel->setSide($_POST['ddlSide']);
    $objLoginModel->setSide($_POST['hdnSide']);
    $objLoginModel->setSpillId($_POST['hdnSpillId']);
    $objLoginModel->setUserId($_POST['txtUserId']);
    $objLoginModel->setPassword($_POST['txtPassword']);
    $objLoginModel->setDate();
    $res = $objLoginModel->AddUserBasic();
    if($res){
        $msg = "Congratulations ! ".$_POST['txtFirstName'].". Thank you for joining us.Your Login Id is ".$_POST['txtUserId'].". and Password is ".$_POST['txtPassword']." Visit www.ymdonate.us";    //Message Here
        $url = "http://smslogin.mobi/spanelv2/api.php?username=donatesms&password=Donate@2020&to=".$_POST['txtMobile']."&from=DONATE&message=".urlencode($msg);    //Store data into URL variable
        $ret = file($url);    //Call Url variable by using file() function
       // print_r($ret);    //$ret stores the msg-id
        echo "<script> location.href='../view/tree.php?=success=insert';</script>";
    }else{
        echo "<script> location.href='../view/tree.php?=failure=insert';</script>";
    }
}

?>