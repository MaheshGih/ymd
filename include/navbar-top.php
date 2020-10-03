<!-- <script src="../assets/libs/jquery.min.js"></script>
<script src="../assets/libs/jquery-countdown/jquery.countdownTimer.min.js"></script>
 -->
<div class="navbar-custom">
    <?php include('../include/user_menu.php'); ?>
    <!-- LOGO -->
   <?php include('../include/logo_box.php'); ?>
    <ul class="list-unstyled topnav-menu topnav-menu-left m-0" >
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <i class="fe-menu"></i>
            </button>
        </li>
        <?php 
            $path_only = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            if($_SESSION['role']=='ROLE_USER' && strpos($path_only, 'index.php') !== false){
                $expMsg = '';
                if(isset($_SESSION['expTime'])){
                    if($_SESSION['expTime']==0){
                        $expMsg = 'Your Membership was expired ';
                    }
                    else{
                        $expMsg = 'Your Membership is expires in <span id="expire_timer" style="color: white;"></span>';
                    }
                }else if($_SESSION['expiredin']!=0){
                    $expMsg = 'Your Membership is expired in '.$_SESSION['expiredin'];
                }else if($_SESSION['expiredin']==0){
                    $expMsg = 'Your Membership was expired ';
                }
         ?>
		<li>
			 <input type="hidden" id="expTime" value="<?php if(isset($_SESSION['expTime'])) echo $_SESSION['expTime'];?>">
             <h6 class="text-danger float-right"><?php echo $expMsg?></h6>
        </li>
		<?php }?>
    </ul>
</div>

<script>   	
    /* $(document).ready(function(){
        
     	var expTime = $('#expTime').val();
     	if(expTime || expTime.length>0){
     		var times = expTime.split('.'); 
         	if(times[0]>48){
				return true;
            }
         	var minutes = times.length>=1?times[1]:undefined;
            var obj = {"hours":parseInt(times[0])};
     		$("#expire_timer").countdowntimer(obj);
         }
        
    }); */
                 
</script>