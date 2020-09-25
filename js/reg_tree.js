
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
    	zoomView: true,
    	navigationButtons: true,
      	keyboard: true
    	
    }
  };
  
  
  $(document).ready(function () {
	  getTreeData();		   
  });	
  
  function getTreeData(refId){
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
  	if(!result || result.trim()==''){
  		displayNotification('failure','loadtree');
  		return;
  	}
  	var edge = { from : undefined, to : undefined};	
  	var res = JSON.parse(result);
	var master = res.master;
	var users = res.tree;
	var manImgUrl = '../assets/images/man.png';
	var manInactiveImgUrl = '../assets/images/maninactive.png';
	var nodes = [{id:0, master_id:master['id'], label:master['full_name'], image : manImgUrl, shape : "circularImage"}];
	var edges = []; 
	for( var i=0; i<users.length;i++){
		var user = $.extend(true,{},users[i]);
		user['master_id'] = user['id'];
		user['id'] = i+1;
		user['label'] = user.full_name;
		user['image'] = manImgUrl;
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
	
	setTimeout(function(){ $('.vis-zoomExtends')[0].click(); });
	
	network.on("selectNode", function(properties){
		var ids = properties.nodes;
		var nodeEdges = properties.edges;
		/*$.each(nodeEdges,function(ind,e){
			var nodeEdge = visEdges.get(e);
			console.log(nodeEdge);
		});*/
	    var clickedNodes = visNodes.get(ids);
	    if(!(clickedNodes[0]['is_active']))
	    	return;
	    //console.log('clicked nodes:', clickedNodes);
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
	    	
	    	$('#txtSponsorId').val(master['login_id']);
	    	$('#txtSponsorName').val(master['full_name']);
	    	
		    $('#hdnSpillId').val(clickedNodes[0].master_id);
			$('#activateusersmodal').modal('show');	
		}else{
			$('#ddlSide').removeAttr('disabled');
			//$('#activateusersmodal2').modal('show');
		}
	});
  } 
  
  function drawNetwork(container, data, options){
	  network = new vis.Network(container, data, options);
	  return network;
  }

  function showSignupPoup(){
	  $('#activateusersmodal').show();
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