
<?php
include('../include/session.php');
include('../model/user_model.php');
?>
<?php
    // $psill_list = $objUserModel->GetSpillIds($_SESSION['userid'],"","");
    // $inactiv_childs = $objUserModel->GetChildsByUserId($_SESSION['userid'],0);
?>
<?php   
$master = $_SESSION['userid'];
$master_name = $_SESSION['fname'];
$master_logid = $_SESSION['loginid'];
$warning = "";
$master_side ="";
if(isset($_GET['masterid'])){
    $res_mast =$objUserModel->GetUserDetailsById($_GET['masterid']);
    $warning = "";
    if($res_mast!= false){
        $master = $res_mast['id'];
        $master_name = $res_mast['full_name'];
        $master_logid = $res_mast['login_id'];
        $master_side = $res_mast['side'];
        $warning = "";
    }else{
        $warning = "NO DATA FOUND";
    }
}
if(isset($_POST['todo-input-text'])){
    $res_master =$objUserModel->GetUserDetailsByLog($_SESSION['userid'],$_POST['todo-input-text']);
    $warning = "";
    if($res_master != false){
        $master = $res_master['id'];
        $master_name = $res_master['full_name'];
        $master_logid = $res_master['login_id']; 
        $master_side = $res_mast['side'];
        $warning = "";
    }else{
        $warning = "NO DATA FOUND";
    }
}
?>
<?php

$left =""; $left_icon ="maninactive.png";$left_id="";$left_login_id=""; $left_name="";$left_param="";$left_datatarget="#activateusersmodal";$left_spill_id="";
$right = ""; $right_icon = "maninactive.png";$right_id="";$right_login_id="";$right_name="";$right_param="";$right_datatarget = "#activateusersmodal";$right_spill_id="";
$left_left=""; $left_left_icon ="maninactive.png";$left_left_id="";$left_left_login_id="";$left_left_name="";$left_left_param="";$left_left_datatarget ="#activateusersmodal";$left_left_spill_id="";
$left_right =""; $left_right_icon="maninactive.png";$left_right_id="";$left_right_login_id="";$left_right_name="";$left_right_param="";$left_right_datatarget="#activateusersmodal";$left_right_spill_id="";
$right_left =""; $right_left_icon = "maninactive.png";$right_left_id="";$right_left_login_id="";$right_left_name="";$right_left_param="";$right_left_datatarget="#activateusersmodal";$right_left_spill_id="";
$right_right = ""; $right_right_icon = "maninactive.png";$right_right_id="";$right_right_login_id="";$right_right_name="";$right_right_param ="";$right_right_datatarget ="#activateusersmodal";$right_right_spill_id="";

