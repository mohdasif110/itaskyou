itaskyou.controller('countriesController', function($scope,$http, admin_base_url,growl) {
	
	var vm = this;
	vm.message = {type: 'success', ttl: 5000};
	vm.showMessage = showMessage;
	function showMessage (messtext,mssType){
		var config = angular.copy(vm.message);
		delete config.title;
		delete config.type;
		growl.general(messtext ,config, mssType);
	}
	
	var controllerName		=	"countries";
	
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
		$('#CountryModal').modal();
	}	
	
	// Add New item.
	$scope.saveItem			=	function()
	{
		
		var CountryText	 	= $scope.CountryText;
		var CountryCode	 	= $scope.CountryCode;
		
		if(typeof CountryText === "undefined"){
			
			 $scope.message		=	"Please enter country Name.";
			 return false;
		
		}else{
			
			$scope.message		=	"";
		}
		
		if(typeof CountryCode === "undefined"){
			
				$scope.message		=	"Please enter country code.";
				return false;
		
		}else{
			
			$scope.message		=	"";
		}
		
		$http.post(admin_base_url+controllerName+"/saveItem", {'CountryText':CountryText,'CountryCode':CountryCode})
		.then(function(response) {
			
			if(response.data.action=='success'){
			
				if(response.data.type=='saved'){
						
						$scope.CountryCode		=	'';
						$scope.CountryText		=	'';
						vm.showMessage('Country has been saved successfully','success');
						$scope.get_records();
						$('#CountryModal').modal('toggle');		
				
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
	$scope.editItem=function($countryID, $countryText,$countryCode)
	{
		
		$scope.countryID						=	$countryID;
		$scope.countryTexEdit					=	$countryText;
		$scope.countryCodeEdit					=	$countryCode;
		$('#countryModaledit').modal();
	
	}
	
	// End Edit
	// save editTypeID
	$scope.updateItem		=	function()
	{	
		
		var countryID					=	$scope.countryID;
		var countryText					=	$scope.countryTexEdit;
		var countryCode					=	$scope.countryCodeEdit;
		
		
		
		
		
		$http.post(admin_base_url+controllerName+"/updateItem", {'countryID':countryID,'countryText':countryText,'countryCode':countryCode})
		.then(function(response) {
			
			if(response.data.action=='success')
			{
				
				if(response.data.type=='saved')
				{
						
						vm.showMessage('Country has been updated successfully','success');
						$scope.get_records();
						$('#countryModaledit').modal('toggle');		
				
				}else{
					
					$scope.message		=	response.data.message;	
				}
			
			}
			
			if(response.data.action=='error')
			{
				
				$scope.message		=	response.data.message;	
			}
			
			$scope.industorytype	=	'';
		
		});
	}
	
	$scope.toggleStatus			=	function($countryID, $status)
	{
		
		$('#message1').toggleClass('in');
		$http.post(admin_base_url+controllerName+"/toggleStatus", {'status':$status,'countryID':$countryID})
		.then(function(response) {
			
			if(response.data.action=='success'){
				
				if(response.data.type=='saved'){
					
						vm.showMessage('Country status has been changed successfully','success');
						
						$scope.get_records();
				}else{
						
						$scope.message				=	response.data.message;	
				}
			}
			
			if(response.data.action=='error'){
				$scope.successmessage		=	response.data.message;	
			}
			
			$scope.industorytype	=	'';
		}); 
		
		
	}
	
	$scope.deleteItem	=	function($countryID,$name)
	{
			
			bootbox.confirm({ 
			//size: 'small',
			message: "Do you want to delete this country code", 
			callback: function(result)
			{
				
				if(result)
				{
				
				$http.post(admin_base_url+controllerName+"/deleteItem", {'countryID':$countryID,'name':$name})
				.then(function(response) {

				if(response.data.action=='success'){

				if(response.data.type=='saved'){

				vm.showMessage('Country status has been deleted successfully','success');
	
				
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