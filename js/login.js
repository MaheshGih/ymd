$(document).ready(function () {
    var res = location.search;
    res = res.split("=");
    displayNotification(res[1], res[2]);
});
function displayNotification(result, type) {
    if (result == "failure") {
        Swal.fire({
            type: "error",
            title: "Oops...",
            text: getUserMessages(result, type),
            confirmButtonClass: "btn btn-confirm mt-2",
            
        });
    }
    if (result == 'success') {
        Swal.fire({
            title: "Good job!",
            text: getUserMessages(result, type),
            type: "success",
            confirmButtonClass: "btn btn-confirm mt-2"
        });
    }
}
function getUserMessages(result, type) {
    var successInsertMsg = "Hurray : User is Registered Successfully.";

    if (result == "success" && type == "insert") {
        return successInsertMsg;
    }
    else if (result == "failure" && type == "login") {
        return 'Failed';
    }else if(result == "success" && type == "resetpassword") {
    	return 'Password reset successfully!. Please login with new password.';
    }else if(result == "success" && type == "OTPValidated") {
    	return 'OTP verified successfully. Please login your username and password';
    }else if(result == "success" && type == "sendpass") {
    	return "Password send as sms successfully!.";
    }else if(result == "success" && type == "sendpass") {
    	return "Password sms sending failed!. Please try again.";
    }else if(result == "failure" && type == "invalid_id") {
    	return "Please enter a valid login id";
    }
}

function sendPassword(){
	var txtLoginId = $('#txtLoginId').val();
	if(!txtLoginId){
		Swal.fire({
            type: "error",
            title: "Login Id required to send password as sms.",
            confirmButtonClass: "btn btn-confirm mt-2",
            
        });
	}
	
	$.ajax({
    	url: "../controller/login_controller.php?forgot_passsword=sendpass&login_id="+txtLoginId,
    	success: function(res){
    		res = JSON.parse(res);
	    	var status = "success"; 
			var type = "sendtxnpass"
	    	if(res){
	    	  if(res['status'] == 'success'){
	    		status = "success"; 
				type = "sendpass"
        	  }else if(res['status'] == 'invalid_id'){
        	  	status = "failure"; 
				type = "invalid_id"
        	  }else if(res['status'] == 'failure'){
        	  	status = "failure"; 
				type = "sendpass"
        	  }
	    	}else{
        		status = "failure"; 
				type = "sendpass"
            }
	    	displayNotification(status,type);
    	}
   });
}

function showPassword() {
 var x = document.getElementById("txtLogPassword");
 if (x.type === "password") {
   x.type = "text";
 } else {
   x.type = "password";
 }
}