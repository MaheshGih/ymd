<?php
class UtilModel{
    
    public $date_format = 'Y-m-d';
    public $datetime_format = 'Y-m-d H:i:s';
    
    function getCurDate($format) {
        date_default_timezone_set("Asia/Calcutta");
        $date_req = date($format);
        return $date_req;
    }
    
    function formatStrDate($vdate, $format) {
        date_default_timezone_set("Asia/Calcutta");
        $date_req = date($format,strtotime($vdate));
        return $date_req;
    }
    
    function formatTimeDate($vtime, $format) {
        date_default_timezone_set("Asia/Calcutta");
        $date_req = date($format,$vtime);
        return $date_req;
    }
    
    function getExactDateAfterMonths($timestamp, $months){
        $day_current_date            = date('d', $timestamp);
        $first_date_of_current_month = date('01-m-Y', $timestamp);
        // 't' gives last day of month, which is equal to no of days
        $days_in_next_month          = date('t',  strtotime("+".$months." months", strtotime($first_date_of_current_month)));
        
        $days_to_substract = 0;
        if($day_current_date > $days_in_next_month)
            $days_to_substract = $day_current_date - $days_in_next_month;
            
            $php_date_after_months   = strtotime("+".$months." months", $timestamp);
            $exact_date_after_months = strtotime("-".$days_to_substract." days", $php_date_after_months);
            
            return $exact_date_after_months;
    }
    
    public function generateOTP(){
        return rand(10,10000);
    }
    
}
$objUtilModel = new UtilModel();
?>