<?php   
    // session_start();
    //include("../include/session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register | Adminox - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favico.png">
    <link href="../assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/custombox/custombox.min.css" rel="stylesheet" type="text/css">
    <!-- App css -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />
	<link href="https://visjs.github.io/vis-network/dist/vis-network.min.css"></link>
	
</head>

<body class="authentication-bg bg-primary authentication-bg-pattern d-flex align-items-center pb-0 vh-100">

    <div class="account-pages w-100 mt-5 mb-5">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-8 col-xl-5">
                    <div class="card mb-0">

                        <div class="card-body p-4">

                            <div class="account-box">
                                <div class="account-logo-box">
                                    <div class="text-center">
                                        <a href="index.php">
                                            <img src="../assets/images/logo-dark.png" alt="" height="70">
                                        </a>
                                    </div>
                                    <h5 class="text-uppercase mb-1 mt-4">Register</h5>
                                    <!-- <p class="mb-0">Get access to our admin panel</p> -->
                                </div>

                                <div class="account-content mt-4">
                                    <form class="form-horizontal" action="../controller/register_controller.php" method="POST">
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <label for="username">Sponsor Id</label>
                                                <input class="form-control" type="text" id="txtSponsorId" name="txtSponsorId" value="<?php if(isset($_GET['ref'])) echo $_GET['ref']?>" required="" placeholder="YMDXXXXXXX" onchange="getSponsorName(this.value)">
                                            </div>
                                            <div class="col-6">
                                                <label for="username">Sponsor Name</label>
                                                <input class="form-control" type="text" id="txtSponsorName" name="txtSponsorName" placeholder=" " readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <label for="username">Full Name</label>
                                                <input class="form-control" type="text" id="txtFirstName" name="txtFirstName" required="" placeholder="Michael Zenaty">
                                            </div>
                                            <div class="col-6">
                                                <label for="username">LogIn Id</label>
                                                <input class="form-control" type="text" id="txtUserId" name="txtUserId" required="" readonly>
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
                                                <!-- <a href="page-recoverpw.html" class="text-muted float-right"><small>Forgot your password?</small></a> -->
                                                <label for="password">Password</label>
                                                <input class="form-control" type="password" required="" id="txtPassword" name="txtPassword" placeholder="Enter your password">
                                            </div>
                                            <!-- </div>
                                                <div class="form-group row"> -->
                                            <div class="col-6">
                                                <label for="inputState" class="col-form-label">Chose your Side</label>
                                                <select id="ddlSide" name="ddlSide" class="form-control">
                                                    <option value="0">Choose</option>
                                                    <option value="left">Left</option>
                                                    <option value="right">Right</option>
                                                </select>
                                                <input type="hidden" id="hdnSpillId" name="hdnSpillId" />
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
                                            	<input id="hdnSignupBtn" name="hdnSignupBtn" value="hdnSignupBtn" type="hidden"/>
                                                <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Sign Up Free</button>
                                            </div>
                                        </div>

                                    </form>

                                    <div class="row mt-4 pt-2">
                                        <div class="col-sm-12 text-center">
                                            <p class="text-muted">Already have an account?  <a href="login.php" class="text-dark ml-1"><b>Sign In</b></a></p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end card-body -->
                </div>
                <div class="col-md-12 col-lg-8 col-xl-5">
                	<div class="card-box" id="dvTree">
                        <h4 class="header-title mb-4">User Network</h4>
                        <div class="row text-center" style="height: 500px">
                            <div id="mynetwork" >
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mt-0">Terms & Conditions</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <p>
                        YMD1000US.com Was not resposible for any illegal activities.
                        Please notice that the <b>Members</b> of our company <b>should not join</b> in any other company. You Should not create any issues, in case of any issues occured their <b>Account & ID</b> will be <b style="color:red;">Blocked</b> from our website. All the Members should join by accepting our terms & Condition.
                    </p>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- end page -->
    <!-- Vendor js -->
    <script src="../assets/js/vendor.min.js"></script>
    <script src="../assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <script src="../assets/js/pages/sweet-alerts.init.js"></script>
    <script src="../assets/libs/custombox/custombox.min.js"></script>
    <!-- App js -->
    <script src="../assets/js/app.min.js"></script>
	<script src="../assets/libs/parsleyjs/parsley.min.js"></script>
    <script src="../assets/js/vis/vis-network.min.js"></script>
    <script src="../js/reg_tree.js"></script>
    <script src="../js/register.js"></script>
    
</body>
</html>