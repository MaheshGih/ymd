<?php   
    // session_start();
    include("../include/session.php");
?>
<?php
    include('../model/user_model.php');
    include('../model/withdraw_model.php');
?>
<?php
    $ph_list = $objWithdrawModel->GetProvideHelpersList();
    $gh_list = $objWithdrawModel->GetRequestHelpers();
?>
<!DOCTYPE html>
<html lang="en">
    

<head>
        <meta charset="utf-8" />
        <title>Invitation | You-Me Donation </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/images/favico.png">
        <link href="../assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/libs/custombox/custombox.min.css" rel="stylesheet" type="text/css" />

        <!-- third party css -->
        <link href="../assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="../assets/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="../assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
		<link type="text/css" href="../assets/libs/datatables/dataTables.checkboxes.css" rel="stylesheet" />
		
        <!-- App css -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css"  id="app-stylesheet" />
		
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
                                            <li class="breadcrumb-item active">Send Invitation </li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Provide/Get Help Userlist </h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-box table-responsive">
                                    <h4 class="header-title">GET HELP USERLIST</h4>
                                    <input type="hidden" id="hdnGetHelperId" name="'hdnGetHelperId" />
                                    <table id="gh_table" class="table table-bordered  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                            	<th></th>
                                                <th>Name</th>
                                                <th>Req Amount</th>
                                                <th>Invitations</th>
                                                <th>Required Providers</th>
                                                <th>Mobile</th>
                                                <th>User Id</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach($gh_list as $rw){
                                            ?>
                                            <tr>
                                            	<td></td>
                                                <td>
                                                     <?php  echo $rw['full_name']; ?>
                                                </td>
                                                <td>
                                                    <span class="badge label-table badge-success">
                                                        Rs.<?php echo $rw['amount_req']; ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <?php echo $rw['invitations']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $rw['req_invs']; ?>
                                                </td>
                                                <td>
                                                    <?php  echo $rw['mobile']; ?>
                                                </td>
                                                <td>
                                            		<?php  echo $rw['login_id']; ?>
                                            	</td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                            
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-box table-responsive">
                                    <h4 class="header-title">PROVIDE HELP USERLIST</h4>
                              
                                    <table id="ph_table" class="table table-bordered  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                            	<th></th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Joined Date</th>
                                                <th>User Id</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                while($r=mysqli_fetch_assoc($ph_list)){
                                            ?>
                                            <tr>
                                            	<td></td>
                                                <td>
                                                     <?php  echo $r['full_name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $r['mobile']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $r['date_created']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $r['login_id']; ?>
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
                        <div class="form-group row">
                            <div class="col-md-6">
                            	<form class="form-horizontal" action="../controller/user_controller.php" method="POST">
                            		<button type="button" name="btnPreview" id="btnPreview" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#previewmessagemodal">
                                        <i class=" far fa-eye"></i>
                                        <span>Preview</span>
                                    </button>
                            		<button type="submit" name="btnProvideHelp" id="btnProvideHelp" class="btn btn-success waves-effect waves-light"> <i class="fas fa-sms mr-1"></i> <span>Send SMS</span> </button>
                                </form>
                            </div>
                        </div>
                        <div class="row" style="display: none;">
                             <div class="col-md-12">
                                <div class="card-box">
                                    <h4 class="header-title mb-4">SEND INVITATION</h4>
                                    <form class="form-horizontal" action="../controller/user_controller.php" method="POST">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="provideHelpMobile">Provide Help No</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="provideHelpMobile" id="provideHelpMobile" class="form-control" placeholder="9XXXXXXXX" required>
                                                    <input type="hidden" name="provideHelpId" id="provideHelpId" class="form-control" placeholder="YMDXXXXXXX" onchange="getProvideHelp(this.value)" required/>
                                                    <input type="hidden" id="provideHelpName" name="provideHelpName"/>
                                                    <input type="hidden" id="withdrawReqId" name="withdrawReqId"/>  
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="getHelpId">Get Help to </label>
                                            <div class="col-md-9">
                                                <input type="text" name="getHelpId" id="getHelpId" class="form-control" placeholder="YMDXXXXXXX" onchange="getProvideHelp(this.value)" required/>
                                                <input type="hidden" id="hdnGetHelpMobile" name="hdnGetHelpMobile" />
                                                <input type="hidden" id="getHelpName" name="getHelpName" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-3 col-form-label">Provide Help Message</label>
                                                <div class="col-9">
                                                    <textarea class="form-control" rows="3" name="txtMessage" id="txtMessage"  readonly></textarea>
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="txtGethelpMessage" class="col-3 col-form-label">Get Help Message</label>
                                            <div class="col-9">
                                                <textarea class="form-control" rows="3" name="txtGethelpMessage" id="txtGethelpMessage" readonly></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <button type="button" name="btnPreview" id="btnPreview" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#previewmessagemodal">
                                                    <i class=" far fa-eye"></i>
                                                    <span>Preview</span>
                                                </button>
                                                <button type="button" name="btnGetProvideHelp" id="btnGetProvideHelp" class="btn btn-success waves-effect waves-light"> <i class="fas fa-sms mr-1"></i> <span>Send SMS</span> </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- end row -->
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
            <div class="modal fade bs-example-modal-center" id="previewmessagemodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel2" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title mt-0 text-center" > Preview Message </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="card-box table-responsive">
                            <!--<h4 class="header-title">User Details</h4>-->
                            <form class="form-horizontal" action="#" method="POST">
                                <table id="datatable " class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div id="dvPreviewMessage">

                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </form>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        </div>
        <!-- END wrapper -->
  
        <script src="../assets/libs/jquery.min.js"></script>
        <!-- Vendor js -->
        <script src="../assets/js/vendor.min.js"></script>
        <script src="../assets/libs/sweetalert2/sweetalert2.min.js"></script>
        <script src="../assets/libs/custombox/custombox.min.js"></script>
        <script src="../assets/js/pages/sweet-alerts.init.js"></script>
        <!-- Required datatable js -->
        <script src="../assets/libs/datatables/jquery.dataTables.min.js"></script>
        <script src="../assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="../assets/libs/datatables/datatables.buttons.min.js"></script>
        <script src="../assets/libs/datatables/buttons.bootstrap4.min.js"></script>-->

        <script src="../assets/libs/jszip/jszip.min.js"></script>
        <script src="../assets/libs/pdfmake/pdfmake.min.js"></script>
        <script src="../assets/libs/pdfmake/vfs_fonts.js"></script>
        <script src="../assets/libs/datatables/buttons.html5.min.js"></script>
        <script src="../assets/libs/datatables/buttons.print.min.js"></script>
        <script src="../assets/libs/datatables/buttons.colvis.js"></script>
		
        <!-- Responsive examples -->
        <script src="../assets/libs/datatables/dataTables.responsive.min.js"></script>
        <script src="../assets/libs/datatables/responsive.bootstrap4.min.js"></script>
  		<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
		<script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
        
        <!-- Datatables init -->
        <!-- <script src="../assets/js/pages/datatables.init.js"></script> -->
       
        <!-- App js -->
        <script src="../assets/js/app.min.js"></script>
		
		<script type="text/javascript">
        	$(document).ready(function (){
        	   var gh_table = $('#gh_table').DataTable({
        		   dom: 'Bfrtip',
        	      'columnDefs': [
        	         {
        	            'targets': 0,
        	            'checkboxes': {
        	               'selectRow': true
        	            }
        	         }
        	      ],
        	      'select': {style: 'multi'},
        	      'order': [[1, 'asc']]
        	   });
        	   gh_table
               .on( 'select', function ( e, dt, type, indexes ) {
                    var rowData = gh_table.rows( indexes ).data();
                    req = parseInt(rowData[0][4]);
					ph_rows = ph_table.rows({selected: false});
					ph_rows.each(function(row, ind){
						if(ind<req)
							ph_rows.row(row).select();
					});
	               
               } )
               .on( 'deselect', function ( e, dt, type, indexes ) {
            	   var rowData = gh_table.rows( indexes ).data();
                   req = parseInt(rowData[0][4]);
    			   ph_rows = ph_table.rows({selected: true});
    			   ph_rows.each(function(row, ind){
    				 	if(ind<req)
    						ph_rows.row(row).deselect();
    			   });
               } );
               
        	   var ph_table = $('#ph_table').DataTable({
        		   dom: 'Bfrtip',
        	      'select': {style: 'multi'},
        	      //'order': [[1, 'asc']]
        	   });
        	   
			  $('#btnGetProvideHelp1').on('click', function(evt){
				   evt.preventDefault();
				   var gh_rows = gh_table.rows({selected: true}).data();
				   var gh_data = [];
				   var ph_data = [];
	        	   gh_rows.each( function(row, ind){
	        		    var gh_row = { full_name : row[1],invitations : row[3],req_invs:row[4],mobile:row[5],login_id:row[6] };
	        		    gh_data.push(gh_row);	
	               });
	        	   ph_rows = ph_table.rows({selected: true}).data();
				   ph_rows.each(function(row, ind){
					  var ph_row = { full_name : row[1],mobile:row[2],date_created:row[3],login_id:row[4] };
	        		  ph_data.push(ph_row);
				   });
				   var data = { '':'', 'gh_data':gh_data, 'ph_data':ph_data };
				   sendInvitation();
			  });        	    
        	});			
        	function sendInvitation(data){
				  $.ajax({
	                    url: '../controller/user_controller.php',
	                    method: 'POST',
	                    data: data,
	                    success: function (result) {
	                        console.log(result);
	                    },
	                    failure: function (erresult) {
	                    	console.log(erresult);
	                    }
	                });	
			 }
        </script>
        <script>
            $(document).ready(function () {
                /* $("#providehelpdatatable").DataTable();
                $("#gethelpdatatable").DataTable(); */
                var res = location.search;
                res = res.split("=");
                displayNotification(res[1],res[2]);
                
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
            function getProvideHelp(helperid) {
                var gethelperid = $("#hdnGetHelperId").val();
                $.ajax({
                    url: '../controller/user_controller.php',
                    method: 'POST',
                    data: { 'provideHelpMsg':'provideHelpMsg','helperid': helperid, 'gethelperid':gethelperid },
                    success: function (result) {
                        var res_arr = result.split("@@@@");
                        $("#dvPreviewMessage").html("<b>Provide Help SMS :</b> <br/>"+res_arr[0] + "<br/> <br/><b>Get Hekp SMS : </b><br/>" + res_arr[1]);
                        $("#txtMessage").val(res_arr[0]);
                        $("#txtGethelpMessage").val(res_arr[1]);
                    },
                    failure: function (erresult) {
                        alert(erresult);
                    }
                });
            }
            function getGetHelp(getid){
                 $.ajax({
                    url: '../controller/user_controller.php',
                    method: 'POST',
                    data: { 'getid': getid },
                    success: function (result) {
                        $("#dvPreviewMessage").html(result);
                        $("#txtMessage").val(result);
                    },
                    failure: function (erresult) {
                        alert(erresult);
                    }
                });
            }
            function getUserFunction(bid) {
                $("#hdnGetHelperId").val(bid);
                var gid = $("#spnGId_" + bid).text().trim();
                var gname = $('#spnGName_'+bid).text().trim();
                var gmobile = $("#spnGMobile_" + bid).text().trim();
                $("#hdnGetHelpMobile").val(gmobile.trim());
                $("#getHelpId").val(gid);
                $("#getHelpName").val(gname);
                $("#withdrawReqId").val(bid);
            }
            function getProviders(pid) {
                var p_id = $("#spnPId_" + pid).text().trim();
                var pmobile =  $("#spnPMobile_" + pid).text().trim();
                var pname =  $("#spnPName_" + pid).text().trim();
                $("#provideHelpMobile").val(pmobile);
                $("#provideHelpId").val(p_id);
                $("#provideHelpName").val(pname);
                getProvideHelp(pid);
            }
        </script>
    </body>
</html>