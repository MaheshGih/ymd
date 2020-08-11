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
                                            <li class="breadcrumb-item active">Profile </li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Basic Details</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="card-box">
                                                <h4 class="header-title mb-4">PROFILE</h4>
            
                                                <form class="form-horizontal">

                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-3 col-form-label">Login Id</label>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" name="txtLoginId" id="txtLoginId" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-3 col-form-label">Name</label>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" name="txtUserName" id="txtUserName" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail" class="col-3 col-form-label">Email</label>
                                                        <div class="col-9">
                                                            <input type="email" class="form-control" name="txtEmail" id="txtEmail"  readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputMobile" class="col-3 col-form-label">Mobile</label>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" name="txtMobile" id="txtMobile"  readonly>
                                                        </div>
                                                    </div>
                                                    
                                                </form>
                                            </div>
                                        </div>
            
                                        <!-- end col -->
            
                                        <div class="col-md-6">
                                            <div class="card-box">
                                                <h4 class="header-title mb-4">CONTACT DETAILS</h4>
            
                                                <form class="form-horizontal">
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
                                                            <input type="text" class="form-control" id="txtCity" name="txtCity" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="txtState" class="col-3 col-form-label">State</label>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" id="txtState" name="txtState" />
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
            
                                    </div>
                                    <!-- end row -->



                                    <div class="row">
                                        <div class="col-6">
                                            <div class="card-box">
                                                <h4 class="header-title mb-4">BANK DETAILS</h4>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div>
                                                            <form class="form-horizontal">
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
                                        <div class="col-6">
                                            <div class="card-box">
                                            <h4 class="header-title mb-4">PAYMENT DETAILS</h4>
                                            <form class="form-horizontal">
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

        <!-- App js -->
        <script src="../assets/js/app.min.js"></script>
        <script src="../js/profile.js"></script>
        
    </body>


</html>