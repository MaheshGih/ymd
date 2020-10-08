<?php
// session_start();
include("../include/session.php");
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>Rewards | You-Me Donation </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favico.png" />

    <!-- App css -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

    <!-- third party css -->
    <link href="../assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />

	<link href="../assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/custombox/custombox.min.css" rel="stylesheet" type="text/css">
    
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">
        
        <!-- ========== Left Sidebar Start ========== -->
        <?php   include('../include/menu.php'); ?>
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
                                        <li class="breadcrumb-item">
                                            <a href="javascript: void(0);">Home</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="javascript: void(0);">Tree</a>
                                        </li>
                                        <li class="breadcrumb-item active"><a href="forgot_txn_password.php">OTP Validation</a></li>
                                        
                                    </ol>
                                </div>
                                <h4 class="page-title">Change Password</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-box">
                            	<h4 class="header-title mb-4">Forgot Transaction Password</h4>
                            	<div class="text-center">
                                	<?php 
                                	   if(isset($_GET['status'])){
                                	       if($_GET['status']=='success'){
                                	 ?>
                                	 <div class="alert alert-info bg-transparent text-info alert-dismissible fade show" role="alert">
                                        <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button> -->
                                        <?php echo $_GET['msg'];?>
                                    </div>
                                    <?php }else if($_GET['status']=='failure'){
                                	 ?>
                                    <div class="alert alert-danger bg-transparent text-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                        <?php echo $_GET['msg'];?>
                                    </div>
                                    <?php } }?>
                                </div>
                                <form class="form-horizontal" action="../controller/tree_controller.php" method="POST">
                                                
                                    <div class="form-group row">
                                        <div class="col-6 mb-1">
                                            <label for="otp">OTP</label>
                                            <input type="hidden" id="otpFrom" name="otpFrom" value="<?php echo $_GET['from'];?>"/>
                                            <input type="hidden" id="otpMobile" name="otpMobile" value="<?php echo $_GET['mobile'];?>"/>
                                            <input type="hidden" id="otpLoginId" name="otpLoginId" value="<?php echo $_GET['login_id'];?>"/>
                                            <input class="form-control mb-2" type="text" id="otp" name="otp" placeholder="OTP" required="required"/>
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
                    
                    <!-- end row -->

                </div><!-- end container-fluid -->

            </div><!-- end content -->
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

    </div>
    <!-- END wrapper -->
    <!-- Vendor js -->
     <!-- Vendor js -->
    <script src="../assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/parsleyjs/parsley.min.js"></script>	
    <script>
        $(document).ready(function () {
      	  $('#resendRegOtp').on('click', function(){
      	  	resendRegOtp();
      	  });
        });
    
        function resendRegOtp() {
          	var mobile = $('#otpMobile').val();
            var loginId = $('#otpLoginId').val();
            var otpResendUrl = '../controller/tree_controller.php';
            
            $.ajax({
                url: otpResendUrl,
                method: "POST",
                data: { resendRegOtp:'resendRegOtp', mobile:mobile, login_id:loginId},
                success: function (res) {
                    $('#otpmsg').text(res);
                },
                error: function (erres) {
                    $("#spnLeft").text('0');
                    $("#spnRight").text('0');
                    $("#spnWallet").text('0');
                }
            });
            
        }
    
    </script>
	
</body>


</html>