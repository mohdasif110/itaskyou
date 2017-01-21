itaskyou.controller('tasksController', function($scope,$http, admin_base_url,rootUrl,$rootScope, ngDialog, $timeout) {


	$rootScope.theme	 	= 'ngdialog-theme-default';
	
	$scope.users = []; //declare an empty array
	$scope.pageno = 1; // initialize page no to 1
	$scope.total_count = 0;
	$scope.itemsPerPage = 8; //this could be a dynamic value from a drop down
	
	var controllerName		=	"tasks";
		
		$scope.viewItem=function($tag){
			
		//alert($tag.userID)
		var  userID 		=	$tag.userID;
		$scope.userInfo			=	$tag;
		
		$http.post(admin_base_url+"users/get_complete_user_info" ,{'userID':userID})
		.then(function(response) {
			$scope.taskCountInfo     		=			response.data;
		});
		
		$('#tagModaledit2').modal();
	
	}
	
	$scope.get_records		=	function(pageno)
	{
		$('#ajaxspiner').fadeIn();
		$http.post(admin_base_url+controllerName+"/get_records" , {'pageno':pageno,'itemsPerPage':$scope.itemsPerPage})
		.then(function(response) {
			$scope.tags     		=			response.data.data;
			$scope.total_count 		= 			response.data.total;
			$('#ajaxspiner').fadeOut();
		});
	}
	
	
	$scope.get_records($scope.pageno);
	$scope.sort = function(keyname)
	{
			$scope.sortKey = keyname;   //set the sortKey to the param passed
			$scope.reverse = !$scope.reverse; //if true make it false and vice versa
	}
	
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

	
	$scope.view_task			=	function($task_id,taskName,funType){
		
		$scope.taskName			=	taskName;
		$http.get(admin_base_url+controllerName+"/get_task_detail?taskID="+$task_id)
		.then(function(response) {
			$scope.taskDetail     		=			response.data;
		});
		
		$('#taskModal').modal();
	
	}
	
	$scope.showpopover			=	function($taskID){
		
		//$('#popover_id_'+$taskID).popover('show');
	}

	$scope.showRecievers		=	function($obj,$taskName)
	{
		$scope.udata				=	$obj;	
		$scope.taskName				=	$taskName;	
		ngDialog.open(
		{ 
			template: rootUrl+'ngDialog/taskReciever.php', 
			className: 'ngdialog-theme-default',
			scope:$scope,
			width: '70%'
				
		});
	}
	
	// view log 
	$scope.view_logs	=	function($taskID, $taskName,$funType)
	{
		
		$scope.taskName			=	$taskName;
		$http.get(admin_base_url+controllerName+"/get_task_history?taskID="+$taskID)
		.then(function(response) {
			$scope.taskLogDetail     		=			response.data;
		});
		
		$('#taskLogModal').modal();
	}
	// end view log..
	
	
});

