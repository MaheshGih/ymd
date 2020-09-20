<?php 
include('../include/config.php');
include('plan_model.php');
include('util_model.php');
?>
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
    public $reg_otp="";
    public $reg_verified;
    public $status="";
    public $role="";
    
    public $status_list = [ "REGISTERED" => "REGISTERED", "REG_VERIFIED" => "REG_VERIFIED", 
        "REG_NOT_VERIFIED" => "REG_NOT_VERIFIED", "HELP_REQ_INITIATED" => "HELP_REQ_INITIATED", "HELP_PROVIDED" => "HELP_PROVIDED", 
        "HELP_REQ_REJECTED" => "HELP_REQ_REJECTED", "HELP_REQ_EXPIRED" => "HELP_REQ_EXPIRED", "ACTIVE" => "ACTIVE", "INACTIVE" => "INACTIVE",
        "BLOCKED" => "BLOCKED", "EXPIRED" => "EXPIRED"];
    
    public $invitationStatus = ["REJECTED"=>"REJECTED","EXPIRED"=>"EXPIRED","ACCEPTED"=>"ACCEPTED","PAYMENT_DONE"=>"PAYMENT_DONE","SENT"=>"SENT"];
    
    public $roles = [ "ROLE_ADMIN"=>"ROLE_ADMIN", "ROLE_EMP"=>"ROLE_ADMIN", "ROLE_USER"=>"ROLE_USER"];
    
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
    public function setRegOtp($votp){$this->reg_otp= $votp;}
    public function getRegOtp(){ return $this->reg_otp;}
    public function setRegVerified($vreg_verified){$this->reg_verified= $vreg_verified;}
    public function getRegVerified(){ return $this->reg_verified;}
    
    public function setStatus($vstatus){$this->status= $vstatus;}
    public function getStatus(){ return $this->status;}
    public function setRole($vrole){ $this->role = $vrole; }
    public function getRole(){ return $this->role; }
    
    public function getStausByKey($vstatus){
        return array_search($vstatus, $this->status_list);
    }
    
    public function getInvitationStausByKey($vstatus){
        return array_search($vstatus, $this->invitationStatus);
    }
    
    public function getRoleByKey($vrole){
        return array_search($vrole, $this->roles);
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
    public function GetAdminUserDetails(){
        global $con;
        $res = mysqli_fetch_assoc(mysqli_query($con,"select * from user_details where role='ROLE_ADMIN'"));
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
        $select_qry = "select * from user_details where login_id='".$logid."'";
        $res = mysqli_fetch_assoc(mysqli_query($con,$select_qry));
        return $res;
    }
    
    public function UpdateMobile($logid,$mobile){
        global $con;
        $sql = "update user_details set mobile=? where login_id=?";
        $wal_stmt = $con->prepare($sql);
        $wal_stmt->bind_param('ss',$mobile,$logid);
        $res = $wal_stmt->execute();
        $wal_stmt->close();
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
    
    public function GetUserBasicDetailsById($userId){
        global $con;
        $sql = "select id,login_id,full_name,side,sponsor_id,spill_id from user_details where id=?";
        $wal_stmt = $con->prepare($sql);
        $wal_stmt->bind_param('i',$userId);
        $res = $wal_stmt->execute();
        $res = $wal_stmt->get_result();
        $res = $res->fetch_assoc();
        $wal_stmt->close();
        return $res;
    }
    
    public function GetUserBasicDetailsByLoginId($loginId){
        global $con;
        $sql = "select id,login_id,full_name,side,sponsor_id,spill_id from user_details where login_id=?";
        $wal_stmt = $con->prepare($sql);
        $wal_stmt->bind_param('s',$loginId);
        $res = $wal_stmt->execute();
        $res = $wal_stmt->get_result();
        $res = $res->fetch_assoc();
        $wal_stmt->close();
        return $res;
    }
    
    public function GetUserDetailsByUserId($vid){
        global $con;
        //$qry = " select * from user_details where id =".$vid;
        $qry = "select * from user_details where id=".$vid;
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
        $qry = "select * from user_details where sponsor_id=".$spnid;
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
        $child_list1 = mysqli_query($con,"SELECT * FROM `user_details`  where (sponsor_id=".$vuserid." ) and is_active=".$isactiv." order by date_created asc");
        return $child_list1;
        //else{
        //    $child_list2 = mysqli_query($con,"SELECT * FROM `user_details`  where (spill_id=".$vuserid." ) and is_active=".$isactiv." order by date_created asc limit 6");
        //    return  $child_list2;
        //}
        //return $child_list;
    }
    
    public function GetAllUsersByStatus($isactive,$time){
        global $con;
        if(empty($time)){
           $time = 24; 
        }
        date_default_timezone_set("Asia/Calcutta");
        $DateTime = new DateTime();
        $str = '-'.$time.' hours';
        $expDate = $DateTime->modify($str);
        
        $d = date("Y-m-d h:i:s",$expDate->getTimestamp());
        
        // $child_list = mysqli_query($con,"SELECT * FROM `user_details`  where sponsor_id=".$vuserid." OR spill_id=".$vuserid." and is_active=".$isactiv." order by date_created asc limit 6");
        $res = mysqli_query($con,"SELECT * FROM `user_details`  where  is_active=".$isactive." and date_created < '".$d."' order by date_created asc");
        return $res;
        //else{
        //    $child_list2 = mysqli_query($con,"SELECT * FROM `user_details`  where (spill_id=".$vuserid." ) and is_active=".$isactiv." order by date_created asc limit 6");
        //    return  $child_list2;
        //}
        //return $child_list;
    }
    
    public function GetEmployees(){
        global $con;
        $res = mysqli_query($con,"SELECT * FROM `user_details` where role='ROLE_EMP'");
        return $res;
    }
    
    public function ActivateUserById($vusid){
        global $con;
        global $help_commission;
        $user_deatils="";$sponsor_lvl_1_qry="";$sponsor_lvl_2_qry="";$sponsor_lvl_3_qry="";
        $q1="";$q2="";$q3="";
        $ins_1="";$ins_2="";$ins_3="";
        $user_qry = "select spill_id, sponsor_id, id, full_name from user_details where id = ".$vusid;
        $user_deatils = mysqli_fetch_assoc(mysqli_query($con,$user_qry));
        
        $sponsor_lvl_1_qry = "select spill_id,full_name,id from user_details where id = ".$user_deatils['spill_id'];
        $sponsor_lvl_1 = mysqli_fetch_assoc(mysqli_query($con,$sponsor_lvl_1_qry));
        
        //$sponsor_lvl_1_qry = "select sponsor_id,full_name,id from user_details where id = ".$spill_id['spill_id'];
        /* if($sponsor_lvl_1['spill_id'] == 0){
            $ins_1 ="insert";
        } */
        $ins_1 ="insert";
        if($sponsor_lvl_1['spill_id'] != 0){
            
            
            $sponsor_lvl_2_qry = "select spill_id,sponsor_id,full_name,id,side from user_details where id=".$user_deatils['sponsor_id'];
            $sponsor_lvl_2 = mysqli_fetch_assoc(mysqli_query($con,$sponsor_lvl_2_qry));
            if(($user_deatils['spill_id'] == $user_deatils['sponsor_id'])){
                $ins_2="insert";
                $ins_1="";
            }else{
                $ins_2="insert";
            }
            if($sponsor_lvl_2['sponsor_id'] != 0){
                $sponsor_lvl_3_qry = "select sponsor_id,full_name,id,side from user_details where id=".$sponsor_lvl_2['sponsor_id'];
                $sponsor_lvl_3 = mysqli_fetch_assoc(mysqli_query($con,$sponsor_lvl_3_qry));
                $ins_3="insert";
                /* if($sponsor_lvl_3['side'] == "master" && $sponsor_lvl_3['sponsor_id']==0){
                    $ins_3="insert";
                }
                if($sponsor_lvl_3['sponsor_id'] ==""){
                    $ins_3="";
                } */
            }
            
        }
        
        $con -> autocommit(FALSE);
        //$activate_user = true;
        $user_status = self::getStausByKey("ACTIVE");
        $activate_user = mysqli_query($con,"update user_details set is_active=1,status='".$user_status."' where id=".$vusid);

        $res = false;
        $txn_is_done = 1;
        $txn_type = 'CREDIT';
        $txn_lvl_cause = 'LEVEL';
        $txn_ref_cause = 'REFERRAL';
        
        $user_deatils_full_name = $user_deatils['full_name'];
        $user_deatils_id = $user_deatils['id'];
        $wal_ins_qry = "insert into user_wallet_txn(user_id,full_name,amount,txn_type,is_done,cause_type,cause_full_name,cause_user_id) values(?,?,?,?,?,?,?,?)";
        $wal_ins_stmt = $con->prepare($wal_ins_qry);
        if($activate_user){
            if($ins_1 =="insert"){
                /* $q1 = "insert into user_wallet_txn(user_id,full_name,amount,cr_date,txn_type,is_done,casue_type,cause_full_name,cause_user_id) 
                    values(null,".$sponsor_lvl_1['id'].",'".$sponsor_lvl_1['full_name']."',100,'".self::getDate()."')";
                $sponsor_lvl_1_ins_qry =  mysqli_query($con,$q1);
                 */
                $sponsor_lvl_1_id = $sponsor_lvl_1['id'];
                $sponsor_lvl_1_full_name = $sponsor_lvl_1['full_name'];
                $wal_ins_stmt->bind_param("isdsissi",$sponsor_lvl_1_id,$sponsor_lvl_1_full_name,$help_commission,$txn_type,$txn_is_done,$txn_lvl_cause,$user_deatils_full_name,$user_deatils_id);
                $sponsor_lvl_1_ins_res = $wal_ins_stmt->execute();
                
                if($sponsor_lvl_1_ins_res){
                    // $res =  true;
                    //update Wallet Code  - Start
                    $res = self::UpdateWalletById($sponsor_lvl_1['id'],$help_commission);
                    // End
                }else {
                    $res = false;
                }
            }
            if($ins_2 == "insert"){
                //$q2 = "insert into user_wallet_credit values(null,".$sponsor_lvl_1['sponsor_id']."'".$sponsor_lvl_1['full_name']."',100,'".self::getDate()."')";
                /* $q2 = "insert into user_wallet_txn(user_id,full_name,amount,cr_date,txn_type,is_done,casue_type,cause_full_name,cause_user_id) 
                    values(".$sponsor_lvl_2['id'].",'".$sponsor_lvl_2['full_name']."',100,'".self::getDate()."')";
                $sponsor_lvl_2_ins_qry = mysqli_query($con,$q2); */
                $sponsor_lvl_2_id = $sponsor_lvl_2['id'];
                $sponsor_lvl_2_full_name = $sponsor_lvl_2['full_name'];
                $wal_ins_stmt->bind_param("isdsissi",$sponsor_lvl_2_id,$sponsor_lvl_2_full_name,$help_commission,$txn_type,$txn_is_done,$txn_ref_cause,$user_deatils_full_name,$user_deatils_id);
                $sponsor_lvl_2_ins_res = $wal_ins_stmt->execute();
                
                if($sponsor_lvl_2_ins_res){
                    //$res =  true;
                    // Update Wallet Code - Start
                    $res = self::UpdateWalletById($sponsor_lvl_2['id'],$help_commission);
                    // End
                }else {
                    $res = false;
                }
            }
            if($ins_3 == "insert"){
                /* $q3 =  "insert into user_wallet_txn(user_id,full_name,amount,cr_date,txn_type,is_done,casue_type,cause_full_name,cause_user_id) 
                    values(null,".$sponsor_lvl_3['id'].",'".$sponsor_lvl_3['full_name']."',100,'".self::getDate()."')";
                $sponsor_lvl_3_ins_qry = mysqli_query($con,$q3);
                 */
                $sponsor_lvl_3_id = $sponsor_lvl_3['id'];
                $sponsor_lvl_3_full_name = $sponsor_lvl_3['full_name'];
                $wal_ins_stmt->bind_param("isdsissi",$sponsor_lvl_3_id,$sponsor_lvl_3_full_name,$help_commission,$txn_type,$txn_is_done,$txn_lvl_cause,$user_deatils_full_name,$user_deatils_id);
                $sponsor_lvl_3_ins_res = $wal_ins_stmt->execute();
                
                if($sponsor_lvl_3_ins_res){
                    //$res =  true;
                    // Update Wallet Code - Start
                    $res = self::UpdateWalletById($sponsor_lvl_3['id'],$help_commission);
                    // End
                }else {
                    $res = false;
                }
            }
            //return "1 ".$get_spill_id.";2 ".$sponsor_lvl_1_qry.";3 ".$sponsor_lvl_2_qry.";4 ".$sponsor_lvl_3_qry.";5 ". $q1.";6 ".$q2.";7 ".$q3.";";
        }
        $con->commit();
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
    public function GetRecentUsers(){
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
    
    public function UpdateInvitationStatus($vstatus, $vinvitationId){
        global $con;
        $res= mysqli_query($con,"update invitations set status = '".$vstatus."' where id=".$vinvitationId);
        return $res;
    }
    
    public function AddUserInvitation($provideUser, $getHelpUser, $withdrawReqId){
        global $con;
        self::setDate();
        $sentDate = self::getDate();
        $status = self::getInvitationStausByKey("SENT");
        $sql = "insert into invitations(id,to_mobile,provide_help_id,provide_help_name,date_sent,to_user_id,provide_mobile,to_user_name,status,withdraw_req_id)
        values(null,'".$getHelpUser['getHelpMobile']."','".$provideUser['provideHelpId']."','".$provideUser['provideHelpName']."',
        '".$sentDate."','".$getHelpUser['getHelpId']."','".$provideUser['provideHelpMobile']."','".$getHelpUser['getHelpName']."','".$status."',".$withdrawReqId." ) ";
        $inv_res = mysqli_query($con,$sql);
        return $inv_res;
    }
    
    public function AddUserInvitations($getHelpUsers){
        global $con;
        $con -> autocommit(FALSE);
        self::setDate();
        $sentDate = self::getDate();
        $status = self::getInvitationStausByKey("SENT");
        $qry = "insert into invitations(to_mobile,provide_help_id,provide_help_name,date_sent,to_user_id,provide_mobile,to_user_name,status,withdraw_req_id)
            values(?,?,?,?,?,?,?,?,?)";
        $stmt = $con->prepare($qry);
        foreach ($getHelpUsers as $key=>$r){
            foreach($r['ph_list'] as $phr){
                $stmt->bind_param("ssssssssi",$r['mobile'],$phr['login_id'],$phr['full_name'],$sentDate,$r['login_id'],$phr['mobile'],$r['full_name'],$status,$r['id']);
                $res = $stmt->execute();
            }
        }
        $con -> commit();
        $stmt->close();
        return $res;
    }
    
    public function GetTotalInvitations(){
        global $con;
        $tot_inv = mysqli_fetch_assoc(mysqli_query($con,"select count(id) as totinv from invitations"));
        return $tot_inv['totinv'];
    }
    
    public function GetInvitationsByUserId($loginId){
        global $con;
        $sql = "SELECT i.*, r.id as receipt_id, r.img_path,r.paid_date,r.user_id as provide_help_userid FROM invitations i left outer join user_paid_reciept r on i.id=r.invitation_id where (provide_help_id='".$loginId."' or to_user_id='".$loginId."') and status in('SENT','PAYMENT_DONE')";
        $res= mysqli_query($con,$sql);
        return $res;
    }
    
    public function GetInvitationById($invitationId){
        global $con;
        $sql = "SELECT i.*, r.id as receipt_id, r.img_path,r.paid_date,r.user_id as provide_help_userid FROM invitations i left outer join user_paid_reciept r on i.id=r.invitation_id where i.id ='".$invitationId."'";
        $res= mysqli_fetch_assoc(mysqli_query($con,$sql));
        return $res;
    }
    
    public function GetActiveUsersCount(){
        global $con;
        $tot_act_users = mysqli_fetch_assoc(mysqli_query($con,"select count(id) as totactusers from user_details where is_active=1"));
        return $tot_act_users['totactusers'];
    }
    
    public function GetActiveUsers(){
        global $con;
        $res = mysqli_fetch_assoc(mysqli_query($con,"select * from user_details where is_active=1"));
        return $res;
    }
    
    public function GetInactiveUsers($vsponsorid){
        global $con;
        $in_act_users = mysqli_query($con,"select id,full_name from user_details where sponsor_id=".$vsponsorid." and is_active=0");
        return $in_act_users;
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
            $tot_amt = $get_amnt['tot'];
            $w_amt = $tot_amt;
            if( ($tot_amt<0 && $amnt>0) || ($tot_amt>0 && $amnt<0)){ //Stmt1: if both are not negative or if both are positive no need to add admin wallet
                $w_amt = $amnt + $tot_amt;
                if($amnt>0){
                    if($w_amt>0){ // After tot_amnt and amnt add, if wallet amount is bigger when update amount(i.e $amnt), 
                        //so in if 'Stmt1:' first condition is satisfied, so initial $tot_amont is negitive and $amnt is positive, so $admin_amt = $tot_amt   
                        $admin_amt = -($tot_amt);
                    }else{
                        $admin_amt = $amnt;
                    }
                }else{
                    if($w_amt>0){
                        $admin_amt = -($amnt);
                    }else{
                        $admin_amt = $tot_amt;
                    }
                }
                $user_details = mysqli_fetch_assoc(mysqli_query($con,"select id,full_name from user_details where id=".$wid));
                $user_id = $wid;
                $user_name = $user_details['full_name'];
                
                //master credit
                $admin = self::GetAdminUserDetails();
                $admin_id = $admin['id'];
                $admin_name = $admin['full_name'];
                
                $txn_ctype = 'CREDIT';
                $txn_is_done = 1;
                $txn_ref_cause='REFERRAL_BLOCKED';
                
                $wal_ins_qry = "insert into user_wallet_txn(user_id,full_name,amount,txn_type,is_done,cause_type,cause_full_name,cause_user_id) values(?,?,?,?,?,?,?,?)";
                $wal_ins_stmt = $con->prepare($wal_ins_qry);
                $wal_ins_stmt->bind_param("isdsissi",$admin_id,$admin_name,$admin_amt,$txn_ctype,$txn_is_done,$txn_ref_cause,$user_name,$user_id);
                $admin_ins_res = $wal_ins_stmt->execute();
                if($admin_ins_res)
                    self::UpdateWalletById($admin_id, $admin_amt);
            }else{
                $w_amt  = $tot_amt + $amnt;
            }

            $upd= "Update user_wallet_concat set total_amount =".$w_amt.", date_updated='".self::getDate()."' where user_id=".$wid;
            $res = mysqli_query($con,$upd);
            
        }else{
            //id	user_id	total_amount	date_updated	amount_withdrawn	date_withdrawn
            $ins = "insert into user_wallet_concat values(null,".$wid.",".$amnt.",'".self::getDate()."',0,null)";
            $res = mysqli_query($con,$ins);
            // $res = $ins;
        }
        
        return $res;
    }
    
    public function UpdateWalletWithdrawnAmnt($wid,$amnt){
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
    public function AcceptInvitationPaymentReceived($invitationId,$txn_type,$cause_type){
        global $con;
        global $help_amount;
        $status=self::getInvitationStausByKey("ACCEPTED");
        
        $con -> autocommit(FALSE);
        $invitation = self::GetInvitationById($invitationId);
        $withdrawReqId = $invitation['withdraw_req_id'];
        $res = self::UpdateInvitationStatus($status,$invitationId);
        $wal_ins_res = self::addWalletTxn($_SESSION['userid'], $_SESSION['fname'], $help_amount, $txn_type, 1, $cause_type, $invitation['provide_help_name'],$invitation['provide_help_userid']);
        $wal_udp_res = self::UpdateWalletWithdrawnAmnt($_SESSION['userid'], -($help_amount));
        $wrd_req = self::GetWithdrawReqById($withdrawReqId);
        $wrd_req_udp = self::UpdateWithdrawRequest($withdrawReqId,$wrd_req['amount_req']);
        $actin_res = self::ActivateUserById($invitation['provide_help_userid']);
        $res = $con -> commit();
        return $res;
    }
    
    public function GetWithdrawReqById($withdrawReqId){
        global $con;
        $sql = "select * from user_withdrawls where id=".$withdrawReqId;
        $res = mysqli_fetch_assoc(mysqli_query($con,$sql));
        return $res;
    }
    
    public function UpdateWithdrawRequest($withdrawReqId, $reqAmnt){
        global $con;
        global $help_amount;
        global $objUtilModel;
        $is_done = FALSE;
        $recAmnt = 0;
        $inv_sql = "select count(1)as cnt from invitations where withdraw_req_id=".$withdrawReqId." and status='ACCEPTED' ";
        $invs_res = mysqli_fetch_assoc(mysqli_query($con,$inv_sql));
        if($invs_res&&$invs_res['cnt']>0){
            $cnt = $invs_res['cnt'];
            $recAmnt = $help_amount * $cnt;
            if($reqAmnt == $recAmnt)
                $is_done = true;
        }
        $cur_date = $objUtilModel->getCurDate($objUtilModel->datetime_format);
        $upd_sql = "update user_withdrawls set amount_received=".$recAmnt.",date_received='".$cur_date."',is_done=".intval($is_done)." where id=".$withdrawReqId;
        $res = mysqli_query($con, $upd_sql);
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
    public function GetUserTree($sponsorId) {
        $sql_qry = "with recursive cte (id,sponsor_id,spill_id,full_name,mobile,side,is_active,lvl,id_path ) as (
              select id,sponsor_id,spill_id,full_name,mobile,side, is_active, 0 as lvl, cast(id as char(4194304)) as id_path from user_details
              where  spill_id = $sponsorId 
              union all
              select u.id,u.sponsor_id,u.spill_id,u.full_name,u.mobile,u.side, u.is_active, cte.lvl+1 lvl, concat(cte.id_path,',',u.id)id_path   from cte
              inner join user_details as u
                      on cte.id = u.spill_id
            )
            select id,sponsor_id,spill_id,full_name,mobile,side,lvl,id_path from cte order by id_path desc ";
        global $con;
        $child_count = mysqli_query($con,$sql_qry);
        return $child_count;
    }
    
    public function GetSponsorChilds($sponsorId) {
        $sql_qry = "with recursive cte (id,sponsor_id,spill_id,full_name,side ) as (
              select id,sponsor_id,spill_id,full_name,side from user_details 
              where spill_id = $sponsorId
              union all
              select u.id,u.sponsor_id,u.spill_id,u.full_name,u.side from cte 
              inner join user_details as u
                      on cte.id = u.spill_id  
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
    
    public function GetChildLevels($sponsorId, $vside, $lvl_size) {
        $sql_qry = "with recursive cte (id,sponsor_id,spill_id,full_name,side,is_active,lvl ) as (
              select id,sponsor_id,spill_id,full_name,side, is_active, 0 as lvl from user_details 
              where  spill_id = $sponsorId and is_active=1
              union all
              select u.id,u.sponsor_id,u.spill_id,u.full_name,u.side, u.is_active, cte.lvl+1  from cte 
              inner join user_details as u
                      on cte.id = u.spill_id  where cte.lvl<$lvl_size+1 and u.side=cte.side and u.is_active=cte.is_active
            )
            select * from cte order by spill_id,side";
        global $con;
        $child_count = mysqli_fetch_assoc(mysqli_query($con,$sql_qry));
        return $child_count;
    }
    
    public function GetChildsGivenDays($sponsorId,$from_noof_days) {
        global $housefull_in_days;
        global $housefull_size;
        
        $sql_qry = "with recursive cte (id,login_id,sponsor_id,spill_id,full_name,mobile,side,is_active,date_created,expired_date,royalty_id,lvl,id_path ) as (
              select id,login_id,sponsor_id,spill_id,full_name,mobile,side, is_active, date_created,expired_date,royalty_id, 0 as lvl, cast(id as char(4194304)) as id_path from user_details
              where  spill_id = $sponsorId and is_active=1
              union all
              select u.id,u.login_id,u.sponsor_id,u.spill_id,u.full_name,u.mobile,u.side, u.is_active, u.date_created, u.expired_date,u.royalty_id, cte.lvl+1 lvl, concat(cte.id_path,',',u.id)id_path   from cte
              inner join user_details as u
                      on cte.id = u.spill_id where u.is_active=cte.is_active
            )
            select id,login_id,sponsor_id,spill_id,full_name,mobile,side,date_created,expired_date,royalty_id,lvl,id_path from cte order by id_path";
        global $con;
        $child_count = mysqli_query($con,$sql_qry);
        return $child_count;
    }
    
    public function GetHousefullUsers($sponsorId) {
        global $objUtilModel;
        global $housefull_size;
        $childs = self::GetChildsGivenDays($sponsorId, 5);
        $users = array();
        $housefull_users= array();
        $cur_date= $objUtilModel->getCurDate($objUtilModel->date_format);
        $last_date = date('Y-m-d', strtotime("-4 days $cur_date"));
        while($row = $childs->fetch_assoc()) {
            array_push($users,$row);
            $key_data[$row['id']] = $row;
        }
        foreach ($users as $ukey => $user){
            if(!empty($user['royalty_id']))//already added royalty 
                continue;
            
            $parent_path = $user['id_path'].',';
            $lids = [];
            
            foreach ($users as $child){
                if( ($child['date_created']<=$last_date) || ($user['id'] != $child['sponsor_id']))
                    continue;
                
                $child_path = $child['id_path'];
                $ind = strpos($child_path, $parent_path);
                if ($ind !== false){
                    $len = $ind+strlen($parent_path);
                    if(! (strlen($child_path)>$len))
                        continue;
                       
                    $sub_path = substr($child_path,$len);
                    $ids = explode(',',$sub_path);
                    $lids = array_merge($lids,$ids);
                }
            }
            $lids = array_unique($lids);
            $cnt = count($lids);
            if($housefull_size<=$cnt){
                $housefulled_user = array_merge($user,array('child_cnt'=>count($lids)));
                array_push($housefull_users,$housefulled_user);
            }
        }
        return $housefull_users;
    }
    
    public function AddRoyalty($users) {
        global $con;
        global $objUtilModel;
        global $help_amount;
        global $royalty_amnt;
        global $user_expired_in_months;
        $con->autoCommit(FALSE);
        
        $wal_ins_qry = "insert into user_wallet_txn(user_id,full_name,amount,txn_type,is_done,cause_type,cause_full_name,cause_user_id) values(?,?,?,?,?,?,?,?)";
        $wal_ins_stmt = $con->prepare($wal_ins_qry);
        $roy_ins_sql = "INSERT INTO user_royalty (user_id,login_id,full_name,mobile,amount,expired_date,is_expired) values(?,?,?,?,?,?,?)";
        $roy_ins_stmt = $con->prepare($roy_ins_sql);
        $royp_ins_sql ="INSERT INTO user_royalty_points (user_id,login_id,point_no,amount,royalty_date,is_done,royalty_id) values(?,?,?,?,?,?,?)";
        $royp_ins_stmt = $con->prepare($royp_ins_sql);
        $user_ud_sql = "update user_details set royalty_id=? where login_id=?";
        $user_ud_tmt = $con->prepare($user_ud_sql);
        $cur_date= $objUtilModel->getCurDate($objUtilModel->date_format);
        $cur_date=strtotime($cur_date);
        foreach ($users as $user){
            
            $user_exp_date = strtotime($user['expired_date']);
            if($cur_date>$user_exp_date) //check user expired or not
                continue;
            
            $user_id=$user['id'];
            $name=$user['full_name'];
            $amnt=$help_amount;
            $txn_type='CREDIT';
            $txn_is_done =1 ;
            $txn_ref_cause='HOUSE_FULL';
            $cause_user_name=null;
            $cause_user_id=null;
            $wal_ins_stmt->bind_param("isdsissi",$user_id,$name,$amnt,$txn_type,$txn_is_done,$txn_ref_cause,$cause_user_name,$cause_user_id);
            $wal_ins_res = $wal_ins_stmt->execute();
            $amnt=$royalty_amnt;            
            $wal_ins_stmt->bind_param("isdsissi",$user_id,$name,$amnt,$txn_type,$txn_is_done,$txn_ref_cause,$cause_user_name,$cause_user_id);
            $wal_ins_res = $wal_ins_stmt->execute();
            
            $royaly_points = 1;
            $royalty_dates = [];
            foreach(range(1,$user_expired_in_months-1) as $i){
                $next_date = $objUtilModel->getExactDateAfterMonths($cur_date, $i);
                //$next_date = strtotime('Y-m-d',$next_date);
                if($next_date>$user_exp_date)
                    break;
                $royaly_points = $i;
                $next_date = date('Y-m-d',$next_date);
                array_push($royalty_dates,$next_date);
            }
            $login_id = $user['login_id'];
            $mobile = $user['mobile'];
            $royal_exp = end($royalty_dates);
            $is_exp = 0;
            $amnt = $help_amount + ($royalty_amnt*($royaly_points+1));
            $roy_ins_stmt->bind_param("isssdsi",$user_id,$login_id,$name,$mobile,$amnt,$royal_exp,$is_exp);
            $roy_ins_res = $roy_ins_stmt->execute();
            $royalty_id = $roy_ins_stmt->insert_id;
            $royalty_point = 1;
            $is_exp = 1;
            $cur_date_str =date('Y-m-d',$cur_date); 
            $royp_ins_stmt->bind_param("isidsii",$user_id, $login_id, $royalty_point, $royalty_amnt, $cur_date_str, $is_exp, $royalty_id);
            $royp_ins_res = $royp_ins_stmt->execute();
            
            foreach ($royalty_dates as $key=>$exp_date){
                $royaly_point = $key+2;
                $royp_ins_stmt->bind_param("isidsii",$user_id, $login_id, $royaly_point, $royalty_amnt, $exp_date,$is_exp, $royalty_id);
                $royp_ins_res = $royp_ins_stmt->execute();    
            }
            $user_ud_tmt->bind_param("is",$royalty_id,$login_id);
            $user_ud_res = $user_ud_tmt->execute();
            
        }
        $res = $con->commit();
        return $res;
    }
    
    public function GetRoyaltyUsers(){
        global $con;
        global $objUtilModel;
        $royalty_date = $objUtilModel->getCurDate($objUtilModel->date_format);
        $sql = "select ur.*,rp.id as point_id, rp.amount as royalty_amount,rp.royalty_date,rp.point_no 
            from user_royalty ur join user_royalty_points rp on ur.id = rp.royalty_id where royalty_date='".$royalty_date."' and rp.is_done=0";
        $res = mysqli_query($con, $sql);
        return $res;
    }
    
    public function AddUserRoyalty($users) {
        global $con;
        global $objUtilModel;
        global $help_amount;
        global $royalty_amnt;
        global $user_expired_in_months;
        $con->autoCommit(FALSE);
        
        $wal_ins_qry = "insert into user_wallet_txn(user_id,full_name,amount,txn_type,is_done,cause_type,cause_full_name,cause_user_id) values(?,?,?,?,?,?,?,?)";
        $wal_ins_stmt = $con->prepare($wal_ins_qry);
        $royp_ud_sql ="update user_royalty_points set is_done=1 where id=?";
        $royp_ud_sql_stmt = $con->prepare($royp_ud_sql);
        foreach ($users as $user){            
            $user_id=$user['id'];
            $name=$user['full_name'];
            $amnt=$user['royalty_amount'];
            $txn_type='CREDIT';
            $txn_is_done =1 ;
            $txn_ref_cause='HOUSE_FULL';
            $cause_user_name=null;
            $cause_user_id=null;
            $wal_ins_stmt->bind_param("isdsissi",$user_id,$name,$amnt,$txn_type,$txn_is_done,$txn_ref_cause,$cause_user_name,$cause_user_id);
            $wal_ins_res = $wal_ins_stmt->execute();
            $point_id=$user['point_id'];
            $royp_ud_sql_stmt->bind_param("i",$point_id);
            $royp_ins_res = $royp_ud_sql_stmt->execute();       
        }
        $res = $con->commit();
        return $res;
    }
    public function GetChilds($sponsorId) {
        $sql_qry = "with recursive cte (id,login_id,sponsor_id,spill_id,full_name,mobile,side,is_active,lvl_id,reward_id,lvl,id_path ) as (
              select id,login_id,sponsor_id,spill_id,full_name,mobile,side, is_active, lvl_id,reward_id, 0 as lvl, cast(id as char(4194304)) as id_path from user_details
              where  spill_id = $sponsorId and is_active=1
              union all
              select u.id,u.login_id,u.sponsor_id,u.spill_id,u.full_name,u.mobile,u.side, u.is_active, u.lvl_id,u.reward_id,cte.lvl+1 lvl, concat(cte.id_path,',',u.id)id_path   from cte
              inner join user_details as u
            		  on cte.id = u.spill_id where u.is_active=cte.is_active
            )
            select cte.id,cte.login_id,cte.sponsor_id,cte.spill_id,cte.full_name,cte.mobile,cte.side,cte.lvl_id,cte.id_path,
            l.level_name,l.left_pairs,l.right_pairs,l.inr_value,l.auto_pool_inr,l.req_direct_ids,l.l_order,
            reward_id,ur.level_id as reward_lvl_id 
            from cte left join levels l on cte.lvl_id = l.id 
            left join user_rewards ur on cte.reward_id = ur.id order by id_path ";
        global $con;
        $child_count = mysqli_query($con,$sql_qry);
        return $child_count;
    }
    
    public function GetChildsByCount($childs,$sponsorId) {
        $users = array();
        $key_data = array();
        while($row = $childs->fetch_assoc()) {
            array_push($users,$row);
            $key_data[$row['id']] = $row;
        }
        foreach ($users as $ukey => $user){
            $parent_path = $user['id_path'].',';
            $lids = [];
            $rids = [];
            $l = $r= $ref_count= 0;
            
            foreach ($users as $child){
                $child_path = $child['id_path'];
                $ind = strpos($child_path, $parent_path);
                if ($ind !== false){
                    $len = $ind+strlen($parent_path);
                    if(! (strlen($child_path)>$len))
                        continue;
                    $sub_path = substr($child_path,$len);
                    $ids = explode(',',$sub_path);
                    if(($l == 0 && $ids[0] != $r) || ($r == 0 && $ids[0] != $l)){
                        $imidiate_child = $key_data[$ids[0]];
                        if($imidiate_child['spill_id'] == $user['id']){
                            if($imidiate_child['side'] == 'left'){
                                $l = $imidiate_child['id'];
                            }else if($imidiate_child['side'] == 'right'){
                                $r = $imidiate_child['id'];
                            }
                        }        
                    }
                    if($l == $ids[0] ){
                        $lids = array_merge($lids,$ids);
                        $lids = array_unique($lids);
                    }
                    if($r == $ids[0]){
                        $rids = array_merge($rids,$ids);
                        $rids = array_unique($rids);
                    }
                }
            }
            //$user['lsize'] = count($lids);
            //$user['rsize'] = count($rids);
            $users[$ukey] = array_merge($user,array('lsize'=>count($lids),'rsize'=>count($rids)));
            
        }
        return $users;
    }
    
    public function rewardUsers($sponsorId){
        global $objPlanModel;
        $childs = self::GetChilds($sponsorId);
        $levels = $objPlanModel->GetLevels();
        $level_list = array();
        $lvl_order_data = array();
        while($row = $levels->fetch_assoc()) {
            array_push($level_list,$row);
            $lvl_order_data[$row['l_order']] = $row;
        }
        $reward_users = array();
        $users = self::GetChildsByCount($childs, $sponsorId);
        foreach ($users as $user){
            $lorder = $user['l_order'];
            $next_lvl = $lvl_order_data[$lorder+1];
            $lsize = $user['lsize'];
            $rsize = $user['rsize'];
            $left = $next_lvl['left_pairs'];
            $right = $next_lvl['right_pairs'];
            if(($lsize >= $left) && ($rsize >= $right)){
                $user = array_merge($user,array('next_lvl'=>$next_lvl));
                array_push($reward_users,$user);
            }
        }
        return $reward_users;
    }
    
    public function AddRewards($users){
        global $con;
        $con->autoCommit(FALSE);
        
        $wal_ins_qry = "insert into user_wallet_txn(user_id,full_name,amount,txn_type,is_done,cause_type,cause_full_name,cause_user_id) values(?,?,?,?,?,?,?,?)";
        $wal_ins_stmt = $con->prepare($wal_ins_qry);
        $rew_sql = "INSERT INTO user_rewards (login_id,full_name,mobile,level_id,amount,auto_pool,status) values(?,?,?,?,?,?,?)";
        $rew_ins_stmt = $con->prepare($rew_sql);
        $rew_sel =" select * from user_rewards where login_id=? and level_id =?";
        $rew_sel_stmt = $con->prepare($rew_sel);
        
        $user_sql = "update user_details set lvl_id=?,reward_id=? where login_id=?";
        $user_stmt = $con->prepare($user_sql);
        
        foreach ($users as $user){
            $next_lvl = $user['next_lvl'];
            $user_id=$user['id'];
            $login_id = $user['login_id'];
            $name=$user['full_name'];
            $amnt=$next_lvl['inr_value'];
            $txn_dtype='CREDIT';
            $txn_is_done =1 ;
            $txn_ref_cause='REWARD';
            $cause_user_name=null;
            $cause_user_id=null;
            $wal_ins_stmt->bind_param("isdsissi",$user_id,$name,$amnt,$txn_dtype,$txn_is_done,$txn_ref_cause,$cause_user_name,$cause_user_id);
            $ins_res = $wal_ins_stmt->execute();
            if($next_lvl['auto_pool_inr']>0){
                $user_id=$user['id'];
                $name=$user['full_name'];
                $amnt=$next_lvl['auto_pool_inr'];
                $txn_dtype='CREDIT';
                $txn_is_done =1 ;
                $txn_ref_cause='AUTO_POOL';
                $cause_user_name=null;
                $cause_user_id=null;
                $wal_ins_stmt->bind_param("isdsissi",$user_id,$name,$amnt,$txn_dtype,$txn_is_done,$txn_ref_cause,$cause_user_name,$cause_user_id);
                $ins_res = $wal_ins_stmt->execute();
            }
            $amnt = $next_lvl['inr_value'] + $next_lvl['auto_pool_inr'];
            $wal_udp_res = self::UpdateWalletById($user_id,$amnt);
            
            //add reward
            $amnt = $next_lvl['inr_value'];
            $auto_pool=$next_lvl['auto_pool_inr'];
            $level_id = $next_lvl['id'];
            $mobile = $user['mobile'];
            $status = 1;
            $rew_ins_stmt->bind_param('sssidds',$login_id,$name,$mobile,$level_id,$amnt,$auto_pool,$status);
            $rew_ins_res = $rew_ins_stmt->execute();
            
            /* $rew_sel_res = $rew_sel_stmt->bind_param('si',$login_id,$level_id);
            $rew_sel_stmt->execute();
            $rew_res = mysqli_fetch_assoc($rew_sel_stmt->get_result());
            $rew_id = $rew_res['id']; */
            $rew_id = $rew_ins_stmt->insert_id;
            $user_res = $user_stmt->bind_param('iis',$level_id,$rew_id,$login_id);
            $user_stmt->execute();
        }
        $con->commit();
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
    
    public function smsGetHelperMsg($receiver_login_id, $helper_name, $helper_login_id, $helper_mobile){
        $get_help_message = "Hello '".$receiver_login_id."', You will get Help of Rs 1000/- ($14.2) from '".$helper_name."' ('".$helper_login_id."').Please Contact '".$helper_mobile."' .Thanking you www.ymd1000us.com";
        return $get_help_message;
    }
    
    public function smsProviderHelpMsg($receiver_login_id, $receiver_name, $receiver_mobile){
        $provide_help_mesage =  "You have to Provide help Rs.1,000/- ($14.2) to ".$receiver_name." (".$receiver_login_id.").Please Contact ".$receiver_mobile.".Thanking you www.ymd1000us.com";
        return $provide_help_mesage;
    }
    
    public function smsSendInvitations($gh_send_list){
        foreach ($gh_send_list as $r){
            foreach ($r['ph_list'] as $ph){
               $provideHelpMsg = self::smsProviderHelpMsg($r['login_id'], $r['full_name'], $r['mobile']);
               $getHelpMsg = self::smsGetHelperMsg($r['login_id'], $ph['full_name'], $ph['login_id'], $ph['mobile']);
               self::sendSms($ph['mobile'], $provideHelpMsg);
               self::sendSms($r['mobile'], $getHelpMsg);
            }
        }
    }
    
    public function validateOTP($login_id, $otp) {
        global $con;
        $status = self::getStausByKey("REG_VERIFIED");
        $spl_qry = "update user_details set reg_verified=?, status=? where login_id = ? and reg_otp=?";
        $stmt = $con->prepare($spl_qry);
        $verified = intval(true);
        $stmt->bind_param("isss", $verified, $status, $login_id, $otp);
        $otp = $con->real_escape_string($otp);  
        $login_id = $con->real_escape_string($login_id);
        $res = $stmt->execute();
        $stmt->close();
        return $res;
    }
    
    public function updateUserStatusById($login_id,$status) {
        global $con;
        $spl_qry = "update user_details set  status=? where login_id = ?";
        $stmt = $con->prepare($spl_qry);
        $stmt->bind_param("ss", $status, $login_id);
        $res = $stmt->execute();
        $stmt->close();
        return $res;
    }
    
    public function updateUserStatusAndIsActiveById($login_id,$status,$isActive) {
        global $con;
        $spl_qry = "update user_details set  status=?,is_active=? where login_id = ?";
        $stmt = $con->prepare($spl_qry);
        $stmt->bind_param("sis", $status, $isActive, $login_id);
        $res = $stmt->execute();
        $stmt->close();
        return $res;
    }
    
    public function updateUserOTP($login_id, $otp) {
        global $con;
        $spl_qry = "update user_details set reg_otp = ? where login_id=?";
        $stmt = $con->prepare($spl_qry);
        $stmt->bind_param("ss",$otp, $login_id);
        $otp = $con->real_escape_string($otp);
        $login_id = $con->real_escape_string($login_id);
        $res = $stmt->execute();
        $stmt->close();
        return $res;
    }
    
    public function GetUsersByStatus($status){
        //date_created
        global $con;
        $qry = "select * from user_details where status=?";
        $stmt = $con->prepare($qry);
        $stmt->bind_param("s", $status);
        $res = $stmt->execute();
        $res = $stmt->get_result();
        $stmt->close();
        return $res;
    }
    
    public function changePassword($login_id, $password) {
        global $con;
        $spl_qry = "update user_details set password = ? where login_id=?";
        $stmt = $con->prepare($spl_qry);
        $stmt->bind_param("ss",$password, $login_id);
        $otp = $con->real_escape_string($password);
        $login_id = $con->real_escape_string($login_id);
        $res = $stmt->execute();
        $stmt->close();
        return $res;
    }
    
    public function resetTxnPassword($login_id, $password) {
        global $con;
        $spl_qry = "update user_details set txn_password = ? where login_id=?";
        $stmt = $con->prepare($spl_qry);
        $stmt->bind_param("ss",$password, $login_id);
        $otp = $con->real_escape_string($password);
        $login_id = $con->real_escape_string($login_id);
        $res = $stmt->execute();
        $stmt->close();
        return $res;
    }
    
    public function ChangeTxnPassword($userId, $oldTxnPassword, $txnPassword){
        global $con;
        $sql = "update user_details set txn_password=? where id=? and txn_password=?" ;
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sis",$txnPassword,$userId,$oldTxnPassword);
        $res = $stmt->execute();
        $res = $stmt->affected_rows;
        $stmt->close();
        return $res;
    }
    
    public function isPasswordValid($login_id, $password) {
        global $con;
        $spl_qry = "select count(1)as cnt from user_details where login_id=? and password = ?";
        $stmt = $con->prepare($spl_qry);
        $stmt->bind_param("ss", $login_id,$password);
        $otp = $con->real_escape_string($password);
        $login_id = $con->real_escape_string($login_id);
        $res = $stmt->execute();
        $res = mysqli_fetch_assoc($stmt->get_result());
        $stmt->close();
        return $res;
    }
    
    public function isTxnPasswordValid($login_id, $password) {
        global $con;
        $spl_qry = "select count(1)as cnt from user_details where login_id=? and txn_password = ?";
        $stmt = $con->prepare($spl_qry);
        $stmt->bind_param("ss", $login_id,$password);
        $otp = $con->real_escape_string($password);
        $login_id = $con->real_escape_string($login_id);
        $res = $stmt->execute();
        $res = mysqli_fetch_assoc($stmt->get_result());
        $stmt->close();
        return $res;
    }
    
    public function blockUser($loginIds) {
        global $con;
        $con -> autocommit(FALSE);
        self::addPenalty($loginIds);
        $ids  = "('".implode("','", $loginIds)."')";
        $user_block_qry = "delete from user_details where login_id in ".$ids;
        $res = mysqli_query($con,$user_block_qry);
        $del_invi_qry = "delete from invitations where provide_help_id in ".$ids;
        $res = mysqli_query($con,$del_invi_qry);
        $con->commit();
        return $res;
    }
    
    public function addWalletTxn($user_id,$full_name,$amount,$txn_type,$is_done,$cause_type,$cause_full_name,$cause_user_id){
        global $con;
        $wal_ins_qry = "insert into user_wallet_txn(user_id,full_name,amount,txn_type,is_done,cause_type,cause_full_name,cause_user_id) values(?,?,?,?,?,?,?,?)";
        $wal_ins_stmt = $con->prepare($wal_ins_qry);
        $wal_ins_stmt->bind_param("isdsissi",$user_id,$full_name,$amount,$txn_type,$is_done,$cause_type,$cause_full_name,$cause_user_id);
        $wal_ins_res = $wal_ins_stmt->execute();
        $wal_ins_stmt->close();
        return $wal_ins_res;
    }
    
    public function addPenalty($loginIds) {
        $ids  = "('".implode("','", $loginIds)."')";
        global $con;
        global $user_block_penalty;
        
        $txn_is_done = 0;
        $txn_dtype = 'DEBIT';
        $txn_ctype = 'CREDIT';
        $txn_ref_cause = 'REFERRAL_BLOCKED';
        
        $sponsor_qry = "select ch.id,ch.full_name,ch.sponsor_id,m.full_name as sponsor_name from user_details ch join user_details m  on ch.sponsor_id = m.id where ch.login_id in".$ids;
        $sponsor = mysqli_query($con, $sponsor_qry);
        $admin = self::GetAdminUserDetails();
        $admin_id = $admin['id']; 
        $admin_name = $admin['full_name'];

        $wal_ins_qry = "insert into user_wallet_txn(user_id,full_name,amount,txn_type,is_done,cause_type,cause_full_name,cause_user_id) values(?,?,?,?,?,?,?,?)";
        $wal_ins_stmt = $con->prepare($wal_ins_qry);
        
        while ($r = $sponsor->fetch_assoc()) {
            
            //parrent debit
            $sponsor_id = $r['sponsor_id'];
            $sponsor_name = $r['sponsor_name'];
            $user_name = $r['full_name'];
            $user_id = $r['id'];
            $wal_ins_stmt->bind_param("isdsissi",$sponsor_id,$sponsor_name,$user_block_penalty,$txn_dtype,$txn_is_done,$txn_ref_cause,$user_name,$user_id);
            $sponsor_ins_res = $wal_ins_stmt->execute();
            if($sponsor_ins_res){
                $wal_update_res = self::UpdateWalletById($sponsor_id,$user_block_penalty);
                /* if($wal_update_res){
                    $sponsor_tot_amt = mysqli_fetch_assoc(mysqli_query($con,"select total_amount as tot from user_wallet_concat where user_id=".$sponsor_id));
                    //master credit
                    $wal_ins_stmt->bind_param("isdsissi",$admin_id,$admin_name,$user_block_penalty,$txn_ctype,$txn_is_done,$txn_ref_cause,$sponsor_name,$sponsor_id);
                    $admin_ins_res = $wal_ins_stmt->execute();
                    if($admin_ins_res)
                        self::UpdateWalletById($admin_id,$user_block_penalty);
                } */
                
            }
                
        }
        //$wal_ins_qry->close();
        return true;
        
    }
    
    public function GetWalletTxnsByUserId($userId){
        global $con;
        $sql = "select * from user_wallet_txn where user_id=? order by cr_date desc";
        $wal_stmt = $con->prepare($sql);
        $wal_stmt->bind_param('i',$userId);
        $res = $wal_stmt->execute();
        $res = $wal_stmt->get_result();
        $wal_stmt->close();
        return $res;
    }
    #endregion
    
    public function GetTotWalletTxnsByUserIdAndCause($userId,$txn_cause){
        global $con;
        $sql = "SELECT sum(amount) as tot FROM user_wallet_txn where user_id=? and cause_type=?";
        $wal_stmt = $con->prepare($sql);
        $wal_stmt->bind_param('is',$userId,$txn_cause);
        $res = $wal_stmt->execute();
        $res = $wal_stmt->get_result();
        $res = $res->fetch_assoc();
        $wal_stmt->close();
        return $res;
    }
    
    public function GetTotWalletTxnsByUserIdAndDate($userId,$txn_cause,$cur_date){
        global $con;
        $sql = "SELECT sum(amount) as tot FROM user_wallet_txn where user_id=? and cause_type=? and cr_date=?";
        $wal_stmt = $con->prepare($sql);
        $wal_stmt->bind_param('iss',$userId,$txn_cause,$cur_date);
        $res = $wal_stmt->execute();
        $res = $wal_stmt->get_result();
        $res = $res->fetch_assoc();
        $wal_stmt->close();
        return $res;
    }
    
    public function GetRefCountByUserId($userId){
        global $con;
        $sql = "select count(id) as tot from user_details where sponsor_id=?";
        $wal_stmt = $con->prepare($sql);
        $wal_stmt->bind_param('i',$userId);
        $res = $wal_stmt->execute();
        $res = $wal_stmt->get_result();
        $res = $res->fetch_assoc();
        $wal_stmt->close();
        return $res;
    }
    
    public function GetTotPendingWithdrawAmntByUserId($userId){
        global $con;
        $sql = "select sum(amount_req-amount_received)as tot from user_withdrawls where  user_id = ? and is_done=0";
        $wal_stmt = $con->prepare($sql);
        $wal_stmt->bind_param('i',$userId);
        $res = $wal_stmt->execute();
        $res = $wal_stmt->get_result();
        $res = $res->fetch_assoc();
        $wal_stmt->close();
        return $res;
    }
    
    public function GetTotWithdrawnAmntByUserId($userId){
        global $con;
        $sql = "select sum(amount_received) as tot from user_withdrawls where user_id = ?";
        $wal_stmt = $con->prepare($sql);
        $wal_stmt->bind_param('i',$userId);
        $res = $wal_stmt->execute();
        $res = $wal_stmt->get_result();
        $res = $res->fetch_assoc();
        $wal_stmt->close();
        return $res;
    }
    
    public function GetUsersCountByMasterId($masterId,$isActive){
        global $con;
        $sql = "with recursive cte (id,sponsor_id,spill_id,full_name,mobile,side,is_active,lvl,id_path ) as (
              select id,sponsor_id,spill_id,full_name,mobile,side, is_active, 0 as lvl, cast(id as char(4194304)) as id_path from user_details
              where  spill_id = ? and is_active=?
              union all
              select u.id,u.sponsor_id,u.spill_id,u.full_name,u.mobile,u.side, u.is_active, cte.lvl+1 lvl, concat(cte.id_path,',',u.id)id_path   from cte
              inner join user_details as u
                      on cte.id = u.spill_id
            )
            select id,sponsor_id,spill_id,full_name,mobile,side,lvl,id_path from cte order by id_path desc";
        $wal_stmt = $con->prepare($sql);
        $wal_stmt->bind_param('ii',$masterId,$isActive);
        $res = $wal_stmt->execute();
        $res = $wal_stmt->get_result();
        $wal_stmt->close();
        return $res;
    }
    
    public function GetLeftAndRightChildCount($childs,$sponsorId) {
        $users = array();
        $key_data = array();
        while($row = $childs->fetch_assoc()) {
            array_push($users,$row);
            $key_data[$row['id']] = $row;
        }
        $parent_path = $sponsorId.',';
        $lids = [];
        $rids = [];
        $l = $r= $ref_count= 0;
        foreach ($users as $child){
            $child_path = $child['id_path'];
            $ids = explode(',',$child_path);
            if(($l == 0 && $ids[0] != $r) || ($r == 0 && $ids[0] != $l)){
                $imidiate_child = $key_data[$ids[0]];
                if($imidiate_child['spill_id'] == $sponsorId){
                    if($imidiate_child['side'] == 'left'){
                        $l = $imidiate_child['id'];
                    }else if($imidiate_child['side'] == 'right'){
                        $r = $imidiate_child['id'];
                    }
                }
            }
            if($l == $ids[0] ){
                $lids = array_merge($lids,$ids);
                $lids = array_unique($lids);
            }
            if($r == $ids[0]){
                $rids = array_merge($rids,$ids);
                $rids = array_unique($rids);
            }
        }
        $counts = array('cnt'=>$childs->num_rows,'lsize'=>count($lids),'rsize'=>count($rids));
        return $counts;
    }
    
    public function GetUserDashboardMetrics($userId){
        global $con;
        global $objUtilModel;
        
        $cur_date = $objUtilModel->getCurDate($objUtilModel->date_format);
        $user = self::GetUserDetailsByUserId($userId);
        $tot_amount = mysqli_fetch_assoc(mysqli_query($con,"SELECT total_amount FROM `user_wallet_concat` where user_id=".$userId));
        // get total sponsored users
        
        // get total  users based on spilling
        // get total transactions
        $tot_trans = mysqli_fetch_assoc(mysqli_query($con,"SELECT count(trans_id) as tottrans FROM `user_paid_reciept` where user_id=".$userId));
   
        $todayMyRefIncome = self::GetTotWalletTxnsByUserIdAndDate($userId, "REFERRAL",$cur_date);
        $todayMyLVLIncome = self::GetTotWalletTxnsByUserIdAndDate($userId, "LEVEL",$cur_date);
        $myReferralTot = self::GetRefCountByUserId($userId);
        $myRoyalIncome = self::GetTotWalletTxnsByUserIdAndCause($userId, "HOUSE_FULL");
        $totPendingWithdrawAmnt = self::GetTotPendingWithdrawAmntByUserId($userId);
        $totWithdrawnAmnt = self::GetTotWithdrawnAmntByUserId($userId);
        $totRewardAmnt = self::GetTotWalletTxnsByUserIdAndCause($userId, "REWARD");
        $totRewardAmnt = self::GetTotWalletTxnsByUserIdAndCause($userId, "REWARD");
        $totAutopoolIncome= self::GetTotWalletTxnsByUserIdAndCause($userId, "AUTO_POOL");
        $childs = self::GetUsersCountByMasterId($userId,1);
        $childCount = self::GetLeftAndRightChildCount($childs, $userId);
        $res = array (
            "tot_amount" => $tot_amount['total_amount'], 
            "tot_trans"=>$tot_trans['tottrans'],
            "todayMyRefIncome"=>$todayMyRefIncome['tot'], 
            "todayMyLVLIncome"=>$todayMyLVLIncome['tot'],
            "myReferralTot"=>$myReferralTot['tot'],
            "myRoyalIncome"=>$myRoyalIncome['tot'],
            "totPendingWithdrawAmnt"=>$totPendingWithdrawAmnt['tot'],
            "totWithdrawnAmnt"=>$totWithdrawnAmnt['tot'],
            "totRewardAmnt"=>$totRewardAmnt['tot'],
            "totAutopoolIncome"=>$totAutopoolIncome['tot'],
            "childCount"=>$childCount
        );
        return $res;
    }
}
$objUserModel =  new UserModel();
?>
