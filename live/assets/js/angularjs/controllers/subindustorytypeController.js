itaskyou.controller('subindustorytypeController', function($scope,$http, admin_base_url) {
	
	var vm = this;
	vm.users = []; //declare an empty array
	vm.pageno = 1; // initialize page no to 1
	vm.total_count = 0;
	vm.itemsPerPage = 10; //this could be a dynamic value from a drop down
	
	var controllerName		=	"subindustorytype";
	
	
	
	$scope.get_industorytype		=	function()
	{
		$http.post(admin_base_url+"industorytype/get_industorytype")
		.then(function(response) {
			
			$scope.industorytypedropDown		=	response.data;
		 });
	
	}	

	// Get Records.
	$scope.get_records		=	function()
	{
		
		$http.post(admin_base_url+controllerName+"/get_records")
		.then(function(response) {
			
			$scope.industoryTypes		=	response.data;
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
		$scope.get_industorytype();
	    $('#industoryTypeModal').modal();
	}	
	
	// Add New item.
	$scope.saveItem			=	function()
	{
		
		var subTypeText	 	= $scope.subindustorytype;
		var typeID		 	= $scope.industorytype;
		
		if(typeof typeID === "undefined"){
			
			 $scope.message		=	"Please select industory type.";
			 return false;
		
		}else{
			
			$scope.message		=	"";
		}
		
		if(typeof subTypeText === "undefined"){
		
			 $scope.message		=	"Please enter sub type.";
			 return false;
		
		}else{
			
			$scope.message		=	"";
		}
		
		$http.post(admin_base_url+controllerName+"/saveItem", {'subType':subTypeText, 'typeID':typeID})
		.then(function(response) {
			
			if(response.data.action=='success'){
			
				if(response.data.type=='saved'){
						
						$scope.subindustorytype		=	'';
						$scope.industorytype		=	'';
						$scope.successmessage		=	response.data.message;
						$scope.get_records();
						$('#industoryTypeModal').modal('toggle');		
				
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
	$scope.editItem=function($subTypeID, $subType,$typeID){
		
		$scope.industorytypeedit			=	$typeID;
		$scope.subTypeIDedit				=	$subTypeID;
		$scope.subindustorytypeedit			=	$subType;
		
		$scope.get_industorytype();
		$('#industoryTypeModaledit').modal();
	
	}
	
	// End Edit
	// save editTypeID
	$scope.updateItem		=	function()
	{	
	
	
		var typeID			=	$scope.industorytypeedit;
		var subType			=	$scope.subindustorytypeedit;
		var subTypeID		=	$scope.subTypeIDedit;
		
		$http.post(admin_base_url+controllerName+"/updateItem", {'subTypeID':subTypeID,'subType':subType,'typeID':typeID})
		.then(function(response) {
			
			if(response.data.action=='success'){
				
				if(response.data.type=='saved'){
						
						$scope.successmessage		=	response.data.message;
						$scope.get_records();
						$('#industoryTypeModaledit').modal('toggle');		
				
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
	
	
	$scope.toggleStatus			=	function($typeID, $status)
	{
		
		$('#message1').toggleClass('in');
		$http.post(admin_base_url+controllerName+"/toggleStatus", {'status':$status,'typeID':$typeID})
		.then(function(response) {
			
			if(response.data.action=='success'){
				
				if(response.data.type=='saved'){
						$scope.successmessage		=	response.data.message;
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
	
	$scope.deleteItem	=	function($typeID,$typeText)
	{
		
		
			bootbox.confirm({ 
			//size: 'small',
			message: "Do you want to delete this subindustory Type", 
			callback: function(result)
			{
				
				if(result)
				{
				
				$http.post(admin_base_url+controllerName+"/deleteItem", {'typeID':$typeID,'typeText':$typeText})
				.then(function(response) {

				if(response.data.action=='success'){

				if(response.data.type=='saved'){

				$scope.successmessage		=	response.data.message;
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