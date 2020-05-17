(function() {
	'use strict';

	angular
	.module('myApp')
	.directive('whatsappButton', ['$window', whatsappButton]);

	function whatsappButton($window){

		return {
			restrict: 'E',
			templateUrl: 'common/templates/whatsappButton.html',
			link: linkFunction
		}

		function linkFunction(scope, elem, attrs){
			var button = angular.element(elem).children('a');
			var isAndroid = $window.navigator.userAgent.toLowerCase().indexOf("android") > -1;

			if(isAndroid) {
				button.addClass('is-android');
			}

		}

	}


}());




