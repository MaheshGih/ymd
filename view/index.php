<?php
    // session_start();
    include("../include/session.php");
    include("../model/user_model.php");
    include("../model/wallet_model.php");
    
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title>Dashboard  | You-Me Donation</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/images/favico.png">
        <link href="../assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        <!-- C3 Chart css -->
        <link href="../assets/libs/c3/c3.min.css" rel="stylesheet" type="text/css" />
        <!-- Jquery Toast css -->
        <link href="../assets/libs/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css"  id="app-stylesheet" />
		<link href="../assets/css/pages/copytooltip.css" rel="stylesheet" type="text/css"  id="app-stylesheet" />
    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">
            
            <!-- ========== Left Sidebar Start ========== -->
            <?php include("../include/menu.php");?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                
				<?php 
				if($isAdmin||$isEmp){//variables from menu.php
				    include("dashboard_admin.php");
				}else if($isUser){
				    include("dashboard_user.php");
				}
				?>
                <!-- Footer Start -->
                <?php include('../include/footer.php');?>
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
        <!-- Tost-->
        <script src="../assets/libs/jquery-toast/jquery.toast.min.js"></script>
        <!--C3 Chart-->
        <script src="../assets/libs/d3/d3.min.js"></script>
        <script src="../assets/libs/c3/c3.min.js"></script>

        <script src="../assets/libs/echarts/echarts.min.js"></script>

        <script src="../assets/js/pages/dashboard.init.js"></script>
        <!-- toastr init js-->
        <script src="../assets/js/pages/toastr.init.js"></script>
        <script src="../assets/libs/echarts/echarts.min.js"></script>
        <script src="../assets/js/pages/dashboard.init.js"></script>
        <!-- App js -->
        <script src="../assets/js/app.min.js"></script>
        
       	<script>   	
            $(document).ready(function(){
                 var  res = location.search;
                 res = res.split("=");
                 displayNotification(res[1],res[2]);
            });
                 
            function displayNotification(result,type){
                if(result == 'success'){
                     Swal.fire({title:"Congrats!",
                         text: getUserMessages(result, type),
                        type:"success",
                        confirmButtonClass: "btn btn-confirm mt-2"
                    });
                    $.toast({
                        heading: "Welcome back!",
                        text: "You successfully logged in.",
                        position: "top-right",
                        loaderBg: "#5ba035",
                        icon: "success",
                        hideAfter: 3e3,
                        stack: 1
                    });
                }
            }
            function getUserMessages(result,type){
                var successLoginMsg ="Hurray : Login Successfully.";
                if (result == "success" && type == "login"){
                    return successLoginMsg;
                }
            }
            function copyRegLink() {
            	  /* Get the text field */
            	  var copyText = document.getElementById("regRefLink");

            	  /* Select the text field */
            	  copyText.select();
            	  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

            	  /* Copy the text inside the text field */
            	  document.execCommand("copy");

            	  var tooltip = document.getElementById("myTooltip");
            	  tooltip.innerHTML = "Copied: " + copyText.value;
        	 }

        	function outFunc() {
        	  var tooltip = document.getElementById("myTooltip");
        	  tooltip.innerHTML = "Copy to clipboard";
        	}
        </script>
    </body>

</html>