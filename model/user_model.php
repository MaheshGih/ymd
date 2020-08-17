<?php include('../include/config.php');?>
<?php
class UserModel{

    public $user_id	="";
    public $address_1="";
    public $address_2="";
    public $bank_name	="";
    public $acc_no	="";
    public $ifsc	="";
    public $acc_name="";
    public $Gpay ="";
    public $PhonePe="";
    public $PayTm="";
    public $city = "";
    public $state = "";
    public $to_mobile="";
    public $provide_help ="";
    public $date_today;

    public function getUserId(){return $this->user_id;}
    public function setUserId($vuserid){$this->user_id = $vuserid;}
    public function getAdress1(){return $this->address_1;}
    public function setAddress1($vadd1){$this->address_1 = $vadd1;}
    public function getAddress2(){return $this->address_2;}
    public function setAddress2($vadd2){$this->address_2 = $vadd2;}
    public function getBankName(){return $this->bank_name;}
    public function setBankName($vbankname){$this->bank_name = $vbankname;}
    public function getAccNo(){return $this->acc_no;}
    public function setAccNo($vaccno){$this->acc_no = $vaccno;}
    public function getIFSC(){return $this->ifsc;}
    public function setIFSC($vifsc){$this->ifsc = $vifsc;}
    public function getAccName(){return $this->acc_name;}
    public function setAccName($vaccname){$this->acc_name = $vaccname;}
    public function getGPay(){return $this->gpay;}
    public function setGPay($vgpay){$this->gpay=$vgpay;}
    public function getPhonePe(){return $this->PhonePe;}
    public function setPhonePe($vphonepe){$this->PhonePe = $vphonepe;}
    public function getPayTm(){return $this->PayTm;}
    public function setPayTm($vpaytm){$this->PayTm = $vpaytm;}
    public function getCity(){return $this->city;}
    public function setCity($vcity){$this->city = $vcity;}
    public function getState(){return $this->state;}
    public function setState($vstate){$this->state = $vstate;}
    public function getToMobile(){return $this->to_mobile;}
    public function setToMobile($tomobile){$this->to_mobile= $tomobile;}
    public function getProvideHelp(){ return $this->provide_help;}
    public function setProvideHelp($vhelpid){$this->provide_help = $vhelpid;}
    public function getDate(){ return $this->date_today;}
    public function setDate(){
        date_default_timezone_set("Asia/Calcutta");
        $this->date_today = date("Y-m-d h:i:s");
    }
    #region  Old Methods
    // Old Methods
    public function GetUserDetailsOld(){
        global $con;
        $sel_qry  = "select ub.full_name as fname,ub.email as email,ub.mobile as mobile,ul.login_id as loginid,
uk.acc_name as accname,uk.acc_no as accno,uk.bank_name as bankname,uk.ifsc as ifsc,
uk.address_1 as address1,uk.address_2 as address2,uk.Gpay as gpay,uk.PhonePe as phonepe, uk.PayTm as paytm from user_basic as ub
join user_login as ul on ub.id = ul.user_id
join user_kyc as uk on ub.id = uk.user_id  where ul.login_id='YMD1011101'";
        $res = mysqli_fetch_assoc(mysqli_query($con,$sel_qry));
        return $res;
    }
    public function GetUserDetailsByIdOld($vid){
        global $con;
        $res = mysqli_fetch_assoc(mysqli_query($con," select * from user_basic where id =".$vid));
        return $res;
    }
    public function UpdateAdressOld(){
        global $con;
        $upd_add_qry = "Update user_kyc set address_1='".self::getAdress1()."', address_2 ='".self::getAddress2()."'  where user_id=1";
        $res = mysqli_query($con,$upd_add_qry);
        return $res;
    }
    public function UdpateBankDetailsOld(){
        global $con;
        $upd_bank_qry = "Update user_kyc set bank_name='".self::getBankName()."',acc_no='".self::getAccNo()."',ifsc='".self::getIFSC()."',acc_name='".self::getAccName()."' where user_id=1";
        $res = mysqli_query($con,$upd_bank_qry);
    }
    public function UpdatePaymentDetailsOld(){
        global $con;
        $upd_pay_qry = "Update user_kyc set Gpay='".self::getGPay()."', PhonePPe='".self::getPhonePe()."', PayTm='".self::getPayTm()."' user_id=1";
        $res = mysqli_query($con,$upd_pay_qry);
    }
    public function GetChildCountOld($vid){
        global $con;
        $left_cnt = mysqli_fetch_assoc(mysqli_query($con,"select count(side) as leftcount from user_basic where side='left' and is_active=1 and sponsor_id=".$vid));
        $right_cnt = mysqli_fetch_assoc(mysqli_query($con,"select count(side) as rightcount from user_basic where side='right' and is_active=1 and sponsor_id=".$vid));
        return $left_cnt['leftcount']."-".$right_cnt['rightcount'];
    }
    public function GetChildsByUserIdOld($vuserid,$isactiv){
        //SELECT * FROM `user_basic` where sponsor_id=1 order by date_created desc limit 6
        global $con;
        $child_list = mysqli_query($con,"SELECT ub.*, ul.login_id FROM `user_basic` as ub Join user_login as ul on ub.id = ul.user_id where sponsor_id=".$vuserid." and is_active=".$isactiv." order by date_created asc limit 6");
        return $child_list;
    }
    public function ActivateUserByIdOld($vusid,$spillid){
        global $con;
        $activate_user = mysqli_query($con,"update user_basic set is_active=1,spill_id=".$spillid." where id=".$vusid);
        return $activate_user;
    }
    public function GetSpillIdsOld($vlogid,$vside,$id){
        global $con;
        $spl_qry = "select id,full_name from user_basic where sponsor_id=".$vlogid;
        if($vside != ""){
            $spl_qry ="select id,full_name from user_basic where sponsor_id=".$vlogid." and side='".$vside."' and id !=".$id;
        }
        $spill_list = mysqli_query($con,$spl_qry);
        return $spill_list;
    }
    public function GetPopUpDetailsOld($vlogid){
        global $con;
        // first get user_id based on login id
        $user_id = mysqli_fetch_assoc(mysqli_query($con,"select user_id from user_login where login_id ='".$vlogid."'"));
        // get left count based on user_id
        $left_count = mysqli_fetch_assoc(mysqli_query($con,"select count(side) as leftcount from user_basic where side ='left' and sponsor_id=".$user_id['user_id']));
        //get right count based on user-id
        $right_count = mysqli_fetch_assoc(mysqli_query($con,"select count(side) as rightcount from user_basic where side ='right' and sponsor_id=".$user_id['user_id']));
        // find the wallet amount based on user_id
        $wallet = 0; // pending functionality
        return  $left_count['leftcount']."-".$right_count['rightcount']."-".$wallet;
    }
    public function GetTotalDetailsOld($userid){
        global $con;
        // get total amount in wallet
        $tot_amount = mysqli_fetch_assoc(mysqli_query($con,"SELECT total_amount FROM `user_wallet_concat` where user_id=".$userid));
        // get total users
        $tot_users = mysqli_fetch_assoc(mysqli_query($con,"select count(id) as totusers from user_basic where sponsor_id=".$userid));
        // get total transactions
        $tot_trans = mysqli_fetch_assoc(mysqli_query($con,"SELECT count(trans_id) as tottrans FROM `user_paid_reciept` where user_id=".$userid));
        return $tot_amount['total_amount']."-".$tot_users['totusers']."-".$tot_trans['tottrans'];
    }
    public function GetUsersListOld(){
        global $con;
        $user_list = mysqli_query($con," select full_name, mobile, date_created from user_basic where sponsor_id !=0 order by date_created desc LIMIT 5");
        return $user_list;
    }
    public function GetActiveUsersOld(){
        global $con;
        $tot_act_users = mysqli_fetch_assoc(mysqli_query($con,"select count(id) as totactusers from user_basic where is_active=1"));
        return $tot_act_users['totactusers'];
    }
    public function GetInactiveUsersOld($vsponsorid){
        global $con;
        $in_act_users = mysqli_query($con,"select id,full_name from user_basic where sponsor_id=".$vsponsorid." and is_active=0");
        return $in_act_users;
    }
    #endregion
    #region New Methods
    public function GetUserDetails($logid){
        global $con;
        $select_qry = "select full_name as fname,email as email,mobile as mobile,login_id as loginid,
acc_name as accname,acc_no as accno,bank_name as bankname,ifsc as ifsc,
address_1 as address1,address_2 as address2,Gpay as gpay,PhonePe as phonepe,
PayTm as paytm,city as city,state as state from user_details where login_id='".$logid."'";
        $res = mysqli_fetch_assoc(mysqli_query($con,$select_qry));
        return $res;
    }
    public function GetUserDetailsById($vid){
        global $con;
        //$qry = " select * from user_details where id =".$vid;
        $qry = "select * from user_details where sponsor_id='".$vid."' OR id='".$vid."' OR spill_id='".$vid."'";
        $res = mysqli_query($con,$qry);
        if(!is_bool($res) && mysqli_num_rows($res)>0){
            $rest = mysqli_fetch_assoc($res);
            return $rest;
        }else{
            return false;
        }
    }
    
