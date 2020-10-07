<?php include("../include/config.php");?>
<?php
// session_start();
include( "../include/session.php");
?>

<?php include("../model/user_model.php");?>
<?php include("../model/withdraw_model.php");?>

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
                                    	<input type="hidden" id="help_amount" value=<?php echo $help_amount;?>/>
                                        <form name="todo-form" id="todo-form" class="mt-4" action="../controller/wallet_controller.php" method="post" onsubmit="return withdrawReq();">
                                            <div class="row" >
                                                <div class="col-sm-4 mb-1 todo-inputbar">
                                                	<input type="hidden" id="kyc_done" value=<?php echo $_SESSION['kyc_done'];?> name="kyc_done"/>
                                                    <input type="text" id="withdrawAmount" autocomplete="off" data-parsley-type="number" required name="withdrawAmount" class="form-control" 
                                                    	placeholder="Withdraw Amount" style="margin-bottom:2px;" required>
                                                    <small class="form-text text-muted "><i class="fa fa-info-circle" aria-hidden="true"></i> Withdraw amount should be multiples of 1000 (i.e 1000, 2000, 3000,..)</small>
                                                    <!-- <p class="text-info"><i class="fa fa-info-circle" aria-hidden="true"></i> </p> -->
                                                </div>
                                                <div class="col-sm-4 mb-1 todo-inputbar">
                                                    <input type="password" id="txnPassword" autocomplete="off" required name="txnPassword" class="form-control" 
                                                    	placeholder="Transaction Password" style="margin-bottom:2px;" required>
                                                    <a href="#" onclick="sendTxnPassword();" class="text-muted float-right"><small>Forgot your Tran password?</small></a>
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
                                    <table id="withdraw-dt" class=" responsive-datatable table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
                                    <table id="txn-dt" class=" datatable table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
        <!-- <script src="../assets/js/pages/datatables.init.js"></script> -->
        <script src="../assets/libs/parsleyjs/parsley.min.js"></script>
		<!-- App js -->
        <script src="../assets/js/app.min.js"></script>
        <script src="../js/util.js"></script>
        
        <script type="text/javascript">
          $(document).ready(function(){
                var  res = location.search;
                res = decodeURIComponent(res);
                res = res.split("=");
                displayNotification(res);

                addParselyValidations();
                
                $('#withdraw-dt').DataTable({
                	"order": [[ 1, "desc" ]]
                });

                $('#txn-dt').DataTable({
                	"order": [[ 4, "desc" ]]
                });
          });
          function withdrawReq(){
			
          	var kyc_done = $("#kyc_done").val();
          	kyc_done = kyc_done?parseInt(kyc_done):0;
          	kyc_done = undefined;
          	if(kyc_done){
          		Swal.fire({title:"Kyc not completed",
                    text: 'Please fill all the details',
                    type:"error",
                    confirmButtonClass: "btn btn-confirm mt-2"
                }).then((value) => {
                	window.location.href = "kyc.php";
                });
                return false;
            }
        	var totalAmountEle = document.getElementById( "totalAmount" );
        	var withdrawAmountEle = document.getElementById( "withdrawAmount" );
        	var totalAmount = parseInt(totalAmountEle.innerText);
        	var withdrawAmount = withdrawAmountEle.value;
        	var help_amount = $('#help_amount').val();
			var msg = undefined;
			var err = false;
			withdrawAmount = withdrawAmount?parseInt(withdrawAmount):0;
			help_amount = help_amount?parseInt(help_amount):0;
        	if( !withdrawAmount || withdrawAmount%help_amount!=0 ){
				err = true;
				msg = 'Withdraw amount should be multiples of 1000 (i.e 1000, 2000, 3000,..)';
            }else if(totalAmount < withdrawAmount ){
            	err = true;
				msg = 'Insufficient fund to withdraw!';
            }
                        
        	if( !err ){
        		disableBtn('#withdrawReqBtn');
				return true;
			}else{
				Swal.fire({title:"Request Declined!",
                   text: msg,
                   type:"error",
                   confirmButtonClass: "btn btn-confirm mt-2"
               });
               return false;
			}
          }
          
          function displayNotification(res){
        	if(res){
          		var obj = getUserMessages(res)
          		if(obj.type)
          		notification(obj);
              }
          }
          function notification(obj){
          	Swal.fire({title:obj.title,
                  text : obj.msg,
                 type : obj.type,
                 confirmButtonClass: "btn btn-confirm mt-2"
             });
          }
          function getUserMessages(res){
              var result = res[1];
              var type = res[2];
              var msg = res.length>=5?res[4]:undefined;
              var res = {};
              if (result == "failure" && type == "invalid"){
              	res.type = 'error';
              	res.title = 'Failed!';
                res.msg = "Mobile no not exist!";
              }
              if (result == "success" && type == "addrequest"){
            	   res.type = 'success';
                	res.title = 'success!';
                    res.msg = "Successfully added Withdraw amount Request!";
                  
              }else if(result == "failure" && type == "addrequest"){
            	  res.type = 'error';
                	res.title = 'Failed!';
                	if(msg){
                		res.msg = msg;
                   	}else{
                   		res.msg = "Failed to added Withdraw amount Request. Try again later";
                     }                    
              }else if(result == "failure" && type == "invalidtxnpassword"){
            	res.type = 'error';
            	res.title = 'Failed!';
                res.msg = "Invalid Transaction Password";
              }
              return res;
          }

          function sendTxnPassword(){
          	$.ajax({
      	    	url: "../controller/user_controller.php?forgot_txn_passsword=sendtxnpass",
      	    	success: function(res){
          	    	var obj = {status:undefined,type:undefined,msg:undefined};
          	    	if(res){
          	    	  obj.type = 'success';
	                  obj.title = 'Congrats!';
	                  obj.msg = "Transaction Password is sent to your registerd mobile number.";
                  	}else{
                  		res.type = 'error';
      	              	res.title = 'Failed!';
      	                res.msg = "Transaction Password sms sending failed!. Please try again.";
                    }
                    notification(obj)
      	    	}
      	   });
          }
        </script>
    </body>


</html>