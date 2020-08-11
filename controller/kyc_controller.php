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
    }

    if(isset($_POST['btnSaveBank'])){
        //txtAccName txtAccNo  txtIFSC btnSaveBank
        $objUsrModel->setBankName($_POST['txtBankName']);
        $objUsrModel->setAccNo($_POST['txtAccNo']);
        $objUsrModel->setIFSC($_POST['txtIFSC']);
        $objUsrModel->setAccName($_POST['txtAccName']);
        $res = $objUserModel->UdpateBankDetails($_SESSION['userid']);
    }

    if(isset($_POST['btnSavePayment'])){
        // txtGpay txtPhonePe txtPaytm btnSavePayment
        $objUserModel->setGPay ($_POST['txtGpay']);
        $objUserModel->setPhonePe ($_POST['txtPhonePe']);
        $objUserModel->setPayTm($_POST['txtPaytm']);
        $res = $objUserModel->UpdatePaymentDetails($_SESSION['userid']);
    }
?>