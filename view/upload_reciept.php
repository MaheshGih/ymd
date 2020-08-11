<?php
    // session_start();
    include("../include/session.php");
    include('../model/payment_model.php');
    $reciepts = $objPaymentModel->GetUploadedReciepts($_SESSION['userid']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<title>Payment Uploads | You-Me Donation</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
<meta content="Coderthemes" name="author" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- App favicon -->
<link rel="shortcut icon" href="../assets/images/favico.png">

<!-- Plugins css -->
<link href="../assets/libs/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/libs/lightbox2/lightbox.min.css" rel="stylesheet" type="text/css" />
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
    <?php include('../include/menu.php');?>
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Adminox</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Basic Details</a></li>
                                        <li class="breadcrumb-item active">Reciept Uploads</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Payment Details</h4>
                            </div>
                        </div>
                    </div>     
                    <!-- end page title --> 
                
                    <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title">Upload your Payment reciept here</h4>
                                    <p class="sub-header">
                                    </p>
                                    <form action="../controller/payment_controller.php" method="POST" class=""  enctype="multipart/form-data">
                                            <div class="form-group row">
                                                    <label class="col-md-2 col-form-label" for="example-password">Transaction Id</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="txtTransactionId" id="txtTransactionId" class="form-control"  >
                                                    </div>
                                            </div>
                                        <div class="">
                                            <input id="filePayment" name="filePayment" type="file"  />
                                        </div>
        
                                        <div class="dz-message needsclick">
                                            <!-- <i class="h1 text-muted dripicons-cloud-upload"></i> -->
                                            <h4 class="mt-3">Drop files here or click to upload.Please choose a JPEG or PNG file.</h4>
                                            <span class="text-muted font-13">(Upload your payment screenshot. Payments can be acceepted through <strong>GPay, PhonePe, Paytm</strong>)</span>
                                        </div>
                                        <div class="clearfix text-right mt-3">
                                                <button type="submit" id="btnUpload" name="btnUpload" class="btn btn-danger"> <i class="mdi mdi-send mr-1"></i> Submit</button>
                                        </div>
                                    </form>
                                    
                                </div> <!-- end card-box -->
                            </div> <!-- end col-->
                    </div>
                        <!-- end row -->  
                <div class="row"> <!--begin row-->
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="header-title"> Uploaded Reciepts</h4>
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Transaction Id</th>
                                        <th>Reciept</th>
                                        <th>Uploaded Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            while($r = mysqli_fetch_assoc($reciepts)){
                                    ?>
                                            <tr>
                                                <td><?php echo $r['trans_id']; ?></td>
                                                <td>
                                                    <a href="../<?php echo $r['img_path']; ?>"  data-lightbox="#single-image-3">
                                                        <img id="single-image-3" src="../<?php echo $r['img_path']; ?>" alt="image-1" class="img-fluid" style="width:50px; height:50px;" />
                                                    </a>
                                                </td>
                                                <td><?php echo $r['paid_date']; ?></td>
                                            </tr>
                                    <?php
                                            }
                                    ?>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div> <!--end row-->
                
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

<!-- Plugins js -->
<script src="../assets/libs/dropzone/dropzone.min.js"></script>
<script src="../assets/libs/lightbox2/lightbox.min.js"></script>

<!-- App js -->
<script src="../assets/js/app.min.js"></script>

</body>

</html>