<?php 
include('../include/config.php');
include( '../php_libs/ssp.class.php' );
?>

<?php
class AdminModel{
    
    public $id="";
    public $news="";
    public $startDate="";
    public $endDate="";
    public $isActive=0;
    
    public function saveNews($news,$is_active,$start_date,$end_date) {
        global $con;
        $sql = "INSERT INTO news(news,is_active,start_date,end_date) VALUES(?,?,?,?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param('siss', $news,$is_active,$start_date,$end_date);
        $res = $stmt->execute();
        return $res;
    }
    public function updateAllNewsStatus($is_active) {
        global $con;
        $sql = "Update news set is_active=?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param('i', $is_active);
        $res = $stmt->execute();
        return $res;
    }
    
    public function GetAllNews(){
        global $con;
        $sql = "SELECT * FROM news order by cr_date desc";
        $res= mysqli_query($con,$sql);
        return $res;
    }
    
    public function GetActiveNews(){
        global $con;
        $sql = "SELECT * FROM news where is_active=1 and ( start_date <= CURDATE() and CURDATE() <= end_date )";
        $stmt = $con->prepare($sql);
        $res = $stmt->execute();
        $res = mysqli_fetch_assoc($stmt->get_result());
        return $res;
    }
    
    public function GetRecieptPath($invitation_id){
        global $con;
        $sql = "SELECT img_path FROM user_paid_reciept where invitation_id=?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param('i', $invitation_id);
        $stmt->execute();
        $res = mysqli_fetch_assoc($stmt->get_result());
        return $res;
    }
    
    public function getAllInvitations(){
        global $sql_details;
        $table = 'invitations';
        
        $status = $_POST['get_status'];
        // Table's primary key
        $primaryKey = 'id';
        
        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
        array( 'db' => 'to_user_id', 'dt' => 0 ),
        array( 'db' => 'to_user_name',  'dt' => 1 ),
        array( 'db' => 'to_mobile',   'dt' => 2 ),
        array( 'db' => 'provide_help_id',     'dt' => 3 ),
        array( 'db' => 'provide_help_name',     'dt' => 4 ),
        array( 'db' => 'provide_mobile',     'dt' => 5 ),
        array( 'db' => 'status',     'dt' => 6 ),
        array(
        'db'        => 'date_sent',
        'dt'        => 7,
        'formatter' => function( $d, $row ) {
        return date( 'jS M y', strtotime($d));
        }),
        array( 'db' => 'id', 'dt' => 8 )
        );
        
