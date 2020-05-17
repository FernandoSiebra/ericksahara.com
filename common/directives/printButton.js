(function() {
	'use strict';

	angular
	.module('myApp')
	.directive('printButton', ['$window', printButton]);

	function printButton($window){

		return {
			restrict: 'E',
			templateUrl: 'common/templates/printButton.html',
			link: linkFunction
		}

		function linkFunction(scope, elem, attrs){

			elem.bind('click', function(){console.log($window.print());})

			scope.$on('$routeChangeSuccess', function(event, current, previous){
				var currentPath = current.loadedTemplateUrl;

				if(currentPath == 'views/contact.html') {
					angular.element(elem).addClass('hide');
				}

				else if(currentPath == 'views/index.html') {
					angular.element(elem).removeClass('hide');
				}

			})

		}

	}


}());



