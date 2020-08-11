<?php
// session_start();
include("../include/session.php");
include('../model/plan_model.php');
$list = $objPlanModel->GetLevels();
?>
<?php
$id="";
$btnName = "btnAddLevel";
$btnText ="Save";

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $level = $objPlanModel->GetLevelById($_GET['id']);
    $btnName = "btnEditLevel";
    $btnText = "Edit";
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>Royalty Points | You-Me Donation </title>
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
                                <input type="text" class="form-control" placeholder="Search..." />
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
        <!-- ========== Left Sidebar Start ========== --><?php   include('../include/menu.php'); ?>
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
                                            <a href="javascript: void(0);">Rewards</a>
                                        </li>
                                        <li class="breadcrumb-item active">Royalty Points</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Royalty Points</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <form class="form-horizontal" action="../controller/plan_controller.php" method="post">
                                    <DIV Class="form-group row">
                                        <div class="col-4">
                                            <label for="txtLevelname" class="col-4 col-form-label">Level name</label>
                                            <div class="col-9">
                                                <input type="hidden" id="hdnId" name="hdnId" value="<?php echo $id; ?>" />
                                                <input type="text" class="form-control" name="txtLevelname" id="txtLevelname" value="<?php  echo isset($level['level_name'])?$level['level_name']:"";  ?>"/>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="txtLeftPairs" class="col-4 col-form-label">Left Pairs</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" name="txtLeftPairs" id="txtLeftPairs" value="<?php  echo isset($level['left_pairs'])?$level['left_pairs']:"";  ?>" />
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="txtRightPairs" class="col-4 col-form-label">Right Pairs</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" name="txtRightPairs" id="txtRightPairs" value="<?php  echo isset($level['right_pairs'])?$level['right_pairs']:"";  ?>" />
                                            </div>
                                        </div>
                                    </DIV>

                                    <div class="form-group row">
                                        <div class="col-4">
                                            <label for="txtUsdValue" class="col-3 col-form-label">USD</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" name="txtUsdValue" id="txtUsdValue" value="<?php  echo isset($level['usd_value'])?$level['usd_value']:"";  ?>" />
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="txtInrValue" class="col-3 col-form-label">INR</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" name="txtInrValue" id="txtInrValue" value="<?php  echo isset($level['inr_value'])?$level['inr_value']:"";  ?>" />
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="inputMobile" class="col-3 col-form-label">    </label>
                                            <div class="col-9">
                                                <button name="<?php echo $btnName; ?>" id="<?php echo $btnName; ?>" class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit"><?php echo $btnText; ?></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box table-responsive">
                                <h4 class="header-title">Royalty Points</h4>
                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr align="center">
                                            <td></td>
                                            <th colspan="2">Pairs</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr align="center">
                                            <th>Level</th>
                                            <th>Left</th>
                                            <th>Right</th>
                                            <th>USD (<i class=" fas fa-dollar-sign fas fa-dollar-sign"></i>)</th>
                                            <th>INR (<i class="fas fa-rupee-sign"></i>)</th>
                                            <td>Actions</td>
                                        </tr>
                                    </thead>
                                    <tbody>                                        <?php
                                        while($r = mysqli_fetch_assoc($list)){
                                        ?>
                                        <tr align="center">
                                            <td><?php echo $r['level_name'];?></td>
                                            <td><?php echo $r['left_pairs'];?></td>
                                            <td><?php echo $r['right_pairs'];?></td>
                                            <td><i class=" fas fa-dollar-sign fas fa-dollar-sign"></i> <?php echo $r['usd_value'];?></td>
                                            <td><i class="fas fa-rupee-sign"></i> <?php echo $r['inr_value'];?></td>
                                            <td><a href="royalty_points.php?id=<?php echo $r['id']; ?>"><i class="fas fa-pencil-alt"></i></a></td>
                                        </tr>        
                                    <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
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