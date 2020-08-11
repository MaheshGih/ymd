<?php include('../include/config.php');?>
<?php
class LoginModel{
    public $id="";
    public $full_name="";
    public $email="";
    public $mobile ="";
    public $sponsor_id ="";
    public $spill_id="";
    public $side ="";
    public $date_created ="";

    public $user_id="";
    public $pwd="";

    public function getId(){ return $this->id;}
    public function setId($vid){ $this->id = $vid;}
    public function getName(){ return $this->full_name;}
    public function setName($vfname){ $this->full_name = $vfname;}
    public function getEmail(){ return $this->email;}
    public function setEmail($vemail){ $this->email = $vemail;}
    public function getMobile(){ return $this->mobile;}
    public function setMobile($vmobile){ $this->mobile = $vmobile;}
    public function getSponsorId(){ return $this->sponsor_id;}
    public function setSponsorId($vsponsorid){ $this->sponsor_id = $vsponsorid;}
    public function getSide(){ return $this->side;}
    public function setSide($vside){ $this->side = $vside;}
    public function getDate(){ return $this->date_created;}
    public function setDate(){
         date_default_timezone_set("Asia/Calcutta");
         $this->date_created = date("Y-m-d h:i:s");
    }

    public function getUserId(){ return $this->user_id;}
    public function setUserId($vUsrId){
       //$this->user_id = self::UserIdGenerator();
       $this->user_id = $vUsrId;
    }
    public function getPassword(){ return $this->pwd;}
    public function setPassword($vPwd){ $this->pwd=$vPwd;}
    public function getSpillId(){ return $this->spill_id;}
    public function setSpillId($vspillid){ $this->spill_id = $vspillid; }

    #region Old Methods
    public function AddUserBasicOld(){

        //$ins_user_basic_qry = "insert into user_basic values(null,'".self::getName()."','".self::getEmail()."','".self::getMobile()."',".self::getSponsorId().",'".self::getSide()."','".self::getDate()."',0)";

        global $con;
        $ins_user_det_qry = "INSERT INTO `user_details` VALUES(null,'".self::getName()."','".self::getEmail()."','".self::getMobile()."',".self::getSponsorId()."',".self::getSpillId().",'".self::getLoginId()."','".self::getPassword()."','','','','','','','','','','','".self::getDate()."',0)";

        //$res_basic = mysqli_query($con,$ins_user_basic_qry);
        //$last_ins_row_id = mysqli_insert_id($con);

        $rand_user_id = self::getUserId();
        $check_user_id  = "select count(*) as cnt from user_login where login_id='".$rand_user_id."'";
        $cnt = mysqli_fetch_assoc( mysqli_query($con,$check_user_id));

        if($cnt['cnt']>0){
            return false;
        }
        else{
            // $ins_user_login_qry = "insert into user_login values(null,".$last_ins_row_id.",'".$rand_user_id."','".self::getPassword()."')";
            // $res_login = mysqli_query($con,$ins_user_login_qry);
            //if($res_login){
            //        $ins_user_kyc_qry = "Insert into user_kyc values(null,".$last_ins_row_id.",'','','','','','','','','')";
            //        $res_kyc = mysqli_query($con,$ins_user_kyc_qry);
            //        return   $res_kyc;
            //}
            $res =  mysqli_query($con,$ins_user_det_qry);
            return $res;
        }
    }
    public function GetUserByIdOld($sponsid){
        global $con;
        $sel_qry ="SELECT ub.id,ub.full_name,ul.login_id FROM `user_basic` as ub join user_login as ul on ub.id = ul.user_id  where ul.login_id ='".$sponsid."'";
        $res = mysqli_fetch_assoc(mysqli_query($con,$sel_qry));
        return $res;
    }

    public function CheckLoginOld($vlogid,$vpwd){
        global $con;
        $chk_qry = mysqli_fetch_assoc(mysqli_query($con,"select count(*) as cnt from user_login where login_id='".$vlogid."' and password='".$vpwd."'"));
        return $chk_qry['cnt'];
    }

    public function GetLogUserDetailsOld($vlogid){
        global $con;
        $get_user_id = mysqli_fetch_assoc(mysqli_query($con,"select user_id as userid from user_login where login_id='".$vlogid."'"));
        $get_det = mysqli_fetch_assoc(mysqli_query($con,"select sponsor_id as sponsorid,full_name as fname,id as userid from user_basic where id=".$get_user_id['userid'])) ;
        return $get_det;
    }

    public function GetUserCountOld($vmob){
        global $con;
        $cnt = mysqli_fetch_assoc(mysqli_query($con,"select count(*) as cnt from user_basic where mobile='".$vmob."'"));
        return $cnt['cnt'];
    }

