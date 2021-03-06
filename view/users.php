<?php   
    // session_start();
    include("../include/session.php");
?>
<!DOCTYPE html>
<html lang="en">
 

<head>
        <meta charset="utf-8" />
        <title>Profile | You-Me Donation </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/images/favico.png">
		<link href="../assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css"  id="app-stylesheet" />

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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Basic Details</a></li>
                                            <li class="breadcrumb-item active">Profile </li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Search User Details</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
						<div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <div class="col-12">
                                    		<form id="searchform">
                                    			<div class="row" >
                                                <div class="col-sm-5 todo-inputbar">
                                                    <input type="text" required id="loginId" name="loginId" class="form-control" placeholder="Enter User Id" 
                                                    style="margin-bottom:2px;" required>
                                                </div>
                                                <div class="col-sm-2 todo-send">
                                                    <button class="btn-info btn-md btn waves-effect waves-light" type="submit" id="btnSearchUserData"
                                                    	name="btnSearchUserData" style="margin-bottom:2px;"><i class="fas fa-search"></i><span> Search </span></button>
                                                </div>
                                            </div>
                                    		</form>
                                            
                                            <div class="row">
                                                   
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="userProfile">

                            <div class="col-md-6">
                                <div class="card-box">
                                    <h4 class="header-title mb-4">PROFILE</h4>

                                    <form class="form-horizontal" clean-form="" action = "../controller/user_controller.php" method="POST">

                                        <div class="form-group row">
                                            <label for="inputName" class="col-3 col-form-label">Login Id</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" name="txtLoginId" id="txtLoginId" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-3 col-form-label">Sponor Id</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" name="txtSponsorId" id="txtSponsorId" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-3 col-form-label">Name</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" name="txtUserName" id="txtUserName" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-3 col-form-label">Email</label>
                                            <div class="col-9">
                                                <input type="email" class="form-control" name="txtEmail" id="txtEmail"  required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputMobile" class="col-3 col-form-label">Mobile</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" required name="txtMobile" id="txtMobile" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password" class="col-3 col-form-label">Password</label>
                                            <div class="col-9 input-group">
                                                <input class="form-control" type="password" required="" id="txtPassword" name="txtPassword" placeholder="Enter password">
                                                <div class="input-group-append">
    													<button class="btn btn btn-outline-secondary" type="button" id="eyeBtn" onclick="showPassword('txtPassword');">
														<i class="fa fa-eye"></i>
													</button>
												</div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="txnPassword" class="col-3 col-form-label">Transaction Password</label>
                                            <div class="col-9 input-group">
                                            	<input class="form-control" type="password" required="" id="txnPassword" name="txnPassword" placeholder="Enter Transaction password">
                                            	<div class="input-group-append">
    													<button class="btn btn btn-outline-secondary" type="button" id="eyeBtn1" onclick="showPassword('txnPassword')">
														<i class="fa fa-eye"></i>
													</button>
												</div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-9">
                                                <!-- <input type="submit" class="btn btn-success" name="btnSaveAddress" id="btnSaveAddress"  value="Save"/> -->
                                                <button type="submit" name="btnEditMobile" id="btnEditMobile" class="btn btn-success waves-effect waves-light"> <i class="fas fa-save mr-1"></i> <span>Update</span> </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- end col -->

                            <div class="col-md-6">
                                <div class="card-box">
                                    <h4 class="header-title mb-4">CONTACT DETAILS</h4>

                                    <form class="form-horizontal" clean-form="">
                                        <div class="form-group row">
                                            <label for="inputAddress1" class="col-3 col-form-label">House No./Flat No.</label>
                                            <div class="col-9">
                                                <textarea class="form-control" rows="3" name="txtAdd1" id="txtAdd1"  readonly></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputAddress2" class="col-3 col-form-label">Street Name</label>
                                            <div class="col-9">
                                                <textarea class="form-control" rows="3" name="txtAdd2" id="txtAdd2"  readonly></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="txtCity" class="col-3 col-form-label">City</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="txtCity" name="txtCity" readonly/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="txtState" class="col-3 col-form-label">State</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="txtState" name="txtState" readonly/>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!-- end row -->



                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="card-box">
                                    <h4 class="header-title mb-4">BANK DETAILS</h4>
                                    <div class="row">
                                        <div class="col-12">
                                            <div>
                                                <form class="form-horizontal" clean-form="">
                                                    <div class="form-group row">
                                                        <label class="col-md-2 col-form-label" for="simpleinput">Account No</label>
                                                        <div class="col-md-10">
                                                            <input type="text" name="txtAccNo" id="txtAccNo" class="form-control"  readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-2 col-form-label" for="example-email">Bank Name</label>
                                                        <div class="col-md-10">
                                                            <input type="text" name="txtBankName" id="txtBankName" class="form-control"  readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-2 col-form-label" for="example-password">Account Holder Name</label>
                                                        <div class="col-md-10">
                                                            <input type="text" name="txtAccName" id="txtAccName" class="form-control"  readonly>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-2 col-form-label" for="example-placeholder">IFSC</label>
                                                        <div class="col-md-10">
                                                            <input type="text" name="txtIFSC" id="txtIFSC" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                    
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- end row -->

                                </div> <!-- end card-box -->
                            </div><!-- end col -->
                            <div class="col-md-6 col-sm-12">
                                <div class="card-box">
                                <h4 class="header-title mb-4">PAYMENT DETAILS</h4>
                                <form class="form-horizontal" clean-form="">
                                        <div class="form-group row">
                                            <label for="txtGpay" class="col-3 col-form-label">GPay</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" name="txtGpay" id="txtGpay" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="txtPhonePe" class="col-3 col-form-label">PhonePe</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" name="txtPhonePe" id="txtPhonePe" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="txtPaytm" class="col-3 col-form-label">Paytm</label>
                                            <div class="col-9">
                                                <input type="email" class="form-control" name="txtPaytm" id="txtPaytm"  readonly>
                                            </div>
                                        </div>
                                    </form>
                                </div><!-- end card-box -->
                            </div><!-- end col -->
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

        </div>
        <!-- END wrapper -->
  

        <!-- Vendor js -->
        <script src="../assets/js/vendor.min.js"></script>
		<script src="../assets/libs/parsleyjs/parsley.min.js"></script>
        <!-- App js -->
        <script src="../assets/js/app.min.js"></script>
        <script src="../assets/libs/sweetalert2/sweetalert2.min.js"></script>
    	<script src="../assets/js/pages/sweet-alerts.init.js"></script>
        <script src="../js/util.js"></script>
        <script src="../js/users.js"></script>
        
        
    </body>


</html>