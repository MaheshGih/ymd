$(document).ready(function(){
	
	var  res = location.search;
    res = res.split("=");
    displayNotification(res[1],res[2]);
                         	 
	$('#btnSearchUserData').on('click', function(e){
		e.preventDefault();
		$('form[clean-form]').each(function(){
			$(this)[0].reset();
		});// reset from 
		 
		var name = $(this).attr('name');
		var loginId = $('#loginId').val();
		if(loginId){
			getUserData(name,loginId);
		}
		return false;		
	});
	
});


function getUserData( btnName, loginId){
	$.ajax({
        url:'../controller/user_controller.php',
        method:'POST',
        data:{ btnSearchUserData : btnName, loginId : loginId},
        success:function(res){
        	res = JSON.parse(res);
            //res = res.split("+");
            $("#txtUserName").val(res['full_name']);
            $("#txtEmail").val(res["email"]);
            $("#txtMobile").val(res["mobile"]);
            $("#txtLoginId").val(res["login_id"]);
            $("#txtSponsorId").val(res["sponsor_login_id"]);
            $("#txtAccName").val(res["acc_name"]);
            $("#txtAccNo").val(res["acc_no"]);
            $("#txtBankName").val(res["bank_name"]);
            $("#txtIFSC").val(res["ifsc"]);
            $("#txtAdd1").val(res["address_1"]);
            $("#txtAdd2").val(res["address_2"]);
            $("#txtGpay").val(res["Gpay"]);
            $("#txtPhonePe").val(res["PhonePe"]);
            $("#txtPaytm").val(res["PayTm"]);
            $("#txtCity").val(res["city"]);
            $("#txtState").val(res["state"]);
         
        },
        error:function(erres){
            console.log(erres);
            }
    });
}

function displayNotification(result,type){
	if(result){
		var obj = getUserMessages(result, type)
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
function getUserMessages(result,type){
    var res = {type:undefined, msg:''};
    if (result == "success" && type == "updatemobile"){
        res.type = 'success';
        res.title = 'Congrats!';
        res.msg = "User deatails updated successfully.";
    }else if (result == "failure" && type == "updatemobile"){
    	res.type = 'error';
    	res.title = 'Failed!';
        res.msg = "User deatails updating failed!. Please try again.";
    }
    return res;
}