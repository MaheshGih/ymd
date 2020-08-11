<?php include('../include/config.php');?>
<?php
class PaymentModel{
    public $user_id = "";
    public $img_path = "";
    public $trans_id = "";
    public $paid_date = "";
    public $paid_to = "";

    public function getUserId(){return $this->user_id;}
    public function setUserId($vuserid){$this->user_id=$vuserid;}
    public function getImgPath(){return $this->img_path;}
    public function setImgPath($vimgpath){$this->img_path = $vimgpath;}
    public function getTransId(){return $this->trans_id;}
    public function setTransId($vtransid){$this->trans_id = $vtransid;}
    public function getPaidDate(){return $this->paid_date;}
    public function setPaidDate($vpaiddate){$this->paid_date = $vpaiddate;}
    public function getPaidTo(){return $this->paid_to;}
    public function setPaidTo($vpaidto){$this->paid_to = $vpaidto;}

    public function AddPaymentReciept(){
        global $con;
        $ins_qry = "insert into user_paid_reciept values(null,1,'".self::getTransId()."','".self::getImgPath()."','".self::getPaidDate()."')";
        $res = mysqli_query($con,$ins_qry);
        return self::getResult($res);
    }
    public function GetUploadedReciepts($vuserid){
        global $con;
        $rec_list = mysqli_query($con,"select * from user_paid_reciept where user_id=".$vuserid);
        return $rec_list;
    }
    /*
    to return True or False
    */
    public function getResult($actualRes){
        if($actualRes){
            return true;
        }else{
            return false;
        }
    }
}
$objPaymentModel = new PaymentModel();
?>