    public function ForgotPasswordOld($vlogid,$mob){
        global $con;
        $get_usr_id = mysqli_fetch_assoc(mysqli_query($con,"select user_id,password from user_login where login_id='".$vlogid."'"));
        $get_id = mysqli_fetch_assoc(mysqli_query($con,"select id from user_basic where mobile='".$mob."' and id=".$get_usr_id['user_id']));
        $usr_id = $get_usr_id['user_id'];
        $pwd =  $get_usr_id['password'];
        $vid = $get_id['id'];
        if($usr_id == $vid){
            return $pwd;
        }else{
            return "invalid";
        }
        //return true;
        //return   $usr_id ."||".$vid;
        //."select id from user_basic where mobile='".$mob."' and id=".$get_usr_id['user_id']."||"."select user_id,password from user_login where login_id='".$vlogid."'";
    }
    #endregion

    #region New Methods

    /*
        Add User Functionality
    */
    public function AddUserBasic(){

        global $con;
        $ins_user_det_qry = "INSERT INTO `user_details` VALUES(null,'".self::getName()."','".self::getEmail()."','".self::getMobile()."',".self::getSponsorId().",".self::getSpillId().",'".self::getUserId()."','".self::getPassword()."','','','','','','','','','','".self::getDate()."',0,'".self::getSide()."','','')";

        $rand_user_id = self::getUserId();
        $check_user_id  = "select count(*) as cnt from user_details where login_id='".$rand_user_id."'";
        $cnt = mysqli_fetch_assoc( mysqli_query($con,$check_user_id));

        if($cnt['cnt']>0){
            return false;
        }
        else{
            $res =  mysqli_query($con,$ins_user_det_qry);
            return $res;
        }
       // return $ins_user_det_qry;
    }
    /*
        to add user into helper list 
    */
    public function AddHelper(){
        global $con;
        $ins_helper = "insert into provide_helpers values(null,'".self::getName()."','".self::getMobile()."','".self::getDate()."',0)";
        $help_res = mysqli_query($con,$ins_helper);
        return $help_res;
    }
    /*
        Random User Id generator
    */
    public function UserIdGenerator(){
        $userid = self::RandomNumGenerator();
        if(strlen($userid) == 4){
           return "YMD000".$userid;
        }
        if(strlen($userid) == 5){
           return "YMD00".$userid;
        }
        if(strlen($userid) == 6){
            return "YMD0".$userid;
        }else{
            return "YMD".$userid;
        }
    }
    /*
        Get User details based on Id
     */
    public function GetUserById($sponsid){
        global $con;
        $sel_qry ="SELECT ud.id,ud.full_name,ud.login_id FROM `user_details` as ud where ud.login_id ='".$sponsid."'";
        $res = mysqli_fetch_assoc(mysqli_query($con,$sel_qry));
        return $res;
    }
    /*
        Check Login Details
     */
    public function CheckLogin($vlogid,$vpwd){
        global $con;
        $chk_qry = mysqli_fetch_assoc(mysqli_query($con,"select count(*) as cnt from user_details where login_id='".$vlogid."' and password='".$vpwd."'"));
        return $chk_qry['cnt'];
    }
    /*
        to get SponsorId,Name based on LoginId
     */
    public function GetLogUserDetails($vlogid){
        global $con;
        $get_user_id = mysqli_fetch_assoc(mysqli_query($con,"select id as userid from user_details where login_id='".$vlogid."'"));
        $get_det = mysqli_fetch_assoc(mysqli_query($con,"select sponsor_id as sponsorid,full_name as fname,id as userid from user_details where id=".$get_user_id['userid'])) ;
        return $get_det;
    }
    /*
        to get user details based on mobile number
     */
    public function GetUserCount($vmob){
        global $con;
        $cnt = mysqli_fetch_assoc(mysqli_query($con,"select count(*) as cnt from user_details where mobile='".$vmob."'"));
        return $cnt['cnt'];
    }
    /*
        forgot password functionality
     */
    public function ForgotPassword($vlogid,$mob){
        global $con;
        $get_id = mysqli_fetch_assoc(mysqli_query($con,"select id,password from user_details where mobile='".$mob."' and id=".$vlogid));

        if($get_id['password'] != ""){
            return $pwd;
        }else{
            return "invalid";
        }
    }

    /*
       Random Number Generator
    */
    public function RandomNumGenerator(){
       return rand(1000,10000000);
    }
    /*
        to return True or False
    */
    public function getResult($actualRes){
        if($actualRes){
            return true;
         }else{
             return false;
         }
    }
    
    #endregion
}
$objLoginModel = new LoginModel();
?>