<div class="tab-pane" id="datos_hijos">
  <div>
    <div class="pull-right">
      <button type="button" class="btn btn-info btn-sm" ng-click="hijosform=true" ng-show="!hijosform"> <i class="fa fa-plus"></i> Agregar</button>
      <button type="button" class="btn btn-danger btn-sm" ng-click="hijosform=false; erroreshijo=[]; hijo={}" ng-show="hijosform"> <i class="fa fa-times"></i> Cancelar</button>
    </div>
    <h3 class="text-muted">Hijos</h3>
  </div>
  <div class="well" ng-show="hijosform">
    @include('hijos.form')
    <button type="button" class="btn btn-primary" ng-click="addhijo()" ng-disabled="!hijo.sexo || !hijo.fecha_nac || !hijo.nombre"><i class="fa fa-save"></i> Agregar</button>
  </div>
  <table class="table table-hover table-bordered" ng-show="hijos.length>0">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Fecha nacimiento</th>
        <th>Sexo</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr ng-repeat="h in hijos">
        <td><%h.nombre%></td>
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
