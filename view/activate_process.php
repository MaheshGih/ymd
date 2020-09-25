<?php include("../include/session.php"); ?>
<?php include("../model/user_model.php");?>
<?php
$side = "";$name = "";$id='';
if(isset($_GET['id'])){
$res = $objUserModel->GetUserDetailsById($_GET['id']);
$side = $res['side'];
$name = $res['full_name'];
$id = $res['id'];
//$res = $objUserModel->ActivateUserById($_GET['id']);
}
?>

<?php
$psill_list = $objUserModel->GetSpillIds($_SESSION['userid'],$side,$id);
$inactiv_childs = $objUserModel->GetChildsByUserId($_SESSION['userid'],0);
?>
<?php
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Active Users | You-Me Donation </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
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
                                            <a href="javascript: void(0);">Tree</a>
                                        </li>
                                        <li class="breadcrumb-item active">Activate Users</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">User</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box table-responsive">
                                <h4 class="header-title"> Activate User</h4>
                                <form class="form-horizontal" action="activating_user.php" method="POST">
                                    <div class="form-group row">
                                        <label for="txtActUser" class="col-3 col-form-label">Name</label>
                                        <div class="col-8">
                                            <input type="hidden" id="hdnId" name="hdnId" value="<?php  echo $id; ?>" />
                                            <input type="text" class="form-control" name="txtActUser" id="txtActUser" readonly value="<?php echo $name;?>" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-3 col-form-label">Spill Id</label>
                                        <div class="col-9">
                                            <select id="ddlSponsors" name="ddlSponsors" class="form-control">
                                                <option value="none">-- Select Spill Id --</option><?php
                                                while($r= mysqli_fetch_assoc($psill_list)){
                                                ?>
                                                    <option value="<?php echo $r['id'];?>"><?php echo $r['full_name']; ?></option><?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-4">
                                            <button type="submit" name="btnActUser" id="btnActUser" class="btn btn-success waves-effect waves-light"> <i class="fas fa-save mr-1"></i> <span>Activate User</span> </button>
                                        </div>
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

    <!-- Datatables init -->
    <script src="../assets/js/pages/datatables.init.js"></script>

    <!-- App js -->
    <script src="../assets/js/app.min.js"></script>

</body>


</html>