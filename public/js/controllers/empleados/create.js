angular.module('RecursosHumanosApp')
.controller('registroempleadosctl', ['$scope','Tabulador','$http', '$filter','Empleados', function($scope, Tabulador, $http, $filter,Empleados){
	hoy=new Date();
	actual= hoy.getFullYear();
	act=Number(String(actual).substring(2,4));

	$scope.hoy=$filter('date')(hoy,'yyyy/MM/dd');
	$scope.tabulador=Tabulador.query();
	//$scope.sueldo={empleado:0};
	$scope.hijosform=false;
	$scope.hijos=[];
	$scope.hijo={};
	$scope.plaza={};
	$scope.fplaza={tipo:'H'};
	$scope.datos={estado_civil:0,tiene_hijos:false, hijos:0, hijosmenores:0};
	$scope.cargo={tipo:'H',ocupacion:false, inicio:$scope.hoy};

	$scope.empleado={tipo:'H',tipo_pago:1, hijosmenores:false,estado:0,fecha_ingreso:$scope.hoy};
	$scope.panel=1;
	$scope.sph='----';


	//cambia el tipo de empleado
	$scope.cambiatipo=function (t) {
		// Acciones diversas
		$scope.plaza=null;
		if(t=='H'){
			$scope.fplaza={tipo:t, zona_eco:''};
		}
		$scope.cargo.tipo=t;
		$scope.cargo.clave_plaza=null;
		$scope.fplaza.tipo=t;
		//$scope.sueldo.sueldo_bruto=null;
		//$scope.sueldo.compensacion=null;

	}
	$scope.asigna_plaza=function (p) {
		// asigna la plaza seleccionada
		$scope.plaza=p;

		/*
		//asigna monotos del sueldo a base y confianza
		if($scope.empleado.tipo!='H'){
			$scope.sueldo.sueldo_bruto=parseFloat(p.sueldo_bruto).toFixed(2);
			if(p.compensacion)
				$scope.sueldo.compensacion=parseFloat(p.compensacion).toFixed(2);
		}
		else{
			//limpia valores para honorarios
			$scope.sueldo.id_tabulador=$scope.plaza.id;
			$scope.sueldo.sueldo_bruto=null;
			$scope.sph="Max. "+p.sueldo_max;
			$scope.sueldo.compensacion=null;
		}

		*/
		//asigna la clave de la plaza
		$scope.cargo.clave_plaza=$scope.plaza.clave;

	}

// valida que no este registrado el RFC en la base
	$scope.validarfc=function () {
		rfc=$scope.empleado.rfc;
		if(rfc!=undefined){
			Empleados.get({ id: rfc }, function(data) {
				if(data[0]!=0){
					alert('El empleado ya existe en la base de datos.');
					$scope.empleado.rfc=null;
				}
				else{
					//asigna RFC a cargo
					$scope.cargo.rfc=rfc;

					//asigna fecha de nacimiento
					anio=Number(rfc.substring(4,6));
					if(anio>act)
						anio+=1900;
					else
						anio+=2000;
					mes=rfc.substring(6,8);
					dia=rfc.substring(8,10);
					//$('#femp').datepicker('update',anio+"/"+mes+"/"+dia);
					$scope.empleado.fecha_nacimiento=anio+"/"+mes+"/"+dia;

					//inicializa CURP
					$scope.empleado.curp=rfc;
				}
		  });
		}
	}
	//llena el campo de genero
	$scope.llenagenero=function () {
		curp=$scope.empleado.curp;
		//valida que este correcto
		if(curp.length==18){
			$scope.empleado.sexo=curp.substring(10,11);
			//$scope.empleado.sexo= s=='H'? 'M': 'F';
		}
	}

	$scope.validapago=function () {
		// body...
		if($scope.empleado.tipo_pago==1){
			$scope.empleado.banco=null
			$scope.empleado.cuenta=null
		}
	}

	$scope.compruebaSueldo=function(monto) {
		//conviertes monoto a float
		// redonde la cifra a dos decimales
		monto=Number(parseFloat(monto).toFixed(2));
		//si es de honorarios no puede exeder el maximo
		if($scope.empleado.tipo=="H"){
			max=Number(parseFloat($scope.plaza.sueldo_max).toFixed(2));
			if(monto>max){
				alert('El sueldo mensual excede al maximo permitido.');
				monto=null;
			}
		}
		//se asigna el monto
		$scope.sueldo.sueldo_bruto=monto;
	}

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

	$scope.borrar=function (index) {
		// borra un elemento del arreglo de hijos
		$scope.hijos.splice(index,1);
	}

	$scope.addhijo=function () {
	//limpia errores
	$scope.erroreshijo=[]
	// agrega hijos a la lista
	if ($scope.hijo)
		if($scope.hijo.nombre)
			//if ($scope.hijo.curp)
				//if ($scope.hijo.fecha_nac)
					if ($scope.hijo.sexo) {
						$scope.hijos.push($scope.hijo);
						$scope.hijo={};
						$scope.hijosform=false;
					}
					else
						$scope.erroreshijo.push('Seleccione un sexo.');
						/*
					else
						$scope.erroreshijo.push('Ingrese una fecha de nacimiento.');
					else
						$scope.erroreshijo.push('Ingrese una CURP valida.');
						*/
					else
						$scope.erroreshijo.push('Ingrese el nombre.');
					else
						$scope.hijosform=false;

				}
			}]);
