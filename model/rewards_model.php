<?php include('../include/config.php'); ?>
<?php
class RewardsModel{

    public $id="";
    public $day_no ="";
    public $no_of_persons ="";
    public $amount= "";

    public function GetId(){return $this->id;}
    public function SetId($vid){$this->id = $vid;}
    public function GetDayNo(){return $this->day_no;}
    public function SetDayNo($vdayno){$this->day_no = $vdayno;}
    public function GetNoOfPersons(){return $this->no_of_persons;}
    public function SetNoOfPersons($vnoofpersons){$this->no_of_persons = $vnoofpersons;}
    public function GetAmount(){return $this->amount;}
    public function SetAmount($vamnt){$this->amount = $vamnt;}
    public function AddReward(){
        global $con;
        $ins_qry = "insert into rewards values(null,".self::GetDayNo().",".self::GetNoOfPersons().",".self::GetAmount().")";
        $res = mysqli_query($con,$ins_qry);
        return $res;
    }
    public function UpdateRewardById($vrid){
        global $con;
        $upd_qry = "update rewards set day_no=".self::GetDayNo().", no_of_persons=".self::GetNoOfPersons().", amount=".self::GetAmount()." where id=".$vrid;
        $res_upd = mysqli_query($con,$upd_qry);
        return $res_upd;
    }
    public function GetRewards(){
        global $con;
        $rew_list = mysqli_query($con,"select * from rewards");
        return $rew_list;
    }
    public function GetRewardById($vid){
        global $con;
        $rew = mysqli_fetch_assoc(mysqli_query($con,"select * from rewards where id=".$vid));
        return $rew;
    }
}
$objRewardsModel = new RewardsModel();
?>
