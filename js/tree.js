
var network = undefined;

//Document https://visjs.github.io/vis-network/docs/network/layout.html#
        
// create a network
  var container = document.getElementById("mynetwork");
  var options = {
    layout: {
      hierarchical: {
        direction: "UD",
        sortMethod: "directed",
        shakeTowards:"roots"
      }
    },
    edges: {
      arrows: "to",
    },
    interaction : {
    	selectable: true,
    	//zoomView: true
    }
  };
  
  
  $(document).ready(function () {
	  //Validate url requests
	  var res = location.search;
	  res = decodeURIComponent(res);
	  res = res.split("=");
	  //res[0] = ?;  # 0 index value always ?
	  
	  displayNotification(res);
	  
	  getLoginId();

      var master_id = $('#master_id').val();
      var full_name = $('#full_name').val();

	  $.ajax({
    	url: "../controller/tree_controller.php?loadspills=loadspills&sponsor_id="+master_id, 
    	success: function(result){
    		var users = JSON.parse(result);
			var nodes = [{id:master_id, label:full_name}];
			var edges = []; 
			var edge = { from : undefined, to : undefined};
			for( var i=0; i<users.length;i++){
				var user = $.extend(true,{},users[i]);
				user['label'] = user.full_name;
				nodes.push(user);
				var u_edge = $.extend(true,{},edge);
				u_edge.from = user.spill_id;
				u_edge.to = user.id;
				edges.push(u_edge);
				if(user.spill_id == master_id ){
					var u_edge = $.extend(true,{},edge);
					u_edge.from = master_id;
					u_edge.to = user.id;
					edges.push(u_edge);
				}
			}
			var visNodes = new vis.DataSet(nodes);
	        var visEdges = new vis.DataSet(edges);
	        
			var data = {
		        nodes: visNodes,
		        edges: visEdges
		    };
			network = drawNetwork(container, data, options);
			
			network.on("selectNode", function(properties){
				var ids = properties.nodes;
			    var clickedNodes = visNodes.get(ids);
			    console.log('clicked nodes:', clickedNodes);
			    if(properties.edges.length<2){
				    $('#hdnSpillId').val(clickedNodes[0].id);
					$('#activateusersmodal').modal('show');	
				}else{
					$('#activateusersmodal2').modal('show');
				}
			});
		}
	   });    

	   //Search url and validate requests
	   				   
  });	

  
  function drawNetwork(container, data, options){
	  network = new vis.Network(container, data, options);
	  return network;
  }

  function showSignupPoup(){
	  $('#activateusersmodal').show();
  }

  function showOTPModal(status, type, msg, mobile){
    $('#otpMobile').val(mobile);
    $('#otpmsg').text(msg);
  	$('#otpModal').modal('show');
  }
  
  function displayNotification(res) {
	var status = res[1];
	var type = res[2];
	var msg = res[4];
	
    if (status == "failure") {
        Swal.fire({
            type: "error",
            title: "Oops...",
            text: "Something went wrong!",
            confirmButtonClass: "btn btn-confirm mt-2",
            footer: 'Registration failed. Try again later.'
        });
    }
    if (status == 'success') {
    	if( type=='OTPValidate'){
    		showOTPModal(status, type, msg, res[6]);
    	}else if( type=='OTPValidated'){
    		Swal.fire({
	            title: "Good job!",
	            text: msg,
	            type: "success",
	            confirmButtonClass: "btn btn-confirm mt-2"
	        });	
    	}else{
    		Swal.fire({
            title: "Good job!",
            text: msg,
            type: "success",
            confirmButtonClass: "btn btn-confirm mt-2"
        });
    	}
        
    }
 }
 function getUserMessages(result, type) {
    var successInsertMsg = "Hurray : User is Registered Successfully.";
    if (result == "success" && type == "insert") {
        return successInsertMsg;
    }
 }
 function getdata(logid, sponsorid, side,spillid) {

    if (logid != "") {
        $("#spnUserName").text(logid);
        $.ajax({
            url: '../controller/user_controller.php',
            method: "POST",
            data: { 'loginid': logid },
            success: function (res) {
                //console.log(res);
                var spl = res.split('-');
                $("#spnLeft").text(spl[0]);
                $("#spnRight").text(spl[1]);
                $("#spnWallet").text(spl[2]);
            },
            error: function (erres) {
                $("#spnLeft").text('0');
                $("#spnRight").text('0');
                $("#spnWallet").text('0');
            }
        });
    }
    else {
        $("#hdnSide").val(side);
        $("#hdnSpillId").val(spillid);
    }

}
function getLoginId() {
    $.ajax({
        url: '../controller/register_controller.php',
        method: 'POST',
        data: { 'getlogid': '1' },
        success: function (res) {
            $("#txtUserId").val(res);
        },
        error: function (err_res) { alert(err_res); }
    });
}
function getSponsorName(sponsorid) {
    $.ajax({
        url: '../controller/register_controller.php',
        method: 'POST',
        data: { 'sponsorid': sponsorid },
        success: function (res) {
            $("#txtSponsorName").val(res);
        },
        error: function (err_res) { alert(err_res); }
    });
}