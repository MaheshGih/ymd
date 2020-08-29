<?php
include('../include/session.php');
include("../model/user_model.php");
include("../model/withdraw_model.php");
?>
<?php 
if(isset($_POST['withdrawReqBtn'])){
    $objWithdrawModel->setAmountReceived(0);
    $objWithdrawModel->setAmountReq($_POST['withdrawAmount']);
    $objWithdrawModel->setDateReceived(null);
    $objWithdrawModel->setDateReq();
    $objWithdrawModel->setFullName($_SESSION["fname"]);
    $objWithdrawModel->setIsDone(false);
    $objWithdrawModel->setMobile($_SESSION['mobile']);
    $objWithdrawModel->setUserId($_SESSION['userid']);
    $objWithdrawModel->setId($_POST['withdrawReqId']);
    $res = $objWithdrawModel->addWithdrawReq();
    if($res){
        echo "<script> location.href='../view/wallet.php?=success=addrequest';</script>";
    }else{
        echo "<script> location.href='../view/wallet.php?=failure=addrequest';</script>";
    }
}
?>