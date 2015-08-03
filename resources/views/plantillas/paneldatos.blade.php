

    <div class="panel panel-primary">
    <div class="panel-heading">
      <div>
        <h3 class="panel-title"><b>Emplead{{$empleado->sexo=='M'? 'a':'o'}} de {{strtolower($empleado->tipoEmpleado)}}</b></h3>
      </div>
    </div>
    <div class="panel-body">

      <div class="row">
        <div class="col-xs-2">
          @include('empleados.partials.foto')
        </div>
        <div class="col-xs-10">
            <h2 class="hidden-print" style="margin-top: 0px;">{{$empleado->nombreCompleto}}</h2>
            <h4 class="visible-print">{{$empleado->nombreCompleto}}</h4>
            <div class="row">
              <p class="col-xs-3">RFC: <b>{{$empleado->rfc}}<span class="text-info">{{$empleado->homoclave}}</span></b></p>
              <p class="col-xs-4">CURP: <b>{{$empleado->curp}}</b></p>
              <p class="col-xs-4">Fecha de ingreso: <b>{{$empleado->fechaing}}</b></p>
            </div>
            <br>
            @if(isset($empleado->PlazaActual))
            <table class="table table-bordered table-condensed">
              <thead>
                <tr>
                  <th>
                    Puesto actual
                  </th>
                  <th>
                    Adscripción
                  </th>
                  <th>
                    Desde
                  </th>
                  <th width="150px">
                    Acciones
                  </th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td>
                    {{$empleado->PlazaActual->plaza}}
                  </td>
                  <td>
                    {{$empleado->PlazaActual->NombreAdscripcion}}
                  </td>
                  <td>
                    {{$empleado->PlazaActual->inicio}}
                  </td>
                  <td>
                    @if ($empleado->plazaActual->created_at==$empleado->plazaActual->updated_at)
                      {{-- expr --}}
                      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalplaza" ng-click="modificacion=true;" title="Modificar información actual">
                        <i class="fa fa-edit"></i>
                      </button>
                    @endif
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalplaza" ng-click="modificacion=true;" title="Cambiar de puesto">
                      <i class="fa fa-refresh"></i>
                    </button>
                    <button type="button" class="btn btn-danger" title="dar de baja al empleado">
                      <i class="fa fa-minus-circle"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
            @else
              <div class="alert alert-warning">
                <h1 class="text-center"><span class="label label-danger"> <i class="fa fa-info-circle"></i> Baja</span> </h1>
              </div>
            @endif

        </div>


      </div>
    </div>
  </div>
