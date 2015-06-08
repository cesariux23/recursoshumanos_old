@extends('app')
@section('content')

<div class="container">
  <div>
    <div class="pull-right hidden-print">
      <a href="{{ route('empleados.index') }}" class="btn btn-info"><i class="fa fa-chevron-left"></i> Volver</a>
      <a href="{{ route('empleados.edit',$empleado->rfc) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Editar</a>
      <a href="{{ route('hijos.show',$empleado->rfc) }}" class="btn btn-default"><i class="fa fa-child"></i> Hijos</a>
      <button type="submit" class="btn btn-primary" onclick="window.print()"><i class="fa fa-print"></i> Imprimir</button>
    </div>
    <div class="row visible-print">
      <div class="col-xs-3">
        <img src="{{asset('images/ivea.jpg')}}" width="200px"  class="center-block"/>
        <p class="text-center">
          Departamento de Recursos Humanos
        </p>
      </div>
      <div class="col-xs-9">
        <h1>Cardex</h1>
      </div>
    </div>
    <h1 class="hidden-print">Cardex</h1>
    <hr class="hidden-print">
  </div>
  <div class="hidden-print">
    @include('flash::message')
  </div>
  <!-- contenedor-->
  <div class="row">
    @include('empleados.partials.datos')

    <div class="col-xs-9 col-xs-9 contenedor_datos">
      <div>
        <legend class="text-muted">Datos laborales</legend>
        <div class="row">
          <p class="col-xs-4">Tipo de Empleado<br><b>{{$empleado->tipoEmpleado }}</b></p>
          <p class="col-xs-4">Número de Empleado<br><b>{{ $empleado->num_empleado }}</b></p>
          <p class="col-xs-4">Fecha de Ingreso<br><b>{{ $empleado->fechaIng }}</b></p>
        </div>
        <div class="row">
          <p class="col-xs-4">Tipo de Pago<br><b>{{ $empleado->pago }}</b></p>
          @if($empleado->tipo_pago==0)
          <p class="col-xs-4">Banco<br><b>{{ $empleado->catbanco->banco}}</b></p>
          <p class="col-xs-4">Cuenta<br><b>{{ $empleado->cuenta }}</b></p>
          @endif
        </div>
        
        <legend class="text-muted">Datos Personales</legend>
        <p>Dirección<br><b>{{$empleado->datos->direccion}}</b></p>
        <div class="row">
          <p class="col-md-5 col-xs-5">Colonia<br><b>{{ $empleado->datos->colonia}}</b></p>
          <p class="col-md-1 col-xs-1">C.P<br><b>{{$empleado->datos->cp }}</b></p>
          <p class="col-md-6 col-xs-6">Municipio<br><b>{{$empleado->datos->catmunicipio->municipio }}</b></p>
        </div>
        <div class="row">
          <p class="col-md-2 col-xs-6">Teléfono de Casa<br><b>{{ $empleado->datos->tel_casa}}</b></p>
          <p class="col-md-3 col-xs-6">Teléfono de Celular<br><b>{{ $empleado->datos->tel_cel}}</b></p>
          <p class="col-md-2 col-xs-2">Estado Civil<br><b>{{$empleado->datos->estado_civil==0? 'SOLTERO':'CASADO'}}</b></p>
          @if($empleado->datos->estado_civil==1)
          <p class="col-md-5 col-xs-10">Conyuge<br><b>{{ $empleado->datos->conyuge}}</b></p>
          @endif
        </div>
        <div class="row">
          <div class="col-md-4 col-xs-4">
            Tiene hijos <br><b>{{$empleado->datos->hijos==1? 'Sí':'No'}}</b>
          </div>
          @if($empleado->datos->hijos)
          <div class="col-md-4 col-xs-4">
            Menores de edad <br><b>{{$empleado->datos->hijosmenores? 'Sí':'No'}}</b>
          </div>
          @if($empleado->datos->hijosmenores)
          <div class="col-md-4 col-xs-4">
            Registrados en el instituto <br><b>{{count($empleado->hijos)}}</b>
          </div>
          @endif
          @endif
        </div>

        @if(count($empleado->hijos)>0)
        @include('hijos.tabla',['hijos'=>$empleado->hijos])
        @endif

        <legend>Formación</legend>
        <div class="row">
          @if($empleado->datos->escolaridad<=2 || $empleado->datos->escolaridad==6)
          <p class="col-md-3 col-xs-6">Escolaridad<br><b>{{$empleado->datos->ultimoGrado}}</b></p>
          @endif
          @if($empleado->datos->escolaridad>2 && $empleado->datos->escolaridad<6)
          <p class="col-md-3 col-xs-6">Licenciatura<br><b>{{ $empleado->datos->licenciatura }}</b></p>
          @endif
          @if($empleado->datos->escolaridad>3 && $empleado->datos->escolaridad<6)
          <p class="col-md-3 col-xs-6">Maestria<br><b>{{ $empleado->datos->maestria }}</b></p>
          @endif
          @if($empleado->datos->escolaridad>4 && $empleado->datos->escolaridad<6)
          <p class="col-md-3 col-xs-6">Doctorado<br><b>{{ $empleado->datos->doctorado }}</b></p>
          @endif
        </div>
        @if(isset($empleado->datos->curriculum))
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Curriculum</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ $empleado->datos->curriculum }}</td>
            </tr>
          </tbody>
        </table>
        @endif
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Observaciones</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              @if(isset($empleado->datos->observaciones))
              <td>{{ $empleado->datos->observaciones }}</td>
              @else
              <td class="text-muted">Ninguna observación.</td>
              @endif
            </tr>
          </tbody>
        </table>

        <div>
          <div class="pull-right">
            <button class="btn btn-warning hidden-print"> <i class="fa fa-edit"></i> Editar datos laborales</button>
          </div>
          <legend class="text-muted">Historial Laboral</legend>
        </div>
        <br>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Periodo</th>
              <th>Adscripción</th>
              <th>Plaza</th>
            </tr>
          </thead>
          <tbody>
            @foreach($empleado->datosLaborales as $dl)
            <tr>
              <td>{{$dl->inicio}} -- {{$dl->fin==null? 'Actualidad':$dl->fecha_ingreso }}</td>
              <td>
                {{$dl->catadscripcion->adscripcion}}
                @if($dl->ocupacion==1)
                <p><span class="label label-warning">Interinato</span></p>
                @endif
              </td>
              <td>{{$dl->catplaza->descripcion}}</td>
            </tr>


            @endforeach

          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>

@stop
