<?php
// session_start();
include( "../include/session.php");
?>

<?php  include('../model/admin_model.php');?>
<?php
$newsList = $objAdminModel->GetAllNews();
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
                                            <li class="breadcrumb-item active">News</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">News</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->
                        <div class="row">
                            <div class="col-md-7">
                                <div class="card-box">
                                    <h4 class="header-title mb-4">Latest News</h4>
                                    <form class="form-horizontal" action="../controller/admin_controller.php" method="POST">
                                        <div class="form-group row">
                                            <label for="txtNews" class="col-3 col-form-label">Latest News</label>
                                            <div class="col-9">
                                                <textarea class="form-control" rows="3" name="txtNews" id="txtNews" required="required"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="startDate" class="col-3 col-form-label">Start Date</label>
                                            <div class="col-9">
                                                <input type="date" class="form-control" rows="3" name="startDate" id="startDate" required="required"></input>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="endDate" class="col-3 col-form-label">End Date</label>
                                            <div class="col-9">
                                                <input type="date" class="form-control" id="endDate" name="endDate"  required="required"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="isActive" class="col-3 col-form-label">Active</label>
                                            <div class="col-1">
                                                <input type="checkbox" class="form-control" id="isActive" name="isActive"  />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-9">
                                                <!-- <input type="submit" class="btn btn-success" name="btnSaveAddress" id="btnSaveAddress"  value="Save"/> -->
                                                <button type="submit" name="btnSaveNews" id="btnSaveNews" class="btn btn-success waves-effect waves-light"> <i class="fas fa-save mr-1"></i> <span>Save</span> </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> 
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box table-responsive">
                                    <h4 class="header-title">News List</h4>
                                    <table id="withdraw-dt" class=" responsive-datatable table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>News</th>
                                            <th>Start Date</th>
                                            <th>Ende Date</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            
                                            $status ="Active";
                                            $danger_class = "badge-danger";
                                            $success_class = "badge-success";
                                            $partially_class = "badge-info";
                                            if($newsList){
                                                
                                            
                                                while($r = mysqli_fetch_assoc($newsList)){
                                                    if($r['is_active'] == 1){
                                                        $status="Active";
                                                        $class = "badge-success";
                                                    }else{
                                                        $status ="In Active";
                                                        $class = "badge-danger";
                                                    }
                                            ?>
                                             <tr>
                                                <td><?php echo $r['news'];?></td>
                                                <td><?php echo $r['start_date'];?></td>
                                                <td><?php echo $r['end_date'];?></td>
                                                <td ><span class="badge label-table <?php echo $class;?>"><?php echo $status;?></span></td>
                                                
                                            </tr>
                                            <?php
                                                }
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
        <script type="text/javascript">
          $(document).ready(function(){
                var  res = location.search;
                res = res.split("=");
                displayNotification(res);
                $('form').each(function(){ $(this).parsley().on('field:validated', function() {})});//validations

                $('#withdraw-dt').DataTable({
                	"order": [[ 3, "asc" ]]
                });
          });
          
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
              if (result == "failure" && type == "saveNews"){
              	res.type = 'error';
              	res.title = 'Failed!';
                res.msg = "Latest News saving failed!";
              }
              if (result == "success" && type == "saveNews"){
            	   res.type = 'success';
                	res.title = 'success!';
                    res.msg = "Successfully added Latest News!";
                  
              }
              return res;
          }
        </script>
    </body>


</html>