<?php include('../model/plan_model.php'); ?>
<?php
if(isset($_POST['btnAddLevel'])){
$objPlanModel->SetLevelName($_POST['txtLevelname']);
$objPlanModel->SetLeftPair($_POST['txtLeftPairs']);
$objPlanModel->SetRightpair($_POST['txtRightPairs']);
$objPlanModel->SetInrValue($_POST['txtInrValue']);
$objPlanModel->SetAutoPoolInr($_POST['txtAutoPoolInr']);
$objPlanModel->SetReqDirectIds($_POST['txtReqDirectIds']);


$res = $objPlanModel->AddLevel();
if($res){
echo "<script>location.href='../view/royalty_points.php'; </script>";
}
}
if(isset($_POST['btnEditLevel'])){
$objPlanModel->SetId($_POST['hdnId']);
$objPlanModel->SetLevelName($_POST['txtLevelname']);
$objPlanModel->SetLeftPair($_POST['txtLeftPairs']);
$objPlanModel->SetRightpair($_POST['txtRightPairs']);
$objPlanModel->SetInrValue($_POST['txtInrValue']);
$objPlanModel->SetAutoPoolInr($_POST['txtAutoPoolInr']);
$objPlanModel->SetReqDirectIds($_POST['txtReqDirectIds']);
$res = $objPlanModel->UpdateLevelById($_POST['hdnId']);
if($res){
echo "<script>location.href='../view/royalty_points.php'; </script>";
}
}
?>
