itaskyou.controller('industorytypeController', function($scope,$http, admin_base_url) {
	

	var vm = this;
	vm.users = []; //declare an empty array
	vm.pageno = 1; // initialize page no to 1
	vm.total_count = 0;
	vm.itemsPerPage = 10; //this could be a dynamic value from a drop down
	
	
	
		$scope.saveIndustoryType			=	function()
		{
	
		if($scope.industorytype==''){
			$scope.message		=	"Please enter industory type.";
			 return false;
			
		}else{
			
			$scope.message		=	"";
		}
		
		$http.post(admin_base_url+"industorytype/save_industorytype", {'type':$scope.industorytype})
		.then(function(response) {
			
			if(response.data.action=='success'){
			
				if(response.data.type=='saved'){
					
						$scope.successmessage		=	response.data.message;
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
		
		
		 $http.post(admin_base_url+"industorytype/get_industorytype")
		.then(function(response) {
		
			$scope.industoryTypes		=	response.data;
		 
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
		
		 $http.post(admin_base_url+"industorytype/update_industorytype", {'type':typeText,'typeID':typeID})
		.then(function(response) {
			
			if(response.data.action=='success'){
			
				if(response.data.type=='saved'){
					
						$scope.successmessage		=	response.data.message;
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
						$scope.successmessage		=	response.data.message;
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

						$scope.successmessage		=	response.data.message;
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