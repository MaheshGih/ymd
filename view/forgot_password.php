<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Forgot Password | You-Me Donation Dashboard</title>
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
	<link href="../assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/custombox/custombox.min.css" rel="stylesheet" type="text/css">
    
</head>

<body class="authentication-bg bg-primary authentication-bg-pattern d-flex align-items-center pb-0 vh-100">

    <div class="home-btn d-none d-sm-block">
        <!-- <a href="index.php"><i class="fas fa-home h2 text-white"></i></a> -->
    </div>

    <div class="account-pages w-100 mt-5 mb-5">
        <div class="container">

            <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mb-0">

                        <div class="card-body p-4">

                                <div class="account-box">
                                        <div class="text-center account-logo-box">
                                            <div>
                                                <a href="index.php">
                                                    <img src="../assets/images/logo-dark.png" alt="" height="80">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="account-content mt-4">
                                            <div class="text-center">
                                                <p class="text-muted mb-0 mb-3">Enter your Login Id and Mobile Number and we'll send you an OTP to verify your account and to reset your password.  </p>
                                            </div>
                                            <form class="form-horizontal" action="../controller/login_controller.php" method="POST">
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="txtRegMobile">Log-In Id</label>
                                                        <input class="form-control" type="text" id="txtLogId" name="txtLogId" required="" placeholder="YMDXXXXXXX">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="txtRegMobile">Mobile Number</label>
                                                        <input class="form-control" type="text" id="txtRegMobile" name="txtRegMobile" required="" minlength="10"  maxlength="10" placeholder="98XXXXXXXX">
                                                    </div>
                                                </div>
    
                                                <div class="form-group row text-center mt-2">
                                                    <div class="col-12">
                                                        <button id="btnForgotPwd" name="btnForgotPwd" class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Reset Password</button>
                                                    </div>
                                                </div>
    
                                            </form>
    
                                            <div class="clearfix"></div>
    
                                            <div class="row mt-4">
                                                <div class="col-sm-12 text-center">
                                                    <p class="text-muted mb-0">Back to <a href="login.php" class="text-dark ml-1"><b>Sign In</b></a></p>
                                                </div>
                                            </div>
    
                                        </div>
    
                                    </div>
                                    <!-- end card-box-->
                        </div>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
        </div>
        <!-- end row -->
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
                                        <input class="form-control" type="text" id="otp" name="otp" placeholder="OTP" required="required"/>
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
    </div>
    <!-- end container -->
    </div>
    <!-- end page -->

    <!-- Vendor js -->
    <script src="../assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="../assets/js/app.min.js"></script>
	<script src="../assets/js/pages/sweet-alerts.init.js"></script>
    <script src="../assets/libs/custombox/custombox.min.js"></script>
	
    <script>
      $(document).ready(function () {
             $(document).ready(function(){
             var  res = location.search;
             res = decodeURIComponent(res);
             res = res.split("=");
             displayNotification(res);

             $('form').parsley().on('field:validated', function() {
             	  
       	  	 });
         	
        });
        function displayNotification(res){
        	var status = res[1];
        	var type = res[2];
        	var msg = res[4];
        	 
        	if(status){
        		var obj = getUserMessages(status, type, msg);
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
        function getUserMessages(result,type, msg){
            var res = {type:undefined, msg:msg};
            if (result == "failure" && type == "invalid"){
            	res.type = 'error';
            	res.title = 'Failed!';
                res.msg = "Invalid user details!.";
            }else if (result == "success" && type == "OTPValidate"){
            	res.type = 'success';
            	res.title = 'OTP validation';
                res.msg = msg;
                showOTPModal(status, type, msg, res[6],res[8]);
            }
            return res;
        }
        function showOTPModal(status, type, msg, mobile,loginId){
            $('#otpMobile').val(mobile);
            $('#otpLoginId').val(loginId);
            $('#otpmsg').text(msg);
          	$('#otpModal').modal('show');
        }
        });
      </script>
</body>


</html>