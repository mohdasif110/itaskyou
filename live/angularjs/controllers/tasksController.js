itaskyou.controller('tasksController', function($scope,$http, admin_base_url) {
	
	var vm = this;
	vm.users = []; //declare an empty array
	vm.pageno = 1; // initialize page no to 1
	vm.total_count = 0;
	vm.itemsPerPage = 10; //this could be a dynamic value from a drop down
	
	var controllerName		=	"tasks";
	
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
	
	$scope.toggleStatus			=	function($tagID, $status)
	{
		
		$('#message1').toggleClass('in');
		$http.post(admin_base_url+controllerName+"/toggleStatus", {'status':$status,'tagID':$tagID})
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

	$scope.view_task			=	function($task_id,taskName){
		
		$('#taskModal').modal();
	}
	
	
});