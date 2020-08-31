<?php   
    // session_start();
    include("../include/session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>KYC | You-Me Donation </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/images/favico.png">
		<!-- Jquery Toast css -->
        <link href="../assets/libs/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css" />
        
        <!-- App css -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css"  id="app-stylesheet" />

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">
            
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <?php include('../include/user_menu.php'); ?>

                <!-- LOGO -->
                <?php include('../include/logo_box.php'); ?>

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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Basic Details</a></li>
                                            <li class="breadcrumb-item active">KYC </li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">KYC Information</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="card-box">
                                                <h4 class="header-title mb-4">Address Details</h4>
                                                <form class="form-horizontal" action="../controller/kyc_controller.php" method="POST">
                                                    <div class="form-group row">
                                                        <label for="txtAdd1" class="col-3 col-form-label">House No./Flat No.</label>
                                                        <div class="col-9">
                                                            <textarea class="form-control" rows="3" name="txtAdd1" id="txtAdd1" required="required"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="txtAdd2" class="col-3 col-form-label">Street Name</label>
                                                        <div class="col-9">
                                                            <textarea class="form-control" rows="3" name="txtAdd2" id="txtAdd2" required="required"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="txtCity" class="col-3 col-form-label">City</label>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" id="txtCity" name="txtCity"  required="required"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="txtState" class="col-3 col-form-label">State</label>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" id="txtState" name="txtState"  required="required"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-9">
                                                            <!-- <input type="submit" class="btn btn-success" name="btnSaveAddress" id="btnSaveAddress"  value="Save"/> -->
                                                            <button type="submit" name="btnSaveAddress" id="btnSaveAddress" class="btn btn-success waves-effect waves-light"> <i class="fas fa-save mr-1"></i> <span>Save</span> </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
            
                                        <!-- end col -->
            
                                        <div class="col-md-5">
                                            <div class="card-box">
                                                <h4 class="header-title mb-4">BANK DETAILS</h4>
            
                                                <form class="form-horizontal" action="../controller/kyc_controller.php" method="POST">
                                                    <div class="form-group row">
                                                         <label class="col-md-3 col-form-label" for="example-password">Acc. Holder Name</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="txtAccName" id="txtAccName" class="form-control"  required="required">
                                                            </div>
                                                    </div>
                                                    <div class="form-group row">
                                                            <label class="col-md-3 col-form-label" for="txtAccNo">Acc. No</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="txtAccNo" id="txtAccNo" class="form-control"  required="required">
                                                            </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label" for="example-email">Bank </label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="txtBankName" id="txtBankName" class="form-control"  required="required">
                                                            </div>
                                                    </div>
                                                    <div class="form-group row">
                                                         <label class="col-md-3 col-form-label" for="example-placeholder">IFSC</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="txtIFSC" id="txtIFSC" class="form-control" required="required">
                                                            </div>
                                                    </div>
                                                    <div class="form-group row">
                                                            <div class="col-md-10">
                                                                <!-- <input type="submit" class="btn btn-success" name="btnSaveBank" id="btnSaveBank"  value="Save"/> -->
                                                                <button type="submit" name="btnSaveBank" id="btnSaveBank" class="btn btn-success waves-effect waves-light"> <i class="fas fa-save mr-1"></i> <span>Save</span> </button>
                                                            </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
            
                                    </div>
                                    <!-- end row -->
                                    <div class="row"> <!-- start row -->
                                        <div class="col-6"> <!-- Start col -->
                                            <div class="card-box">
                                            <h4 class="header-title mb-4">PAYMENT DETAILS</h4>   
                                            <form class="form-horizontal" action="../controller/kyc_controller.php" method="POST">
                                                    <div class="form-group row">
                                                         <label class="col-md-3 col-form-label" for="txtGpay">GPay</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="txtGpay" id="txtGpay" class="form-control"  required="required">
                                                            </div>
                                                    </div>
                                                    <div class="form-group row">
                                                            <label class="col-md-3 col-form-label" for="txtPhonePe">PhonePe</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="txtPhonePe" id="txtPhonePe" class="form-control"  required="required">
                                                            </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label" for="txtPaytm">Paytm </label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="txtPaytm" id="txtPaytm" class="form-control" required="required" >
                                                            </div>
                                                    </div>
                                                    <div class="form-group row">
                                                            <div class="col-md-10">
                                                                <!-- <input type="submit" class="btn btn-success" name="btnSaveBank" id="btnSaveBank"  value="Save"/> -->
                                                                <button type="submit" name="btnSavePayment" id="btnSavePayment" class="btn btn-success waves-effect waves-light"> <i class="fas fa-save mr-1"></i> <span>Save</span> </button>
                                                            </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->
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

        </div>
        <!-- END wrapper -->
  

        <!-- Vendor js -->
        <script src="../assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="../assets/js/app.min.js"></script>
        <!-- Tost-->
        <script src="../assets/libs/jquery-toast/jquery.toast.min.js"></script>
        <script src="../assets/js/pages/toastr.init.js"></script>
        <script src="../assets/libs/parsleyjs/parsley.min.js"></script>
        <script src="../js/profile.js"></script>
        
        <script>
            $(document).ready(function(){
                var  res = location.search;
                res = decodeURIComponent(res);
                res = res.split("=");
                displayNotification(res[1],res[2],res[3]);

                $('form').parsley().on('field:validated', function() {
              	  
          	  	});
            	  
           });
           function displayNotification(result,type, message){
    			var toastObj = {
                       text: message,
                       position: "top-right",
                       loaderBg: "red",
                       icon: "success",
                       hideAfter: 4e3,
                       stack: 1
                }
               
           	if(result !== 'success'){
           		toastObj.loaderBg = 'red';
           		toastObj.icon = 'failed'
               }
    			$.toast(toastObj);
    			
           }
        
        </script>
    </body>


</html>