itaskyou.controller('tagsController', function($scope,$http, admin_base_url,growl) {


	var vm = this;
	vm.message = {type: 'success', ttl: 5000};
	vm.showMessage = showMessage;

	function showMessage (messtext,mssType){
		
		var config = angular.copy(vm.message);
		delete config.title;
		delete config.type;
		growl.general(messtext ,config, mssType);
	
	}

	var controllerName		=	"tags";
	// Get Records.
	$scope.get_records		=	function()
	{
		
		$http.post(admin_base_url+controllerName+"/get_records")
		.then(function(response) {
			$scope.tags     		=			response.data;
		});
	}
	
	$scope.sort = function(keyname)
	{
		$scope.sortKey = keyname;   //set the sortKey to the param passed
		$scope.reverse = !$scope.reverse; //if true make it false and vice versa
	}
	
	$scope.get_records();
	
	//End of get records. 
	$scope.newItem			=	function()
	{
		
	    $('#tagTypeModal').modal();
	}	
	
	// Add New item.
	$scope.saveItem			=	function()
	{
	
		var tagText	 	= $scope.tagText;
		
		if(typeof tagText === "undefined"){
			
			 $scope.message		=	"Please enter tag.";
			 return false;
		
		}else{
			
			$scope.message		=	"";
		}
		
		$http.post(admin_base_url+controllerName+"/saveItem", {'tagText':tagText})
		.then(function(response) {
			
			if(response.data.action=='success'){
			
				if(response.data.type=='saved'){
						
						$scope.tagText		=	'';
						vm.showMessage('Tag has been saved successfully','success');
						$scope.get_records();
						$('#tagTypeModal').modal('toggle');		
				
				}else{
						
						$scope.message		=	response.data.message;	
				}
			}
			
			if(response.data.action=='error'){
			
				$scope.message		=	response.data.message;	
			}
			
			$scope.industorytype	=	'';
		
		});
	}
	
	//Edit 
	$scope.editItem=function($tagID, $tagTtext){
		
		
		$scope.tagID					=	$tagID;
		$scope.tagTtextedit				=	$tagTtext;
		$('#tagModaledit').modal();
	
	}
	
	// End Edit
	// save editTypeID
	$scope.updateItem		=	function()
	{	
	
	
		var tagID					=	$scope.tagID;
		var tagTtextedit			=	$scope.tagTtextedit;
	
		
		$http.post(admin_base_url+controllerName+"/updateItem", {'tagID':tagID,'tagTtextedit':tagTtextedit})
		.then(function(response) {
			
			if(response.data.action=='success'){
				
				if(response.data.type=='saved'){
					
					vm.showMessage('Tag has been updated successfully','success');
					$scope.get_records();
					$('#tagModaledit').modal('toggle');		
				
				}else{
					
					$scope.message		=	response.data.message;	
				}
			}
			
			if(response.data.action=='error'){
			
				$scope.message		=	response.data.message;	
			}
			
			$scope.industorytype	=	'';
		});
	}
	
	
	$scope.toggleStatus			=	function($tagID, $status)
	{
		
		$('#message1').toggleClass('in');
		$http.post(admin_base_url+controllerName+"/toggleStatus", {'status':$status,'tagID':$tagID})
		.then(function(response) {
			
			if(response.data.action=='success'){
				
				if(response.data.type=='saved'){
					
					vm.showMessage('Tag has been updated successfully','success');
					$scope.get_records();
				
				}else{
					
					$scope.message		=	response.data.message;	
				}
			}
			
			if(response.data.action=='error'){
				
				$scope.successmessage		=	response.data.message;	
			}
			
			$scope.industorytype	=	'';
	
	}); 
 }

	$scope.deleteItem	=	function($tagID,$tagText)
	{
		bootbox.confirm({ 
			//size: 'small',
			message: "Do you want to delete this tag", 
			callback: function(result)
			{
				
				if(result)
				{
				
				$http.post(admin_base_url+controllerName+"/deleteItem", {'tagID':$tagID,'tagText':$tagText})
				.then(function(response) {

				if(response.data.action=='success'){

				if(response.data.type=='saved'){

				vm.showMessage('Tag has been deleted successfully','success');
				
				$scope.get_records();
				
				}else{

					$scope.message		=	response.data.message;	
				}
				}

				if(response.data.action=='error'){
					
					$scope.successmessage		=	response.data.message;	
				}

					$scope.industorytype	=	'';
				}); 
					
					
				}
			}
		});	
		
	
		
	}
	
	
});