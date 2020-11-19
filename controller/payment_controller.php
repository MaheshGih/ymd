<?php
include('../include/session.php');
include('../model/payment_model.php');
include('../model/user_model.php');
include('../model/wallet_txn_model.php');

?>

<?php
    if(isset($_POST['btnUpload'])){
        //txtTransactionId
      $rec_path = "";
      if(isset($_FILES['filePayment'])){

          $errors = array();
          $file_name = $_FILES['filePayment']['name'];
          $file_size =$_FILES['filePayment']['size'];
          $file_tmp =$_FILES['filePayment']['tmp_name'];
          $file_type=$_FILES['filePayment']['type'];

          if($file_size > 2097152){
          $errors[]='File size must be excately 2 MB';
          }

          if(empty($errors)==true){
              move_uploaded_file($file_tmp,"../images/".$file_name);
              $rec_path = 'images/'.$file_name;
          }else{
            print_r($errors);
          }
      }
      if($rec_path != ""){
            $objPaymentModel->setuserId(1);
            $objPaymentModel->setTransId($_POST['txtTransactionId']);
            $objPaymentModel->setImgPath($rec_path);
            $objPaymentModel->setPaidDate(date("Y-m-d h:i:s"));
            $res = $objPaymentModel->AddPaymentReciept();
            //echo $res;
      }
    }
    
    if(isset($_POST['submitPBtnName']) && $_POST['submitPBtnName']=='paymentPDoneBtn'){
        $rec_path = "";
        if(isset($_FILES['recieptPFile'])){
            $recieptPFile = $_FILES['recieptPFile'];
            $errors = array();
            $file_name = $recieptPFile['name'];
            $file_size = $recieptPFile['size'];
            $file_tmp = $recieptPFile['tmp_name'];
            $file_type= $recieptPFile['type'];
            
            if($file_size > 2097152){
                $errors[]='File size must be excately 2 MB';
            }
            
            if(empty($errors)==true){
                move_uploaded_file($file_tmp,"../images/".$file_name);
                $rec_path = 'images/'.$file_name;
            }else{
                print_r($errors);
            }
        }
        if($rec_path != ""){
            $invitationId = $_POST['invitationId'];
            $objPaymentModel->setuserId($_SESSION['userid']);
            $objPaymentModel->setTransId(null);
            $objPaymentModel->setImgPath($rec_path);
            $objPaymentModel->setPaidDate(date("Y-m-d h:i:s"));
            $objPaymentModel->setWithdrawReqId($_POST['withdrawReqId']);
            $objPaymentModel->setPaidTo($_POST['receiverUserId']);
            $objPaymentModel->setInvitationId($invitationId);
            $res = $objPaymentModel->AddPaymentReciept();
            //echo $res;
            
            $status=$objUserModel->getInvitationStausByKey("PAYMENT_DONE");
            $res = $objUserModel->UpdateInvitationStatus($status,$invitationId);
            echo $res;
        }
    } 
    
    if(isset($_POST['submitPBtnName']) && $_POST['submitPBtnName']=='acceptGBtn'){
        $invitationId = $_POST['invitationId'];
        $txn_type = $objWalletTxnModel->getTxnTypeByKey("DEBIT");
        $cause_type = $objWalletTxnModel->getCauseByKey("WITHDRAWN");
        
        $res = $objUserModel->AcceptInvitationPaymentReceived($invitationId,$txn_type,$cause_type);
        echo $res;
    }
    
    if(isset($_POST['btnAddRewards'])){
        $users = $objUserModel->rewardUsers(0);
        $res = $objUserModel->AddRewards($users);
        if($res){
            echo "<script> location.href='../view/reward_users.php?=success=AddRewards';</script>";
        }else{
            echo "<script> location.href='../view/reward_users.php?=failure=AddRewards';</script>";
        }        
    }
    
    if(isset($_POST['btnUpgradeLevel'])){
        $users = $objUserModel->GetNextLevelUsers(0);
        $res = $objUserModel->UpgardeUserLevel($users);
        if($res){
            echo "<script> location.href='../view/user_level_upgrade.php?=success=lvlupgraded';</script>";
        }else{
            echo "<script> location.href='../view/user_level_upgrade.php?=failure=lvlupgraded';</script>";
        }        
    }
    
    
    if(isset($_POST['hdnHouseMaturity'])){
        //$users = $objUserModel->GetHousefullUsers(0);
        //$users = $objUserModel->GetHousefullUsersByStatus(0);
        $userIds = $_POST['userIds'];
        $users = $objUserModel->GetHousefullUsersByIds($userIds);
        $res = $objUserModel->AddRoyalty($users);
        
        if($res){
            echo "<script> location.href='../view/housefull_users.php?=success=add_royalty';</script>";
        }else{
            echo "<script> location.href='../view/housefull_users.php?=failure=add_royalty';</script>";
        }
    }
    
    if(isset($_POST['btnAddUserRoyalty'])){
        $users = $objUserModel->GetRoyaltyUsers();
        $res = $objUserModel->AddUserRoyalty($users);
        if($res){
            echo "<script> location.href='../view/housefull_users.php?=success=add_royalty';</script>";
        }else{
            echo "<script> location.href='../view/housefull_users.php?=failure=add_royalty';</script>";
        }
    }
    
    if(isset($_POST['btnUserWallet'])){
        $login_id = $_POST['login_id'];
        $wallet = $objWalletContactModel->GetWalletByLoginId($login_id);
        echo json_encode($wallet);
    }
    
    if(isset($_POST['btnWalletAddTxn'])){
        $login_id = $_POST['login_id'];
        $user_id = $_POST['user_id'];
        $full_name = $_POST['full_name'];
        $cause_type = $_POST['txn_type'];
        $txn_amount = $_POST['txn_amount'];
        if(!empty($login_id)||!empty($cause_type)||!empty($txn_amount)){
            if($cause_type=='OFFER'||$cause_type=='CASH_BACK'||$cause_type=='REFUND'){
                $txn_type = 'CREDIT';
            }else{
                $txn_type = 'DEBIT';
                $txn_amount = -($txn_amount);
            }
            
            $wal_ins_res = $objUserModel->addWalletTxn($user_id, $full_name, $txn_amount, $txn_type, 1, $cause_type, '','');
            $wal_udp_res = $objUserModel->UpdateWalletById($user_id,$txn_amount,$cause_type);
            
            if($wal_udp_res){
                echo "<script> location.href='../view/change_wallet.php?=success=txn_add';</script>";
            }else{
                echo "<script> location.href='../view/change_wallet.php?=failure=txn_add';</script>";
            }            
        }else{
            echo "<script> location.href='../view/change_wallet.php?=failure=txn_add';</script>";
        }
    }
?>