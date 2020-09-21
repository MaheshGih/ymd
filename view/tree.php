<?php
include('../include/session.php');
include('../model/user_model.php');
?>
<?php
    //$psill_list = $objUserModel->GetSpillIds($_SESSION['userid'],"","");
    //$inactiv_childs = $objUserModel->GetChildsByUserId($_SESSION['userid'],0);
?>
<?php   
    $master = $_SESSION['userid'];
    $master_name = $_SESSION['fname'];
    $master_logid = $_SESSION['loginid'];
    $warning = "";    
?>
<?php


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
    <!-- <link href="https://visjs.github.io/vis-network/dist/vis-network.min.css"></link> -->
<style>
html,
body {
  height: 100%;
  width: 100%;
  margin: 0px;
  padding: 0px;
}
.disable{
pointer-events:none;
background:grey;
}

.mycontainer {
  position: relative;
  width: 100%;
  height: 100%;
}
#mynetwork {
  position: absolute;
  top: 0px;
  right: 0px;
  bottom: 0px;
  left: 0px;
  border : 0px 0px 0px 0px !important;
}
</style>
    
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
				<input type="hidden" id="master_id" name="master_id" value="<?php echo $master?>"></input>
				<input type="hidden" id="full_name" name="full_name" value="<?php echo $master_name?>"></input>
				
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
                    <!--  <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <h4 class="header-title mb-4">Search</h4> 
                                <div class="col-12">
                                    <form name="todo-form" id="todo-form" class="mt-4" action="tree.php" method="post">
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
                                               
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>-->
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box" id="dvTree">
                                <h4 class="header-title mb-4">User Network</h4>
                                <div class="row text-center" style="height: 500px">
                                    <div id="mynetwork" >
                                        
                                    </div>
                                </div>
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
		 <div class="modal fade bs-example-modal-center" id="otpModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel2" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title mt-0 text-center" > Validate OTP</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="card-box table-responsive">
                            <!--<h4 class="header-title">User Details</h4>-->
                            <form class="form-horizontal" action="../controller/tree_controller.php" method="POST">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <span class="success" for="msg" id="otpmsg"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="username">OTP</label>
                                        <input type="hidden" id="otpMobile" name="otpMobile" />
                                        <input type="hidden" id="otpLoginId" name="otpLoginId"/>
                                        <input type="hidden" id="otpFullName" name="otpFullName"/>
                                        <input class="form-control" required type="text" id="otp" name="otp" placeholder="OTP" required="required"/>
                                        <a href="#" id="resendRegOtp">Resend Otp</a>
                                    </div>
                                </div>
                                <div class="form-group row text-center mt-2">
                                    <div class="col-6">
                                        <button id="btnOTPValidate" name="btnOTPValidate" class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Submit OTP</button>
                                    </div>
                                </div>
                             </form>  
                           </div>
                     </div>
                 </div>
             </div>
         </div>       
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
                                        <!-- <input type="hidden" id="hdnSide" name="hdnSide" /> -->
                                        <input type="hidden" id="hdnSpillId" name="hdnSpillId" />
                                        <input class="form-control" required type="text" id="txtSponsorId" name="txtSponsorId" required="" placeholder="YMDXXXXXXX" onchange="getSponsorName(this.value)" readonly value="<?php echo $_SESSION['loginid']; ?>">
                                    </div>
                                    <div class="col-6">
                                        <label for="username">Sponsor Name</label>
                                        <input class="form-control" type="text" required id="txtSponsorName" name="txtSponsorName" required="" placeholder=" " readonly value="<?php echo $_SESSION['fname']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="username">Full Name</label>
                                        <input class="form-control" type="text" required id="txtFirstName" name="txtFirstName" required="" placeholder="Michael Zenaty">
                                    </div>
                                    <div class="col-6">
                                        <label for="inputState" class="col-form-label">Chose your Side</label>
                                        <select id="ddlSide" name="ddlSide" required class="form-control">
                                            <option value="" selected="selected">Choose</option>
                                            <option value="left">Left</option>
                                            <option value="right">Right</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-7">
                                        <label for="emailaddress">Email address</label>
                                        <input class="form-control" type="email" required id="txtEmail" name="txtEmail" required="" placeholder="john@deo.com">
                                    </div>
                                    <div class="col-5">
                                        <label for="emailaddress">Mobile</label>
                                        <input class="form-control" type="text" required id="txtMobile" name="txtMobile" required="" placeholder="9XXXX XXXXX">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="username">LogIn Id</label>
                                        <input class="form-control" type="text" required id="txtUserId" name="txtUserId" required="" readonly>
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
                                        <button name="hdnSignupBtn" class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Sign Up Free</button>
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
    <script src="../assets/libs/parsleyjs/parsley.min.js"></script>
    <script src="../assets/js/vis/vis-network.min.js"></script>
    <script src="../js/tree.js"></script>
</body>


</html>