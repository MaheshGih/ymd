<?php   
    // session_start();
    include("../include/session.php");
?>
<?php include("../model/user_model.php");?>
<?php
       $inactiv_childs = $objUserModel->GetChildsByUserId($_SESSION['userid'],0);
?>
<?php
    if(isset($_GET['id'])){
        $res = $objUserModel->ActivateUserById($_GET['id']);
        if($res){
            echo "<script> location.href='../view/activate_users.php?=success=insert';</script>";
        }else{
            echo "<script> location.href='../view/activate_users.php?=failure=insert';</script>";
        }
       //echo $res;
    }
?>
<!DOCTYPE html>
<html lang="en">
   
<head>
        <meta charset="utf-8" />
        <title>Activate Users | You-Me Donation </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/images/favico.png">
        <link href="../assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/libs/custombox/custombox.min.css" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css"  id="app-stylesheet" />

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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                            <li class="breadcrumb-item active">Get Help Admin History </li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Get Help History</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box table-responsive">
                                        <h4 class="header-title"> Get Help Users History</h4>

                                        <table id="ph_table" class="table table-bordered  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                            	<th></th>
												<th>Get Help Id</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Payment Received Date</th>
                                                <th>Withdraw Request</th>
                                                <th>Provide Help User Id</th>
												<th>Provide help Phone No</th>
												<th>Payment Status</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
                                                while($r = mysqli_fetch_assoc($invitations_old)){
                                                    if($r['is_active'] == 1){
                                                        $activ ="Active";
                                                        $class = "badge-success";
                                                    }else{
                                                        $activ ="In-Active";
                                                        $class = "badge-danger";
                                                    }
                                                ?>
                                            <tr>
                                            	<td></td>
												 <td>
                                                    <?php echo $r['to_user_id']; ?>
                                                </td>
                                                <td>
                                                     <?php  echo $r['to_user_name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $r['to_mobile']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $r['date_sent']; ?>
                                                </td>
												 <td>
                                                    <?php echo $r['withdraw_req_id']; ?>
                                                </td>
												 <td>
                                                    <?php echo $r['provide_help_id']; ?>
                                                </td>
												<td>
                                                    <?php echo $r['provide_mobile']; ?>
                                                </td>
												 <td>
                                                    <?php echo $r['status']; ?>
                                                </td>
												
                                               
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
        <script src="../assets/libs/sweetalert2/sweetalert2.min.js"></script>

        <script src="../assets/js/pages/sweet-alerts.init.js"></script>
        <script src="../assets/libs/custombox/custombox.min.js"></script>
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
        <script src="../js/activateusers.js"></script>
    </body>


</html>