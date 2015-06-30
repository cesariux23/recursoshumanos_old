@extends('app')
@section('content')
  <div class="container">
    <section>
      @yield('titulo')
    </section>
    <hr>
    <div class="row">
      <div class="col-xs-3">
        @yield('lateral')
      </div>
      <div class="col-xs-9 contenedor_datos">
        @yield('central')
      </div>
    </div>
  </div>
@endsection
