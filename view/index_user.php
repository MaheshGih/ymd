<?php
    // session_start();
    include("../include/session.php");
    include("../model/user_model.php");
    include("../model/wallet_model.php");
    
    $user_list = $objUserModel->GetRecentUsers();
    $metrics = $objUserModel->GetUserDashboardMetrics($_SESSION['userid']);
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
            <!-- Topbar Start -->
           	<?php include("../include/navbar-top.php");?>
            <!-- end Topbar -->
            
            <!-- ========== Left Sidebar Start ========== -->
            <?php include("../include/menu.php");?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                         <!-- start page update title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="row pull-right"></div>  
                                    <div class="row" style="margin:30px 0 20px 0;">
                                        <div class="col-md-2 col-xs-12">
                                            <h4 style="font-size: 20px; font-weight: 600; margin: 4px 0 15px;">DASHBOARD</h4>
                                        </div>
                                        <div class="col-md-2 col-xs-12">
                                            <div id="divreward" style="display: none">
                                                <img id="imgreward" style="width: 200px; padding-bottom: 20px; padding-top: 0x; margin: 0 auto; text-align: center;" class="img-responsive ">
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-xs-12">
                                            <div class="row">
                                                <div class="col-md-3 col-xs-5">
                                                    <p style="text-align: right; padding: 4px 10px; color: #ffffff; background: #f73104; border-top-left-radius: 60px;">
                                                        Referral Link :
                                                    </p>
                                                </div>
                                                <div class="col-md-6 col-xs-7">
                                                    <div class="input-group input-group-sm" style="margin-bottom: 8px;">
                                                        <input class="form-control" id="regRefLink" type="text"  value="http://admin.ymd1000us.com/view/registration_tree.php?ref=<?php echo $_SESSION['loginid']?>" id="myInput" style="background-color: rgb(255, 255, 255);font-size: 14px;color: #525252;">
                                                        <span class="input-group-btn ">
                                                            <button class="btn btn-success btn-flat" onclick="copyRegLink()" onmouseout="outFunc()" data-copytarget="#regRefLink">
                                                            		<span class="tooltiptext" id="myTooltip" style="display: none;">Copy to clipboard</span>
                                                            	Copy
                                                            </button>
                                                        </span>
                                                        <!-- <div class="tooltip">
                                                            <button class="btn btn-success btn-flat" onclick="copyRegLink()" onmouseout="outFunc()">
                                                              <span class="tooltiptext" id="myTooltip">Copy to clipboard</span>
                                                              Copy text
                                                              </button>
                                                            </div>-->
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom:20px;">
                                        <div class="col-md-2 col-xs-4">
                                            <h3 class="box-title" style="font-size: 16px; background: #3b146f; padding: 18px 20px; margin: 0; font-weight: bold; color: white; border-top-left-radius: 10px; border-bottom-left-radius: 10px;"><span class="hidden-xs">LATEST</span> NEWS</h3>
                                        </div>
                                        <div id="form_1" class="col-md-8 col-xs-8">
                                            <marquee loop="true" behavior="scroll" direction="left" scrolldelay="60" scrollamount="2" style="margin-top: 0px; height: 54px; padding: 6px; border-top-right-radius: 10px; box-shadow: 1px 1px 3px #c0c0c0; background: white; border-bottom-right-radius: 10px;" onmouseover="this.stop();" onmouseout="this.start();">
                                                        <div class="comment-text" style="color: black;">
                                                            <span class="username" style="color: #c3602b;"><i class="fa fa-info-circle"></i>&nbsp;YMD 1000 US.
                                                            </span>
                                                            <br>
                                                            <p>Offer Extended Till 17th September 2020!</p>
                                                        </div>
                                                        <hr>
                                                        <!--<div class="comment-text" style="color: black;">
                                                            <span class="username" style="color: #c3602b;"><i class="fa fa-info-circle"></i>&nbsp;way2startup.org
                                                            </span>
                                                            <br>
                                                            Wel-Come to 4WAYDIAL LTD.
                                                        </div>
                                                        <hr>-->
                    
                                    		</marquee>
                                        </div>
                                        <div class="col-md-2 col-xs-4">
                                            <h3 class="box-title" style="font-size: 16px; background: #3b146f; padding: 18px 20px; margin: 0; font-weight: bold; color: white; border-top-left-radius: 10px; border-bottom-left-radius: 10px;"><span class="hidden-xs" style="color: #45ff17;">Rank:</span> Rising</h3>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                            </div>
                        </div>     
                        <!-- end page update title --> 
                        <div class="row">
                            <div class="col-xl-4 col-sm-4">
                                <div class="card-box widget-box-two widget-two-custom">
                                    <div class="media">
                                        <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                            <i class="mdi mdi-currency-inr avatar-title font-30 text-white"></i>
                                        </div>
                                        <div class="wigdet-two-content media-body">
                                            <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Wallet Balance</p>
                                            <h3 class="font-weight-medium my-2">&#8377 <span data-plugin="counterup"><?php echo $metrics['tot_amount']; ?></span></h3>
                                            <p class="m-0">Till <?php echo date('d-m-Y'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-xl-4 col-sm-4">
                                <div class="card-box widget-box-two widget-two-custom ">
                                    <div class="media">
                                        <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                            <i class="mdi mdi-account-multiple avatar-title font-30 text-white"></i>
                                        </div>

                                        <div class="wigdet-two-content media-body">
                                            <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Total Users </p>
                                            <h3 class="font-weight-medium my-2"> <span data-plugin="counterup"><?php echo $metrics['childCount']['cnt']; ?></span></h3>
                                            <p class="m-0">Jan - Feb 2020</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-xl-4 col-sm-4">
                                <div class="card-box widget-box-two widget-two-custom ">
                                    <div class="media">
                                        <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                            <i class="mdi mdi-currency-gbp avatar-title font-30 text-white"></i>
                                        </div>

                                        <div class="wigdet-two-content media-body">
                                            <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Total Transactions</p>
                                            <h3 class="font-weight-medium my-2"><span data-plugin="counterup"><?php echo $metrics['tot_trans']; ?></span></h3>
                                            <p class="m-0">Jan - Feb 2020</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->  

						<div class="row">

                            <div class="col-xl-4 col-sm-4">
                                <div class="card-box widget-box-two widget-two-custom">
                                    <div class="media">
                                        <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                            <i class="mdi mdi-currency-usd avatar-title font-30 text-white"></i>
                                        </div>
                                        <div class="wigdet-two-content media-body">
                                            <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Today My Direct Income</p>
                                            <h3 class="font-weight-medium my-2">&#8377 <span data-plugin="counterup"><?php echo $metrics['todayMyRefIncome']; ?></span></h3>
                                            <p class="m-0">Till <?php echo date('d-m-Y'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-xl-4 col-sm-4">
                                <div class="card-box widget-box-two widget-two-custom ">
                                    <div class="media">
                                        <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                            <i class="mdi mdi-currency-krw avatar-title font-30 text-white"></i>
                                        </div>

                                        <div class="wigdet-two-content media-body">
                                            <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Today My Indirect Income </p>
                                            <h3 class="font-weight-medium my-2"> <span data-plugin="counterup"><?php echo $metrics['todayMyLVLIncome']; ?></span></h3>
                                            <p class="m-0">Jan - Feb 2020</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            
                            <div class="col-xl-4 col-sm-4">
                                <div class="card-box widget-box-two widget-two-custom ">
                                    <div class="media">
                                        <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                            <i class="mdi mdi-account-multiple avatar-title font-30 text-white"></i>
                                        </div>

                                        <div class="wigdet-two-content media-body">
                                            <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">My Direct Members </p>
                                            <h3 class="font-weight-medium my-2"> <span data-plugin="counterup"><?php echo $metrics['myReferralTot']; ?></span></h3>
                                            <p class="m-0">Jan - Feb 2020</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>

                         <div class="row">

                            <div class="col-xl-4 col-sm-4">
                                <div class="card-box widget-box-two widget-two-custom">
                                    <div class="media">
                                        <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                            <i class="mdi mdi-currency-try avatar-title font-30 text-white"></i>
                                        </div>
                                        <div class="wigdet-two-content media-body">
                                            <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">My Royality Income</p>
                                            <h3 class="font-weight-medium my-2">&#8377 <span data-plugin="counterup"><?php echo $metrics['myRoyalIncome']; ?></span></h3>
                                            <p class="m-0">Till <?php echo date('d-m-Y'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-xl-4 col-sm-4">
                                <div class="card-box widget-box-two widget-two-custom ">
                                    <div class="media">
                                        <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                            <i class="mdi mdi-currency-rub avatar-title font-30 text-white"></i>
                                        </div>

                                        <div class="wigdet-two-content media-body">
                                            <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Pending Withdraw Income </p>
                                            <h3 class="font-weight-medium my-2"> <span data-plugin="counterup"><?php echo $metrics['totPendingWithdrawAmnt']; ?></span></h3>
                                            <p class="m-0">Jan - Feb 2020</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-xl-4 col-sm-4">
                                <div class="card-box widget-box-two widget-two-custom ">
                                    <div class="media">
                                        <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                            <i class="mdi mdi-currency-btc avatar-title font-30 text-white"></i>
                                        </div>

                                        <div class="wigdet-two-content media-body">
                                            <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Total Withdraws</p>
                                            <h3 class="font-weight-medium my-2"><span data-plugin="counterup"><?php echo $metrics['totWithdrawnAmnt']; ?></span></h3>
                                            <p class="m-0">Jan - Feb 2020</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->  

                        <div class="row">

                            <div class="col-xl-4 col-sm-4">
                                <div class="card-box widget-box-two widget-two-custom">
                                    <div class="media">
                                        <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                            <i class="mdi mdi-currency-inr avatar-title font-30 text-white"></i>
                                        </div>
                                        <div class="wigdet-two-content media-body">
                                            <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Matching Rewards Income</p>
                                            <h3 class="font-weight-medium my-2">&#8377 <span data-plugin="counterup"><?php echo $metrics['totRewardAmnt']; ?></span></h3>
                                            <p class="m-0">Till <?php echo date('d-m-Y'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
							<div class="col-xl-4 col-sm-4">
                                <div class="card-box widget-box-two widget-two-custom ">
                                    <div class="media">
                                        <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                            <i class="mdi mdi-currency-cny avatar-title font-30 text-white"></i>
                                        </div>

                                        <div class="wigdet-two-content media-body">
                                            <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">YMD AutoPool Income </p>
                                            <h3 class="font-weight-medium my-2"> <span data-plugin="counterup"><?php echo $metrics['totAutopoolIncome']; ?></span></h3>
                                            <p class="m-0">Jan - Feb 2020</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-xl-4 col-sm-4">
                                <div class="card-box widget-box-two widget-two-custom ">
                                    <div class="media">
                                        <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                            <i class="mdi mdi-currency-eur avatar-title font-30 text-white"></i>
                                        </div>

                                        <div class="wigdet-two-content media-body">
                                            <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">More..</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                       
                        <div class="row">
                            <div class="col-xl-4 col-sm-4">
                                <div class="card-box widget-box-two widget-two-custom ">
                                    <div class="media">
                                        <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                            <i class="mdi mdi-hand-right avatar-title font-30 text-white"></i>
                                        </div>

                                        <div class="wigdet-two-content media-body">
                                            <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Right Team </p>
                                            <h3 class="font-weight-medium my-2"> <span data-plugin="counterup"><?php echo $metrics['childCount']['rsize']; ?></span></h3>
                                            <p class="m-0">Jan - Feb 2020</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-xl-4 col-sm-4">
                                <div class="card-box widget-box-two widget-two-custom ">
                                    <div class="media">
                                        <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                            <i class="mdi mdi-hand-left avatar-title font-30 text-white"></i>
                                        </div>

                                        <div class="wigdet-two-content media-body">
                                            <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Left Team</p>
                                            <h3 class="font-weight-medium my-2"><span data-plugin="counterup"><?php echo $metrics['childCount']['lsize']; ?></span></h3>
                                            <p class="m-0">Jan - Feb 2020</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row --> 
                       
                       <div class="row">

                            <div class="col-xl-4 col-sm-4">
                                <div class="card-box widget-box-two widget-two-custom"  style="background-color:#4d1f8c;">
                                    <div class="media">
                                        <!-- <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                           <i class="mdi mdi-currency-inr avatar-title font-30 text-white"></i>
                                        </div>-->
                                        <div class="wigdet-two-content media-body">
                                            <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics" style="color:#f1e906">Present Level:3</p>
                                            <h5 style="color:#FFFFFF" class="font-weight-medium my-2">Earned Amount: &#8377 <span data-plugin="counterup"><?php echo $wallet['total_amount']; ?></span></h5>
                                            <p style="color:#4bf505" class="m-0">Till <?php echo date('d-m-Y'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-xl-8 col-sm-8">
                                <div class="card-box widget-box-two widget-two-custom " style="background-color:#4d1f8c;">
                                     
                                    <div class="media">
                                        <div class="responsive">
                                           <!-- <i class="mdi mdi-hand-right avatar-title font-30 text-white"></i>-->
                                           <p style="color:#f1e906">NEXT LEVEL: 5</p>
                                         <!-- <h5 style="color:#FFFFFF" class="font-weight-medium my-2"> Benifit Amount: &#8377<span data-plugin="counterup"><?php echo $tot_det[1]; ?></span></h5>-->

                                     </div>

                                        <div class="wigdet-two-content media-body">
                                            <p style="color:#f1e906" class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Earn Rewords:3000 rs </p>
                                            <h5 style="color:#ffffff" class="font-weight-medium my-2">Get Reward Amount: &#8377 <span data-plugin="counterup"><?php echo $tot_det[1]; ?></span></h3>
                                            <p style="color:#4bf505" align="center" class="m-0">Required Persions :Left Side -25 & Right Side -25</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                           
                        </div>
                        
                        <div class="row">
                            <div class="col-xl-6 col-lg-12">
                                <div class="card-box">
                                    <h4 class="header-title">Recent Users</h4>
                                    <p class="sub-header">
                                        Recently joined user details here
                                    </p>

                                    <div class="table-responsive">
                                        <table class="table table-hover m-0 table-actions-bar">

                                            <thead>
                                                <tr>
                                                    <!--<th></th>-->
                                                    <th>Name</th>
                                                    <th>Mobile</th>
                                                    <th>Date of Joining</th>
                                                </tr>
                                            </thead>
                                            <tbody>                                                <?php
                                                while($r=mysqli_fetch_assoc($user_list)){
                                                ?>
                                                <tr>
                                                   
                                                    <td>
                                                        <h5 class="m-0 font-weight-medium"><?php echo $r['full_name']; ?></h5>
                                                    </td>

                                                    <td>
                                                        <i class="fas fa-mobile-alt text-primary"></i> <?php echo $r['mobile']; ?>
                                                    </td>

                                                    <td>
                                                        <i class="far fa-calendar-alt text-success"></i>  <?php echo $r['date_created']; ?>
                                                    </td>

                                                </tr>                                                <?php
                                                }
                                                                                                     ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                            <!-- end col -->
                            <div class="col-xl-6 col-lg-6">
                                
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12">
                                        <div class="card-box widget-box-two widget-two-custom ">
                                            <div class="media">
                                                <div class="avatar-lg rounded-circle bg-info widget-two-icon align-self-center">
                                                    <i class="mdi mdi-email avatar-title font-30 text-white"></i>
                                                </div>
                                                <div class="wigdet-two-content media-body">
                                                    <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics"> </p>
                                                    <h3 class="font-weight-medium my-2">
                                                        <span data-plugin="counterup"><?php  ?></span>
                                                    </h3>
                                                    <p class="m-0"><?php echo "Till ".date('M-Y'); ?></p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            
                        </div>
                        <!--- end row -->
						
						
						                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->

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