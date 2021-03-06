itaskyou.controller('usersController', function($scope,$http, admin_base_url,growl) {


	var vm = this;
	vm.message = {type: 'success', ttl: 5000};
	vm.showMessage = showMessage;

	function showMessage (messtext,mssType){
		
		var config = angular.copy(vm.message);
		delete config.title;
		delete config.type;
		growl.general(messtext ,config, mssType);
	
	}

	var controllerName		=	"users";
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
	
	$scope.viewItem=function($tag){
		//alert($tag.userID)
		var  userID 		=	$tag.userID;
		$scope.userInfo			=	$tag;
		
		$http.post(admin_base_url+controllerName+"/get_user_task_count" ,{'userID':userID})
		.then(function(response) {
			$scope.taskCountInfo     		=			response.data;
		});
		
		$('#tagModaledit').modal();
	}
	
	$scope.toggleStatus			=	function($tagID, $status)
	{
		
		$('#message1').toggleClass('in');
		$http.post(admin_base_url+controllerName+"/toggleStatus", {'status':$status,'tagID':$tagID})
		.then(function(response) {
			
			if(response.data.action=='success'){
				
				if(response.data.type=='saved'){
					
					vm.showMessage('User status been updated successfully','success');
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
	
	
	//User Setting data.
	$scope.userSetting				=	function($tag)
	{
		var  userID 				=	$tag.userID;
		$scope.userInfo				=	$tag;
		$scope.AppAccessFlag		=	$tag.AppAccessFlag;
		var tempObj					=	new Array();
		
		$('#userSettings').modal();
	
	}
	
	//End of user setting data... 
	
		$scope.updateSettings			=	function(){
		
		var tempArr					= {};
		
		$("#settingCheckbox").find("input:checkbox").each(function(i,v) {
			
			var name =  $(this).attr('name');
			
			if($(this).attr('checked')) {
				
				tempArr[name]		=	  true;
			
			} else {
				
				tempArr[name]		=	   false;	
			}
		
		});
		
		//$scope.arrValue= tempArr;;
	
	}

	
	//Wathcing the object values.. 
	
	$scope.$watch('as_orginator_task_re_assign', function () {
	
		$scope.as_orginator_task_re_assign		=	$scope.as_orginator_task_re_assign;
	
	});
	
	//Watching the object values.. 
	
	
	
	
});