$spill_id_master =$master;
$res_conc =  $objUserModel->GetChildCount($master);
$res = explode('-',$res_conc);
$childs = $objUserModel->GetChildsByUserId($master,1);
while($row = mysqli_fetch_assoc($childs)){
    if($row['side'] == "left" &&  $row['spill_id'] == $spill_id_master &&  $left_spill_id == "" ){
        $left = "alloted";
        $left_icon = "man.png";
        $left_id = $row['id'];
        $left_login_id = $row['login_id'];
        $left_name =$row['full_name'];
        $left_param = $left_id;
        $left_spill_id = $row['sponsor_id'];
        $left_datatarget="#userdetailsmodal";
        continue;
    }
    if($row['side'] == "right" &&  $row['spill_id'] == $spill_id_master  &&  $right_spill_id ==""){
        $right = "alloted";
        $right_icon = "man.png";
        $right_id = $row['id'];
        $right_login_id = $row['login_id'];
        $right_name = $row['full_name'];
        $right_param = $right_id;
        $right_spill_id = $row['sponsor_id'];
        $right_datatarget="#userdetailsmodal";
        continue;
    }
    if($row['side'] == "left" &&  $left !=""  &&  $left_left_spill_id==""){
        $left_left = "alloted";
        $left_left_icon = "man.png";
        $left_left_id = $row['id'];
        $left_left_login_id = $row['login_id'];
        $left_left_name = $row['full_name'];
        $left_left_param = $left_left_id;
        $left_left_spill_id = $row['sponsor_id'];
        $left_left_datatarget="#userdetailsmodal";
        continue;
    }
    if($row['side'] == "right" &&  $left !=""  &&  $left_right_spill_id ==""){
        $left_right = "alloted";
        $left_right_icon = "man.png";
        $left_right_id = $row['id'];
        $left_right_login_id = $row['login_id'];
        $left_right_name = $row['full_name'];
        $left_right_param = $left_right_id;
        $left_right_spill_id = $row['sponsor_id'];
        $left_right_datatarget="#userdetailsmodal";
        continue;
    }
    if($row['side'] == "left"  && $right !=""  &&  $right_left_spill_id==""){
        $right_left = "alloted";
        $right_left_icon = "man.png";
        $right_left_id = $row['id'];
        $right_left_login_id = $row['login_id'];
        $right_left_name = $row['full_name'];
        $right_left_param = $right_left_id;
        $right_left_spill_id = $row['sponsor_id'];
        $right_left_datatarget ="#userdetailsmodal";
        continue;
    }
    if($row['side'] == "right" && $right !="" &&  $right_right_spill_id == ""){
        $right_right = "alloted";
        $right_right_icon = "man.png";
        $right_right_id = $row['id'];
        $right_right_login_id = $row['login_id'];
        $right_right_name = $row['full_name'];
        $right_right_param = $right_right_id;
        $right_right_spill_id = $row['sponsor_id'];
        $right_right_datatarget ="#userdetailsmodal";
        continue;
    }
}
$rowcount=mysqli_num_rows($childs);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Tree | You-Me Donation </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favico.png">
    <link href="../assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/custombox/custombox.min.css" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />
    <!-- third party css -->
    <link href="../assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom"><?php include('../include/user_menu.php'); ?>
            <!-- LOGO --><?php include('../include/logo_box.php'); ?>

            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile waves-effect waves-light">
                        <i class="fe-menu"></i>
                    </button>
                </li>

                <li class="d-none d-sm-block">
                    <form class="app-search">
                        <div class="app-search-box">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <button class="btn" type="submit">
                                        <i class="fe-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
        <!-- end Topbar -->
        <!-- ========== Left Sidebar Start ========== --><?php   include('../include/menu.php'); ?>
        <!-- Left Sidebar End -->
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tree</a></li>
                                        <li class="breadcrumb-item active">View Network  </li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Tree</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <h4 class="header-title mb-4">Search</h4> 
                                <div class="col-12">
                                    <form name="todo-form" id="todo-form" class="mt-4" action="tree_result.php" method="post">
                                        <div class="row" >
                                            <div class="col-sm-5 todo-inputbar">
                                                <input type="text" id="todo-input-text" name="todo-input-text" class="form-control" placeholder="Enter UserId" style="margin-bottom:2px;" required>
                                            </div>
                                            <div class="col-sm-2 todo-send">
                                                <button class="btn-info btn-md btn waves-effect waves-light" type="submit" id="todo-btn-submit" name="todo-btn-submit" style="margin-bottom:2px;"><i class="fas fa-search"></i><span> Search </span></button>
                                            </div>
                                            <div class="col-sm-3">
                                                 <a href="tree.php" class="btn btn-purple"><i class="fas fa-long-arrow-alt-left"> </i> Back to Tree </a> 
                                            </div>
                                        </div>
                                        <div class="row">
                                               <!-- <b><span id="spnWarning" class="text-danger"><?php  echo $warning ?></span></b>-->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box" id="dvTree">
                                <h4 class="header-title mb-4">User Network</h4>
                                <!-- First Node -->
                                <div class="row text-center">
                                    <div class="col-4">
                                        <span class="badge label-table badge-success"> LEFT : <?php echo $res[0];?>
                                        </span>
                                    </div>
                                    <div class="col-4">
                                        <img src="../assets/images/man.png" width="50" onclick="getdata(<?php echo $master;?>,'".<?php  echo $master_side; ?>."','".user."')" data-toggle="modal" data-target="#userdetailsmodal" />
                                        <br />
                                        <br />
                                        <h6 class="text-pink"><?php echo $master_logid;?>
                                        </h6>
                                        <h7 class="text-success"><?php echo $master_name;?>
                                        </h7>
                                    </div>
                                    <div class="col-4">
                                        <span class="badge label-table badge-success">RIGHT : <?php echo $res[1];?>
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
                                        <a href="tree_result.php?masterid=<?php echo $left_id;?>"><h6 class="text-warning"><?php echo $left_login_id;?></h6></a>
                                        <h7 class="text-success"><?php echo $left_name;?>
                                        </h7>
                                    </div>

                                    <div class="col-6">
                                        <!-- right child -->
                                        <img src="../assets/images/<?php echo $right_icon;?>" width="50" onclick="getdata('<?php echo $right_id;?>','<?php echo $right_param; ?>','right','<?php echo $_SESSION['userid']; ?>')" data-toggle="modal" data-target="<?php echo $right_datatarget;?>" />
                                        <br />
                                        <br />
                                        <a href="tree_result.php?masterid=<?php echo $right_id;?>"><h6 class="text-warning"><?php echo $right_login_id;?></h6></a>
                                        <h7 class="text-success"><?php echo $right_name;?>
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
                                        <a href="tree_result.php?masterid=<?php echo $left_left_id;?>"> <h6 class="text-warning"><?php echo $left_left_login_id;?></h6></a>
                                        <h7 class="text-success"><?php echo $left_left_name;?>
                                        </h7>
                                    </div>

                                    <div class="col-3">
                                        <!-- right child -->
                                        <img src="../assets/images/<?php echo $left_right_icon;?>" width="50" onclick="getdata('<?php echo $left_right_id;?>','<?php echo $left_right_param; ?>','right','<?php echo $left_id; ?>')" data-toggle="modal" data-target="<?php if($left_id != ''){ echo $left_right_datatarget; } else{ echo "#" ;} ?>" />
                                        <br />
                                        <br />
                                        <a href="tree_result.php?masterid=<?php echo $left_right_id;?>"><h6 class="text-warning"><?php echo $left_right_login_id;?></h6></a>
                                        <h7 class="text-success"><?php echo $left_right_name;?>
                                        </h7>
                                    </div>

                                    <div class="col-3">
                                        <!-- left child -->
                                        <img src="../assets/images/<?php echo $right_left_icon;?>" width="50" onclick="getdata('<?php echo $right_left_id;?>','<?php echo $right_left_param; ?>','left','<?php echo $right_id; ?>')" data-toggle="modal" data-target="<?php if($right_id != ''){  echo $right_left_datatarget; } else{ echo "#" ;} ?>" />
                                        <br />
                                        <br />
                                        <a href="tree_result.php?masterid=<?php echo $right_left_id;?>"><h6 class="text-warning"><?php echo $right_left_login_id;?></h6></a>
                                        <h7 class="text-success"><?php echo $right_left_name;?>
                                        </h7>
                                    </div>

                                    <div class="col-3">
                                        <!-- right child -->
                                        <img src="../assets/images/<?php echo $right_right_icon;?>" width="50" onclick="getdata('<?php echo $right_right_id;?>','<?php echo $right_right_param; ?>','right','<?php echo $right_id; ?>')" data-toggle="modal" data-target="<?php if($right_id != ''){  echo $right_right_datatarget; } else{ echo "#" ;} ?>" />
                                        <br />
                                        <br />
                                        <a href="tree_result.php?masterid=<?php echo $right_right_id;?>"><h6 class="text-warning"><?php echo $right_right_login_id;?></h6></a>
                                        <h7 class="text-success"><?php echo $right_right_name;?>
                                        </h7>
                                    </div>

                                </div><!-- Third Node -->
                                <hr />
                            </div>
                        </div>

                    </div>
                    <!-- end row -->

                </div> <!-- end container-fluid -->

            </div> <!-- end content -->
            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            2020 &copy; All Rights reserved.
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

        <div class="modal fade bs-example-modal-center" id="userdetailsmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title mt-0">User Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="card-box table-responsive">
                            <!--<h4 class="header-title">User Details</h4>-->
                            <table id="datatable " class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <td>Name</td>
                                        <td><span id="spnUserName" name="spnUserName"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Left</td>
                                        <td><span id="spnLeft" name="spnLeft"></span></td>
                                    </tr>
                                    <tr> <td>Right</td><td><span id="spnRight" name="spnRight"></span></td></tr>
                                    <tr>
                                        <td>Wallet</td>
                                        <td><span id="spnWallet" name="spnWallet"></span></td>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

         <div class="modal fade bs-example-modal-center" id="activateusersmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel2" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title mt-0 text-center" > Activate User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="card-box table-responsive">
                            <!--<h4 class="header-title">User Details</h4>-->
                            <form class="form-horizontal" action="../controller/tree_controller.php" method="POST">
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="username">Sponsor Id</label>
                                        <input type="text" id="hdnSide" name="hdnSide" />
                                        <input type="text" id="hdnSpillId" name="hdnSpillId" />
                                        <input class="form-control" type="text" id="txtSponsorId" name="txtSponsorId" required="" placeholder="YMDXXXXXXX" onchange="getSponsorName(this.value)" readonly value="<?php echo $_SESSION['loginid']; ?>">
                                    </div>
                                    <div class="col-6">
                                        <label for="username">Sponsor Name</label>
                                        <input class="form-control" type="text" id="txtSponsorName" name="txtSponsorName" required="" placeholder=" " readonly value="<?php echo $_SESSION['fname']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="username">Full Name</label>
                                        <input class="form-control" type="text" id="txtFirstName" name="txtFirstName" required="" placeholder="Michael Zenaty">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-7">
                                        <label for="emailaddress">Email address</label>
                                        <input class="form-control" type="email" id="txtEmail" name="txtEmail" required="" placeholder="john@deo.com">
                                    </div>
                                    <div class="col-5">
                                        <label for="emailaddress">Mobile</label>
                                        <input class="form-control" type="text" id="txtMobile" name="txtMobile" required="" placeholder="9XXXX XXXXX">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="username">LogIn Id</label>
                                        <input class="form-control" type="text" id="txtUserId" name="txtUserId" required="" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" required="" id="txtPassword" name="txtPassword" placeholder="Enter your password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <div class="checkbox checkbox-success">
                                            <input id="remember" type="checkbox" checked="" required>
                                            <label for="remember">
                                                I accept <a href="#" data-toggle="modal" data-target=".bs-example-modal-center">Terms and Conditions</a>
                                            </label>
                                            <!-- <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-center">Center modal</button>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row text-center mt-2">
                                    <div class="col-12">
                                        <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Sign Up Free</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade bs-example-modal-center" id="activateusersmodal2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel2" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title mt-0 text-center" > Activate User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="card-box table-responsive">
                            <!--<h4 class="header-title">User Details</h4>-->
                            <form class="form-horizontal" action="activating_user.php" method="POST">
                                <table id="datatable " class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <td>User</td>
                                            <td>
                                                <input type="hidden" id="hdnId" name="hdnId" />
                                                <select id="ddlSponsors" name="ddlSponsors" class="form-control">
                                                    <option value="none">-- Select Spill Id --</option>    
                                                    <?php
                                                    $in_act_list = $objUserModel->GetInactiveUsers($_SESSION['userid']);
                                                    while($r= mysqli_fetch_assoc($in_act_list)){
                                                    ?>
                                                        <option value="<?php echo $r['id'];?>"><?php echo $r['full_name']; ?></option>   
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="right" >
                                                <button type="submit" name="btnActUser" id="btnActUser" class="btn btn-success waves-effect waves-light"> <i class="fas fa-save mr-1"></i> <span>Activate User</span> </button>
                                            </td>
                                        </tr>
                                    </thead>
                                </table>
                            </form>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
    <!-- END wrapper -->
    <!-- Vendor js -->
    <script src="../assets/js/vendor.min.js"></script>
     <script src="../assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <script src="../assets/js/pages/sweet-alerts.init.js"></script>
    <script src="../assets/libs/custombox/custombox.min.js"></script>
    <!-- Required datatable js -->
    <script src="../assets/libs/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="../assets/libs/datatables/dataTables.buttons.min.js"></script>
    <script src="../assets/libs/datatables/buttons.bootstrap4.min.js"></script>
    <script src="../assets/libs/jszip/jszip.min.js"></script>
    <script src="../assets/libs/pdfmake/pdfmake.min.js"></script>
    <script src="../assets/libs/pdfmake/vfs_fonts.js"></script>
    <script src="../assets/libs/datatables/buttons.html5.min.js"></script>
    <script src="../assets/libs/datatables/buttons.print.min.js"></script>
    <script src="../assets/libs/datatables/buttons.colVis.js"></script>

    <!-- Responsive examples -->
    <script src="../assets/libs/datatables/dataTables.responsive.min.js"></script>
    <script src="../assets/libs/datatables/responsive.bootstrap4.min.js"></script>

    <!-- Datatables init -->
    <script src="../assets/js/pages/datatables.init.js"></script>
    <script src="../assets/js/pages/jquery.todo.js"></script>
    <!-- App js -->
    <script src="../assets/js/app.min.js"></script>
    <script src="../js/tree.js"></script>
</body>


</html>