$(document).ready(function(){
    $.ajax({
        url:'../controller/user_controller.php',
        method:'POST',
        data:{'getuserdata':'1'},
        success:function(res){
        	res = JSON.parse(res);
            //res = res.split("+");
            $("#txtUserName").val(res['full_name']);
            $("#txtEmail").val(res["email"]);
            $("#txtMobile").val(res["mobile"]);
            $("#txtLoginId").val(res["login_id"]);
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
});