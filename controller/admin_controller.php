<?php
    include('../include/session.php');
    #include('../model/admin_model.php');
    include('../model/user_model.php');
    
    if(isset($_POST['btnSaveNews'])){
        $news = $_POST['txtNews'];
        $start_date = $_POST['startDate'];
        $end_date = $_POST['endDate'];
        $is_active = $_POST['isActive'];
        if($is_active=="on"){
            $is_active = 1;
            $res=$objAdminModel->updateAllNewsStatus(0);
        }else{
            $is_active = 0;
        }
        $res=$objAdminModel->saveNews($news, $is_active, $start_date, $end_date);
        if($res){
            echo "<script> location.href='../view/news.php?=success=saveNews';</script>";
        }else{
            echo "<script> location.href='../view/news.php?=failure=saveNews';</script>";
        }
    }
    
    if(isset($_POST['get_reciept_path'])){
        $invitation_id = $_POST['invitation_id'];
        $img = $objAdminModel->GetRecieptPath($invitation_id);
        echo $img['img_path'];
    }
    
    if(isset($_POST['get_all_invitations'])){
        echo $objAdminModel->getAllInvitations();
    }
    
    if(isset($_POST['get_users'])){
        echo $objAdminModel->getAllUsers();
    }
    
    if(isset($_POST['get_withdraws'])){
        echo $objAdminModel->getAllWithdraws();
    }
    if(isset($_POST['get_all_txns'])){
        echo $objAdminModel->getAllTransactions();
    }
    if(isset($_POST['get_royalty_users'])){
        echo $objAdminModel->getAllRoyalityUsers();
    }
    if(isset($_POST['get_user_rewards'])){
        echo $objAdminModel->getAllRewardUsers();
    }
?>