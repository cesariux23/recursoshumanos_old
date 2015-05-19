angular.module('RecursosHumanosApp')
.controller('registrohijoctl', ['$scope','$http', function($scope,$http){
	$scope.rfc='';
	hoy=new Date();
	actual= hoy.getFullYear();
	act=Number(String(actual).substring(2,4));
	$scope.calcula_fecha=function(){
		if($scope.hijo.curp){
			anio=Number($scope.hijo.curp.substring(4,6));
			if(anio>act)
				anio+=1900;
			else
				anio+=2000;
			mes=$scope.hijo.curp.substring(6,8);
			dia=$scope.hijo.curp.substring(8,10);
			$('#fhijo').datepicker('update',anio+"/"+mes+"/"+dia);
		}
	}

	$scope.borrar=function (){
		$http.delete('hijos/'+$scope.h.id).success(
			function (argument) {
				window.location.reload();
			}
		);
	}
}]);