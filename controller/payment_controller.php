<?php
include('../include/session.php');
include('../model/payment_model.php');?>
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
    
    if(isset($_POST['submitPBtnName'])){
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
            $objPaymentModel->setuserId($_SESSION['userid']);
            $objPaymentModel->setTransId(null);
            $objPaymentModel->setImgPath($rec_path);
            $objPaymentModel->setPaidDate(date("Y-m-d h:i:s"));
            $objPaymentModel->setWithdrawReqId($_POST['withdrawReqId']);
            $objPaymentModel->setPaidTo($_POST['receiverUserId']);
            $res = $objPaymentModel->AddPaymentReciept();
            //echo $res;
        }
    }
    
    if(isset($_POST['btnUpload'])){
        
    }
?>