<?php include('../model/user_model.php'); ?>
<?php
if(isset($_POST['btnActUser'])){
    $res = $objUserModel->ActivateUserById($_POST['hdnId'],$_POST['ddlSponsors']);
    if($res){
        echo "<script> alert('User activated successfully.'); location.href='activate_users.php';</script>";
    }
}
?>
