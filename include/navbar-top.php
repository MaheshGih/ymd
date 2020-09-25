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
        <?php if($_SESSION['role']=='ROLE_USER'){?>
		<li>
             <h6 class="text-danger float-right">Your Membership is expires in <?php echo $_SESSION['expiredin'];?></h6>
        </li>
		<?php }?>
    </ul>
</div>