    public function GetUserDetailsByMobile($mobile){
        global $con;
        //$qry = " select * from user_details where id =".$vid;
        $qry = "select * from user_details where mobile='".$mobile."'";
        $res = mysqli_query($con,$qry);
        if(!is_bool($res) && mysqli_num_rows($res)>0){
            $rest = mysqli_fetch_assoc($res);
            return $rest;
        }else{
            return false;
        }
    }
    
    public function GetUserDetailsByLog($vlog,$vid){
        global $con;
        $find_id  = mysqli_fetch_assoc(mysqli_query($con,"select count(id) as cn from user_details where sponsor_id=".$vlog." and login_id='".$vid."'"));
        if($find_id['cn']>0){
            $res = mysqli_fetch_assoc(mysqli_query($con," select * from user_details where login_id ='".$vid."'"));
            return $res;
        }
        else{
            return false;
        }
    }
    public function GetReferredUsers($spnid){
        //date_created
        global $con;
        $qry = "select * from user_basic where sponsor_id=".$spnid;
        $res = mysqli_query($con,$qry);
        return $res;
    }
    public function UpdateAdress($uid){
        global $con;
        $upd_add_qry = "Update user_details set address_1='".self::getAdress1()."', address_2 ='".self::getAddress2()."', city='".self::getCity()."', state='".self::getState()."'  where id=".$uid;
        $res = mysqli_query($con,$upd_add_qry);
        return $res;
    }
    public function UdpateBankDetails($lid){
        global $con;
        $upd_bank_qry = "Update user_details set bank_name='".self::getBankName()."',acc_no='".self::getAccNo()."',ifsc='".self::getIFSC()."',acc_name='".self::getAccName()."' where id=".$lid;
        $res = mysqli_query($con,$upd_bank_qry);
        return $res;
    }
    public function UpdatePaymentDetails($pid){
        global $con;
        $upd_pay_qry = "Update user_details set Gpay='".self::getGPay()."', PhonePe='".self::getPhonePe()."', PayTm='".self::getPayTm()."' where id=".$pid;
        $res = mysqli_query($con,$upd_pay_qry);
        return $res;
    }
    public function GetChildCount($vid){
        $f_cnt = self::RecursiveChildCount($vid);
        return  $f_cnt;
    }
    public function RecursiveChildCount($vid){
        global $con;
        // get first 2 nodes left and right
        $fin_lft_cnt_main = self::RecursiveLeftChildCount($vid);
        $fin_rgt_cnt_main = self::RecursiveRightChildCount($vid);
        return $fin_lft_cnt_main."-".$fin_rgt_cnt_main;
    }
    public function RecursiveLeftChildCount($vlfid){
        global $con;
        static $fin_lft_cnt = 0;
        // select id from user_details where sponsor_id = 2 and is_active=1 and spill_id=2 and side='left' order by date_created asc
        $get_first_left_node = mysqli_query($con,"select id from user_details where sponsor_id = ".$vlfid." and is_active=1 and spill_id=".$vlfid." and side='left' order by date_created asc");
        if(mysqli_num_rows($get_first_left_node) >0)
        {
            $fin_lft_cnt++;
            while($r = mysqli_fetch_array($get_first_left_node)){
                $get_second_left_nodes =  mysqli_query($con,"select count(id) as lcnt_1 from user_details where sponsor_id=".$r[0]." OR spill_id=".$r[0]);
                if(mysqli_num_rows($get_second_left_nodes)>0){
                    $c1= mysqli_fetch_array($get_second_left_nodes);
                    $fin_lft_cnt = $fin_lft_cnt+$c1[0];
                    $fin_lft_cnt = $fin_lft_cnt + $this->RecursiveLeftChildCount($r[0]);
                }
            }
        }
        return $fin_lft_cnt;
    }
    public function RecursiveRightChildCount($vrid){
        global $con;
        static $fin_rgt_cnt = 0;
        //select id from user_details where sponsor_id = 2 and is_active=1 and spill_id=2 and side='right' order by date_created asc
        $get_first_right_node = mysqli_query($con,"select id from user_details where sponsor_id = ".$vrid." and is_active=1 and spill_id=".$vrid." and side='right' order by date_created asc");
        if(mysqli_num_rows($get_first_right_node) >0)
        {
            $fin_rgt_cnt++;
            while($s = mysqli_fetch_array($get_first_right_node)){
                $get_second_right_nodes = mysqli_query($con,"select count(id) as lcnt_1 from user_details where sponsor_id=".$s[0]." OR spill_id=".$s[0]);
                if(mysqli_num_rows($get_second_right_nodes)>0){
                    $c2= mysqli_fetch_array($get_second_right_nodes);
                    $fin_rgt_cnt = $fin_rgt_cnt+$c2[0];
                    $fin_rgt_cnt = $fin_rgt_cnt+ $this->RecursiveRightChildCount($s[0]);
                }
            }
        }
        return $fin_rgt_cnt;
    }
    public function GetChildsByUserId($vuserid,$isactiv){
        global $con;
        // $child_list = mysqli_query($con,"SELECT * FROM `user_details`  where sponsor_id=".$vuserid." OR spill_id=".$vuserid." and is_active=".$isactiv." order by date_created asc limit 6");
        $child_list1 = mysqli_query($con,"SELECT * FROM `user_details`  where (sponsor_id=".$vuserid." ) and is_active=".$isactiv." order by date_created asc limit 6");
        if(mysqli_num_rows($child_list1)>0){
           return $child_list1;
        }
        //else{
        //    $child_list2 = mysqli_query($con,"SELECT * FROM `user_details`  where (spill_id=".$vuserid." ) and is_active=".$isactiv." order by date_created asc limit 6");
        //    return  $child_list2;
        //}
        //return $child_list;
    }
    public function ActivateUserById($vusid){
        global $con;
        $get_spill_id="";$sponsor_lvl_1_qry="";$sponsor_lvl_2_qry="";$sponsor_lvl_3_qry="";
        $q1="";$q2="";$q3="";
        $ins_1="";$ins_2="";$ins_3="";
        $get_spill_id = "select spill_id from user_details where id = ".$vusid;
        $spill_id = mysqli_fetch_assoc(mysqli_query($con,$get_spill_id));
        $sponsor_lvl_1_qry = "select spill_id,full_name,id from user_details where id = ".$spill_id['spill_id'];
        //$sponsor_lvl_1_qry = "select sponsor_id,full_name,id from user_details where id = ".$spill_id['spill_id'];
        $sponsor_lvl_1 = mysqli_fetch_assoc(mysqli_query($con,$sponsor_lvl_1_qry));
        $sponsor_lvl_2_qry = "select spill_id,full_name,id from user_details where id=".$sponsor_lvl_1['spill_id'];
        $sponsor_lvl_2 = mysqli_fetch_assoc(mysqli_query($con,$sponsor_lvl_2_qry));
        if($sponsor_lvl_1['spill_id'] !=0){
            $ins_1 ="insert";
        }
        if($sponsor_lvl_2['spill_id'] != 0){
            $sponsor_lvl_3_qry = "select sponsor_id,full_name,id,side from user_details where id=".$sponsor_lvl_2['spill_id'];
            $sponsor_lvl_3 = mysqli_fetch_assoc(mysqli_query($con,$sponsor_lvl_3_qry));
            $ins_2="insert";
            if($sponsor_lvl_3['side'] == "master" && $sponsor_lvl_3['sponsor_id']==0){
                $ins_3="insert";
            }
            if($sponsor_lvl_3['sponsor_id'] ==""){
                $ins_3="";
            }
        }
        $dat = self::setDate();
        //$activate_user = true;
        $activate_user = mysqli_query($con,"update user_details set is_active=1 where id=".$vusid);
        $res = false;
        if($activate_user){
            if($ins_1 =="insert"){
                $q1 = "insert into user_wallet_credit values(null,".$sponsor_lvl_1['id'].",'".$sponsor_lvl_1['full_name']."',100,'".self::getDate()."')";
                $sponsor_lvl_1_ins_qry =  mysqli_query($con,$q1);
                if($sponsor_lvl_1_ins_qry){
                    // $res =  true;
                    //update Wallet Code  - Start
                    $res = self::UpdateWalletById($sponsor_lvl_1['id'],100);
                    // End
                }else {
                    $res = false;
                }
            }
            if($ins_2 == "insert"){
                //$q2 = "insert into user_wallet_credit values(null,".$sponsor_lvl_1['sponsor_id']."'".$sponsor_lvl_1['full_name']."',100,'".self::getDate()."')";
                $q2 = "insert into user_wallet_credit values(null,".$sponsor_lvl_2['id'].",'".$sponsor_lvl_2['full_name']."',100,'".self::getDate()."')";
                $sponsor_lvl_2_ins_qry = mysqli_query($con,$q2);
                if($sponsor_lvl_2_ins_qry){
                    //$res =  true;
                    // Update Wallet Code - Start
                    $res = self::UpdateWalletById($sponsor_lvl_2['id'],100);
                    // End
                }else {
                    $res = false;
                }
            }
            if($ins_3 == "insert"){
                $q3 =  "insert into user_wallet_credit values(null,".$sponsor_lvl_3['id'].",'".$sponsor_lvl_3['full_name']."',100,'".self::getDate()."')";
                $sponsor_lvl_3_ins_qry = mysqli_query($con,$q3);
                if($sponsor_lvl_3_ins_qry){
                    //$res =  true;
                    // Update Wallet Code - Start
                    $res = self::UpdateWalletById($sponsor_lvl_3['id'],100);
                    // End
                }else {
                    $res = false;
                }
            }
            //return "1 ".$get_spill_id.";2 ".$sponsor_lvl_1_qry.";3 ".$sponsor_lvl_2_qry.";4 ".$sponsor_lvl_3_qry.";5 ". $q1.";6 ".$q2.";7 ".$q3.";";
        }
        return $res;
    }
    public function GetSpillIds($vlogid,$vside,$id){
        global $con;
        $spl_qry = "select id,full_name from user_details where sponsor_id=".$vlogid;
        if($vside != ""){
            $spl_qry ="select id,full_name from user_details where sponsor_id=".$vlogid." and side='".$vside."' and id !=".$id;
        }
        $spill_list = mysqli_query($con,$spl_qry);
        return $spill_list;
    }
    public function GetPopUpDetails($vlogid){
        global $con;
        // first get user_id based on login id
        //$user_id = mysqli_fetch_assoc(mysqli_query($con,"select id from user_details where login_id ='".$vlogid."'"));
        // get left count based on user_id
        $left_count = mysqli_fetch_assoc(mysqli_query($con,"select count(side) as leftcount from user_details where side ='left' and sponsor_id=".$vlogid));
        //get right count based on user-id
        $right_count = mysqli_fetch_assoc(mysqli_query($con,"select count(side) as rightcount from user_details where side ='right' and sponsor_id=".$vlogid));
        // find the wallet amount based on user_id
        $wallet = 0; // pending functionality
        return  $left_count['leftcount']."-".$right_count['rightcount']."-".$wallet;
    }
    public function GetTotalDetails($userid){
        global $con;
        // get total amount in wallet
        $tot_amount = mysqli_fetch_assoc(mysqli_query($con,"SELECT total_amount FROM `user_wallet_concat` where user_id=".$userid));
        // get total sponsored users
        $tot_user_sposnored = mysqli_fetch_assoc(mysqli_query($con,"select count(id) as totusers from user_details where sponsor_id=".$userid));
        // get total  users based on spilling
        // get total transactions
        $tot_trans = mysqli_fetch_assoc(mysqli_query($con,"SELECT count(trans_id) as tottrans FROM `user_paid_reciept` where user_id=".$userid));
        return $tot_amount['total_amount']."-".$tot_user_sposnored['totusers']."-".$tot_trans['tottrans'];
    }
    public function GetUsersList(){
        global $con;
        $user_list = mysqli_query($con," select full_name, mobile, date_created from user_details where sponsor_id !=0 order by date_created desc LIMIT 5");
        return $user_list;
    }
    public function AddInvitation(){
        global $con;
        $helper_name= mysqli_fetch_assoc(mysqli_query($con,"select full_name from user_details where login_id='".self::getProvideHelp()."'"));
        $inv_res = mysqli_query($con,"insert into invitations values(null,'".self::getToMobile()."','".self::getProvideHelp()."','".$helper_name['full_name']."','".self::getDate()."')");
        return $inv_res;
    }
    public function GetTotalInvitations(){
        global $con;
        $tot_inv = mysqli_fetch_assoc(mysqli_query($con,"select count(id) as totinv from invitations"));
        return $tot_inv['totinv'];
    }
    public function GetActiveUsers(){
        global $con;
        $tot_act_users = mysqli_fetch_assoc(mysqli_query($con,"select count(id) as totactusers from user_details where is_active=1"));
        return $tot_act_users['totactusers'];
    }
    public function GetInactiveUsers($vsponsorid){
        global $con;
        $in_act_users = mysqli_query($con,"select id,full_name from user_details where sponsor_id=".$vsponsorid." and is_active=0");
        return $in_act_users;
    }
    public function GetProvideHelpersList(){
        global $con;
        $ph_list = mysqli_query($con,"select id,full_name,mobile,date_created,login_id from user_details where is_active=0");
        return $ph_list;
    }
    public function GetHelpersList(){
        global $con;
        $gh_list = mysqli_query($con,"select up.id,up.full_name,up.mobile,up.amount_req,up.date_req ,ud.login_id  from user_payments as up join user_details as ud on ud.id = up.user_id");
        return $gh_list;
    }
    public function UpdateWalletById($wid,$amnt){
        global $con;
        $res="testing";
        $in_date = self::setDate();
        $sel_row = mysqli_fetch_assoc(mysqli_query($con,"select count(id) as cnt from user_wallet_concat where user_id=".$wid));
        if($sel_row['cnt']>0){
            $get_amnt = mysqli_fetch_assoc(mysqli_query($con,"select total_amount as tot from user_wallet_concat where user_id=".$wid));
            $tot  = $get_amnt['tot']+$amnt;
            $upd= "Update user_wallet_concat set total_amount =".$tot.", date_updated='".self::getDate()."' where user_id=".$wid;
            $res = mysqli_query($con,$upd);
            //$res = $upd;
        }else{
            //id	user_id	total_amount	date_updated	amount_withdrawn	date_withdrawn
            $ins = "insert into user_wallet_concat values(null,".$wid.",".$amnt.",'".self::getDate()."',0,null)";
            $res = mysqli_query($con,$ins);
            // $res = $ins;
        }
        return $res;
    }
    public function GetAllSpillIds($sponsorId) {
        global $con;
        $spl_qry = "select id,sponsor_id,spill_id,full_name from user_details";
        $spill_result= mysqli_query($con,$spl_qry);
        $data = array();
        $tree_data = array();
        $tree_spillids = array();
        if ($spill_result->num_rows > 0) {
            while($row = $spill_result->fetch_assoc()) {
                array_push($data,$row);
                if($row['sponsor_id'] == $sponsorId){
                    //array_push($sponsor_spillids, $row);
                    array_push($tree_spillids, $row["id"]);
                }
            }
            $data_copy = new ArrayObject($data) ; 
            for ($i = 0; $i < count($data_copy); $i++) {
                $row = $data[$i];
                print $i;
                if(in_array($row['spill_id'],$tree_spillids)) {
                    array_push($tree_spillids, $row["id"]);
                    array_push($tree_data, $row);
                    array_slice($data_copy, $i);
                    $i=0;
                    print $i;
                }
            }
        }
        return $tree_data;
    }
    public function GetSponsorChilds($sponsorId) {
        $sql_qry = "with recursive cte (id,sponsor_id,spill_id,full_name,side ) as (
              select id,sponsor_id,spill_id,full_name,side from user_details 
              where      sponsor_id = $sponsorId
              union all
              select u.id,u.sponsor_id,u.spill_id,u.full_name,u.side from user_details as u
              inner join cte
                      on u.sponsor_id = cte.id
            )
            select * from cte order by spill_id,side";
        global $con;
        $spill_result= mysqli_query($con,$sql_qry);
        $data = array();
        while($row = $spill_result->fetch_assoc()) {
            array_push($data,$row);
        }
        return json_encode($data);;
    }
    
    public function sendSms($mobile, $msg) {
        $url = "http://smslogin.mobi/spanelv2/api.php?username=donatesms&password=Donate@2020&to=".trim($mobile)."&from=DONATE&message=".urlencode($msg);    //Store data into URL variable
        $ret = file($url);    //Call Url variable by using file() function
        return $ret;
    }
    public function smsDeliveryStatus($smsid) {
        // this link is used to get delivery result
        //http://smslogin.mobi/spanelv2/api.php?username=xxxx&password=xxxx&msgid=417a3b098442ba35
        $del_url= "http://smslogin.mobi/spanelv2/api.php?username=donatesms&password=Donate@2020&msgid=".$smsid;
        $del_ret = file($del_url);
        return $del_ret;
    }
    
    public function validateOTP($mobile, $otp) {
        global $con;
        $spl_qry = "update user_details set is_reg_verified=? where mobile = ? and reg_otp=?";
        $stmt = $con->prepare($spl_qry);
        $stmt->bind_param(true, $mobile, $otp);
        $res = $stmt.execute();
        $stmt.close();
        return $res;
    }
    #endregion
}
$objUserModel =  new UserModel();
?>
