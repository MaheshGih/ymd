<?php 
    include("../model/login_model.php");
?>
<?php
if(isset($_POST['btnSaveEmp'])){
        
        
        $objLoginModel->setName($_POST['txtUserName']);
        $objLoginModel->setEmail($_POST['txtEmail']);
        $objLoginModel->setMobile($_POST['txtMobile']);
        $objLoginModel->setuserId($_POST['txtLoginId']);
        $objLoginModel->setPassword($_POST['txtPassword']);
        $objLoginModel->setDate();
        
        $objUserModel->setAddress1($_POST['txtAdd1']);
        $objUserModel->setAddress2($_POST['txtAdd2']);
        $objUserModel->setCity($_POST['txtCity']);
        $objUserModel->setState($_POST['txtState']);
        
        $objUserModel->setStatus("ACTIVE");
        $res = $objLoginModel->AddEmp();
        if($res){
           echo "<script> location.href='../view/employees.php?=success=insert';</script>";
        }else{
            echo "<script> location.href='../view/add_emp.php?=failure=insert';</script>";
        }
}

if(isset($_GET['inactivateLoginId'])){
    $status = $objUserModel->getStausByKey("INACTIVE");
    $res = $objUserModel->updateUserStatusAndIsActiveById($_GET['inactivateLoginId'], $status, 0);
    if($res){
        echo "<script> location.href='../view/employees.php?=success=inactivate';</script>";
    }else{
        echo "<script> location.href='../view/employees.php?=failure=inactivate';</script>";
    }
}

if(isset($_GET['activateLoginId'])){
    $status = $objUserModel->getStausByKey("ACTIVE");
    $res = $objUserModel->updateUserStatusAndIsActiveById($_GET['activateLoginId'], $status, 1);
    if($res){
        echo "<script> location.href='../view/employees.php?=success=activate';</script>";
    }else{
        echo "<script> location.href='../view/employees.php?=failure=activate';</script>";
    }
}

?>