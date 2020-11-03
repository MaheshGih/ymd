<?php include('../include/config.php'); ?>
<?php
class WalletTxnModel{
    
    public $id="";
    public $user_id = "";
    public $full_name = "";
    public $amount = "";
    public $cr_date = "";
    public $is_done= false;
    public $txn_type='';
    public $cause_type='';
    public $cause_full_name='';
    public $cause_user_id='';
    
    public $txn_types = ["CREDIT"=>"CREDIT","DEBIT"=>"DEBIT"]; 
    public $causes = [ "WITHDRAWN"=>"WITHDRAWN","AUTO_POOL"=>"AUTO_POOL", "REFERRAL"=>"REFERRAL", 
        "REFERRAL_BLOCKED"=>"REFERRAL_BLOCKED","LEVEL"=>"LEVEL","REWARD"=>"REWARD", "HOUSE_FULL"=>"HOUSE_FULL","ROYALTY"=>"ROYALTY"];
   
    public function getTxnTypeByKey($vtxntype){
        return array_search($vtxntype, $this->txn_types);
    }
    
    public function getCauseByKey($vcause){
        return array_search($vcause, $this->causes);
    }
    public function getCauses(){
        return $this->causes;
    }
    
    public function getId(){return $this->id;}
    public function setId($vid){$this->id = $vid;}
    public function setUserId($vuserid){$this->user_id = $vuserid;}
    public function getUserId(){return $this->user_id;}
    public function setFullName($vfullname){$this->full_name = $vfullname;}
    public function getFullName(){return $this->full_name;}
    public function setAmount($vamountreq){$this->amount = $vamountreq;}
    public function getAmount(){return $this->amount;}
    public function setCrDate(){
        date_default_timezone_set("Asia/Calcutta");
        $this->cr_date = date("Y-m-d h:i:s");
    }
    public function getCrDate(){return $this->cr_date;}
    public function setIsDone($visdone){$this->is_done = $visdone;}
    public function getIsDone(){return $this->is_done;}
    
    public function setTxnType($vtxntype){$this->is_done = $vtxntype;}
    public function getTxnType(){return $this->txn_type;}
    public function setCauseType($vtype){$this->cause_type = $vtype;}
    public function getCauseType(){return $this->cause_type;}
    public function setCauseFullName($vfullname){$this->cause_full_name = $vfullname;}
    public function getCauseFullName(){return $this->cause_full_name;}
    public function setCauseUserId($vuserid){$this->cause_user_id = $vuserid;}
    public function getCauseUserId(){return $this->cause_user_id;}
    
    
}
$objWalletTxnModel = new WalletTxnModel();
?>