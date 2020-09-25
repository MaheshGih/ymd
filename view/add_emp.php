<?php
// session_start();
include("../include/session.php");
include("../model/login_model.php");
$loginId = $objLoginModel->UserIdGenerator();
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
                                    <h4 class="page-title">Add User</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
									<form class="form-horizontal" id="addEmpForm" method="post" action="../controller/emp_controller.php">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card-box">
                                                <h4 class="header-title mb-4">PROFILE</h4>
                                                    <div class="form-group row">
                                                        <label for="txtLoginId" class="col-3 col-form-label">Login Id</label>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" name="txtLoginId" value="<?php echo $loginId?>" id="txtLoginId" readonly required="required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="txtPassword" class="col-3 col-form-label">Password</label>
                                                        <div class="col-9">
                                                            <input type="password" class="form-control" name="txtPassword" id="txtPassword" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="txtUserName" class="col-3 col-form-label">Name</label>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" name="txtUserName" id="txtUserName" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="txtEmail" class="col-3 col-form-label">Email</label>
                                                        <div class="col-9">
                                                            <input type="email"  class="form-control" name="txtEmail" id="txtEmail" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="txtMobile" class="col-3 col-form-label">Mobile</label>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" name="txtMobile" id="txtMobile" required="required">
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
            
                                        <!-- end col -->
            
                                        <div class="col-md-6">
                                            <div class="card-box">
                                                <h4 class="header-title mb-4">CONTACT DETAILS</h4>
            
                                                
                                                    <div class="form-group row">
                                                        <label for="inputAddress1" class="col-3 col-form-label">House No./Flat No.</label>
                                                        <div class="col-9">
                                                            <textarea class="form-control" rows="3" name="txtAdd1" id="txtAdd1" required="required"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputAddress2" class="col-3 col-form-label">Street Name</label>
                                                        <div class="col-9">
                                                            <textarea class="form-control" rows="3" name="txtAdd2" id="txtAdd2" required="required"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="txtCity" class="col-3 col-form-label">City</label>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" id="txtCity" name="txtCity" required="required"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="txtState" class="col-3 col-form-label">State</label>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" id="txtState" name="txtState" required="required"/>
                                                        </div>
                                                    </div>
                                                
                                            </div>
                                        </div>
            							
                                    </div>
                                    <!-- end row -->
                                    <!-- end row -->
                                     <button type="submit" name="btnSaveEmp" id="btnSaveEmp" class="btn btn-success waves-effect waves-light"> 
                                     	<i class="fas fa-save mr-1"></i> <span>Save</span> 
                                     </button>
                        		</form>
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
        <script type="text/javascript">
        $(function () {
    	  $('#addEmpForm').parsley().on('field:validated', function() {
        	  
    	  });
        });
        </script>
    </body>


</html>