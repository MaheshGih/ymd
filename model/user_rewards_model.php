<?php 
include('../include/config.php');
?>
<?php
class UserRewardsModel{

    public $id="";
    public $login_id = "";
    public $full_name = "";
    public $mobile = "";
    public $amount = "";
    public $date = "";
    public $level_id = "";
    public $status = "";
    
    public function getId(){return $this->id;}
    public function setId($vid){$this->id = $vid;}
    public function setLoginId($vloginid){$this->login_id = $vloginid;}
    public function getLoginId(){return $this->login_id;}
    public function setFullName($vfullname){$this->full_name = $vfullname;}
    public function getFullName(){return $this->full_name;}
    public function setMobile($vmobile){$this->mobile = $vmobile;}
    public function getMobile(){return $this->mobile;}
    public function setAmount($vamount){$this->amount = $vamount;}
    public function getAmount(){return $this->amount;}
    public function setDate(){
        date_default_timezone_set("Asia/Calcutta");
        $this->date = date("Y-m-d h:i:s");
    }
    public function getDate(){return $this->date;}
    public function setLevelId($vlevelid){$this->status = $vlevelid;}
    public function getLevelId(){return $this->level_id;}
    public function setStatus($vstatus){$this->status = $vstatus;}
    public function getStatus(){return $this->status;}
    
    
    public function GetUserRewards($vloginid, $status){
        global $con;
        $gh_list = mysqli_query($con,"select * from user_rewards as ur join user_details as ud on ud.login_id = ur.login_id");
        return $gh_list;
    }
    
}
$objUserRewardsModel = new UserRewardsModel();
?>
