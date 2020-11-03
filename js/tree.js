
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
	    physics:true,
    },
    edges: {
      arrows: "to",
    },
    interaction : {
    	navigationButtons: true,
      	keyboard: true,
    	selectable: true,
    	zoomView: true
    }
  };
  
var manImgUrl = '../assets/images/man.png';
var manInactiveImgUrl = '../assets/images/maninactive.png';
	  
	  
function drawNetwork(container, data, options){
	  network = new vis.Network(container, data, options);
	  return network;
  }

function showSignupPoup(){
	  $('#activateusersmodal').show();
  }
  
  $(document).ready(function () {
	  //Validate url requests
	  var res = location.search;
	  res = decodeURIComponent(res);
	  res = res.split("=");
	  //res[0] = ?;  # 0 index value always ?
	  
	  displayNotification(res);
	  
	  $('#resendRegOtp').on('click', function(){
	  	resendRegOtp();
	  });
	  
	  $('form').each(function(){ $(this).parsley().on('field:validated', function() {})});//validations
	  
	  getLoginId();

      var master_id = $('#master_id').val();
      var full_name = $('#full_name').val();
	  getTreeData();
	  	   				   
  });	
  
  function backToTree(){
  	var refId = document.getElementById("refId");
  	var master_login_id = $('#master_login_id').val();
  	refId.value = master_login_id;
  	getTreeData();
  }
  
  function getTreeData(){
  	var refId = document.getElementById("refId");
  	if(!refId.value)
  		return;
  	container.innerHTML='';
  	$.ajax({
    	url: "../controller/tree_controller.php?loadspills=loadspills&login_id="+refId.value, 
    	success: function(result){
    		loadTree(result);
		 }
	  });
  }
  
  function loadTree(result){
  	var res = JSON.parse(result);
	var sponsor = res.master;
	var master  = $.extend(true,{},sponsor);
	var users = res.tree;
	master.id = 0;
	master.master_id = sponsor.id;
	master.label = master.login_id;
	master.shape = "circularImage"; 
	master['is_active'] = parseInt(master['is_active']);
	master.image = master['is_active']?manImgUrl:manInactiveImgUrl;
	var nodes = [master];
	var edges = []; 
	var edge = { from : undefined, to : undefined};
	for( var i=0; i<users.length;i++){
		var user = $.extend(true,{},users[i]);
		user['master_id'] = user['id'];
		user['id'] = i+1;
		user['label'] = user.login_id;
		user['is_active'] = parseInt(user['is_active']); 
		if(user['is_active']){
			user['image'] = manImgUrl;
		}else{
			user['image'] = manInactiveImgUrl;
		}		
		user['shape'] = "circularImage";
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
				var elabel = ""; 
				if(node['side']=='left'){
					elabel = 'L- ' + searchNode['lsize'];
				}else if(node['side']=='right'){
					elabel = 'R- ' + searchNode['rsize'];
				}
				u_edge.label = elabel;
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
	//console.log(nodes);
	//console.log(edges);
	var visNodes = new vis.DataSet(nodes);
    var visEdges = new vis.DataSet(edges);
    
	var data = {
        nodes: visNodes,
        edges: visEdges
    };
	network = drawNetwork(container, data, options);
	
	setTimeout(function(){ $('.vis-zoomExtends')[0].click(); });
	                                        
	var childSides = {
		'empty':'<option value="" selected="selected">Choose</option>',
		'left':'<option value="left">Left</option>',
		'right':'<option value="right">Right</option>'
	}
	network.on("click", function(properties){
		var ids = properties.nodes;
		if(!ids || ids.length==0){
			return;
		}
		var clickedNodes = visNodes.get(ids);
	    if(!(clickedNodes[0]['is_active'])){
	    	
	    	return;
	    }
			
		var nodeId = clickedNodes[0]['id'];
		var nodeEdges = properties.edges;
		var fromEdgeCnt = 0;
		var toEdges = [];
		$.each(nodeEdges,function(ind,e){
			var nodeEdge = visEdges.get(e);
			if(nodeId == nodeEdge['from']){
				fromEdgeCnt = fromEdgeCnt  + 1;
				toEdges.push(nodeEdge);
			}
		});
	    
	    //console.log('clicked nodes:', clickedNodes);
	    if(fromEdgeCnt<2){
	    	var ddlSideEle = $('#ddlSide');
    		$('#ddlSide option').each(function(){
    			$(this).remove();
    		});
    		
	    	if(fromEdgeCnt==1){
	    		//var nodeEdge = visEdges.get(nodeEdges[1]);
	    		var childNode = visNodes.get(toEdges[0].to);
	    		var side = '';
	    		if(childNode.side=='left'){
	    			side = 'right';
	    		}else{
	    			side = 'left';
	    		}
	    		ddlSideEle.append(childSides[side]);
	    		ddlSideEle.val(side);
	    		ddlSideEle.attr('readonly','true');
	    	}else{
	    		
	    		$.each(childSides, function(key,value){
	    			ddlSideEle.append(value);
	    		});
	    		
	    		ddlSideEle.val('').removeAttr('readonly');
	    		
	    	}
	    	
		    $('#hdnSpillId').val(clickedNodes[0].master_id);
			$('#activateusersmodal').modal({
				 backdrop: 'static',
            	keyboard: false
			});	
		}else{
			$('#ddlSide').removeAttr('disabled');
			//$('#activateusersmodal2').modal('show');
		}
	});
  }
  
  function resendRegOtp() {
  	var mobile = $('#otpMobile').val();
    var loginId = $('#otpLoginId').val();
    var otpResendUrl = '../controller/tree_controller.php';
    
    $.ajax({
        url: otpResendUrl,
        method: "POST",
        data: { resendRegOtp:'resendRegOtp', mobile:mobile, login_id:loginId},
        success: function (res) {
            $('#otpmsg').text(res);
        },
        error: function (erres) {
            $("#spnLeft").text('0');
            $("#spnRight").text('0');
            $("#spnWallet").text('0');
        }
    });
    
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