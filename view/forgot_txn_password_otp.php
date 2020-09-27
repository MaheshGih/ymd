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
                                            <a href="javascript: void(0);">Change Password</a>
                                        </li>
                                        <li class="breadcrumb-item active"><a href="forgot_txn_password.php">Forgot Txn Password</a></li>
                                        
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
                                <form class="form-horizontal" action="../controller/user_controller.php" method="post">
                                    <div class="form-group row account-content mt-4">
                                    	<div class="text-center">
                                            <p class="mb-0 mb-3 <?php echo isset($_GET['failure'])?'text-danger':'';echo isset($_GET['success'])?'text-success':'';?>" id="otpmsg"><?php echo $_GET['msg'];?> </p>
                                        </div>
                                        <div class="col-12">
                                            <input type="text" placeholder="Enter Otp" required class="form-control" name="otp" id="otp"/>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="forgotTxnPassOTPValidateBtn" class="col-2 col-form-label"></label>
                                        <button name="forgotTxnPassOTPValidateBtn" id="forgotTxnPassOTPValidateBtn" 
                                        	class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit"> Validate OTP
                                        </button>
                                        
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
    <script src="../assets/js/vendor.min.js"></script>

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
	
	<script src="../assets/libs/parsleyjs/parsley.min.js"></script>
	
    <!-- Datatables init -->
    <script src="../assets/js/pages/datatables.init.js"></script>
        <script src="../assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <script src="../assets/js/pages/sweet-alerts.init.js"></script>
    <script src="../assets/libs/custombox/custombox.min.js"></script>
	
    <script>
      $(document).ready(function () {
             $(document).ready(function(){
             var  res = location.search;
             res = res.split("=");
             //displayNotification(res[1],res[2]);

             $('form').parsley().on('field:validated', function() {
             	  
       	  	 });
         	
        });
        function displayNotification(result,type){
        	if(result){
        		var obj = getUserMessages(result, type)
        		notification(obj);
            }
        		
        }
        function notification(obj){
        	Swal.fire({title:obj.title,
                text : obj.msg,
               type : obj.type,
               confirmButtonClass: "btn btn-confirm mt-2"
           });
        }
        function getUserMessages(result,type){
            var res = {type:'sucess', msg:''};
            if (result == "success" && type == "changepassword"){
                res.type = 'success';
                res.title = 'Congrats!';
                res.msg = "Password changed successfully!.";
            }else if (result == "failed" && type == "changepassword"){
            	res.type = 'error';
            	res.title = 'Failed!';
                res.msg = "Password changing failed!. Please try again.";
            }else if (result == "failure" && type == "invalid"){
            	res.type = 'error';
            	res.title = 'Failed!';
                res.msg = "Mobile no not exist!";
            }
            return res;
        }
          
     });
    </script>
    <!-- App js -->
    <script src="../assets/js/app.min.js"></script>
	
</body>


</html>