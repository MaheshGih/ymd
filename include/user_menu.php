<ul class="list-unstyled topnav-menu float-right mb-0">

    <li class="dropdown notification-list">
        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
        	<img src="<?php echo $_SESSION['profileUrl']?>" alt="user-image" class="rounded-circle">
            <!-- <span class="pro-user-name ml-1"><?php echo  $_SESSION["loginid"];?>  <i class="mdi mdi-chevron-down"></i>-->
            <span class=" ml-1"><?php echo  $_SESSION["loginid"];?>  <i class="mdi mdi-chevron-down"></i>
            </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
            <!-- item-->
            <div class="dropdown-header noti-title">
                 <h6 class="text-overflow m-0"> Welcome <?php echo $_SESSION['fname']?>!</h6>
            </div>
			<a href="#" class="dropdown-item notify-item">
                <i class=" fas fa-share-alt"></i>
                <span><?php echo $_SESSION['lvl_name'];?></span>
            </a>
            <!-- item-->
            <a href="profile.php" class="dropdown-item notify-item">
                <i class="fe-user"></i>
                <span>Profile</span>
            </a>

            <div class="dropdown-divider"></div>

            <!-- item-->
            <a href="logout.php" class="dropdown-item notify-item">
                <i class="fe-log-out"></i>
                <span>Logout</span>
            </a>

        </div>
    </li>
</ul>