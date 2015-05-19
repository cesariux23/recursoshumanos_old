'use strict';

angular
.module('RecursosHumanosApp', [
  'ngResource',
  'ngMessages'
  ],
  function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
	})
  .config(function ($locationProvider) {
    $locationProvider.html5Mode(true);

  })
.factory('Empleados', ['$resource', function($resource){
	return $resource('/recursoshumanos/public/restempleados/:id',{id:'@id'});
	}])
.factory('Tabulador', ['$resource', function($resource){
  return $resource('/recursoshumanos/public/resttabulador/:id',{id:'@id'});
  }])
.factory('Plazas', ['$resource', function($resource){
	return $resource('/recursoshumanos/public/restplazas/:id',{id:'@id'});
	}])
.directive('flotante', function () {
    return {
     require: 'ngModel',
     link: function(scope, element, attrs, modelCtrl) {

       modelCtrl.$parsers.push(function (inputValue) {
        if(inputValue){
         var transformedInput = parseFloat(inputValue);

         if (transformedInput!=inputValue) {
           modelCtrl.$setViewValue(transformedInput);
           modelCtrl.$render();
         }

         return transformedInput;
       }
       });
     }
   };
  }).
directive('input', function ($parse) {
  return {
    restrict: 'E',
    require: '?ngModel',
    link: function (scope, element, attrs) {
      if (attrs.ngModel && attrs.value) {
        $parse(attrs.ngModel).assign(scope, attrs.value);
      }
    }
  };
})
.directive("fileread", [function () {
    return {
        scope: {
            fileread: "="
        },
        link: function (scope, element, attributes) {
            element.bind("change", function (changeEvent) {
                var reader = new FileReader();
                reader.onload = function (loadEvent) {
                    scope.$apply(function () {
                        scope.fileread = loadEvent.target.result;
                    });
                }
                reader.readAsDataURL(changeEvent.target.files[0]);
            });
        }
    }
}]);
