@extends('app')
@section('content')

<div class="container">
  @include('empleados.partials.plantillaerror')
  {!! Form::model($empleado, array('method' => 'PATCH', 'route' =>array('empleados.update', $empleado->rfc),'files' => true, 'name'=>'registro')) !!}

  <div ng-init='empleado={{ $empleado->toJson() }}; datos={{$empleado->datos->toJson()}}; panel=1;'>
    <div class="pull-right">
      <a href="{{ route('empleados.show',$empleado->rfc)}}" class="btn btn-default"><i class="fa fa-times"></i> Cancelar</a>
      <button type="submit" class="btn btn-success" ng-disabled="!registro.$valid"><i class="fa fa-save"></i> Guardar</button>
    </div>
    <h1>Editar Información del Empleado</h1>
  </div>
  <h4>{{$empleado->nombreCompleto}}</h4>
    <p><b>{{$empleado->rfc}}</b></p>
  <hr>

  <!-- contenedor-->
  <div class="row">

    @include('empleados.partials.datos')

    <div class="col-md-9 contenedor_datos">
      <div>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li class="active"><a href="#datos_personales" role="tab" data-toggle="tab" ng-click="panel=1">Datos personales</a></li>
          <li><a href="#datos_generales" role="tab" data-toggle="tab" ng-click="panel=2">Formación profesional</a></li>
          <li><a href="#datos_laborales" role="tab" data-toggle="tab" ng-click="panel=3">Datos laborales</a></li>
        </ul>


        <!-- Tab panes -->
        <!-- Datos Personales -->
        <div class="tab-content">
          <div class="tab-pane active" id="datos_personales">
            <br>
            @include('empleados.partials.datospersonales')
          </div>
          <!--Datos Generales-->
          <div class="tab-pane" id="datos_generales">
            <br>
            <div>
              @include('empleados.partials.datosformacion')
            </div>
          </div>
          <!--Datos Laborales-->
          <div class="tab-pane" id="datos_laborales">
            <br>
            @include('empleados.partials.datoslaborales')
          </div>
        </div>


      </div>

    </div>
  </div>
  {!! Form::close() !!}
</div>

</div>
@stop
