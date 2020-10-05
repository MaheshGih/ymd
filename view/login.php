<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Login | You-Me Donation Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favico.png">
    <link href="../assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/custombox/custombox.min.css" rel="stylesheet" type="text/css">
    <!-- App css -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

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
                                <div class="account-logo-box">
                                    <div class="text-center">
                                        <a href="index.php">
                                            <img class="col-sm-12" src="../assets/images/logo-dark.png" alt="" height="100">
                                        </a>
                                    </div>
                                    <h5 class="text-uppercase mb-1 mt-4">Sign In</h5>
                                    <p class="mb-0">Login to your account</p>
                                </div>

                                <div class="account-content mt-4">
                                    <form class="form-horizontal" action="../controller/login_controller.php" method="POST">

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="txtLoginId">Login Id    </label>
                                                <input class="form-control" type="text" name="txtLoginId" id="txtLoginId" required="" placeholder="YMDXXXXXXX">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <a href="#" onclick="sendPassword()" class="text-muted float-right"><small>Forgot your password?</small></a>
                                                <label for="txtLogPassword">Password</label>
												<div class="input-group">
                                                <input class="form-control" type="password" required="" name="txtLogPassword" id="txtLogPassword" placeholder="Enter your password">
												<div class="input-group-append">
													<button class="btn btn btn-outline-secondary" type="button" id="eyeBtn" onclick="showPassword()">
														<i class="fa fa-eye"></i>
													</button>
												</div>
												</div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">

                                                <div class="checkbox checkbox-success">
                                                    <input id="remember" type="checkbox" checked="">
                                                    <label for="remember">
                                                        Remember me
                                                    </label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group row text-center mt-2">
                                            <div class="col-12">
                                                <button id="btnSignIn" name="btnSignIn" class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Sign In</button>
                                            </div>
                                        </div>

                                    </form>

                                    <div class="row mt-4 pt-2">
                                        <div class="col-sm-12 text-center">
                                            <p class="text-muted mb-0">Don't have an account? <a href="registration_tree.php" class="text-dark ml-1"><b>Sign Up</b></a></p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->
    <!-- Vendor js -->
    <script src="../assets/js/vendor.min.js"></script>
    <script src="../assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <script src="../assets/js/pages/sweet-alerts.init.js"></script>
    <script src="../assets/libs/custombox/custombox.min.js"></script>
    <!-- App js -->
    <script src="../assets/js/app.min.js"></script>
    <script src="../js/login.js"></script>
</body>


</html>