angular.module('RecursosHumanosApp')
.controller('empleadosctl', ['$scope','Empleados', function($scope, Empleados){
	$scope.empleados=Empleados.query();

	$scope.darBaja=function (emp) {
		// carga los datos del empleado a dar de baja
		$scope.baja=emp;
	}
}]);