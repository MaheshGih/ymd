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
}

$objWalletFianlModel = new WalletFinalModel();
$objWalletCreditModel = new WalletCreditModel();
$objWalletContactModel = new WalletContactModel();
?>