<?php   
    // session_start();
    include("../include/session.php");
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
        <!-- App css -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css"  id="app-stylesheet" />

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
                                            <li class="breadcrumb-item active">Send Invitation </li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Referrals</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <div class="row">
                                <div class="col-md-12">
                                <div class="card-box">
                                    <h4 class="header-title mb-4">SEND INVITATION</h4>
                                    <form class="form-horizontal" action="../controller/user_controller.php" method="POST">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="txtMobile">Provide Helper Mobile</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="txtMobile" id="txtMobile" class="form-control" placeholder="9XXXXXXXX" required>
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="txtProvideHelp">Provide Help to </label>
                                            <div class="col-md-9">
                                                <input type="text" name="txtProvideHelp" id="txtProvideHelp" class="form-control" placeholder="YMDXXXXXXX" required/>
                                            </div>
                                        </div>
                                        <div class="form-group row" style="display:none;">
                                            <label for="inputName" class="col-3 col-form-label">Message</label>
                                                <div class="col-9">
                                                    <textarea class="form-control" rows="3" name="txtMessage" id="txtMessage"  readonly></textarea>
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <button type="button" name="btnPreview" id="btnPreview" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#previewmessagemodal">
                                                    <i class=" far fa-eye"></i>
                                                    <span>Preview</span>
                                                </button>
                                                <button type="submit" name="btnSendInvitation" id="btnSendInvitation" class="btn btn-success waves-effect waves-light"><i class="fas fa-sms mr-1"></i> <span>Send Invitation</span></button>
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
        <!-- App js -->
        <script src="../assets/js/app.min.js"></script>
        <script>
             $(document).ready(function(){
                var  res = location.search;
                res = res.split("=");
                displayNotification(res[1],res[2]);


                $('#btnPreview').on('click',function(){
                	var helperMobile = $('#txtMobile').val(); 
                	var reciverId = $('#txtProvideHelp').val();
                	getProvideHelp(reciverId, helperMobile);
                });onchange=""
             });
             function displayNotification(result,type){
                if(result == "failure"){
                    Swal.fire({
                        type: "error",
                        title: "Oops...",
                        text: "Something went wrong!",
                        confirmButtonClass: "btn btn-confirm mt-2",
                        footer: 'Invitation message not sent successfully.Please enter valid mobiel or try again later.'
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
          
            function getProvideHelp(reciverId, helperMobile) {
                $.ajax({
                    url: '../controller/user_controller.php',
                    method: 'POST',
                    data: { 'reciverId': reciverId, 'helperMobile':helperMobile },
                    success: function (result) {
                        $("#dvPreviewMessage").html(result);
                        $("#txtMessage").val(result);
                    },
                    failure: function (erresult) {
                    }
                });
            }
        </script>
    </body>


</html>