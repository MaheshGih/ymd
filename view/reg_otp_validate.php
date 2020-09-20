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
                                                <p class="text-muted mb-0 mb-3 success" id="otpmsg"><?php echo $_GET['msg'];?> </p>
                                            </div>
                                            <form class="form-horizontal" action="../controller/register_controller.php" method="POST">
                                                
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="otp">OTP</label>
                                                        <input type="hidden" id="otpMobile" name="otpMobile" value="<?php echo $_GET['mobile'];?>"/>
                                                        <input type="hidden" id="otpLoginId" name="otpLoginId" value="<?php echo $_GET['login_id'];?>"/>
                                                        <input class="form-control" type="text" id="otp" name="otp" placeholder="OTP" required="required"/>
                                                    </div>
                                                </div>
                                                <div class="form-group row text-center mt-2">
                                                    <div class="col-12">
                                                        <button id="btnOTPValidate" name="btnOTPValidate" class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Submit OTP</button>
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
        
    </div>
    <!-- end container -->
    </div>
    <!-- end page -->

    <!-- Vendor js -->
    <script src="../assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/parsleyjs/parsley.min.js"></script>	
    
</body>


</html>