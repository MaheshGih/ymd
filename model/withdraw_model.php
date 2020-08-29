<?php //include('../include/config.php'); ?>
<?php
class WithdrawModel{
    
    public $id="";
    public $user_id = "";
    public $full_name = "";
    public $mobile = "";
    public $amount_req = "";
    public $date_req = "";
    public $amount_received = "";
    public $date_received = "";
    public $is_done= false;
    
    public function getId(){return $this->id;}
    public function setId($vid){$this->id = $vid;}
    public function setUserId($vuserid){$this->user_id = $vuserid;}
    public function getUserId(){return $this->user_id;}
    public function setFullName($vfullname){$this->full_name = $vfullname;}
    public function getFullName(){return $this->full_name;}
    public function setMobile($vmobile){$this->mobile = $vmobile;}
    public function getMobile(){return $this->mobile;}
    public function setAmountReq($vamountreq){$this->amount_req = $vamountreq;}
    public function getAmountReq(){return $this->amount_req;}
    public function setDateReq(){
        date_default_timezone_set("Asia/Calcutta");
        $this->date_req = date("Y-m-d h:i:s");
    }
    public function getDateReq(){return $this->date_req;}
    public function setAmountReceived($vamountrececived){$this->amount_received = $vamountrececived;}
    public function getAmountReceived(){return $this->amount_received;}
    public function setDateReceived($vdaterececived){
        date_default_timezone_set("Asia/Calcutta");
        $this->date_received = date("Y-m-d h:i:s");
    }
    public function getDateReceived(){return $this->date_received;}
    public function setIsDone($visdone){$this->is_done = $visdone;}
    public function getIsDone(){return $this->is_done;}
    
    public function GetRequestHelperList(){
        global $con;
        $gh_list = mysqli_query($con,"select uw.id,uw.full_name,uw.mobile,uw.amount_req,uw.date_req ,ud.login_id from user_withdrawls as uw join user_details as ud on ud.id = uw.user_id");
        return $gh_list;
    }
    
    public function GetWithdrwalsByUserId($user_id){
        global $con;
        $qry = "select * from user_withdrawls where user_id=".$user_id;
        $res = mysqli_query($con,$qry);
        return $res;        
    }
    
    public function addWithdrawReq1() {
        global $con;
        //$spl_qry = "insert into
        //      user_withdrawls(id,user_id,full_name,mobile,amount_req,date_req,amount_received,date_received,is_done) 
        //      values(null,?,?,?,?,?,?,?,?)";        
        $spl_qry = "insert into 
              user_withdrawls(id,user_id,full_name,mobile,amount_req,date_req,amount_received,date_received,is_done) 
              values(null,".self::getUserId().",".self::getFullName().",".self::getMobile().",".self::getAmountReq().",
               ".self::getDateReq().",".self::getAmountReceived().",".self::getDateReceived().",".self::getIsDone()." )";
        $stmt = $con->prepare($spl_qry);
        //$stmt->bind_param("issssssss",self::getUserId(),self::getFullName(),self::getMobile(),
        //    self::getAmountReq(), self::getDateReq(), self::getAmountReceived(), self::getDateReceived(),self::getIsDone());
        $res = $stmt->execute();
        $stmt->close();
        return $res;
    }
    public function addWithdrawReq() {
        global $con;
        //$spl_qry = "insert into
        //      user_withdrawls(id,user_id,full_name,mobile,amount_req,date_req,amount_received,date_received,is_done)
        //      values(null,?,?,?,?,?,?,?,?)";
        $isDone = intval(self::getIsDone());
        $spl_qry = "insert into
              user_withdrawls(id,user_id,full_name,mobile,amount_req,date_req,amount_received,date_received,is_done)
              values(null,".self::getUserId().",'".self::getFullName()."','".self::getMobile()."',".self::getAmountReq().",
               '".self::getDateReq()."',".self::getAmountReceived().",'".self::getDateReceived()."',".$isDone." )";
        $res = mysqli_query($con,$spl_qry);
        return $res;
    }
    
}
$objWithdrawModel = new WithdrawModel();
?>