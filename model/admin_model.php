<?php include('../include/config.php');?>
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
    
}
$objAdminModel = new AdminModel();

?>