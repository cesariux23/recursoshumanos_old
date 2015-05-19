<div ng-show="!registro.$valid" ng-messages-include="errors">
  <div class="alert alert-warning" ng-show="panel==1 &&
  (!registro.rfc.$valid ||
  !registro.curp.$valid ||
  !registro.paterno.$valid ||
  !registro.materno.$valid ||
  !registro.nombre.$valid ||
  !registro.fecha_nacimiento.$valid ||
  !registro.correo.$valid ||
  !registro.sexo.$valid
  )">
  <i>Verifique los siguientes datos:</i>
  <div ng-show="!registro.rfc.$valid">
    <b>RFC</b>
    <div ng-messages="registro.rfc.$error" ng-messages-include="errores">
    </div>
  </div>
  <div ng-show="!registro.curp.$valid">
    <b>CURP</b>
    <div ng-messages="registro.curp.$error" ng-messages-include="errores">
    </div>
  </div>
  <div ng-show="!registro.paterno.$valid && registro.paterno.$dirty">
    <b>Apellido paterno</b>
    <div ng-messages="registro.paterno.$error" ng-messages-include="errores">
    </div>
  </div>
  <div ng-show="!registro.materno.$valid && registro.materno.$dirty">
    <b>Apellido materno</b>
    <div ng-messages="registro.materno.$error" ng-messages-include="errores">
    </div>
  </div>
  <div ng-show="!registro.nombre.$valid && registro.nombre.$dirty">
    <b>Nombre</b>
    <div ng-messages="registro.nombre.$error" ng-messages-include="errores">
    </div>
  </div>
  <div ng-show="!registro.fecha_nacimiento.$valid">
    <b>Fecha de nacimiento</b>
    <div ng-messages="registro.fecha_nacimiento.$error" ng-messages-include="errores">
    </div>
  </div>
  <div ng-show="!registro.correo.$valid">
    <b>Correo electrónico</b>
    <div ng-messages="registro.correo.$error" ng-messages-include="errores">
      <dd ng-message="email">Dirección de correo no valida.</dd>
    </div>
  </div>
  <div ng-show="!registro.sexo.$valid">
    <b>Sexo</b>
    <div ng-messages="registro.sexo.$error" ng-messages-include="errores">
      <dd ng-message="required">Seleccione uno.</dd>
    </div>
  </div>

</div>
<div class="alert alert-warning"
ng-show="panel==2 &&
(
!registro['datos[direccion]'].$valid ||
!registro['datos[municipio]'].$valid ||
!registro['datos[escolaridad]'].$valid
)">
<i>Verifique los siguientes datos:</i>
<div ng-show="!registro['datos[direccion]'].$valid">
  <b>Dirección</b>
  <div ng-messages="registro['datos[direccion]'].$error" ng-messages-include="errores">
  </div>
</div>

<div ng-show="!registro['datos[municipio]'].$valid">
  <b>municipio</b>
  <div ng-messages="registro['datos[municipio]'].$error" ng-messages-include="errores">
    <dd ng-message="required">Seleccione uno.</dd>
  </div>
</div>

<div ng-show="!registro['datos[escolaridad]'].$valid">
  <b>Escolaridad</b>
  <div ng-messages="registro['datos[escolaridad]'].$error" ng-messages-include="errores">
    <dd ng-message="required">Seleccione uno.</dd>
  </div>
</div>

</div>
<div class="alert alert-warning"
ng-show="panel==3 && (
!registro.num_empleado.$valid ||
!registro.banco.$valid ||
!registro.cuenta.$valid ||
!registro.fecha_ingreso.$valid ||
!registro.adscripcion.$valid ||
!registro.sueldo.$valid ||
!registro.horario.$valid ||
!registro.finicio.$valid
)">
  <i>Verifique los siguientes datos:</i>
  <div ng-show="!registro.num_empleado.$valid">
    <b>Número de empleado</b>
    <div ng-messages="registro.num_empleado.$error" ng-messages-include="errores">
    </div>
  </div>
  <div ng-show="!registro.banco.$valid">
    <b>Banco</b>
    <div ng-messages="registro.banco.$error" ng-messages-include="errores">
      <dd ng-message="required">Seleccione uno.</dd>
    </div>
  </div>
  <div ng-show="!registro.cuenta.$valid">
    <b>Cuenta bancaria</b>
    <div ng-messages="registro.cuenta.$error" ng-messages-include="errores">
    </div>
  </div>
  <div ng-show="!registro.fecha_ingreso.$valid">
    <b>Fecha ingreso</b>
    <div ng-messages="registro.fecha_ingreso.$error" ng-messages-include="errores">
    </div>
  </div>
  <div ng-show="!registro.adscripcion.$valid">
    <b>Adscripción</b>
    <div ng-messages="registro.adscripcion.$error" ng-messages-include="errores">
    </div>
  </div>
  <div ng-show="!plaza">
    <b>Plaza</b>
    <div>Seleccione una plaza.</div>
  </div>
  <div ng-show="!registro.sueldo.$valid">
    <b>Sueldo bruto mensual</b>
    <div ng-messages="registro.sueldo.$error" ng-messages-include="errores">
    </div>
  </div>
  <div ng-show="!registro.horario.$valid">
    <b>Horario</b>
    <div ng-messages="registro.horario.$error" ng-messages-include="errores">
      <dd ng-message="required">Seleccione uno.</dd>
    </div>
  </div>
  <div ng-show="!registro.finicio.$valid">
    <b>Fecha de inicio</b>
    <div ng-messages="registro.finicio.$error" ng-messages-include="errores">
    </div>
  </div>
</div>
<div ng-show="panel==4" class="alert alert-warning">
  <i>Verifique los siguientes datos:</i>
  <div ng-repeat="eh in erroreshijo"><%eh%></div>
</div>
</div>
