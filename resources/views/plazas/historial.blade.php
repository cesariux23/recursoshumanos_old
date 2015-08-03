
<div>
  <div class="pull-right">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalplaza" ng-click="modificacion=false;">
      <i class="fa fa-plus-circle"></i>
      Agregar histórico
    </button>
  </div>
  <h3 class="text-muted">Resumen histórico</h3>
</div>
<hr>
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Periodo</th>
      <th>Puesto</th>
      <th>Adscripción</th>
      @if(isset($editar))
      <th>Acciones</th>
      @endif
    </tr>
  </thead>
  <tbody>
    @foreach($empleado->datosLaborales as $dl)
    <tr>
      <td>{{$dl->inicio}} -- {{$dl->fin==null? 'Actualidad':$dl->fin }}</td>
      <td>
        {{$dl->plaza}}

        @if($dl->ocupacion==1)
        <p><span class="label label-warning">Interinato</span></p>
        @endif
      </td>
      <td>{{$dl->NombreAdscripcion}}</td>
      @if(isset($editar))
      <td>
        @if($dl->fin==null)
          <button type="button" class="btn btn-primary btn-lg">
            <i class="fa fa-refresh"></i>
            Promover
          </button>
          <br>
          <button type="button" class="btn btn-warning">
            <i class="fa fa-edit"></i>
            Corregir
          </button>
          <button type="button" class="btn btn-danger">
            <i class="fa fa-minus"></i>
            Baja
          </button>
        @endif
      </td>
      @endif
    </tr>


    @endforeach

  </tbody>
</table>
