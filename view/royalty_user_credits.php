<?php   
    // session_start();
    include("../include/session.php");
    include("../model/user_model.php");
    global $help_amount;
    global $housefull_amount;
    global $royalty_amnt;
        
?>
<?php
$users = $objUserModel->GetUserRoyaltyPoints($_SESSION['userid'],$_SESSION['royalty_id']);
$royalty_rec_tot_amnt = 0;
?>
<!DOCTYPE html>
<html lang="en">
    

<head>
        <meta charset="utf-8" />
        <title>User Royalty Credits | You-Me Donation </title>
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
                                            <li class="breadcrumb-item active">Active Users</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">User Royalty Credits</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->
                        	<div class="row">
                                 <div class="col-xl-6 col-sm-12">
                                    <div class="card-box widget-box-two widget-two-custom">
                                        <div class="media">
                                            <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                                <i class="mdi mdi-currency-usd avatar-title font-30 text-white"></i>
                                            </div>
                                            <div class="wigdet-two-content media-body">
                                                <p class="m-0 text-uppercase font-weight-medium" title="Statistics">Housefull Amount</p>
                                                <h3 class="font-weight-medium my-2">&#8377 <span data-plugin="counterup" ><?php echo  $housefull_amount;?></span></h3>
                                                   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-sm-12">
                                    <div class="card-box widget-box-two widget-two-custom">
                                        <div class="media">
                                            <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                                <i class="mdi mdi-currency-usd avatar-title font-30 text-white"></i>
                                            </div>
                                            <div class="wigdet-two-content media-body">
                                                <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Royalty Amount</p>
                                                <h3 class="font-weight-medium my-2">&#8377 <span data-plugin="counterup" id="royalty_rec_tot_amnt_h3">0</span></h3>
                                                <p class="m-0">Till <?php echo date('d-m-Y'); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box table-responsive">
                                    	<!-- <form class="form-horizontal" id="blockUsersForm" action="../controller/payment_controller.php" method="post">
                                          <div Class="form-group row">
                                                <div class="  col-lg-3 col-sm-12">
                                                    <input type="submit" name="btnAddUserRoyalty" id="btnAddUserRoyalty" class="btn btn-md btn-block btn-primary waves-effect waves-light" value="Add Royality"></input>
                                                </div>    
                                        	</div>
                                    	</form> -->
                                        <!-- <h4 class="header-title">Rewarded Users</h4> -->
                                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                            	<th></th>
                                            	<th>Point No</th>
                                                <th>Amount</th>
                                                <th>Credit Date</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                
                                                $recvd_status ="Received";
                                                $not_recvd_status ="Not Received";
                                                $danger_class = "badge-danger";
                                                $success_class = "badge-success";
                                                $partially_class = "badge-info";
                                            
                                                foreach ($users as $r){
                                                    if($r['is_done'] == 1){
                                                        $status=$recvd_status;
                                                        $class = $success_class;
                                                        $royalty_rec_tot_amnt = $royalty_rec_tot_amnt + $r['amount'];
                                                    }else{
                                                        $status = $not_recvd_status;
                                                        $class = $danger_class;
                                                    }
                                                    
                                                    $royalty_date  = $objUtilModel->formatStrDate($r['royalty_date'], $objUtilModel->date_format);
                                            ?>
                                                <tr>
                                                    <td></td>
                                                    <td><?php echo $r['point_no'];?></td>
                                                    <td><?php echo $r['amount'];?></td>
                                                    <td><?php echo $royalty_date;?></td>
                                                    <td ><span class="badge label-table <?php echo $class;?>"><?php echo $status;?></span></td>    
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
                        <input type="hidden" id="royalty_rec_tot_amnt" value="<?php echo $royalty_rec_tot_amnt;?>">
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
		
		<script src="../assets/libs/sweetalert2/sweetalert2.min.js"></script>
        <script src="../assets/libs/custombox/custombox.min.js"></script>
        <script src="../assets/js/pages/sweet-alerts.init.js"></script>
        
        <!-- Responsive examples -->
        <script src="../assets/libs/datatables/dataTables.responsive.min.js"></script>
        <script src="../assets/libs/datatables/responsive.bootstrap4.min.js"></script>
        <script src="../assets/libs/datatables/dataTables.select.min.js"></script>
        
		<script type="text/javascript" src="../assets/libs/datatables/dataTables.checkboxes.min.js"></script>
        <!-- Datatables init -->
        <!-- <script src="../assets/js/pages/datatables.init.js"></script> -->

        <!-- App js -->
        <script src="../assets/js/app.min.js"></script>
        <script type="text/javascript">
        	$(document).ready(function (){
        		var rec_amnt = $("#royalty_rec_tot_amnt").val();
            	$('#royalty_rec_tot_amnt_h3').text(rec_amnt);
        		var res = location.search;
                res = res.split("=");
                displayNotification(res[1],res[2]);
                
        	    var table = $('#example').DataTable({
        	      'order': [[1, 'asc']]
        	   });


        	   
        	});			
            function displayNotification(result,type){
                if(result == "failure"){
                    Swal.fire({
                        type: "error",
                        title: "Oops...",
                        text: "Something went wrong!",
                        confirmButtonClass: "btn btn-confirm mt-2",
                        footer: 'Invitation message sending failed.Please enter valid mobiel or try again later.'
                    });
                }
                if(result == 'success'){
                        Swal.fire({title:"Good job!",
                            text: getUserMessages(result, type),
                        type:"success",
                        confirmButtonClass:"btn btn-confirm mt-2"});
                }
            }
            function getUserMessages(result,type){
                    var successActivMsg ="Hurray : Invitation sent Successfully.";
                    if (result == "success" && type == "invitation"){
                        return successActivMsg;
                    }
            }
        </script>

        
    </body>


</html>