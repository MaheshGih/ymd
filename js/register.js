$(document).ready(function(){
	
    var  res = location.search;
    res = res.split("=");
    displayNotification(res[1],res[2]);
    
    $('form').parsley().on('field:validated', function() {});
    
    getLoginId();
    var txtSponsorId = $('#txtSponsorId').val();
    if(txtSponsorId)
    	getSponsorName(txtSponsorId);
});
function displayNotification(result,type){
    if(result == "failure"){
        Swal.fire({
            type: "error",
            title: "Oops...",
            text: "Something went wrong!",
            confirmButtonClass: "btn btn-confirm mt-2",
            footer: 'Registration failed. Try again later.'
        });
    }
    if(result == 'success'){
        Swal.fire({
            title: "Good job!",
            text: getUserMessages(result, type),
            type: "success",
            confirmButtonClass: "btn btn-confirm mt-2"
        });
    }
}
function getUserMessages(result,type){
    var successInsertMsg ="Hurray : User is Registered Successfully.";

    if(result == "success" && type == "insert"){
        return successInsertMsg;
    }
}
function getLoginId(){
    $.ajax({
        url:'../controller/register_controller.php',
        method:'POST',
        data:{'getlogid':'1'},
        success:function(res){ 
            $("#txtUserId").val(res);
        },
        error:function(err_res){ alert(err_res);}
    });
}
function getSponsorName(sponsorid){
    $.ajax({
        url:'../controller/register_controller.php',
        method:'POST',
        data:{'sponsorid':sponsorid},
        success:function(res){ 
        	var user = JSON.parse(res);
        	master_id = user['id']
            full_name = user['full_name'];
            $("#txtSponsorName").val(full_name);
            getTreeData(sponsorid,master_id,full_name);
        },
        error:function(err_res){ alert(err_res);}
    });
}
function checkmobile(mob){
    debugger;
    $.ajax({
        url:'../controller/register_controller.php',
        method:'POST',
        data:{'mobile':mob},
        success:function(res){
            alert(res);
        },
        error:function(erres){
            alert(erres);
        }
    });
}

