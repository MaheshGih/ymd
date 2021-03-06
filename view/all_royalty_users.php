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
                                            <li class="breadcrumb-item active">Royalty Users</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Royalty Users</h4>
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
                                            	<label for="txtLevelname" class="col-4 form-label">Status</label>
                                                <div>
                                                    <select name="inviStatus" id="inviStatus" class="form-control">
                                                		<option value="0"> Active</option>
                                                		<option value="1"> Completed</option>
                                            		</select>
                                                </div>
                                             </div>
                                            
                                    		</div>
                                    	</form>
                                        <!-- <h4 class="header-title">Rewarded Users</h4> -->
                                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                            	<th>Login Id</th>
                                            	<th>Name</th>
                                            	<th>Mobile</th>
                                            	<th>Amount</th>
                                                <th>Date</th>
                                                <th>Expire Date</th>
                                                <th>Status</th>
                                                
                                            </tr>
                                            </thead>
                                            
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
    			"ordering": false,
		        "processing": true,
		        "serverSide": true,
		        "ajax": {
		            "url": "../controller/admin_controller.php",
		            "type": "POST",
		            "data": function ( d ) {
		                d.get_royalty_users = "get_royalty_users";
		                d.get_status = $('#inviStatus').val();
		            }
		        }
		     });
		     return table;
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