<?php include('../model/rewards_model.php'); ?>
<?php include('../model/user_model.php'); ?>
<?php
    if(isset($_POST['btnAddReward'])){
        $objRewardsModel->SetDayNo($_POST['txtDayNo']);
        $objRewardsModel->SetNoOfPersons($_POST['txtNoOfPersons']);
        $objRewardsModel->SetAmount($_POST['txtAmount']);
        $res = $objRewardsModel->AddReward();
        if($res){
             echo "<script> alert('Reward added Successfully.'); location.href='../view/rewards.php';</script>";
        }
    }
    if(isset($_POST['btnEditReward'])){
        $objRewardsModel->SetId($_POST['hdnId']);
        $objRewardsModel->SetDayNo($_POST['txtDayNo']);
        $objRewardsModel->SetNoOfPersons($_POST['txtNoOfPersons']);
        $objRewardsModel->SetAmount($_POST['txtAmount']);
        $res = $objRewardsModel->UpdateRewardById($_POST['hdnId']);
        if($res){
            echo "<script> alert('Reward updated Successfully.'); location.href='../view/rewards.php';</script>";
        }
    }
    if(isset($_GET['user_rewards'])){
        /* $left_pairs = $_GET['left_pairs'];
        $right_pairs = $_GET['right_pairs']; */
        $sponsorId = $_GET['sponsor_id'];
        $childs = $objUserModel->GetChildsByCount($sponsorId);
        echo json_encode($childs);
    }
?>
