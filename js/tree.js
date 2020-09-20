
var network = undefined;

//Document https://visjs.github.io/vis-network/docs/network/layout.html#
        
// create a network
  var container = document.getElementById("mynetwork");
  var options = {
    layout: {
      hierarchical: {
        direction: "UD",
        sortMethod: "directed",
        //blockShifting : true,
        shakeTowards:"roots",
        //parentCentralization:true
        enabled:true,
      levelSeparation: 150,
      nodeSpacing: 100,
      treeSpacing: 200,
      blockShifting: false,
      edgeMinimization: true,
      parentCentralization: true,
      }
    },
    nodes:{
    	fixed: {
	      x:true,
	      y:false
	    },
	    physics:false,
    },
    edges: {
      arrows: "to",
    },
    interaction : {
    	selectable: true,
    	zoomView: true
    }
  };
  
  
  $(document).ready(function () {
	  //Validate url requests
	  var res = location.search;
	  res = decodeURIComponent(res);
	  res = res.split("=");
	  //res[0] = ?;  # 0 index value always ?
	  
	  displayNotification(res);
	  
	  
	  //$('form').parsley().on('field:validated', function() {});//validations
	  
	  getLoginId();

      var master_id = $('#master_id').val();
      var full_name = $('#full_name').val();

	  $.ajax({
    	url: "../controller/tree_controller.php?loadspills=loadspills&sponsor_id="+master_id, 
    	success: function(result){
    		var res = JSON.parse(result);
    		var master = res.master;
    		var users = res.tree;
			var nodes = [{id:0, master_id:master_id, label:full_name}];
			var edges = []; 
			var edge = { from : undefined, to : undefined};
			for( var i=0; i<users.length;i++){
				var user = $.extend(true,{},users[i]);
				user['master_id'] = user['id'];
				user['id'] = i+1;
				user['label'] = user.full_name;
				nodes.push(user);
			}
			
			for( var i=0; i<nodes.length;i++){
				var node = $.extend(true,{},nodes[i]);//cloning	
				var u_edge = $.extend(true,{},edge);
				for( var j=0; j<nodes.length;j++){
					var searchNode = nodes[j];
					if(searchNode['master_id'] == node.spill_id){
						u_edge.from = searchNode['id'];
						u_edge.to = node.id;
						edges.push(u_edge);
						/*if(node.spill_id == master_id ){
							var u_edge = $.extend(true,{},edge);
							u_edge.from = 0;
							u_edge.to = node.id;
							edges.push(u_edge);
						}*/		
					} 
				}
				
			}
			console.log(nodes);
			console.log(edges);
			var visNodes = new vis.DataSet(nodes);
	        var visEdges = new vis.DataSet(edges);
	        
			var data = {
		        nodes: visNodes,
		        edges: visEdges
		    };
			network = drawNetwork(container, data, options);
			
			network.on("selectNode", function(properties){
				var ids = properties.nodes;
				var nodeEdges = properties.edges;
				$.each(nodeEdges,function(ind,e){
					var nodeEdge = visEdges.get(e);
					console.log(nodeEdge);
				});
			    var clickedNodes = visNodes.get(ids);
			    console.log('clicked nodes:', clickedNodes);
			    if(nodeEdges.length<=2){
			    	if(nodeEdges.length==2){
			    		var nodeEdge = visEdges.get(nodeEdges[1]);
			    		var childNode = visNodes.get(nodeEdge.to);
			    		var side = '';
			    		if(childNode.side=='left'){
			    			side = 'right';
			    		}else{
			    			side = 'left';
			    		}
			    		$('#ddlSide').val(side);
			    		$('#ddlSide option:not(:selected)').each(function(){
			    			$(this).prop('disabled','true');
			    		});
			    		//$('#ddlSide').prop('disabled','true');
			    	}else{
			    		
			    		$('#ddlSide option').each(function(){
			    			$(this).removeAttr('disabled');;
			    		});
			    		
			    		$('#ddlSide').val(0);
			    		
			    	}
			    	
				    $('#hdnSpillId').val(clickedNodes[0].master_id);
					$('#activateusersmodal').modal('show');	
				}else{
					$('#ddlSide').removeAttr('disabled');
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

  function showOTPModal(status, type, msg, mobile,loginId){
    $('#otpMobile').val(mobile);
    $('#otpLoginId').val(loginId);
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
    		showOTPModal(status, type, msg, res[6],res[8]);
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