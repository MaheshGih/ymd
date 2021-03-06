<?php include('../include/config.php'); ?>
<?php
class WalletFinalModel{
    
    public $id="";
    public $user_id = "";
    public $payment_mode = "";
    public $trans_id = "";
    public $amount = "";
    public $img_path = "";
    public $received_date = "";
    
    public function getId(){return $this->id;}
    public function setId($vid){$this->id = $vid;}
    public function getUserId(){return $this->user_id;}
    public function setPaymentMode($vpaymentmode){$this->payment_mode = $vpaymentmode;}
    public function getPaymentMode(){return $this->payment_mode;}
    public function setTransactionId($vtransactionid){$this->trans_id = $vtransactionid;}
    public function getTransactionId(){return $this->trans_id;}
    public function setAmount($vamount){$this->amount = $vamount;}
    public function getAmount(){return $this->amount;}
    public function setImagePath($vimagepath){$this->img_path = $vimagepath;}
    public function getImagePath(){return $this->img_path;}
    public function setReceivedDate($vrececiveddate){$this->received_date = $vrececiveddate;}
    public function getReceivedDate(){return $this->received_date;}
    
}

class WalletCreditModel{
    
    public $id="";
    public $user_id = "";
    public $payment_mode = "";
    public $trans_id = "";
    public $amount = "";
    public $img_path = "";
    public $received_date = "";
    
    public function getId(){return $this->id;}
    public function setId($vid){$this->id = $vid;}
    public function getUserId(){return $this->user_id;}
    public function setPaymentMode($vpaymentmode){$this->payment_mode = $vpaymentmode;}
    public function getPaymentMode(){return $this->payment_mode;}
    public function setTransactionId($vtransactionid){$this->trans_id = $vtransactionid;}
    public function getTransactionId(){return $this->trans_id;}
    public function setAmount($vamount){$this->amount = $vamount;}
    public function getAmount(){return $this->amount;}
    public function setImagePath($vimagepath){$this->img_path = $vimagepath;}
    public function getImagePath(){return $this->img_path;}
    public function setReceivedDate($vrececiveddate){$this->received_date = $vrececiveddate;}
    public function getReceivedDate(){return $this->received_date;}
    
}

class WalletContactModel{
    
    public $id="";
    public $user_id = "";
    public $total_amount = "";
    public $date_updated = "";
    public $amount_withdrawn = "";
    public $date_withdrawn = "";
    
    
    public function getId(){return $this->id;}
    public function setId($vid){$this->id = $vid;}
    public function getUserId(){return $this->user_id;}
    public function setUserId($vuserid){$this->user_id =$vuserid ;}
    public function setDateUpdated($vdateupdated){$this->date_updated = $vdateupdated;}
    public function getDateUpdated(){return $this->date_updated;}
    public function setAmountWithdrawn($vamountwithdrawn){$this->amount_withdrawn = $vamountwithdrawn;}
    public function getAmountWithdrawn(){return $this->amount_withdrawn;}
    public function setTotalAmount($vtotalamount){$this->total_amount = $vtotalamount;}
    public function getTotalAmount(){return $this->total_amount;}
    public function setDateWithdrawn($vdatewithdrawn){$this->date_withdrawn = $vdatewithdrawn;}
    public function getDateWithdrawn(){return $this->date_withdrawn;}
 
    public function GetWalletByUserId($userId){
        global $con;
        $res = mysqli_fetch_assoc(mysqli_query($con,"select * from user_wallet_concat where user_id=".$userId));
        return $res;
    }
    
    public function GetWalletByLoginId($loginId){
        global $con;
        
        $res = mysqli_fetch_assoc(mysqli_query($con,"select id from user_details where login_id='".$loginId."'"));
        if(!$res){
            $res = array("status"=>"ERROR","code"=>"invalid_id");
            return $res;
        } 
        $res = mysqli_fetch_assoc(mysqli_query($con,"select u.id as uid,u.login_id, u.full_name,u.mobile,uw.* from user_details u left join user_wallet_concat uw on u.id=uw.user_id where u.id=".$res['id']));
        if(!$res){
            $res = array("status"=>"OK","code"=>"no_wallet");
            return $res;
        }
        $res = array("status"=>"OK","data"=>$res);
        return $res;
    }
    
    public function GetTotPendingWithdrawAmntByUserId($userId){
        global $con;
        $sql = "select sum(amount_req)as tot_with, sum(amount_received) as tot_rec from user_withdrawls where  user_id = ? and is_done=0";
        $wal_stmt = $con->prepare($sql);
        $wal_stmt->bind_param('i',$userId);
        $res = $wal_stmt->execute();
        $res = $wal_stmt->get_result();
        $res = $res->fetch_assoc();
        $wal_stmt->close();
        return $res;
    }
}

$objWalletFianlModel = new WalletFinalModel();
$objWalletCreditModel = new WalletCreditModel();
$objWalletContactModel = new WalletContactModel();
?>