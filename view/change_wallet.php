<?php
// session_start();
include("../include/session.php");
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <?php include("../include/meta.php");?>
    <!-- App css -->
    <?php include("../include/common_css.php");?>
        
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
                                            <a href="javascript: void(0);">Add Transaction</a>
                                        </li>
                                        <li class="breadcrumb-item active"></li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Add Wallet Transaction</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-md-8">
                            <div class="card-box">
                                
                                <form class="form-horizontal" action="../controller/payment_controller.php" method="POST">

                                    <div class="form-group row">
                                        <label for="inputName" class="col-3 col-form-label">Login Id</label>
                                        <div class="input-group col-9">
                                                <input type="text" name="login_id" id="login_id" required class="form-control" placeholder="Search...">
                                                <div class="input-group-append">
                                                    <button class="btn btn-info" type="button" id="btnUserWallet">
                                                        <i class="fe-search"></i>
                                                    </button>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputMobile" class="col-3 col-form-label">Name</label>
                                        <div class="col-9">
                                        	<input type="hidden" class="form-control" name="user_id" id="user_id"  readonly>
                                            <input type="text" class="form-control" name="full_name" id="full_name"  readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputMobile" class="col-3 col-form-label">Current Balance</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control val_change" name="cur_bal" id="cur_bal"  readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="inputName" class="col-3 col-form-label">Transaction Type</label>
                                        <div class="col-9">
                                            <select id="txn_type" name="txn_type" required class="form-control val_change">
                                                <option value="" selected="selected">Choose</option>
                                                <option value="OFFER">(+) Offer</option>
                                                <option value="CASH_BACK">(+) Cash Back</option>
                                                <option value="REFUND">(+) Refund</option>
                                                <option value="CHARGE_BACK">(-) Chargeback</option>
                                                <option value="CLAIM">(-) Claim</option>
                                                <option value="REVERSAL">(-) Reversal</option>
                                                <option value="PENALITY">(-) Penality</option>
                                        	</select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-3 col-form-label">Txn Amount</label>
                                        <div class="col-9">
                                            <input type="text" required class="form-control val_change" name="txn_amount" id="txn_amount" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputMobile" class="col-3 col-form-label">After Txn Balance</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" name="alterBal" id="alterBal"  readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="btnWalletAddTxn" class="col-2 col-form-label"></label>
                                        <div class="col-4">
                                        <button name="btnWalletAddTxn" id="btnWalletAddTxn" 
                                        	class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">  
                                        	Apply Txn 
                                        </button>
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
    <?php include '../include/common_js.php';?>
    
	
	<script src="../assets/libs/parsleyjs/parsley.min.js"></script>
	<script src="../js/util.js"></script>
	
    <script>
      
        $(document).ready(function(){
             var  res = location.search;
             res = res.split("=");
             displayNotification(res[1],res[2]);
			 
             addParselyValidations();
             $('#btnUserWallet').on('click', function(){
                 var login_id = $('#login_id').val();
            	 getUserWallet(login_id);
             })

             $('.val_change').on('change',function(){
				var txn_type = $('#txn_type').val();
				if(!txn_type)
					return;
				
				var txn_amount = $('#txn_amount').val();
				var cur_bal = $('#cur_bal').val();
				if(!txn_amount||!cur_bal)
					return;
				txn_amount = parseInt(txn_amount);
				cur_bal = parseInt(cur_bal);
				var alterBal = 0;
				if(txn_type=='OFFER'||txn_type=='CASH_BACK'||txn_type=='REFUND'){
					alterBal = cur_bal + txn_amount;
				}else{
					alterBal = cur_bal - txn_amount;
				}
				$('#alterBal').val(alterBal);
             });     	
        });
        function displayNotification(result,type){
        	if(result){
        		var obj = getUserMessages(result, type)
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
        function getUserMessages(result,type){
            var res = {type:undefined, msg:''};
            if (result == "success" && type == "add_txn"){
                res.type = 'success';
                res.title = 'Good!';
                res.msg = "Successfully added wallet Transaction!.";
            }else if (result == "failed" && type == "invalid_id"){
            	res.type = 'error';
            	res.title = 'Invalid User Id!';
                res.msg = "Provide a valid User Id.";
            }
            return res;
        }

        function getUserWallet(login_id){
            var data = {'login_id':login_id, 'btnUserWallet':'btnUserWallet'};
        	$.ajax({
            	method:'POST',
            	data : data,
    	    	url: "../controller/payment_controller.php",
    	    	success: function(res){
    	    		if(!res){
    	    			status = "failure"; 
    					type = "invalid_id"
        	    		displayNotification(status,type);
    	    			return false;
            	    }        	    	
        	    	res = JSON.parse(res)
        	    	if(res.status=='ERROR' && res.code=='invalid_id'){
        	    		status = "failure"; 
    					type = "invalid_id"
        	    		displayNotification(status,type);
            	    }else if(res.status=="OK" && res.data){
            	    	$('#user_id').val(res.data.uid);
                	    $('#full_name').val(res.data.full_name);
						var amnt = 0;
                	    if(res.data.total_amount){
                	    	amnt = res.data.total_amount;
                    	}
            	    	$('#cur_bal').val(amnt).change();
                	}else if(res.status=='OK' && res.code=='no_wallet'){
                		$('#cur_bal').val(0).change();
                    }
					
    	    	}
    	   });
        }
       	
    </script>
    <!-- App js -->
    <script src="../assets/js/app.min.js"></script>
	
</body>


</html>