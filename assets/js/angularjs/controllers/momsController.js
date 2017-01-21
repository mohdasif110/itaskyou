itaskyou.controller('momsController', function($scope,$http, admin_base_url,growl) {
	
	var vm = this;
	vm.message = {type: 'success', ttl: 5000};
	vm.showMessage = showMessage;

	function showMessage (messtext,mssType){
	
		var config = angular.copy(vm.message);
		delete config.title;
		delete config.type;
		growl.general(messtext ,config, mssType);
	}

	var controllerName		=	"moms";
	
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
	
	$scope.viewItem=function(momID){
		
		//$('#ajaxspiner').fadeIn();
		$http.post(admin_base_url+controllerName+"/get_mom_detail" ,{'momID':momID})
		.then(function(response) {
		
			$scope.groupDetailData     		=			response.data;
			//$('#ajaxspiner').fadeIn();
			$('#groupModaledit').modal();
		});
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
				.then(function(response)
				{

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