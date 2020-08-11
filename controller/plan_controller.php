<?php include('../model/plan_model.php'); ?>
<?php
if(isset($_POST['btnAddLevel'])){
$objPlanModel->SetLevelName($_POST['txtLevelname']);
$objPlanModel->SetLeftPair($_POST['txtLeftPairs']);
$objPlanModel->SetRightpair($_POST['txtRightPairs']);
$objPlanModel->SetUsdValue($_POST['txtUsdValue']);
$objPlanModel->SetInrValue($_POST['txtInrValue']);
$res = $objPlanModel->AddLevel();
if($res){
echo "<script>alert('Level created Successfully.'); location.href='../view/royalty_points.php'; </script>";
}
}
if(isset($_POST['btnEditLevel'])){
$objPlanModel->SetId($_POST['hdnId']);
$objPlanModel->SetLevelName($_POST['txtLevelname']);
$objPlanModel->SetLeftPair($_POST['txtLeftPairs']);
$objPlanModel->SetRightpair($_POST['txtRightPairs']);
$objPlanModel->SetUsdValue($_POST['txtUsdValue']);
$objPlanModel->SetInrValue($_POST['txtInrValue']);
$res = $objPlanModel->UpdateLevelById($_POST['hdnId']);
if($res){
echo "<script>alert('Level Updated Successfully.'); location.href='../view/royalty_points.php'; </script>";
}
}
?>
