@extends('app')
@section('content')
  <div class="container">
    <h1>Historial laboral</h1>
    <hr>
    @include('plantillas.paneldatos')
    <br>
    @include('plazas.historial')
    @include('plazas.modal')
  </div>
@endsection
