<div class="tab-pane active" id="datos_personales">
  <br>
  <div class="well">
    <div class="row">
      <div class="form-group col-md-4">
        <label class="control-label">RFC*</label>
        <input type="text" name="rfc" id="rfc" class="form-control mayus" placeholder="RFC a 10 caracteres" ng-model="empleado.rfc" required minlength="10" maxlength="10" pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])" ng-change="datos.rfc=empleado.rfc" ng-blur="validarfc()">
      </div>
      <div class="form-group col-md-2">
        <label class="control-label">Homo clave</label>
        <input type="text" name="homo" id="homo" class="form-control mayus" ng-model="empleado.homoclave" maxlength="3" >
      </div>
      <div class="form-group col-md-6">
        <label class="control-label">CURP*</label>
        <input type="text" name="curp" id="curp" class="form-control mayus" placeholder="CURP a 18 caracteres" ng-model="empleado.curp" required minlength="18" pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$" maxlength="18">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label">
        Apellido Paterno*</label>
        <input type="text" name="paterno" id="paterno" class="form-control" placeholder="Apellido paterno" ng-model="empleado.paterno" required mayus>
      </div>
      <div class="form-group">
        <label class="control-label">Apellido Materno*</label>
        <input type="text" name="materno" id="materno" class="form-control" placeholder="Apellido materno" ng-model="empleado.materno" required mayus>
      </div>
      <div class="form-group">
        <label class="control-label">Nombre(s)*</label>
        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre(s)" ng-model="empleado.nombre" required mayus>
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          <label>Sexo*</label>
          <div>
            <label class="radio-inline">
              <input type="radio" name="sexo" ng-model="empleado.sexo" value="M" required> Masculino
            </label>
            <label class="radio-inline">
              <input type="radio" name="sexo" ng-model="empleado.sexo" value="F" required> Femenino
            </label>
          </div>
        </div>
        <div class="form-group col-md-6">
          <label class="control-label">Fecha de Nacimiento*</label>
          <div class="input-group date" id="femp">
            <input type="text" class="form-control" placeholder="aaaa/dd/mm" name="fecha_nacimiento" ng-model="empleado.fecha_nacimiento" required><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="form-group col-md-6">
          <label class="control-label">Correo electrónico*</label>
          <input type="email" name="correo" id="correo" class="form-control" placeholder="Correo" ng-model="empleado.correo" required>
        </div>
        <div class="form-group col-md-6">
          <label class="control-label">Tipo de Sangre</label>
          <input type="text" name="tipo_sangre" id="tipo_sangre" class="form-control" placeholder="Tipo de sangre" ng-model="empleado.tipo_sangre" maxlength="4" mayus>
        </div>
      </div>
    </div>
  </div>
