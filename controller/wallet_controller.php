<?php
include('../include/session.php');
include("../model/user_model.php");
include("../model/withdraw_model.php");
?>
<?php 
if(isset($_POST['withdrawReqBtn'])){
    $withdrawAmount = $_POST['withdrawAmount'];
    $wallet = $objWalletContactModel->GetWalletByUserId($_SESSION['userid']);
    $totPendingAmnt = $objWalletContactModel->GetTotPendingWithdrawAmntByUserId($_SESSION['userid']);
    
    $err = false;
    $msg = '';
    if( !($withdrawAmount) || ($withdrawAmount % $help_amount != 0) ){
        $err = true;
        $msg = 'Withdraw amount should be multiples of 1000 (i.e 1000, 2000, 3000,..)';
    }else if($wallet['total_amount'] < $withdrawAmount ){
        $err = true;
        $msg = 'Insufficient fund to withdraw!';
    }
    $tot_pending_amnt = $totPendingAmnt['tot_with'] - $totPendingAmnt['tot_rec'];
    $afterBal = $wallet['total_amount'] - $tot_pending_amnt - $withdrawAmount;
    
    if($afterBal < 0 ){
        $err = true;
        $msg = 'Insufficient fund to withdraw!. Already have pending withdrawls.';
    }
    
    if($err){
        echo "<script> location.href='../view/wallet.php?=failure=addrequest=msg=".$msg."';</script>";
        return true;
    }
    
    $res = $objUserModel->isTxnPasswordValid($_SESSION['loginid'],$_POST['txnPassword']);
    if($res['cnt']>0){
        $objWithdrawModel->setAmountReceived(0);
        $objWithdrawModel->setAmountReq($_POST['withdrawAmount']);
        $objWithdrawModel->setDateReceived(null);
        $objWithdrawModel->setDateReq();
        $objWithdrawModel->setFullName($_SESSION["fname"]);
        $objWithdrawModel->setIsDone(false);
        $objWithdrawModel->setMobile($_SESSION['mobile']);
        $objWithdrawModel->setUserId($_SESSION['userid']);
        //$objWithdrawModel->setId($_POST['withdrawReqId']);
        $res = $objWithdrawModel->addWithdrawReq();
        if($res){
            echo "<script> location.href='../view/wallet.php?=success=addrequest';</script>";
        }else{
            echo "<script> location.href='../view/wallet.php?=failure=addrequest';</script>";
        }
    }else{
        echo "<script> location.href='../view/wallet.php?=failure=invalidtxnpassword';</script>";
    }
    
}
?>