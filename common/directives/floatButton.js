(function() {
	'use strict';

	angular
	.module('myApp')
	.directive('floatButton', floatButton);

	function floatButton(){

		return {
			restrict: 'E',
			templateUrl: 'common/templates/floatButton.html',
			link: linkFunction
		}

		function linkFunction(scope, elem, attrs){
			var button = angular.element(elem).children('a');

			scope.$on('$routeChangeSuccess', function(event, current, previous){
					var currentPath = current.loadedTemplateUrl;

					if(currentPath == 'views/contact.html') {
						button.attr('href', 'home').addClass('is-active');
					}

					else if(currentPath == 'views/index.html') {
						button.attr('href', 'contact').removeClass('is-active');
					}

			})

		}

	}


}());



