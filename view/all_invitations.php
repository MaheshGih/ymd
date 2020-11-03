<?php   
    // session_start();
    include("../include/session.php");
    include("../model/user_model.php");
    
?>
<?php
#$invitations = $objUserModel->GetAllInvitations(0,10);
?>
<!DOCTYPE html>
<html lang="en">
    

<head>
        <?php include("../include/meta.php");?>
        <!-- App css -->
        <?php include("../include/common_css.php");?>
        <?php include("../include/table_css.php");?>
	<style type="text/css">
	   .hide{
	       display:none;
	   }
	</style>
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Reports</a></li>
                                            <li class="breadcrumb-item active">Invitations</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Invitations</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box table-responsive">
                                    	<form class="form-horizontal" id="blockUsersForm" action="../controller/payment_controller.php" method="post">
                                          <div Class="form-group row">
                                        
                                            <div class="col-3">    
                                            </div>
                                            <div class="form-group row">
                                            	<label for="txtLevelname" class="col-3 form-label">Status</label>
                                                <div>
                                                    <select name="inviStatus" id="inviStatus" class="form-control">
                                                		<option value="ALL"> All</option>
                                                		<option value="SENT"> Invitation Sent</option>
                                                		<option value="PAYMENT_DONE"> Payment Completed</option>
                                                		<option value="EXPIRED"> Expired </option>
                                                		<option value="ACCEPTED"> Accepted</option>
                                            		</select>
                                                </div>
                                             </div>
                                             </div>
                                    	</form>
                                        <!-- <h4 class="header-title">Rewarded Users</h4> -->
                                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                            	<th class="no-sort">Receiver Login Id</th>
                                                <th class="no-sort">Receiver Name</th>
                                                <th class="no-sort">Receiver Mobile</th>
                                                <th class="no-sort">Provider Login Id</th>
                                                <th class="no-sort">Provider Name</th>
                                                <th class="no-sort">Provider Mobile</th>
                                                <th class="all no-sort">Status</th>
                                                <th class="all">Date</th>
                                                <th class="no-sort">View Reciept</th>
                                            </tr>
                                            </thead>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        
                    </div> <!-- end container-fluid -->
					<div id="modalId" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">Reciept File</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-1" id="imgDiv">
                                		
                                	</div>
                                	<p id="nofilemsg" class="hide"> File Not found!.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
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
        <?php include '../include/common_js.php';?>
        <!-- Required datatable js -->
        <?php include '../include/table_basic_js.php';?>
        
        <!-- Datatables init -->
        <!-- <script src="../assets/js/pages/datatables.init.js"></script> -->

        <!-- App js -->
        <script src="../assets/js/app.min.js"></script>
        <script type="text/javascript">
        	$(document).ready(function (){
        		var res = location.search;
                res = res.split("=");
                displayNotification(res[1],res[2]);
                
        	    var table = loadTable();
        	    $('#inviStatus').on('change',function(){
        	    	 table.draw();
            	});
        	});
        	function loadTable(){
    		 var table  = $('#example').DataTable( {
    			"ordering": true,
    			"order": [[ 7, "desc" ]],
    			columnDefs: [{
    			      orderable: false,
    			      targets: "no-sort"
    			    }],
		        "processing": true,
		        "serverSide": true,
		        "ajax": {
		            "url": "../controller/admin_controller.php",
		            "type": "POST",
		            "data": function ( d ) {
		                d.get_all_invitations = "get_all_invitations";
		                d.get_status = $('#inviStatus').val();
		            }
		        }
		     });
		     return table;
            }
        	function getRecieptPath(invitation_id){
            	var data = {'invitation_id':invitation_id,'get_reciept_path':'get_reciept_path'};
              	$.ajax({
          	    	url: "../controller/admin_controller.php",
          	    	data:data,
          	    	method:'post',
          	    	success: function(res){
              	    	
              	    	if(res && (res.trim()).length>0){
                  	    	res = res.trim();
                  	      var img = '<img id="recieptPath" class="col-lg-8 hide" src="../'+res+'"/>';
              	    	  $('#imgDiv').html(img);
              	    	  $('#recieptPath').removeClass('hide');
              	    	  $('#nofilemsg').addClass('hide');
              	    	$('#modalId').modal('show');
                      	}else{
                      	  $('#nofilemsg').removeClass('hide');
                      	  $('#recieptPath').addClass('hide');
                        }
                        
          	    	}
          	 	});
        	}  			
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