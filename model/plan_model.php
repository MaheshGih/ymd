<?php include('../include/config.php'); ?>

<?php
class PlanModel{
    public $id="";
    public $levl_name = "";
    public $left_pairs = "";
    public $right_pairs = "";
    public $usd_value = "";
    public $inr_value = "";

    public function GetId(){return $this->id;}
    public function SetId($vid){$this->id = $vid;}
    public function GetLevelName(){return  $this->level_name;}
    public function SetLevelName($vlevelname){ $this->level_name = $vlevelname;}
    public function GetLeftPair(){return $this->left_pairs;}
    public function SetLeftPair($leftpairs){$this->left_pairs = $leftpairs;}
    public function GetRightPair(){return $this->right_pairs;}
    public function SetRightpair($rightpars){$this->right_pairs = $rightpars;}
    public function GetUsdValue(){return $this->usd_value;}
    public function SetUsdValue($usdvalue){$this->usd_value = $usdvalue;}
    public function GetInrValue(){return $this->inr_value;}
    public function SetInrValue($inrvalue){$this->inr_value = $inrvalue;}

    public function AddLevel(){
        global $con;
        $ins_qry = "insert into levels values(null,'".self::GetLevelName()."',".self::GetLeftPair().",".self::GetRightPair().",".self::GetUsdValue().",".self::GetInrValue().")";
        $res = mysqli_query($con,$ins_qry);
        return $res;
        //return $ins_qry;
    }
    public function UpdateLevelById($vlid){
        global $con;
        $upd_qry = "update levels set level_name='".self::GetLevelName()."',left_pairs=".self::GetLeftPair().", right_pairs=".self::GetRightPair().",usd_value=".self::GetUsdValue().",inr_value= ".self::GetInrValue()." where id=".$vlid;
        //$res = mysqli_query($con,$upd_qry);
        //return $res;
        return $upd_qry;
    }
    public function GetLevels(){
        global $con;
        $list = mysqli_query($con,"select * from levels");
        return $list;
    }
    public function GetLevelById($vid){
        global $con;
        $level = mysqli_fetch_assoc(mysqli_query($con,"select * from levels where id=".$vid));
        return $level;
    }
}
$objPlanModel = new PlanModel();
?>
