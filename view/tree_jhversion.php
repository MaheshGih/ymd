<!-- Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a> -->
<?php   
    // session_start();
    include("../include/session.php");
?>
<!DOCTYPE html>
<html lang="en">


<head>
<meta charset="utf-8" />
<title>Tree | You-Me Donation </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
<meta content="Coderthemes" name="author" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- App favicon -->
<link rel="shortcut icon" href="../assets/images/favicon.ico">

<!-- App css -->
<link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />

<link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/css/app.min.css" rel="stylesheet" type="text/css"  id="app-stylesheet" />
<link href="../assets/css/jHTree.css" rel="stylesheet" type="text/css" />

</head>

<body>

<!-- Begin page -->
<div id="wrapper">

<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <img src="../assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                <span class="pro-user-name ml-1">
                    Chiranjeevi S  <i class="mdi mdi-chevron-down"></i> 
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>

                <!-- item-->
                <a href="profile.php" class="dropdown-item notify-item">
                    <i class="fe-user"></i>
                    <span>Profile</span>
                </a>

                <div class="dropdown-divider"></div>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-log-out"></i>
                    <span>Logout</span>
                </a>

            </div>
        </li>
    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="index.html" class="logo text-center">
            <span class="logo-lg">
                <img src="../assets/images/logo-light.png" alt="" height="25">
                <!-- <span class="logo-lg-text-light">UBold</span> -->
            </span>
            <span class="logo-sm">
                <!-- <span class="logo-sm-text-dark">U</span> -->
                <img src="../assets/images/logo-sm.png" alt="" height="28">
            </span>
        </a>
    </div>

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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tree</a></li>
                                <li class="breadcrumb-item active">View Network  </li>
                            </ol>
                        </div>
                        <h4 class="page-title">Tree</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

                        <div class="row">
<!-- /-->
                                <div class="col-md-12">
                                <div class="card-box" style="overflow-x:hidden;overflow-x:auto;" >
                                    <h4 class="header-title mb-4">User Network</h4>
                                    <div class="container">
                                        <br />
                                        <!-- <table class="table">
                                        <tr>
                                            <td> -->
                                               <div id="tree">

                                                </div>
                                            </td>
                                        <!-- </tr>
                                        </table> -->
                                       
                                    </div> 
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

<script src="../assets/libs/jquery.min.js"></script>
<!-- Vendor js -->
<script src="../assets/js/vendor.min.js"></script>
<script src="../assets/libs/jquery-ui-1.10.4.custom.min.js"></script>
<script src="../assets/js/jQuery.jHTree.js"></script>
<script type="text/javascript">
        $(function () {
            
            $("#tree").jHTree({
                callType: 'url',
                url: '../include/myJsonFile.json',
                nodeDropComplete: function (event, data) {
                    //----- Do Something @ Server side or client side -----------
                   // alert("Node ID: " + data.nodeId + " Parent Node ID: " + data.parentNodeId);
                    //-----------------------------------------------------------
                }
            });
  
        });
</script>
<!-- App js -->
<script src="../assets/js/app.min.js"></script>

</body>


</html>