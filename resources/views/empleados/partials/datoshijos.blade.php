<div class="tab-pane" id="datos_hijos">
  <div>
    <div class="pull-right">
      <button type="button" class="btn btn-info btn-sm" ng-click="hijosform=true" ng-show="!hijosform"> <i class="fa fa-plus"> Agregar</i></button>
      <button type="button" class="btn btn-danger btn-sm" ng-click="hijosform=false; erroreshijo=[]; hijo={}" ng-show="hijosform"> <i class="fa fa-times"></i> Cancelar</button>
    </div>
    <h3 class="text-muted">Hijos</h3>
  </div>
  <div class="well" ng-show="hijosform">
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
    <button type="button" class="btn btn-primary" ng-click="addhijo()"><i class="fa fa-save"></i> Agregar</button>
  </div>
  <table class="table table-hover table-bordered" ng-show="hijos.length>0">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>CURP</th>
        <th>Fecha nacimiento</th>
        <th>Sexo</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr ng-repeat="h in hijos">
        <td><%h.nombre%></td>
        <td><%h.curp%></td>
        <td><%h.fecha_nac%></td>
        <td><%h.sexo%></td>
        <th><button type="button" class="btn btn-danger" ng-click="borrar($index)" title="Borrar"> <i class="fa fa-trash"></i> </button></th>
      </tr>
    </tbody>
  </table>
  <div ng-show="hijos.length==0 && !hijosform">
    <hr>
    <div class="alert alert-info">
      Presione el <b>+</b> botón para registrar.
    </div>
  </div>
</div>
