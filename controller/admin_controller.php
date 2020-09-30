<?php
    include('../include/session.php');
    include('../model/admin_model.php');
    include('../model/util_model.php');
    
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
?>