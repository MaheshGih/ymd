<?php   
    // session_start();
    include("../include/session.php");
    include("../model/user_model.php");
    //include("../model/util_model.php");
    global $housefull_amount;
    global $royalty_amnt;
    
?>
<?php
$users = $objUserModel->GetHousefullUsersByStatus(0);
?>
<!DOCTYPE html>
<html lang="en">
    

<head>
        <meta charset="utf-8" />
        <title>Active Users | You-Me Donation </title>
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
                                            <li class="breadcrumb-item active">Housefull Users</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Housefull Users</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box table-responsive">
                                    	<form class="form-horizontal" id="addRoyaltyUserForm" action="../controller/payment_controller.php" method="post">
                                          	<input type="hidden" name="userIds" id="userIds"/>
                                      		<input type="hidden" name="hdnHouseMaturity" id="hdnHouseMaturity"/>
                                          	<div Class="form-group row">
                                                <div class="col-lg-3 col-sm-12">
                                                    <!-- <input type="submit" name="btnAddRoyaltyUser" id="btnAddRoyaltyUser" class="btn btn-md btn-block btn-primary waves-effect waves-light" value="Add Housefull Users"></input> -->
                                                    <button type="button" name="btnAddRoyaltyUser" id="btnAddRoyaltyUser" class="btn btn-md btn-block btn-primary waves-effect waves-light" >Add Housefull Maturity</button>
                                                </div>    
                                        	</div>
                                    	</form>
                                        <!-- <h4 class="header-title">Rewarded Users</h4> -->
                                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                            	<th></th>
                                            	<th>Login Id</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Joined Date</th>
                                                <th>Housefull Amount</th>
                                                <th>Royalty Amount</th>
                                                <th>Rolyaty Expires</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $exp_date = $objUtilModel->getExactDateAfterMonths(time(), 12);
                                                $exp_date =date('Y-m-d', $exp_date);
                                                foreach ($users as $r){
                                            ?>
                                                <tr>
                                                    <td></td>
                                                    <td><?php echo $r['login_id'];?></td>
                                                    <td><?php echo $r['full_name'];?></td>
                                                    <td><?php echo $r['mobile'];?></td>
                                                    <td><?php echo date('Y-m-d',strtotime($r['cr_date']));?></td>
                                                    <td><?php echo $housefull_amount;?></td>
                                                    <td><?php echo $royalty_amnt;?></td>
                                                    <td><?php echo $exp_date;?></td>    
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
        		var res = location.search;
                res = res.split("=");
                displayNotification(res[1],res[2]);
                
        	    var table = $('#example').DataTable({
        		   //dom: 'Bfrtip',
        	      'columnDefs': [
        	         {
        	            'targets': 0,
        	            'checkboxes': {
        	               'selectRow': true
        	            }
        	         }
        	      ],
        	      /* buttons: [
        	            {
        	                text: 'Add Rewards',
        	                action: function () {
        	                    table.rows().select();
        	                }
        	            }
        	        ], */
        	      'select': {style: 'multi'},
        	      'order': [[1, 'asc']]
        	   });

        	    $('#btnAddRoyaltyUser').on('click', function(evt){
        		    //evt.preventDefault();
					var rows = table.rows({selected:true}).data();
					var ids = [];
					rows.each(function(row, ind){
						ids.push(row[1]);
					});
					$('#userIds').val(ids.join());
					if(ids.length>0)
						$('form[id=addRoyaltyUserForm]').submit();
						//return true;
					else {
						Swal.fire({
		                    type: "error",
		                    title: "Select at least one user to Add Maturity",
		                    confirmButtonClass: "btn btn-confirm mt-2",
		                });		
						return false;
					}
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