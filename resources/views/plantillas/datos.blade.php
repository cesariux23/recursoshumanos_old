

  @include('empleados.partials.foto')
  @if(isset($editar))
  <br>
    <!--Errores de llenado -->
    @include('empleados.partials.erroresregistro')
  @else
    <h3 class="text-muted hidden-print">{{$empleado->nombreCompleto}}</h3>
    <h4 class="visible-print">{{$empleado->nombreCompleto}}</h4>
    <div class="row">
      <p class="col-md-6">RFC<br><b>{{$empleado->rfc}}</b></p>
      @if(isset($empleado->homoclave))
      <p class="col-md-6">Homoclave<br><b>{{$empleado->homoclave}}</b></p>
      @endif
    </div>

    <p>CURP<br><b>{{$empleado->curp}}</b></p>
    <p>Fecha de nacimiento<br><b>{{ $empleado->fechaNac}}</b></p>
    <div class="row">
      <p class="col-xs-6">Edad<br><b>{{$empleado->edad}} años</b></p>
      <p class="col-xs-6">Sexo<br><b>{{$empleado->sexo}}</b></p>
    </div>
    <p>Correo<br><b>{{$empleado->correo}}</b></p>
    @if(isset($empleado->tipo_sangre))
      <p>Tipo de sangre<br><b>{{$empleado->tipo_sangre}}</b></p>
    @endif
  @endif
