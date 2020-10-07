<?php   
    // session_start();
    include("../include/session.php");
    include("../model/user_model.php");
?>
<?php
    //$active_childs = $objUserModel->GetChildsByUserId($_SESSION['userid'],1);
$royalty_credits = $objUserModel->rewardUsers(0);
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
		<link type="text/css" href="../assets/libs/datatables/dataTables.checkboxes.css" rel="stylesheet" />

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
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Rewarded Users</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box table-responsive">
                                    	<form class="form-horizontal" id="blockUsersForm" action="../controller/payment_controller.php" method="post">
                                          <div Class="form-group row">
                                                <div class=" col-lg-2 col-sm-12">
                                                    <input type="submit" name="btnAddRewards" id="btnAddRewards" class="btn btn-md btn-block btn-primary waves-effect waves-light" value="Add Rewards"></input>
                                                </div>    
                                        	</div>
                                    	</form>                                	
                                        <!-- <h4 class="header-title">Rewarded Users</h4> -->
                                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                            	<td></td>
                                            	<th>Login Id</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Upgrade Level</th>
                                                <th>Left</th>
                                                <th>Right</th>
                                                <th>Amount</th>
                                                <th>Auto Pool</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                    foreach ($royalty_credits as $r){
                                            ?>
                                                <tr>
                                                	<td></td>
                                                   	<td><?php echo $r['login_id'];?></td>
                                                    <td><?php echo $r['full_name'];?></td>
                                                    <td><?php echo $r['mobile'];?></td>
                                                    <td><?php echo $r['next_lvl']['level_name'];?></td>
                                                    <td><?php echo $r['lsize'];?></td>
                                                    <td><?php echo $r['rsize'];?></td>
                                                    <td><?php echo $r['next_lvl']['inr_value'];?></td>
                                                    <td><?php echo $r['next_lvl']['auto_pool_inr'];?></td>   
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

        <!-- Responsive examples -->
        <script src="../assets/libs/datatables/dataTables.responsive.min.js"></script>
        <script src="../assets/libs/datatables/responsive.bootstrap4.min.js"></script>
        <script src="../assets/libs/datatables/dataTables.select.min.js"></script>
        
		<script type="text/javascript" src="../assets/libs/datatables/dataTables.checkboxes.min.js"></script>
        <!-- Datatables init -->
        <!-- <script src="../assets/js/pages/datatables.init.js"></script> -->
		<script src="../assets/libs/sweetalert2/sweetalert2.min.js"></script>
    	<script src="../assets/js/pages/sweet-alerts.init.js"></script>
    
        <!-- App js -->
        <script src="../assets/js/app.min.js"></script>
        <script type="text/javascript">
        	$(document).ready(function (){
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
        	});			

        </script>
            <script>
      $(document).ready(function () {
             $(document).ready(function(){
             var  res = location.search;
             res = res.split("=");
             //displayNotification(res[1],res[2]);
         	
        });
        function displayNotification(result,type){
        	if(result){
        		var obj = getUserMessages(result, type);
        		if(obj.type)
        		notification(obj);;
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
            if (result == "success" && type == "AddRewards"){
                res.type = 'success';
                res.title = 'Congrats!';
                res.msg = "Rewards added successfully!.";
            }else if (result == "failure" && type == "AddRewards"){
            	res.type = 'error';
            	res.title = 'Failed!';
                res.msg = "Rewards adding failed!. Please try again later.";
            }
            return res;
        }
          
     });
    </script>
        
    </body>


</html>