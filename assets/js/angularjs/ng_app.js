	var itaskyou = angular.module("itaskyou",  ['angularUtils.directives.dirPagination','angular-growl','ngDialog']);
	itaskyou.constant('admin_base_url', 'http://localhost/ci_itaskyou/admin/');
	itaskyou.constant('rootUrl', 'http://localhost/ci_itaskyou/');
	//Dashboard directive--- 

	itaskyou.config(['ngDialogProvider', function (ngDialogProvider){
		ngDialogProvider.setDefaults({
			className: 'ngdialog-theme-default',
			plain: false,
			showClose: true,
			closeByDocument: true,
			closeByEscape: true,
			appendTo: false,
			preCloseCallback: function () {
				console.log('default pre-close callback');
			}
		});
	}]);

	itaskyou.directive('statusCount', function () {
		return {
			restrict: 'EA', //E = element, A = attribute, C = class, M = comment         
			templateUrl: '../assets/js/angularjs/directive/statuscount.html',
			controller: controllerFunction, //Embed a custom controller in the directive
		}	
	});

	function controllerFunction($scope){
		$scope.myname			= "Mohammad Asif";
		//alert("sdsdf");
	}


itaskyou.directive('updateAdminProfile', function (){
    return {
		restrict: 'EA',	
        link: function ($scope, element, attrs) {
            element.bind('click', function () {
				
			
			   
            });
		}
    };
});


itaskyou.directive('popoverhtml', function ($compile,  $parse)
{
			return {
				restrict: 'EA',
				scope: {
					 reuserData:'='
				},
				link: function (scope,element, attrs)
				{
					
					scope.reuserData			=	attrs.reuserData;
					scope.recount				=	attrs.recount;
				
				},
				template: "--{{recount}}",
			}
			
});

	itaskyou.directive('myDirective', function ()
	{
		return {
			restrict: 'E', //E = element, A = attribute, C = class, M = comment         
			scope: {
			//@ reads the attribute value, = provides two-way binding, & works with functions
			title: '@'         },
			template: '<div>{{ myVal }}</div>',
			templateUrl: 'mytemplate.html',
			controller: controllerFunction, //Embed a custom controller in the directive
			link: function ($scope, element, attrs) { } //DOM manipulation
		}
	});
	
	itaskyou.directive('appUser', function() {
			
			var directive = {};
			directive.restrict = 'E';
			directive.template = "";
			
			directive.scope = {
				student : "=name"
			}
			
			directive.compile = function(element, attributes) {
				var linkFunction = function($scope, element, attributes) {
					element.html('<img style="width:50px;height:50px" src="'+$scope.student.userPhoto+'" alt="..." class=" img-thumbnail img-circle">');
				}
				
				return linkFunction;
			}
			return directive;
	});
 //Directive , service and factory.

 itaskyou.factory('Users', function(){
	
	var  userFactory  =   {};
	userFactory.authentication= function(){}
 });


 
 
 


 
	
	