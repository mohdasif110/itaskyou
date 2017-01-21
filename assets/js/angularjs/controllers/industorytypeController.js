itaskyou.controller('industorytypeController', function($scope,$http, admin_base_url, growl) {
	
		var vm = this;
        vm.message = {type: 'success', ttl: 5000};
		vm.showMessage = showMessage;
		
		function showMessage (messtext,mssType) {
            var config = angular.copy(vm.message);
            delete config.title;
            delete config.type;
            growl.general(messtext ,config, mssType);
        }
	
		
		$scope.saveIndustoryType			=	function()
		{
		
		
		
		if(typeof $scope.industorytype === "undefined"){
			
			 $scope.message		=	"Please enter industry type.";
			 return false;
			
		}
		
		if($scope.industorytype ==""){
			
			$scope.message		=	"Please enter industry type.";
			 return false;
		}
		
			
		$scope.message		=	"";
		
		$http.post(admin_base_url+"industorytype/save_industorytype", {'type':$scope.industorytype})
		.then(function(response) {
			
			if(response.data.action=='success'){
			
				if(response.data.type=='saved'){
					
						
						vm.showMessage('Industry Type has been saved successfully','success');
						
						$scope.get_industorytype();
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

	// get industory type..
	
	$scope.get_industorytype		=	function()
	{
		
		 //$('#ajaxspiner').show();
		 $http.post(admin_base_url+"industorytype/get_industorytype")
		.then(function(response) {
			
			$scope.industoryTypes		=	response.data;
			//$('#ajaxspiner').hide();
		 });
	}	
	
	$scope.sort = function(keyname){
		$scope.sortKey = keyname;   //set the sortKey to the param passed
		$scope.reverse = !$scope.reverse; //if true make it false and vice versa
	}
	
	$scope.get_industorytype();

	//Edit 
	$scope.edit_industory_type=function($typeID,$type){
		
		$scope.industorytypeedit	=	$type;
		$scope.editTypeID			=	$typeID;
		$('#industoryTypeModaledit').modal();
	}
	
	// End Edit
	
	// save editTypeID
	$scope.saveIndustoryTypeEdit		=	function()
	{
		var typeText	 = $scope.industorytypeedit;
		var typeID		 = $scope.editTypeID;
		
		if(typeof $scope.industorytypeedit === "undefined"){
			
			$scope.message		=	"Please enter industry type.";
			 return false;
		
		}else{
			
			$scope.message		=	"";
		}
		
		$http.post(admin_base_url+"industorytype/update_industorytype", {'type':typeText,'typeID':typeID})
		.then(function(response) {
			
			if(response.data.action=='success'){
			
				if(response.data.type=='saved'){
					
					vm.showMessage('Industry Type has been updated successfully','success');
					$scope.get_industorytype();
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
		
		 $http.post(admin_base_url+"industorytype/toggleIndustoryType", {'status':$status,'typeID':$typeID})
		.then(function(response) {
			
			if(response.data.action=='success'){
				
				if(response.data.type=='saved'){
						
						vm.showMessage('Industry Type has been updated successfully','success');
						$scope.get_industorytype();
				
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
	
	
	$scope.delete_industory_type	=	function($typeID,$typeText)
	{
			
			bootbox.confirm({ 
			//size: 'small',
			message: "Do you want to delete this industory Type", 
			callback: function(result)
			{
				if(result)
				{
					$http.post(admin_base_url+"industorytype/deleteIndustoryType", {'typeID':$typeID,'typeText':$typeText})
					.then(function(response) {

					if(response.data.action=='success')
					{

					if(response.data.type=='saved'){

						vm.showMessage('Industry Type has been deleted successfully','success');
						$scope.get_industorytype();
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
	})
		
 }
	
	
});