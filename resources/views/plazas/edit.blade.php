@extends('app')
@section('content')
  <div class="container">

    <div>
      <div class="pull-right">
        <a href="{{ route('empleados.show',$empleado->rfc) }}" class="btn btn-info"><i class="fa fa-chevron-left"></i> Ir al Cardex</a>
      </div>
      <h1>Historial laboral</h1>
    </div>
    <hr>
    @include('plantillas.paneldatos')
    @include('plazas.historial')
    @include('plazas.modal')
  </div>
@endsection
