<div class="form-group">
  <label class="control-label">Nombre*</label>
  <input type="text" class="form-control" placeholder="Nombre completo" ng-model="hijo.nombre" mayus>
</div>
<div class="row">
  <div class="form-group col-md-4">
    <label class="control-label">CURP*</label>
    <input type="text" class="form-control mayus" placeholder="CURP a 18 caracteres" ng-model="hijo.curp" minlength="18" pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$" maxlength="18" ng-blur="calcula_fecha()">
  </div>
  <div class="form-group col-md-4">
    <label>Sexo*</label>
    <div>
      <label class="radio-inline">
        <input type="radio" value="M" ng-model="hijo.sexo"> Masculino
      </label>
      <label class="radio-inline">
        <input type="radio" value="F" ng-model="hijo.sexo"> Femenino
      </label>
    </div>
  </div>
  <div class="form-group col-md-4">
    <label class="control-label">Fecha de Nacimiento*</label>
    <div class="input-group date" id="fhijo">
      <input type="text"  class="form-control mayus" placeholder="aaaa/mm/dd" ng-model="hijo.fecha_nac"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
    </div>
  </div>

</div>
