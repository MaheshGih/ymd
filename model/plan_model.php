<?php include('../include/config.php'); ?>

<?php
class PlanModel{
    public $id="";
    public $levl_name = "";
    public $left_pairs = "";
    public $right_pairs = "";
    public $usd_value = "";
    public $inr_value = "";
    public $auto_pool_inr = "";
    public $req_direct_ids = "";
    public $l_order = "";
    
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
    
    public function GetAutoPoolInr(){return $this->auto_pool_inr;}
    public function SetAutoPoolInr($inrvalue){$this->auto_pool_inr = $inrvalue;}
    public function GetReqDirectIds(){return $this->req_direct_ids;}
    public function SetReqDirectIds($vids){$this->req_direct_ids = $vids;}
    
    
    public function AddLevel(){
        global $con;
        $order = 0;
        $max_lvl = mysqli_fetch_assoc(mysqli_query($con,"select max(l_order)as l_order from levels as l"));
        if(!empty($max_lvl['l_order'])){
            $order = $max_lvl['l_order']+1;
        }
        $ins_qry = "insert into levels(level_name,left_pairs,right_pairs,inr_value,auto_pool_inr,l_order) 
          values('".self::GetLevelName()."',".self::GetLeftPair().",".self::GetRightPair().",".self::GetInrValue().",".self::GetAutoPoolInr().",".$order.")";
        $res = mysqli_query($con,$ins_qry);
        return $res;
        //return $ins_qry;
    }
    public function UpdateLevelById($vlid){
        global $con;
        $upd_qry = "update levels set level_name='".self::GetLevelName()."',left_pairs=".self::GetLeftPair().", right_pairs=".self::GetRightPair().",inr_value= ".self::GetInrValue().",auto_pool_inr=".self::GetAutoPoolInr()." where id=".$vlid;
        $res = mysqli_query($con,$upd_qry);
        return $res;
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
