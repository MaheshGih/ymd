<?php
    include('../include/session.php');
    include("../model/user_model.php");
?>
<?php
    if(isset($_POST['btnSaveAddress'])){
        // txtAdd1 txtAdd2
        $objUserModel->setAddress1($_POST['txtAdd1']);
        $objUserModel->setAddress2($_POST['txtAdd2']);
        $objUserModel->setCity($_POST['txtCity']);
        $objUserModel->setState($_POST['txtState']);
        $res = $objUserModel->UpdateAdress($_SESSION['userid']);
        if($res){
            echo "<script>location.href='../view/kyc.php?=success=address=Address deatils updated successfully ';</script>";
        }else{
            echo "<script>location.href='../view/kyc.php?=failed=address=Address deatils updation failed ';</script>";
        }
    }

    if(isset($_POST['btnSaveBank'])){
        //txtAccName txtAccNo  txtIFSC btnSaveBank
        $objUserModel->setBankName($_POST['txtBankName']);
        $objUserModel->setAccNo($_POST['txtAccNo']);
        $objUserModel->setIFSC($_POST['txtIFSC']);
        $objUserModel->setAccName($_POST['txtAccName']);
        $res = $objUserModel->UdpateBankDetails($_SESSION['userid']); 
        if($res){
            echo "<script>location.href='../view/kyc.php?=success=address=Bank deatils updated successfully ';</script>";
        }else{
            echo "<script>location.href='../view/kyc.php?=failed=bank=Bank deatils updation failed ';</script>";
        }
    }

    if(isset($_POST['btnSavePayment'])){
        // txtGpay txtPhonePe txtPaytm btnSavePayment
        $objUserModel->setGPay ($_POST['txtGpay']);
        $objUserModel->setPhonePe ($_POST['txtPhonePe']);
        $objUserModel->setPayTm($_POST['txtPaytm']);
        $res = $objUserModel->UpdatePaymentDetails($_SESSION['userid']);
        if($res){
            echo "<script>location.href='../view/kyc.php?=success=payment=Payment deatils updated successfully';</script>";
        }else{
            echo "<script>location.href='../view/kyc.php?=failed=payment=Payment deatils updation failed ';</script>";
        }
    }
?>