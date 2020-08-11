<?php include('../include/config.php');?>
<?php

class CommonModel{

    public $name = "";
    public $date_created = "";
    public $is_active = "";
    public $table = "";

    public $market_id ="";
    public function setMarketId($smarkid){ $this->market_id = $smarkid;}
    public function getMarketId(){return $this->market_id;}

    public function getName(){
        return $this->name;
    }
    public function setName($vname){
        $this->name = $vname;
    }
    public function getDate(){
        return $this->date;
    }
    public function setDate($vdate){
            $this->date = $vdate;
    }
    public function getIsActive(){
        return $this->is_active;
    }
    public function setIsActive($visactive){
        $this->is_active = $visactive;
    }
    public function setId($vid){
        $this->id = $vid;
    }
    public function getId(){
        return $this->id;
    }
    public function setTable($vtable){
        $this->table = $vtable;
    }
    public function getTable(){
        return $this->table;
    }

    /*
        Add Area Functionality
        parameter : name,date,isactive
    */
    public function add(){
        $iarea = self::getName();
        $idate = self::getDate();
        $iactive = self::getIsActive();
        $itable = self::getTable();
        global $connection;
        $ins_qry_res = mysqli_query($connection,"insert into ".$itable." values(null,'".$iarea."','".$idate."',".$iactive.")");
        return self::getResult($ins_qry_res);
    }
    /*
        Edit Area Functionality
        parameter : name,id
    */
    public function edit(){
        $earea = self::getName();
        $eid = self::getId();
        $etable = self::getTable();
        global $connection;
        $upd_qry_res = mysqli_query($connection,"Update ".$etable." set name='".$earea."' where id =".$eid);
        return self::getResult($upd_qry_res);
    }
     /*
        Delete Area Functionality
        parameter :id
    */
    public function del(){
        $did = self::getId();
        $dtable = self::getTable();
        global $connection;
        $del_qry_res = mysqli_query($connection,"Update ".$dtable." set is_active = 0  where id =".$did);
        return self::getResult($del_qry_res);
    }

    public function GeAreaId($areaname){
        global $con;
        $area_id = mysqli_fetch_assoc(mysqli_query($con,"select id from area_details where name = '".$areaname."'"));
        return $area_id[0];
    } 
    public function GetAreaName($areaid){
        global $con;
        $area_name = mysqli_fetch_assoc(mysqli_query($con,"select name from area_details where id = ".$areaid));
        return $area_name;
    } 
    public function GetAreas(){
        global $con;
        $load_areas = mysqli_query($con,'select * from area_details where is_active= 1');
        return $load_areas;
    }
    public  function GetAgents(){
        global $con;
        $load_agents = mysqli_query($con,"select * from collection_boy_details where is_active = 1");
        return $load_agents;
    }
    public function GetHSNCodes(){
        global $con;
        $load_hsn_codes = mysqli_query($con,"select id,hsn_code from gst_hsn_details where is_active = 1");
        return $load_hsn_codes;
    }
    public function GetCategories(){
        global $con;
        $load_categories =  mysqli_query($con,"select id,name from category_details where is_active = 1");
        return $load_categories;
    }
    public function getResult($actualRes){
        if($actualRes){
            return true;
         }else{
             return false;
         }
    }
    public function GetProducts(){
        global $con;
        $load_products = mysqli_query($con,"select * from stock_transaction_details where is_active = 1");
        return $load_products;
    }
    public function GetHsnDataById($id){
        global $con;
        $hsn_code = mysqli_fetch_assoc( mysqli_query($con,"select hsn_code,igst from gst_hsn_details where id = ".$id));
        return $hsn_code;
    }
    public function GetCatNameById($id){
        global $con;
        $cat_name = mysqli_fetch_assoc(mysqli_query($con,"select name from category_details where id = ".$id));
        return $cat_name['name'];
    }
    public function GetFirms(){
        global $con;
        $load_firms = mysqli_query($con,"select * from firm_details where is_active = 1");
        return $load_firms;
    }
    public function GetUsers(){
        global $con;
        $load_users = mysqli_query($con,"select * from user_details where is_active=1");
        return $load_users;
    }
    public function GetFirmNameById($fid){
        global $con;
        $firm_name = mysqli_fetch_assoc(mysqli_query($con,"select name from firm_details where id = ".$fid));
        return $firm_name['name'];
    } 
    public function LoadCategories(){
        global $con;
        $load_categories =  mysqli_query($con,"select * from category_details where is_active = 1");
        return $load_categories;
    }
    public function GetMarkets(){
        global $con;
        $load_markets = mysqli_query($con,"select * from market_details where is_active = 1");
        return $load_markets;
    }
    public function GetMarketOwnerById(){
        global $con;
        $load_markets = mysqli_fetch_assoc(mysqli_query($con,"select owner_name from market_details where is_active = 1 and id = ".self::getMarketId()));
        return $load_markets['owner_name'];
    }

    public function GetMarketDetailsById($bid){
        global $con;
        $mark_det = mysqli_query($con,"select market_name,owner_name from market_details where id = ".$bid);
        return $mark_det;
    }
    public function GetNextBillNo(){
        global $con;
        $bill_no = mysqli_fetch_assoc(mysqli_query($con,"select Max(id) as Bno from bill_details"));
        $bno = 1;
        if($bill_no['Bno'] != null){
            $bno = $bill_no['Bno']+1;
        }
        return $bno;
    }
    public function GetNextRecNo(){
        global $con;
        $rec_no = mysqli_fetch_assoc(mysqli_query($con,"select Max(id) as Rno from reciept_details"));
        $rno = 1;
        if($rec_no['Rno'] != null){
            $rno = $rec_no['Rno']+1;
        }
        return $rno;
    }
    public function GetBills(){
        global $con;
        $load_bills = mysqli_query($con,"select * from bill_details");
        return $load_bills;
    }
    public function GetPendingBills(){
        global $con;
        $load_pending_bills = mysqli_query($con,"select * from bill_details where status ='pending'");
        return $load_pending_bills;
    }
    public function GetCustomerNames(){
        global $con;
        $customer_names = mysqli_query($con,"select id,owner_name from market_details ");
        return $customer_names;
    }
    public function GetCustomer(){
        global $con;
        $customer_names = mysqli_query($con,"select distinct owner_name from market_details ");
        return $customer_names;
    }

    public function GetProductsByStock(){
        global $con;
        $products = mysqli_query($con,"select * from stock_details");
        return $products;
    }
}
$objCommon = new CommonModel();
?>