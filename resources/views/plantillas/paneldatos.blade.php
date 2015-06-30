

    <div class="panel panel-info">
    <div class="panel-heading">
      <div>
        <h3 class="panel-title">Emplead{{$empleado->sexo=='M'? 'a':'o'}} de <b>{{strtolower($empleado->tipoEmpleado)}}</b></h3>
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
              <p class="col-xs-3">RFC: <b>{{$empleado->rfc}}<span class="text-success">{{$empleado->homoclave}}</span></b></p>
              <p class="col-xs-4">CURP: <b>{{$empleado->curp}}</b></p>
              <p class="col-xs-4">Fecha de ingreso: <b>{{$empleado->fechaing}}</b></p>
            </div>
            <br>
            @if(isset($empleado->PlazaActual))
            <table class="table table-bordered table-condensed">
              <thead>
                <tr class="well">
                  <th colspan="3">
                    <div>
                      <div class="pull-right">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalplaza">
                          <i class="fa fa-edit"></i>
                          Corregir
                        </button>
                      </div>
                      <h4 class="text-center">Puesto actual</h4>
                    </div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th>
                    Puesto
                  </th>
                  <th>
                    Adscripción
                  </th>
                  <th>
                    Desde
                  </th>
                </tr>
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
    <div class="panel-footer hidden-print">
          <div class="pull-right">
            <button type="button" class="btn btn-primary">
              <i class="fa fa-refresh"></i>
              Cambio de puesto
            </button>
            <button type="button" class="btn btn-danger">
              <i class="fa fa-minus-circle"></i>
              Baja
            </button>
          </div>
          <br>
          <br>
    </div>
  </div>
