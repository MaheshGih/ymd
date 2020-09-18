<?php include("../include/config.php");?>
<?php
// session_start();
include( "../include/session.php");
?>

<?php include("../model/user_model.php");?>
<?php include("../model/withdraw_model.php");?>
<?php include("../model/wallet_model.php");?>
<?php
$withdraw_reqs = $objWithdrawModel->GetWithdrwalsByUserId($_SESSION['userid']);
$wallet = $objWalletContactModel->GetWalletByUserId($_SESSION['userid']);
$txns = $objUserModel->GetWalletTxnsByUserId($_SESSION['userid']);
?>
<!DOCTYPE html>
<html lang="en">
    

<head>
        <meta charset="utf-8" />
        <title>Wallet</title>
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

            
            <!-- Topbar Start -->
            <div class="navbar-custom"><?php include('../include/user_menu.php'); ?>
                <!-- LOGO -->
                <?php include( '../include/logo_box.php'); ?>

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
                                            <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Referrals</a></li> -->
                                            <li class="breadcrumb-item active">Wallet</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Wallet</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->
                        <div class="row">
                             <div class="col-xl-4 col-sm-4">
                                <div class="card-box widget-box-two widget-two-custom">
                                    <div class="media">
                                        <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                            <i class="mdi mdi-currency-usd avatar-title font-30 text-white"></i>
                                        </div>
                                        <div class="wigdet-two-content media-body">
                                            <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Wallet Balance</p>
                                            <h3 class="font-weight-medium my-2">&#8377 <span data-plugin="counterup" id="totalAmount"><?php echo $wallet['total_amount']; ?></span></h3>
                                            <p class="m-0">Till <?php echo date('d-m-Y'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8 col-sm-8">
                                <div class="card-box">
                                    <h4 class="header-title mb-4">Withdraw Amount</h4> 
                                    <div class="col-12">
                                        <form name="todo-form" id="todo-form" class="mt-4" action="../controller/wallet_controller.php" method="post" onsubmit="return withdrawReq();">
                                            <div class="row" >
                                                <div class="col-sm-5 todo-inputbar">
                                                    <input type="text" id="withdrawAmount" name="withdrawAmount" class="form-control" 
                                                    	placeholder="Withdraw Amount" style="margin-bottom:2px;" required>
                                                </div>
                                                <div class="col-sm-3 todo-send">
                                                    <button class="btn-info btn-md btn waves-effect waves-light" type="submit" id="withdrawReqBtn" name="withdrawReqBtn" 
                                                    	style="margin-bottom:2px;"><span> Add Request </span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-box table-responsive">
                                    <h4 class="header-title">Withdraw Request List</h4>
                                    <table id="datatable" class=" responsive-datatable table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Amount</th>
                                            <th>Request Date</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i=1;
                                            $status ="Received";
                                            $danger_class = "badge-danger";
                                            $success_class = "badge-success";
                                            $partially_class = "badge-info";
                                            if($withdraw_reqs){
                                                
                                            
                                                while($r = mysqli_fetch_assoc($withdraw_reqs)){
                                                    if($r['is_done'] == 1){
                                                        $status="Received";
                                                        $class = "badge-success";
                                                    }else{
                                                        $status ="Not Received";
                                                        $class = "badge-danger";
                                                    }
                                            ?>
                                             <tr>
                                                <td><?php echo $r['amount_req'];?></td>
                                                <td><?php echo $r['date_req'];?></td>
                                                <td ><span class="badge label-table <?php echo $class;?>"><?php echo $status;?></span></td>
                                                
                                            </tr>
                                            <?php
                                               $i++; }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-box table-responsive">
                                    <h4 class="header-title">Transactions</h4>
                                    <table id="responsive-datatable" class=" datatable table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                        	<th>Txn User</th>
                                        	<th>Amount</th>
                                            <th>Txn</th>
                                            <th>Txn Type</th>
                                            <th>Date</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                             while($r = $txns->fetch_assoc()){
                                               if($r['txn_type'] == 'CREDIT'){
                                                    //$txnType="Received";
                                                    $class = "badge-success";
                                                }else if($r['txn_type'] == 'DEBIT'){
                                                    //$txnType ="Not Received";
                                                    $class = "badge-danger";
                                                }     
                                            ?>
                                             <tr>
                                                <td><?php echo $r['cause_full_name']?></td>
                                                <td><?php echo $r['amount'];?></td>
                                                <td><?php echo ucfirst(strtolower($r['cause_type']))?></td>
                                                <td><span class="badge label-table <?php echo $class;?>"><?php echo ucfirst(strtolower($r['txn_type']));?></span></td>
                                                <td><?php echo $r['cr_date'];?></td>
                                                
                                            </tr>
                                            <?php } ?>
                                            
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
        <script type="text/javascript">
          $(document).ready(function(){
                var  res = location.search;
                res = res.split("=");
                displayNotification(res[1],res[2]);
							
                
          });
          function withdrawReq(){
        	var totalAmountEle = document.getElementById( "totalAmount" );
        	var withdrawAmountEle = document.getElementById( "withdrawAmount" );
        	var totalAmount = parseInt(totalAmountEle.innerText);
        	var withdrawAmount = withdrawAmountEle.value;
        	if( totalAmount > withdrawAmount){
				return true;
			}else{
				Swal.fire({title:"Request Declined!",
                   text: 'Insufficient fund to withdraw!',
                   type:"error",
                   confirmButtonClass: "btn btn-confirm mt-2"
               });
               return false;
			}
          }
          function displayNotification(result,type){
               if(result == 'success'){
                    Swal.fire({title:"Congrats!",
                        text: getUserMessages(result, type),
                       type: result=='success' ? 'success' : 'error',
                       confirmButtonClass: "btn btn-confirm mt-2"
                   });
               }
           }
          function getUserMessages(result,type){
              var msg = "";
              if (result == "success" && type == "addrequest"){
                  return msg="Successfully added Withdraw amount Request!";
              }else if(result == "failed" && type == "addrequest"){
            	  return msg="Failed to added Withdraw amount Request. Try again later";
               }
          }
        </script>
    </body>


</html>