

<h4 class="header-title mb-4">User Network</h4>
<!-- First Node -->
<div class="row text-center">
    <div class="col-4">
        <span class="badge label-table badge-success">
            <?php echo $res[0];?>
        </span>
    </div>
    <div class="col-4">
        <img src="../assets/images/man.png" width="50" onclick="getdata(<?php echo $_SESSION['userid'];?>,'user','master')" data-toggle="modal" data-target="#userdetailsmodal" />
        <br />
        <br />
        <h6 class="text-pink">
            <?php echo $_SESSION['loginid'];?>
        </h6>
        <h7 class="text-success">
            <?php echo $_SESSION['fname'];?>
        </h7>
    </div>
    <div class="col-4">
        <span class="badge label-table badge-success">
            <?php echo $res[1];?>
        </span>
    </div>
</div>
<!-- First Node -->
<hr />
<div class="row text-center">
    <!-- Second Node -- level 1 -->
    <div class="col-6">
        <!-- left child -->
        <img src="../assets/images/<?php echo $left_icon;?>" width="50" onclick="getdata('<?php echo $left_id;?>','<?php echo $left_param;?>','left','<?php echo $_SESSION['userid']; ?>')" data-toggle="modal" data-target="<?php echo $left_datatarget; ?>" />
        <br />
        <br />
        <h6 class="text-warning">
            <?php echo $left_login_id;?>
        </h6>
        <h7 class="text-success">
            <?php echo $left_name;?>
        </h7>
    </div>

    <div class="col-6">
        <!-- right child -->
        <img src="../assets/images/<?php echo $right_icon;?>" width="50" onclick="getdata('<?php echo $right_id;?>','<?php echo $right_param; ?>','right','<?php echo $_SESSION['userid']; ?>')" data-toggle="modal" data-target="<?php echo $right_datatarget;?>" />
        <br />
        <br />
        <h6 class="text-warning">
            <?php echo $right_login_id;?>
        </h6>
        <h7 class="text-success">
            <?php echo $right_name;?>
        </h7>
    </div>

</div><!-- Second Node -->
<hr />
<!-- Third Node -- level 2-->
<div class="row text-center">

    <div class="col-3">
        <!-- left child -->
        <img src="../assets/images/<?php echo $left_left_icon;?>" width="50" onclick="getdata('<?php echo $left_left_id;?>','<?php echo $left_left_param; ?>','left','<?php echo $left_id; ?>')" data-toggle="modal" data-target="<?php if($left_id !=''){ echo $left_left_datatarget;} else{ echo "#" ;}  ?>" />
        <br />
        <br />
        <h6 class="text-warning">
            <?php echo $left_left_login_id;?>
        </h6>
        <h7 class="text-success">
            <?php echo $left_left_name;?>
        </h7>
    </div>


    <div class="col-3">
        <!-- right child -->
        <img src="../assets/images/<?php echo $left_right_icon;?>" width="50" onclick="getdata('<?php echo $left_right_id;?>','<?php echo $left_right_param; ?>','right','<?php echo $left_id; ?>')" data-toggle="modal" data-target="<?php if($left_id != ''){ echo $left_right_datatarget; } else{ echo "#" ;} ?>" />
        <br />
        <br />
        <h6 class="text-warning">
            <?php echo $left_right_login_id;?>
        </h6>
        <h7 class="text-success">
            <?php echo $left_right_name;?>
        </h7>
    </div>

    <div class="col-3">
        <!-- left child -->
        <img src="../assets/images/<?php echo $right_left_icon;?>" width="50" onclick="getdata('<?php echo $right_left_id;?>','<?php echo $right_left_param; ?>','left','<?php echo $right_id; ?>')" data-toggle="modal" data-target="<?php if($right_id != ''){  echo $right_left_datatarget; } else{ echo "#" ;} ?>" />
        <br />
        <br />
        <h6 class="text-warning">
            <?php echo $right_left_login_id;?>
        </h6>
        <h7 class="text-success">
            <?php echo $right_left_name;?>
        </h7>
    </div>

    <div class="col-3">
        <!-- right child -->
        <img src="../assets/images/<?php echo $right_right_icon;?>" width="50" onclick="getdata('<?php echo $right_right_id;?>','<?php echo $right_right_param; ?>','right','<?php echo $right_id; ?>')" data-toggle="modal" data-target="<?php if($right_id != ''){  echo $right_right_datatarget; } else{ echo "#" ;} ?>" />
        <br />
        <br />
        <h6 class="text-warning">
            <?php echo $right_right_login_id;?>
        </h6>
        <h7 class="text-success">
            <?php echo $right_right_name;?>
        </h7>
    </div>

</div><!-- Third Node -->
<hr />
