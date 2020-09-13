<?php   
    // session_start();
    include("../include/session.php");
    include("../model/user_model.php");
?>
<?php
$expiryTime=24;
if(isset($_GET['expiryTime'])){
    $expiryTime = $_GET['expiryTime'];
}
$inactiv_childs = $objUserModel->GetAllUsersByStatus(0, $expiryTime);
?>
<!DOCTYPE html>
<html lang="en">
 

<head>
        <meta charset="utf-8" />
        <title>In-Active Users | You-Me Donation </title>
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
		<link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
		
		<link href="../assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/libs/custombox/custombox.min.css" rel="stylesheet" type="text/css" />
		
</head>

    <body>
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <?php include('../include/user_menu.php'); ?>

                <!-- LOGO -->
                <?php include('../include/logo_box.php'); ?>

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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Referrals</a></li>
                                            <li class="breadcrumb-item active">In-Active Users</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">IN-ACTIVE USERS LIST</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->
                        	 
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box table-responsive">
                                      <!-- <h4 class="header-title">IN-ACTIVE USERS LIST</h4> -->  
                                      <form class="form-horizontal" id="blockUsersForm" action="../controller/user_controller.php" method="post">
                                      	<input type="hidden" name="userIds" id="userIds"/>
                                      	<input type="hidden" name="hdnBlockUsers" id="hdnBlockUsers"/>
                                      <div Class="form-group row">
                                        
                                            <div class=" col-2">
                                                <button type="button" name="btnBlockUsers" id="btnBlockUsers" class="btn btn-md btn-block btn-primary waves-effect waves-light" >Block Users</button>
                                            </div>
                                            <div class="col-2"></div>
                                            <div class="form-group row">
                                            	<label for="txtLevelname" class="col-8 form-label">Expiry Time</label>
                                                <div class="col-2">
                                                    <select name="expiryTime" id="expiryTime">
                                                		<option value="24" <?php if($expiryTime==24){echo 'selected';} ?>>24</option>
                                                		<option value="32" <?php if($expiryTime==32){echo 'selected';}?>>32</option>
                                                		<option value="48" <?php if($expiryTime==48){echo 'selected';}?>>48</option>
                                            		</select>
                                                </div>
                                            </div>
                                            
                                    </div>
                                	</form> 
                                    <table id="userstable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                            	<th></th>
                                            	<th>Login Id</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Joined Date</th>
                                                <th>Last Active on</th>
                                                <!-- <th>Wallet</th> -->
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                    while($r = mysqli_fetch_assoc($inactiv_childs)){
                                            ?>
                                                <tr>
                                                    <!--<td><input type="checkbox" id="<?php echo $r['id'];?>" name="<?php echo $r['id'];?>" /></td>-->
                                                    <td></td>
                                                    <td><?php echo $r['login_id'];?></td>
                                                    <td><?php echo $r['full_name'];?></td>
                                                    <td><?php echo $r['mobile'];?></td>
                                                    <td><?php echo $r['date_created'];?></td>
                                                    <!--<td><a href="activate_process.php?id=<?php echo $r['id'];?>"><span class="badge label-table badge-danger">Activate</span></a></td>-->
                                                     <td></td>   
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
					<div id="blockModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">Block Users</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Do you want to Block Users ?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                    <button id="btnConformBlock" class="btn btn-primary waves-effect waves-light">Conform</button>
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
		<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
		<script type="text/javascript" src="../assets/libs/datatables/dataTables.checkboxes.min.js"></script>
        <!-- Datatables init -->
        <script src="../assets/js/pages/datatables.init.js"></script>
		
		<script src="../assets/libs/sweetalert2/sweetalert2.min.js"></script>
        <script src="../assets/libs/custombox/custombox.min.js"></script>
        <script src="../assets/js/pages/sweet-alerts.init.js"></script>
        
        <!-- App js -->
        <script src="../assets/js/app.min.js"></script>
        <script type="text/javascript">
        	$(document).ready(function (){
        	   var table = $('#userstable').DataTable({
        	      
        	      'columnDefs': [
        	         {
        	            'targets': 0,
        	            'checkboxes': {
        	               'selectRow': true
        	            }
        	         }
        	      ],
        	      
        	      'select': {
        	         'style': 'multi'
        	      },
        	      'order': [[1, 'asc']]
        	   });

 			  $('#btnBlockUsers').on('click', function(){ $('#blockModal').modal('show');});

        	  $('#btnConformBlock').on('click', function(evt){
        		    //evt.preventDefault();
					var rows = table.rows({selected:true}).data();
					var ids = [];
					rows.each(function(row, ind){
						ids.push(row[1]);
					});
					$('#userIds').val(ids.join());
					if(ids.length>0)
						$('form').submit();
						//return true;
					else return false;
               });

              $('#expiryTime').on('change', function(){
				var time = $(this).val();
				var url = window.location.href;
				url = url.split('?');
				window.location.href = url[0] + "?expiry_time="+time;
				
              });
              
        	});	
        </script>
        <script>
        
        $(document).ready(function () {
            var res = location.search;
            res = res.split("?");
            res = res[1];
            if(res){
				res = res.split('&');
				res = res[0];
				res = res.split('=');
				displayNotification(res[0],res[1]);	
             }
            
            
        });
        function displayNotification(result,type){
            if(result == "failure"){
                Swal.fire({
                    type: "error",
                    title: "Oops...",
                    text: "Something went wrong!",
                    confirmButtonClass: "btn btn-confirm mt-2",
                    footer: 'Please try again later.'
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
                var successActivMsg ="Users blocked successfully.";
                if (result == "success" && type == "block"){
                    return successActivMsg;
                }
        }
   </script>
 </body>
</html>