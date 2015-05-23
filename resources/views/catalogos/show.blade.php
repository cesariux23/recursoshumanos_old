@extends('app')
@section('content')
  <div class="container">
    <h1>{{ucfirst($catalogo)}}</h1>
    <hr>
    @include('catalogos.'.$catalogo.'.index')
  </div>
@endsection
