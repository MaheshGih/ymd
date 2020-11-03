<?php
// session_start();
include("../include/session.php");
include('../model/payment_model.php');
include('../model/user_model.php');
//$reciepts = $objPaymentModel->GetUploadedReciepts($_SESSION['userid']);
$objUserModel->invitationStatus["SENT"];
$invitaions = $objUserModel->GetInvitationsByUserId($_SESSION['loginid']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<title>Transactions | You-Me Donation</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
<meta content="Coderthemes" name="author" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- App favicon -->
<link rel="shortcut icon" href="../assets/images/favico.png">
<link href="../assets/libs/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css" />

<!-- Plugins css -->
<link href="../assets/libs/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/libs/lightbox2/lightbox.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<!-- App css -->
<link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
<link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/css/app.min.css" rel="stylesheet" type="text/css"  id="app-stylesheet" />

</head>

<body>

<!-- Begin page -->
<div id="wrapper">
    
    <!-- ========== Left Sidebar Start ========== -->
    <?php include('../include/menu.php');?>
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
                                    
                                </div>
                                <h4 class="page-title">Payment Details <a href="invitations.php" class="ml-3 " title="Referesh"><i class="icon-refresh"></i></a></h4>
                            </div>
                        </div>
                    </div>     
                    <!-- end page title --> 
                    <input type="hidden" id="loginid" value="<?php $_SESSION['loginid']?>">
                	<?php
                         while($r=mysqli_fetch_assoc($invitaions)){
                            
                            if($r['provide_help_id'] == $_SESSION['loginid'] ){    
                     ?>
                    	<div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                	<h4 class="header-title">Provide Help</h4>
                                    <p class="sub-header">
                                    </p>
                                    <?php if($r['status']!='PAYMENT_DONE'){ ?>
                                    
                                    <form action="../controller/payment_controller.php" id="from_<>" method="POST" class=""  enctype="multipart/form-data">
                                        <h6 class="header-title">Upload your Payment reciept here</h6>
                                        <div class="">
                                            <input parsley-trigger="change" required id="recieptPFile_<?php echo $r['id']?>" recieptPFile="" name="recieptPFile_<?php echo $r['id']?>" type="file"/>
                                            <span class=""></span>
                       						<input type="hidden" name="withdrawReqId" withdrawReqId="" value="<?php echo $r['withdraw_req_id']?>"/>
                       						<input type="hidden" name="receiverUserId" receiverUserId="" value="<?php echo $r['to_user_id']?>"/>
                       						<input type="hidden" name="invitationId" invitationId="" value="<?php echo $r['id']?>"/>                     
                                            <!-- <button type="submit" id="btnPUpload" name="btnPUpload" class="btn btn-danger"> <i class="fa fa-thumbs-o-down"></i>Upload</button> -->
                                        </div>
        
                                        <div class="dz-message needsclick">
                                            <!-- <i class="h1 text-muted dripicons-cloud-upload"></i> -->
                                            <!-- <h5 class="mt-3">Drop files here or click to upload.Please choose a JPEG or PNG file.</h4> -->
                                            <span class="text-muted font-13">(Upload your payment screenshot. Payments can be acceepted through <strong>GPay, PhonePe, Paytm</strong>)</span>
                                        </div>
                                        <br/>
                                        <div class="dz-message needsclick">
                                            <label>Message : </label>
                                            <span class="text-muted font-13">You have to Provide help Rs.1,000/- to <?php echo $r['to_user_name']?> (<?php echo $r['to_user_id']?>). Please Contact <?php echo $r['to_mobile']?>. Thanking you www.ymd1000us.com</span>
                                        </div>
                                        <input type="hidden" submitPBtnName=""  id="submitPBtnName_<?php echo $r['id']?>" name="submitBtnName_<?php echo $r['id']?>"/>
                                        <div class="clearfix text-left">
                                        	<button type="button" paymentPDoneBtn="" id="paymentPDoneBtn" name="paymentPDoneBtn" class="btn btn-success" > <i class="fa fa-thumbs-o-down"></i>Payment Done</button>	
                                            <!-- <button type="button" rejectPBtn="" id="rejectPBtn" name="rejectPBtn" class="btn btn-danger"> <i class="fa fa-thumbs-o-down"></i>Reject</button> -->
                                        </div>
                                        
                                    </form>
                                    <?php }else{?>
                                    	<div class="mb-1">
                                        	<?php if ($r['img_path']!=null){ ?>
                                        		<img class="col-lg-8" src="../<?php echo trim($r['img_path'])?>"/>
                                        	<?php }?>
                                    	</div>    
                                        <div class="dz-message needsclick">
                                        	<label>Message : </label>
                                        	<span class="text-muted font-13"> Your payment receipt uploded successfully. Received User <?php echo $r['to_user_name']?> (<?php echo $r['to_user_id']?>) will accept your payment soon. Please Contact <?php echo $r['to_mobile']?>. Thanking you www.ymd1000us.com</span>
                                    	</div>
                                    <?php } ?>
                                    
                                </div> <!-- end card-box -->
                            </div> <!-- end col-->
                    	</div>
                        <!-- end row -->  
                        <?php
                    	   } elseif( $r['to_user_id'] == $_SESSION['loginid'] ){
                         ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                	<h4 class="header-title">Recive Help</h4>
                                    <p class="sub-header">
                                    </p>
                                    <form action="../controller/payment_controller.php" method="POST" class=""  enctype="multipart/form-data">
                                        <input type="hidden" invitationId="" name="invitationId" value="<?php echo $r['id']?>"/>
                                        <input type="hidden" provideHelpId="" name="provide_help_id" value="<?php echo $r['provide_help_id']?>"/>
                                        <?php if ($r['img_path']!=null){ ?>
                                        	<div class="mb-1">
                                        		<img class="col-lg-8" src="../<?php echo trim($r['img_path'])?>"/>
                                        	</div>
                                        <?php }?>
                                        <br/>
                                        <div class="dz-message needsclick">
                                            <label>Message : </label>
                                            <span class="text-muted font-13">Hello '<?php echo $_SESSION['loginid']?>', You will get Help of Rs 1000/- from '<?php echo $r['provide_help_name']?>' ('<?php echo $r['provide_help_id']?>').Please Contact '<?php echo $r['provide_mobile']?>' .Thanking you www.ymd1000us.com"</span>
                                        </div>
                                        <div class="clearfix text-left">
                                        	<button type="button" <?php if ($r['status']!='PAYMENT_DONE') echo 'disabled'?> id="acceptGBtn" acceptGBtn="" name="acceptGBtn" class="btn btn-success"> <i class="fa fa-thumbs-o-up"></i> Accept</button>
                                        	
                                        	<!-- <button type="button" id="rejectGBtn" name="rejectGBtn" class="btn btn-danger"> <i class="fa fa-thumbs-o-down"></i>Reject</button> -->
                                            
                                        </div>
                                    </form>
                                    
                                </div> <!-- end card-box -->
                            </div> <!-- end col-->
                    </div>
                <?php
                        }
                    }
                ?>
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
<script src="../assets/libs/custombox/custombox.min.js"></script>
<script src="../assets/js/pages/sweet-alerts.init.js"></script>
<!-- Plugins js -->
<script src="../assets/libs/dropzone/dropzone.min.js"></script>
<script src="../assets/libs/lightbox2/lightbox.min.js"></script>
<script src="../assets/libs/jquery-toast/jquery.toast.min.js"></script>
<script src="../assets/js/pages/toastr.init.js"></script>
<script src="../assets/libs/parsleyjs/parsley.min.js"></script>
<!-- App js -->
<script src="../assets/js/app.min.js"></script>
<script src="../js/util.js"></script>
<script>
        $(document).ready(function () {
            
            var res = location.search;
            res = res.split("=");
            displayNotification(res[1],res[2]);
            var loginid = $('#loginid').val();
			$('button[paymentPDoneBtn]').on('click', function(event){
				event.preventDefault();
				paymentDone(event)
			});
			$('button[acceptGBtn]').on('click', function(event){
				event.preventDefault();
				acceptPayment(event);
			});
        });

        function fileReuiredToast(msg){
        	$.toast({
                text: msg,
                position: "top-right",
                loaderBg: "#5ba035",
                icon: "error",
                hideAfter: 3e3,
                stack: 1
            });
        }
        
        function paymentDone(event){
        	var recieptFiles = $(event.target).closest("form").find("input[recieptPFile]");
        	if(recieptFiles.val() == '' ){ 
				fileReuiredToast("Receipt file Required.");
				return;
            } 
        	var ext = recieptFiles.val().split('.').pop().toLowerCase();
        	if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
        	    fileReuiredToast("Invalid extension!. Required images types png,jpg,jpeg.");
				return; 
        	}
        	$(event.target).attr('disabled','disabled');
			var receiverUserId = $(event.target).closest("form").find("input[receiverUserId]").val();
			var withdrawReqId = $(event.target).closest("form").find("input[withdrawReqId]").val();
			var invitationId = $(event.target).closest("form").find("input[invitationId]").val();
			//var submitPBtnName = this.closest("input[submitPBtnName]");
			//$(submitPBtnName).val('paymentDoneBtn');
			var fd = new FormData();    
    		fd.append( 'recieptPFile', recieptFiles.prop('files')[0] );
			fd.append('submitPBtnName', 'paymentPDoneBtn');
			fd.append('receiverUserId',receiverUserId);
			fd.append('withdrawReqId',withdrawReqId);
			fd.append('invitationId',invitationId);
        	$.ajax({
        	  url: '../controller/payment_controller.php',
        	  data: fd,
        	  processData: false,
        	  contentType: false,
        	  type: 'POST',
        	  success: function(res){
        	    if(res){
        	    	Swal.fire({
                        type: "success",
                        title: "Good job!",
                        text: "Payment receipt upload",
                        confirmButtonClass: "btn btn-confirm mt-2",
                        footer: 'Payment receipt sent successfully. Helpper will accept your payment soon.'
                    }).then((value) => {
                    	window.location.reload();
                    });
                    
            	}else{
            		Swal.fire({
                        type: "error",
                        title: "Oops...",
                        text: "Something went wrong!",
                        confirmButtonClass: "btn btn-confirm mt-2",
                        footer: 'Please contact admin or try again later!'
                    });
               	}
        	  }
        	});
       }
        
	function acceptPayment(event){

    		var invitationId = $(event.target).closest("form").find("input[invitationId]").val();
    		var provideHelpId = $(event.target).closest("form").find("input[provideHelpId]").val();
    		if(invitationId == '' ){ 
    			fileReuiredToast("Something wen wrong. Please try again.!");
    			return;
            }
    		$(event.target).attr('disabled','disabled');
			var data = { "invitationId" : invitationId, 'provideHelpId': provideHelpId, 'submitPBtnName' :'acceptGBtn'};
    		$.post('../controller/payment_controller.php', data, function(res){
    			if(res){
        	    	Swal.fire({
                        type: "success",
                        title: "Good job!",
                        text: "Payment Accepted",
                        confirmButtonClass: "btn btn-confirm mt-2",
                        footer: 'Payment accepted successfully.'
                    }).then((value) => {
                    	window.location.reload();
                    });
                    
            	}else{
            		Swal.fire({
                        type: "error",
                        title: "Oops...",
                        text: "Something went wrong!",
                        confirmButtonClass: "btn btn-confirm mt-2",
                        footer: 'Please contact admin or try again later!'
                    });
               	}
        	});
    		
        }
        
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
            var gname = $('spnGName_'+bid).text().trim();
            var gmobile = $("#spnGMobile_" + bid).text().trim();
            $("#hdnGetHelpMobile").val(gmobile.trim());
            $("#getHelpId").val(gid);
            $("#getHelpName").val(gname);
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