<?php
// session_start();
include("../include/session.php");
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>Rewards | You-Me Donation </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favico.png" />

    <!-- App css -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

    <!-- third party css -->
    <link href="../assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />

	<link href="../assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/custombox/custombox.min.css" rel="stylesheet" type="text/css">
    
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
                                <input type="text" class="form-control" placeholder="Search..." />
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
        <!-- ========== Left Sidebar Start ========== --><?php   include('../include/menu.php'); ?>
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
                                            <a href="javascript: void(0);">Change Password</a>
                                        </li>
                                        <li class="breadcrumb-item active"></li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Change Password</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <form class="form-horizontal" action="../controller/user_controller.php" method="post">
                                    <div class="form-group row account-content mt-4">
                                        <div class="col-12">
                                            <label for="loginId" class="col-4 col-form-label">Login Id</label>
                                            <input type="text" readonly required class="form-control" name="loginId" id="loginId" value="<?php  echo $_SESSION['loginid']?>" />
                                        </div>
                                        <div class="col-12">
                                            <label for="oldPassword" class="col-3 col-form-label">Old Password</label>
                                            <input type="password" required class="form-control" name="oldPassword" id="oldPassword" />
                                        </div>
                                        <div class="col-12">
                                            <label for="password" class="col-4 col-form-label">Password</label>
                                            <input type="password" required class="form-control" name="password" id="password" />
                                        </div>
                                        <div class="col-12">
                                            <label for="confirmPassword" class="col-4 col-form-label">Conform Password</label>
                                            <input type="password" required data-parsley-equalto="#password" class="form-control" name="confirmPassword" id="confirmPassword" />
                                        </div>
                                        <div class="col-12">
                                            <label for="changePasswordBtn" class="col-2 col-form-label"></label>
                                            <button name="changePasswordBtn" id="changePasswordBtn" class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Change Password
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
	
	<script src="../assets/libs/parsleyjs/parsley.min.js"></script>
	
    <!-- Datatables init -->
    <script src="../assets/js/pages/datatables.init.js"></script>
        <script src="../assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <script src="../assets/js/pages/sweet-alerts.init.js"></script>
    <script src="../assets/libs/custombox/custombox.min.js"></script>
	
    <script>
      $(document).ready(function () {
             $(document).ready(function(){
             var  res = location.search;
             res = res.split("=");
             displayNotification(res[1],res[2]);

             $('form').parsley().on('field:validated', function() {
             	  
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
            var res = {type:'sucess', msg:''};
            if (result == "success" && type == "changepassword"){
                res.type = 'success';
                res.title = 'Congrats!';
                res.msg = "Password changed successfully!.";
            }else if (result == "failed" && type == "changepassword"){
            	res.type = 'error';
            	res.title = 'Failed!';
                res.msg = "Password changing failed!. Please try again.";
            }else if (result == "failure" && type == "invalid_oldpassword"){
            	res.type = 'error';
            	res.title = 'Failed!';
                res.msg = "Incorrect password!.";
            }
            return res;
        }
          
     });
    </script>
    <!-- App js -->
    <script src="../assets/js/app.min.js"></script>
	
</body>


</html>