<?php
    // session_start();
    include("../include/session.php");
    include("../model/user_model.php");    
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
		<link href="../assets/css/responsive.css" rel="stylesheet" type="text/css"  id="app-stylesheet" />
		<!-- <link href="../assets/libs/jquery-countdown/jquery.countdownTimer.css" rel="stylesheet" type="text/css"  id="app-stylesheet" /> -->
		
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
        
        <!--Flot chart  -->
        <script src="../assets/libs/flot-charts/jquery.flot.js"></script>
        <script src="../assets/libs/flot-charts/jquery.flot.time.js"></script>
        <script src="../assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
        <script src="../assets/libs/flot-charts/jquery.flot.resize.js"></script>
        <script src="../assets/libs/flot-charts/jquery.flot.pie.js"></script>
        <script src="../assets/libs/flot-charts/jquery.flot.selection.js"></script>
        <script src="../assets/libs/flot-charts/jquery.flot.stack.js"></script>
        <script src="../assets/libs/flot-charts/jquery.flot.orderBars.js"></script>
        <script src="../assets/libs/flot-charts/jquery.flot.crosshair.js"></script>
        <script src="../assets/libs/flot-charts/curvedLines.js"></script>
        <script src="../assets/libs/flot-charts/jquery.flot.axislabels.js"></script>        
        <!-- <script src="../assets/js/pages/flot.init.js"></script> -->
<script type="text/javascript">

        !(function (b) {
            "use strict";
            var o = function () {
                (this.$body = b("body")), (this.$realData = []);
            };
            
                (o.prototype.createPlotDotGraph = function (o, a, t, r, e, l, i) {
                    b.plot(
                        b(o),
                        [
                            { data: a, label: r[0], color: e[0] },
                            { data: t, label: r[1], color: e[1] },
                        ],
                        {
                            series: {
                                lines: { show: !0, fill: !1, lineWidth: 3, fillColor: { colors: [{ opacity: 0.3 }, { opacity: 0.3 }] } },
                                curvedLines: { apply: !0, active: !0, monotonicFit: !0 },
                                splines: { show: !0, tension: 0.4, lineWidth: 5, fill: 0.4 },
                            },
                            grid: { hoverable: !0, clickable: !0, borderColor: l, tickColor: "rgba(104, 115, 142, 0.1)", borderWidth: 1, labelMargin: 10, backgroundColor: i },
                            legend: {
                                position: "ne",
                                margin: [0, -32],
                                noColumns: 0,
                                labelBoxBorderColor: null,
                                backgroundColor: "transparent",
                                labelFormatter: function (o, a) {
                                    return o + "&nbsp;&nbsp;";
                                },
                                width: 30,
                                height: 2,
                            },
                            yaxis: { axisLabel: "Quantity", tickColor: "rgba(104, 115, 142, 0.1)", font: { color: "#98a6ad" } },
                            xaxis: { axisLabel: "Date", tickColor: "rgba(104, 115, 142, 0.1)", font: { color: "#98a6ad" } },
                            tooltip: !1,
                        }
                    );
                }),
                
                (o.prototype.init = function () {
                	this.createPlotDotGraph(
                            "#website-stats1",
                            [
                                [0, 2],
                                [1, 4],
                                [2, 7],
                                [3, 9],
                                [4, 6],
                                [5, 3],
                                [6, 10],
                                [7, 8],
                                [8, 5],
                                [9, 14],
                                [10, 10],
                                [11, 10],
                                [12, 8],
                            ],
                            [
                                [0, 1],
                                [1, 3],
                                [2, 6],
                                [3, 7],
                                [4, 4],
                                [5, 2],
                                [6, 8],
                                [7, 6],
                                [8, 4],
                                [9, 10],
                                [10, 8],
                                [11, 14],
                                [12, 5],
                            ],
                            ["Joined Users", "Transaction Amount(1000)"],
                            ["#34bd25", "#ff4433"],
                            "rgba(104, 115, 142, 0.1)",
                            "transparent"
                        );
                }),
                (b.FlotChart = new o()),
                (b.FlotChart.Constructor = o);
        })(window.jQuery),
            (function (o) {
                "use strict";
                window.jQuery.FlotChart.init();
            })();
        			
        </script>
        <!-- App js -->
        <script src="../assets/js/app.min.js"></script>
        <script src="../assets/libs/jquery-countdown/jquery.countdownTimer.min.js"></script>
       	<script>   	
            $(document).ready(function(){
                 var  res = location.search;
                 res = res.split("=");
                 displayNotification(res[1],res[2]);

               /*  var hrs = "hours";
             	var expTime = $('#expTime').val();
             	if(expTime){
                 	if(!(expTime>0)){
                 		expTime = -(expTime);	
                     }
                    var obj = {"hours":expTime};
             		$("#expire_timer").countdowntimer(obj);
                 } */
                 var expTime = $('#expTime').val();
              	if(expTime || expTime.length>0){
              		var times = expTime.split('.'); 
                  	if(times[0]>48){
         				return true;
                     }
                  	var minutes = times.length>=1?times[1]:undefined;
                     var obj = {"hours":parseInt(times[0])};
              		$("#expire_timer").countdowntimer(obj);
                  }
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