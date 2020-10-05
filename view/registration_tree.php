<?php   
    // session_start();
    //include("../include/session.php");
    include("../model/login_model.php");
    $logid =  $objLoginModel->UserIdGenerator();
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
	<style>
/* html,
body {
  height: 100%;
  width: 100%;
  margin: 0px;
  padding: 0px;
} */
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
  border: 1px solid lightgray;
}

.hide{
    display:none;
}
</style>
	
</head>

<!--<body class="authentication-bg bg-primary authentication-bg-pattern d-flex align-items-center pb-0 vh-100">-->
<body>

    <div class="account-pages w-100 mt-1 mb-1">
        <div class="content">				
                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <h4 align="center"> REGISTRATION</h4>
                              
                                <div class="col-12">
                                    
                                        <div class="row" >
                                             <div class="col-sm-3 todo-inputbar">
                                                <img src="../assets/images/frontendlogo - Copy.png" alt="Nature" class="responsive">
                                               
                                            </div>

                                            <div class="col-sm-3 mb-3 todo-inputbar">
                                                <input type="text" id="refId" name="refId" class="form-control" placeholder="Enter Referral Userid" 
                                                value="<?php if(isset($_GET['ref'])) echo $_GET['ref']?>"
                                                style="margin-bottom:2px;" required>
                                               
                                                
                                            </div>
                                            <div class="col-sm-2 mb-3 todo-send">
                                                <button class="btn-info btn-md btn waves-effect waves-light" type="button" id="todo-btn-submit"
                                                onclick="getTreeData();return;" 
                                                name="todo-btn-submit" style="margin-bottom:2px;"><i class="fas fa-search"></i><span> Search </span></button>
                                            </div>
											<div class="col-sm-2 mb-3">
                                                 <p class="text-info mb-0"> <a href="login.php" class=" ml-1 float-center btn btn-success"><b>Sign In</b></a></p> 
                                            </div>
					    <div class="col-sm-2">
                                                 <a href="tree.php" class="btn btn-danger"><i class="fas fa-long-arrow-alt-left"> </i> Back to Tree </a> 
                                            </div>
                                        </div>
                                        <div class="row">
                                               
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
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
        <!-- end container -->
    </div>
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
                                        <input class="form-control" required type="text" id="otp" name="otp" placeholder="OTP" required="required"/>
                                        
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
                            <form class="form-horizontal" action="../controller/register_controller.php" method="POST">
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="username">Sponsor Id</label>
                                        <!-- <input type="hidden" id="hdnSide" name="hdnSide" /> -->
                                        <input type="hidden" id="hdnSpillId" name="hdnSpillId" />
                                        <input class="form-control" required type="text" id="txtSponsorId" name="txtSponsorId" required="" 
                                        placeholder="YMDXXXXXXX" readonly >
                                    </div>
                                    <div class="col-6">
                                        <label for="username">Sponsor Name</label>
                                        <input class="form-control" type="text" required id="txtSponsorName" name="txtSponsorName" required="" 
                                        placeholder=" " readonly>
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
                                    <div class="col-12">
                                        <label for="emailaddress">Email address</label>
                                        <input class="form-control" type="email" required id="txtEmail" name="txtEmail" required="" placeholder="john@deo.com">
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="username">LogIn Id</label>
                                        <input class="form-control" type="text" required id="txtUserId" name="txtUserId" value="<?php echo $logid;?>" required="" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label for="emailaddress">Mobile</label>
                                        <input class="form-control" type="text" required id="txtMobile" name="txtMobile" required="" minlength="10"  maxlength="10"  placeholder="9XXXX XXXXX">
                                    </div>
                                </div>
                                <div class="form-group row">
                                	<div class="col-6">
                                        <label for="txtPassword">Password</label>
                                        <input class="form-control" type="password" required="required" id="txtPassword" name="txtPassword" placeholder="Enter your password">
                                    </div>
                                    <div class="col-6">
                                        <label for="txtconfPassword">Conform Password</label>
                                        <input class="form-control" type="password" required="required" data-parsley-equalto="#txtPassword" id="txtconfPassword" name="txtconfPassword" placeholder="Re-Enter password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="txnPassword">Transaction Password</label>
                                        <input class="form-control" type="password" required="" id="txnPassword" name="txnPassword" placeholder="Enter Transaction password">
                                    </div>
                                     <div class="col-6">
                                        <label for="confirmTxnPassword">Conform Transaction Password</label>
                                        <input class="form-control" type="password" data-parsley-equalto="#txnPassword"  required="" id="confirmTxnPassword" name="confirmTxnPassword" placeholder="Re-Enter trans password">
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
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    
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
    
    <!-- App js -->
    <script src="../assets/js/app.min.js"></script>
	<script src="../assets/libs/parsleyjs/parsley.min.js"></script>
    <script src="../assets/js/vis/vis-network.min.js"></script>
    <script src="../js/reg_tree.js"></script>
    <script src="../js/reg.js"></script>
    
</body>
</html>