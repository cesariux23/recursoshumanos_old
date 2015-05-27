@extends('app')
@section('content')
  <div class="container">
    <div>
      <div class="pull-right">
        <button type="button" class="btn btn-default" ng-show="verformulario" ng-click="verformulario=false">
          <i class="fa fa-times text-danger"></i>
          Cancelar
        </button>
        <button type="button" class="btn btn-primary" ng-show="!verformulario" ng-click="verformulario=true">
          <i class="fa fa-plus"></i>
          Nuevo
        </button>
      </div>
      <h1>{{ucfirst($catalogo)}}</h1>
    </div>
    <hr>
    @include('catalogos.formulario')
    <div ng-show="!verformulario">
    @include('catalogos.'.$catalogo.'.index')
    </div
  </div>
@endsection
