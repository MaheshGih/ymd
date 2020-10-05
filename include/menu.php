<?php 

$isAdmin = $_SESSION['role']=='ROLE_ADMIN'?true:false;
$isEmp = $_SESSION['role']=='ROLE_EMP'?true:false;
$isUser= $_SESSION['role']=='ROLE_USER'?true:false;
?>

<!-- Topbar Start -->
<?php include("../include/navbar-top.php");?>
<!-- end Topbar -->

<style>
    .slimScrollBar{
        background: #fff !important; opacity: 0.9 !important;width:10px !important;
    }
</style>
<div class="left-side-menu">

<div class="slimscroll-menu">

    <!--- Sidemenu -->
    <div id="sidebar-menu">

        <ul class="metismenu" id="side-menu">

            <li class="menu-title">Home</li>

            <li>
            	<a href="index.php">
                    <i class="fe-airplay"></i>
                    <!-- <span class="badge badge-success badge-pill float-right">2</span> -->
                    <span> Dashboard </span>
                </a>
                
            </li>
            <li class="menu-title">Basic Details</li>
            <li>
                <a href="profile.php">
                    <i class=" fas fa-user "></i>
                    <span>  Profile </span>
                    <!-- <span class="menu-arrow"></span> -->
                </a>
            </li>
			<li>
                <a href="changepassword.php">
                    <i class=" fas fa-user "></i>
                    <span> Change Password </span>
                    <!-- <span class="menu-arrow"></span> -->
                </a>
            </li>
            <li>
                <a href="kyc.php">
                    <i class=" fas fa-file-alt "></i>
                    <span> KYC </span>
                    <!-- <span class="menu-arrow"></span> -->
                </a>
            </li>
            
            <!-- <li>
                <a href="upload_reciept.php">
                    <i class=" fas fa-cloud-upload-alt "></i>
                    <span> Upload Payment </span>
                    
                </a>
            </li> -->

            <li class="menu-title">Referrals</li>

            <li>
                <a href="referred_users.php">
                    <i class=" fas fa-link "></i>
                    <span> Referred Users </span>
                    <!-- <span class="menu-arrow"></span> -->
                </a>
            </li>

            <li>
                <a href="active_users.php">
                    <i class="fas fa-user-check "></i>
                    <span> Active Users </span>
                </a>
            </li>
            <li>
                <a href="inactive_users.php">
                    <i class="fas fa-user-alt-slash "></i>
                    <span> In-Active Users </span>
                </a>
            </li>
            <!--  <li>
                <a href="invitation.php">
                    <i class=" fas fa-share-alt"></i>
                    <span> Send Invitations </span>
                </a>
            </li>-->
			
			<li class="menu-title">Finance</li>

            <li>
                <a href="wallet.php">
                    <i class=" fas fa-wallet "></i>
                    <span> Wallet </span>
                </a>
            </li>            
            <li>
                <a href="transactions.php">
                    <i class=" fas fa-chart-line "></i>
                    <span>  Invitations </span>
                </a>
            </li>
            
            <li class="menu-title">Tree</li>
            <li>
                <a href="tree.php">
                    <i class=" fab fa-mendeley "></i>
                    <span> View User Tree </span>
                </a>
            </li>
            
            <?php if($isAdmin || $isEmp){ ?>
            <li class="menu-title">Administartion</li>
			<?php if($isAdmin){ ?>
			<li>
                <a href="employees.php">
                    <i class=" fas fa-users"></i>
                    <span> Admin Team </span>
                    <!-- <span class="menu-arrow"></span> -->
                </a>
            </li>
            <?php }?>
            <li>
                <a href="royalty_points.php">
                    <i class="fas fa-hand-holding-usd "></i>
                    <span> User Levels </span>
                </a>
            </li>
            <li>
                <a href="users.php">
                    <i class="fas fa-users-cog"></i>
                    <!-- <span class="badge badge-warning badge-pill float-right">12</span> -->
                    <span> Users </span>
                </a>
            </li>
            <li>
                <a href="activate_users.php">
                    <i class="fas fa-users-cog"></i>
                    <!-- <span class="badge badge-warning badge-pill float-right">12</span> -->
                    <span> Activate Users </span>
                </a>
            </li>
            <li>
                <a href="block_users.php">
                    <i class="fas fa-user-alt-slash "></i>
                    <span> Block Users </span>
                </a>
            </li>
            <li>
                <a href="invitation_master.php">
                    <i class=" fas fa-hands-helping "></i>
                    <span> Get/Provide Help </span>
                </a>
            </li>
			<!-- <li>
                <a href="user_level_upgrade.php">
                    <i class="fas fa-share-alt"></i>
                    <span> Level Upgrade </span>
                </a>
            </li> -->
            <li>
                <a href="reward_users.php">
                    <i class="fas fa-money-bill "></i>
                    <span> Reward Users </span>
                </a>
            </li>
            <li>
                <a href="housefull_users.php">
                    <i class="fas fa-money-bill "></i>
                    <span> Housefull Users </span>
                </a>
            </li>
            <li>
                <a href="royalty_users.php">
                    <i class="fas fa-money-bill "></i>
                    <span> Royalty Users </span>
                </a>
            </li>
            <?php if($isAdmin){ ?>
            <li>
                <a href="news.php">
                    <i class="fas fa-money-bill "></i>
                    <span> News </span>
                </a>
            </li>
            <?php }?>
            <?php }?>
        </ul>

    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>

</div>
<!-- Sidebar -left -->

</div>
<!-- <script src="../js/util.js"></script> -->