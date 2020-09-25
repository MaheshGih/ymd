<?php   
    // session_start();
    include("../include/session.php");
    include("../model/user_model.php");
?>
<?php
$employees = $objUserModel->GetEmployees();
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

        <!-- third party css -->
        <link href="../assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="../assets/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="../assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
		<link href="../assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/libs/custombox/custombox.min.css" rel="stylesheet" type="text/css" />
		

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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Referrals</a></li>
                                            <li class="breadcrumb-item active">Active Users</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Users</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box table-responsive">
                                    	<div class="col-xl-8 col-sm-8">
                                        <!-- <h4 class="header-title">USERS</h4> -->
                                        </div>
                                        <div class="">
                                        	<a class="pull-right btn btn-success" href="add_emp.php">Add Emp</a>
                                        </div>
                                        
                                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                            	<th>Login Id</th>
                                            	<th>Name</th>
                                                <th>Mobile</th>
                                                <th>Joined Date</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while($r = mysqli_fetch_assoc($employees)){
                                                    if($r['is_active'] == 1){
                                                        $activ ="Active";
                                                        $class = "badge-success";
                                                    }else{
                                                        $activ ="In-Active";
                                                        $class = "badge-danger";
                                                    }
                                                ?>
                                                <tr>
                                                	<td login-id=""><?php echo $r['login_id'];?></td>
                                                    <td full-name=""><?php echo $r['full_name'];?></td>
                                                    <td><?php echo $r['mobile'];?></td>
                                                    <td><?php echo $r['date_created'];?></td>
                                                    <td><span class="badge label-table <?php echo $class;?>"><?php echo $activ;?></span></td>
                                                    <td>
                                                    	<?php if($r['is_active'] == 1){ ?>                                                   
                                                    	<button class="btn btn-sm btn-danger" in-activate="" > Inactivate</button>
                                                    	<?php }else{ ?> 
                                                    	<button class="btn btn-sm btn-success" activate="" > Activate</button>
                                                    	<?php } ?>
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
				
                
                <div id="inactivateModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">Inactivate Employee</h4>
                            </div>
                            <div class="modal-body">
                                <p>Do you want to deactivate employee <span id="inactivateEmpName"></span> ?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                <a id="inactivateUrl" href="../controller/emp_controller.php" class="btn btn-primary waves-effect waves-light">Conform</a>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                
				<div id="activateModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">Activate Employee</h4>
                            </div>
                            <div class="modal-body">
                                <p>Do you want to activate employee <span id="activateEmpName"></span> ?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                <a id="activateUrl" href="../controller/emp_controller.php" class="btn btn-primary waves-effect waves-light">Conform</a>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->	
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
		
		<script src="../assets/libs/sweetalert2/sweetalert2.min.js"></script>
        <script src="../assets/libs/custombox/custombox.min.js"></script>
        <script src="../assets/js/pages/sweet-alerts.init.js"></script>
        
        <!-- App js -->
        <script src="../assets/js/app.min.js"></script>
        <script type="text/javascript">
        
			$(document).ready(function(){
				var res = location.search;
                res = res.split("=");
                displayNotification(res[1],res[2]);

				$('button[in-activate]').on('click', function(event){
					var tr =$(event.target).closest('tr');
					var loginId = $(tr).find('td[login-id]').text();
					var fullName = $(tr).find('td[full-name]').text();
					$('#inactivateEmpName').text("'" + fullName +"'");

					var url = $('#inactivateUrl').attr('href');
					url = url + '?inactivateLoginId='+loginId;
					$('#inactivateUrl').attr('href',url);

					$('#inactivateModal').modal('show');
				});
				
				$('button[activate]').on('click', function(){
					var tr =$(event.target).closest('tr');
					var loginId = $(tr).find('td[login-id]').text();
					var fullName = $(tr).find('td[full-name]').text();
					$('#activateEmpName').text("'" + fullName +"'");

					var url = $('#activateUrl').attr('href');
					url = url + '?activateLoginId='+loginId;
					$('#activateUrl').attr('href',url);

					$('#activateModal').modal('show');
				});
			});
			function displayNotification(result,type){
                if(result == "failure"){
                    Swal.fire({
                        type: "error",
                        title: "Oops...",
                        text: "Something went wrong!",
                        confirmButtonClass: "btn btn-confirm mt-2",
                        footer: 'Inactivating user failed.Please try again later'
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
                    var successActivMsg ="User inactivated successfully!.";
                    if (result == "success" && type == "insert"){
                    	successActivMsg ="User added successfully!.";
                        return successActivMsg;
                    }else if(result == "failure" && type == "insert"){
						successActivMsg ="User adding failed!. Please try again.";
						return successActivMsg;
                    }else if(result == "success" && type == "inactivate"){
						successActivMsg ="User inactivated successfully!.";
						return successActivMsg;
                    }else if(result == "failure" && type == "inactivate"){
						successActivMsg ="User inactivation failed!. Please try again.";
						return successActivMsg;
                    }else if(result == "success" && type == "activate"){
						successActivMsg ="User activated successfully!.";
						return successActivMsg;
                    }else if(result == "failure" && type == "activate"){
						successActivMsg ="User activation failed!. Please try again";
						return successActivMsg;
                    }
                    
            }
        </script>
    </body>


</html>