        $res ='';
        if($status=='ALL'){
            // SQL server connection information
            $res = SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns);
        }else{
            // SQL server connection information
            $whereResult = "status='".$_POST['get_status']."'";
            $whereAll = "status='".$_POST['get_status']."'";
            $res = SSP::complex( $_POST, $sql_details, $table, $primaryKey, $columns,$whereResult,$whereAll );
        }
        
        $data = $res['data'];
        foreach ( $data as $key=>$value){
            $actions = '';
            if($value[6]=='ACCEPTED'||$value[6]=='PAYMENT_DONE'){
                $actions = '<button onclick="getRecieptPath('.$value[8].');">View</button>';
            }
            $value[8]=$actions;
            //$act = array('actions',$actions);  
            $data[$key] = $value;
        }
        $res['data'] = $data;
        $json_obj =  json_encode($res);
        return $json_obj;
    }
    
    public function getAllUsers(){
        global $sql_details;
        global $objPlanModel;
        
        $lvls = $objPlanModel->GetLevels();
        $level_ids = array();
        while($r = $lvls->fetch_assoc()){
            $level_ids[$r['id']] = $r;
        }
        // SQL server connection information
        
        // Table's primary key
        $primaryKey = 'id';
        
        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
        array( 'db' => 'full_name', 'dt' => 0 ),
        array( 'db' => 'email', 'dt' => 1 ),
        array( 'db' => 'mobile', 'dt' => 2 ),
        array( 'db' => 'login_id', 'dt' => 3 ),
        array( 'db' => 'password', 'dt' => 4 ),
        array( 'db' => 'address_1', 'dt' => 5 ),
        array( 'db' => 'address_2', 'dt' => 6 ),
        array( 'db' => 'acc_name', 'dt' => 7 ),
        array( 'db' => 'acc_no', 'dt' => 8 ),
        array( 'db' => 'ifsc', 'dt' => 9 ),
        array( 'db' => 'bank_name', 'dt' => 10 ),
        array( 'db' => 'Gpay', 'dt' => 11 ),
        array( 'db' => 'PhonePe', 'dt' => 12 ),
        array( 'db' => 'PayTm', 'dt' => 13 ),
        array(
            'db'        => 'date_created',
            'dt'        => 14,
            'formatter' => function( $d, $row ) {
            return $d?date( 'jS M y', strtotime($d)):'';
        }),
        array( 'db' => 'is_active', 'dt' => 15, 
            'formatter' => function( $d, $row ) {
            return $d?'Active':'In Active';
        }),
        array( 'db' => 'city', 'dt' => 16 ),
        array( 'db' => 'state', 'dt' => 17 ),
        array( 'db' => 'reg_verified', 'dt' => 18 ,
            'formatter' => function( $d, $row ) {
            return $d?'Verified':'Not Verified';
            }),
        array( 'db' => 'status', 'dt' => 19 ),
        array( 'db' => 'lvl_id', 'dt' =>20, 
            'formatter' => function( $d, $row )use ($level_ids) {
                $lvl_name = $d?$level_ids[$d]['level_name']:'';
            return $lvl_name;
        }),
        array( 'db' => 'royalty_id', 'dt' =>21,
            'formatter' => function( $d, $row ) {
                return $d>=0?'House fulled':'No';
            }),
        array(
            'db'        => 'expired_date',
            'dt'        => 22,
            'formatter' => function( $d, $row ) {
                
            return $d?date( 'jS M y', strtotime($d)):'';
            }),
        array( 'db' => 'txn_password', 'dt' => 23 ),
        array( 'db' => 'kyc_done', 'dt' => 24,
            'formatter' => function( $d, $row ) {
            return $d?'Completed':'In Complete';
        })
        );
        
        $status = $_POST['get_status'];
        $json_obj='';
        if($status=='ALL'){
            $table = '(select * from user_details union all 
                (SELECT id,full_name,email,mobile,sponsor_id,spill_id,login_id,password,address_1,address_2,acc_name,acc_no,ifsc,bank_name,Gpay,PhonePe,PayTm,date_created,is_active,side,city,state,position,reg_otp,reg_verified,delete_status as status,role,lvl_id,reward_id,royalty_id,expired_date,txn_password,kyc_done
                FROM user_details_old)) res';
            // SQL server connection information
            $json_obj =  json_encode(
            SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns)
            );
            
        }else if($status == 'BLOCKED'){
            $whereResult = "status='".$status."'";
            $whereAll = "status='".$status."'";
            $table = '(SELECT id,full_name,email,mobile,sponsor_id,spill_id,login_id,password,address_1,address_2,acc_name,acc_no,ifsc,bank_name,Gpay,PhonePe,PayTm,date_created,is_active,side,city,state,position,reg_otp,reg_verified,delete_status as status,role,lvl_id,reward_id,royalty_id,expired_date,txn_password,kyc_done
                FROM user_details_old) res';
            $json_obj =  json_encode(
                SSP::complex( $_POST, $sql_details, $table, $primaryKey, $columns,$whereResult,$whereAll )
                );
        }else{
            $whereResult = "status='".$status."'";
            $whereAll = "status='".$status."'";
            $table = 'user_details';
            $json_obj =  json_encode(
                SSP::complex( $_POST, $sql_details, $table, $primaryKey, $columns,$whereResult,$whereAll )
                );
        }
        return $json_obj;
    }
    
    public function getAllWithdraws(){
        global $sql_details;
        $table = '(SELECT w.*,ud.login_id FROM user_withdrawls w join user_details ud on w.user_id=ud.id) res';
        
        $status = $_POST['get_status'];
        // Table's primary key
        $primaryKey = 'id';
        
        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
        array( 'db' => 'login_id', 'dt' => 0 ),
        array( 'db' => 'full_name', 'dt' => 1 ),
        array( 'db' => 'mobile',  'dt' => 2 ),
        array( 'db' => 'amount_req',   'dt' => 3 ),
        array(
            'db'        => 'date_req',
            'dt'        => 4,
            'formatter' => function( $d, $row ) {
            return date( 'jS M y', strtotime($d));
        }),
        array( 'db' => 'amount_received',     'dt' => 5 ),
        array(
            'db'        => 'date_received',
            'dt'        => 6,
            'formatter' => function( $d, $row ) {
            return date( 'jS M y', strtotime($d));
            }),
        array( 'db' => 'is_done', 'dt' => 7,
                'formatter' => function( $d, $row ) {
                return $d?'Completed':'Pending';
                })
        );
        
        $json_obj='';
        if($status=='ALL'){
            // SQL server connection information
            $json_obj =  json_encode(
            SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns)
            );
            
        }else{
            // SQL server connection information
            $whereResult = "is_done='".$_POST['get_status']."'";
            $whereAll = "is_done='".$_POST['get_status']."'";
            $json_obj =  json_encode(
                SSP::complex( $_POST, $sql_details, $table, $primaryKey, $columns,$whereResult,$whereAll )
                );
        }
        return $json_obj;
    }
    
    public function getAllTransactions(){
        global $sql_details;
        $table = '(SELECT w.*,ud.login_id,ud.mobile,txn_ud.login_id as cause_login_id FROM user_wallet_txn w join user_details ud on w.user_id=ud.id 
            left join user_details txn_ud on w.cause_user_id=txn_ud.id) res';
        
        $status = $_POST['get_status'];
        
        // Table's primary key
        $primaryKey = 'id';
        
        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
        array( 'db' => 'login_id', 'dt' => 0 ),
        array( 'db' => 'full_name', 'dt' => 1 ),
        array( 'db' => 'mobile', 'dt' => 2 ),
        array( 'db' => 'amount', 'dt' => 3 ),
        array(
        'db'        => 'cr_date',
        'dt'        => 4,
        'formatter' => function( $d, $row ) {
        return date( 'jS M y', strtotime($d));
        }),
        array( 'db' => 'txn_type', 'dt' => 5 ),
        array( 'db' => 'cause_type', 'dt' => 6 ),
        array( 'db' => 'cause_full_name', 'dt' => 7 ),
        array( 'db' => 'cause_login_id', 'dt' => 8 )
        );
        
        $json_obj='';
        if($status=='ALL'){
            // SQL server connection information
            $json_obj =  json_encode(
                SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns)
                );
            
        }else{
            // SQL server connection information
            $whereResult = "cause_type='".$_POST['get_status']."'";
            $whereAll = "cause_type='".$_POST['get_status']."'";
            $json_obj =  json_encode(
                SSP::complex( $_POST, $sql_details, $table, $primaryKey, $columns,$whereResult,$whereAll )
                );
        }
        return $json_obj;
    }
    public function getAllRoyalityUsers(){
        global $sql_details;
        $table = 'user_royalty';
        
        $status = $_POST['get_status'];
        // Table's primary key
        $primaryKey = 'id';
        
        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
        array( 'db' => 'login_id', 'dt' => 0 ),
        array( 'db' => 'full_name', 'dt' => 1 ),
        array( 'db' => 'mobile',  'dt' => 2 ),
        array( 'db' => 'amount',   'dt' => 3 ),
        array(
        'db'        => 'cr_date',
        'dt'        => 4,
        'formatter' => function( $d, $row ) {
        return date( 'jS M y', strtotime($d));
        }),
        
        array(
            'db'        => 'expired_date',
            'dt'        => 5,
            'formatter' => function( $d, $row ) {
            return date( 'jS M y', strtotime($d));
            }),
        array( 'db' => 'is_expired', 'dt' => 6,
                'formatter' => function( $d, $row ) {
                return $d?'Completed':'Active';
                })
            );
        
        $json_obj='';
        if($status=='ALL'){
            // SQL server connection information
            $json_obj =  json_encode(
            SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns)
            );
            
        }else{
            // SQL server connection information
            $whereResult = "is_expired='".$_POST['get_status']."'";
            $whereAll = "is_expired='".$_POST['get_status']."'";
            $json_obj =  json_encode(
                SSP::complex( $_POST, $sql_details, $table, $primaryKey, $columns,$whereResult,$whereAll )
                );
        }
        return $json_obj;
    }
    
    public function getAllRewardUsers(){
        global $sql_details;
        global $objPlanModel;
        
        $lvls = $objPlanModel->GetLevels();
        $level_ids = array();
        while($r = $lvls->fetch_assoc()){
            $level_ids[$r['id']] = $r;
        }
        
        $table = 'user_rewards';
        
        // Table's primary key
        $primaryKey = 'id';
        
        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
        array( 'db' => 'login_id', 'dt' => 0 ),
        array( 'db' => 'full_name', 'dt' => 1 ),
        array( 'db' => 'mobile',  'dt' => 2 ),
        array( 'db' => 'level_id', 'dt' =>3,
            'formatter' => function( $d, $row )use ($level_ids) {
            $lvl_name = $d?$level_ids[$d]['level_name']:'';
            return $lvl_name;
        }),
        array( 'db' => 'amount',  'dt' => 4 ),
        array( 'db' => 'auto_pool',  'dt' => 5 ),
        array(
            'db'        => 'cr_date',
            'dt'        => 6,
            'formatter' => function( $d, $row ) {
            return date( 'jS M y', strtotime($d));
            })
         );
        
        $json_obj =  json_encode(
            SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns )
            );
        return $json_obj;
    }
}
$objAdminModel = new AdminModel();

?>