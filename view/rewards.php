<?php
// session_start();
include("../include/session.php");
include('../model/rewards_model.php');
$list_rew =$objRewardsModel->GetRewards();
?>

<?php
$id="";
$btnName = "btnAddReward";
$btnText ="Save";
if(isset($_GET['id'])){
$id=$_GET['id'];
$reward = $objRewardsModel->GetRewardById($_GET['id']);
$btnName = "btnEditReward";
$btnText = "Edit";
}
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


</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">
        
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
                                        <li class="breadcrumb-item active"></li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Rewards</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <form class="form-horizontal" action="../controller/reward_controller.php" method="post">
                                    <div class="form-group row">
                                        <div class="col-3">
                                            <label for="txtDayNo" class="col-4 col-form-label">Day No.</label>
                                            <div class="col-9">
                                                <input type="hidden" id="hdnId" name="hdnId" value="<?php echo $id; ?>" />
                                                <input type="text" class="form-control" name="txtDayNo" id="txtDayNo" value="<?php  echo isset($reward['day_no'])?$reward['day_no']:"";  ?>" />
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <label for="txtNoOfPersons" class="col-3 col-form-label">Pesons</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" name="txtNoOfPersons" id="txtNoOfPersons" value="<?php  echo isset($reward['no_of_persons'])?$reward['no_of_persons']:"";  ?>" />
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="txtAmount" class="col-4 col-form-label">Amount</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" name="txtAmount" id="txtAmount" value="<?php  echo isset($reward['amount'])?$reward['amount']:"0";  ?>" />
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <label for="inputMobile" class="col-2 col-form-label"></label>
                                            <div class="col-9">
                                                <button name="<?php echo $btnName; ?>" id="<?php echo $btnName; ?>" class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit"><?php echo $btnText; ?>
                                                </button>
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
                                            <th>Day Number</th>
                                            <th>No of Persons</th>
                                            <th>Amount</th>
                                            <td>Actions</td>
                                        </tr>
                                    </thead>
                                    <tbody>                                        <?php
                                        while($r = mysqli_fetch_assoc($list_rew)){
                                        ?>
                                        <tr align="center">
                                            <td><?php echo $r['day_no'];?>
                                            </td>
                                            <td><?php echo $r['no_of_persons'];?>
                                            </td>
                                            <td><i class="fas fa-rupee-sign"></i> <?php echo $r['amount'];?>
                                            </td>
                                            <td>
                                                <a href="rewards.php?id=<?php echo $r['id']; ?>"><i class="fas fa-pencil-alt"></i></a>
                                            </td>
                                        </tr>                                        <?php
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