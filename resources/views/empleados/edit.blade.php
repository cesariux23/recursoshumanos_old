@extends('app')
@section('content')

<div class="container">
  {!! Form::model($empleado, array('method' => 'PATCH', 'route' =>array('empleados.update', $empleado->rfc),'files' => true)) !!}

  <div ng-init='datos={{$empleado->datos->toJson()}}; empleado={{$empleado->toJson()}}'>
    <div class="pull-right">
      <a href="{{ URL::previous()}}" class="btn btn-default"><i class="fa fa-times"></i> Cancelar</a>
      <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
    </div>
    <h1>Editar Información del Empleado</h1>
  </div>

  <hr>

  <!-- contenedor-->
  <div class="row">

    <div class="col-md-3">
      <div class="fondo_perfil">
        @if(isset($empleado->datos->foto))
        <img class="perfil" src="{{ URL::asset($empleado->datos->foto) }}" id="foto">
        @else
        <img class="perfil perfil_default" src="{{ URL::asset('images/perfil.png') }}" id="foto">
        @endif
        <span class="btn btn-warning fileinput-button">
          <i class="fa fa-refresh"></i>
          <span>Cambiar Foto</span>
          <input type="file"id="files" name="foto">
        </span>
      </div>
      <h3 class="text-muted">{{$empleado->nombre." ".$empleado->paterno." ".$empleado->materno}}</h3>
      <p>RFC<br><b>{{$empleado->rfc}}</b></p>
      @if(isset($empleado->homoclave))
      <p>Homoclave<br><b>{{$empleado->homoclave}}</b></p>
      @endif
      <p>CURP<br><b>{{$empleado->curp}}</b></p>
      <?php
      $fecha=strtotime($empleado->fecha_nacimiento);
      $edad = (int)((time()-$fecha)/31556926);
      $meses =array("","Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
      ?>
      <p>Fecha de nacimiento<br><b>{{date('d',$fecha).' de '.$meses[date('n',$fecha)].' de '.date('Y',$fecha) }}</b></p>
      <p>Edad<br><b>{{$edad}} años</b></p>
      @if(isset($empleado->tipo_sangre))
      <p>Tipo de sangre<br><b>{{$empleado->tipo_sangre}}</b></p>
      @endif
    </div>
    <div class="col-md-9 contenedor_datos">
      <div class="well">
        {!! Form::model($empleado, array('method' => 'PATCH', 'route' =>array('empleados.update', $empleado->rfc))) !!}
        <fieldset>
          <legend class="text-muted">Datos Personales</legend>
          <div class="row">
            <div class='form-group col-md-4'>
              <label>Homoclave</label>
              {!! Form::text('homoclave',null,array('class'=>'form-control','ng-model'=>'datos.homoclave', 'required' => 'required')) !!}
            </div>

            <div class='form-group col-md-6 col-md-offset-2'>
              <label>Correo</label>
              {!! Form::text('correo',null,array('class'=>'form-control','ng-model'=>'datos.correo', 'required' => 'required')) !!}
            </div>
          </div>

          @include('empleados.partials.datosgen')

          <legend class="text-muted">Datos Laborales</legend>
          <div class="row">
            <div class='form-group col-md-4'>
              <label>Número de Seguridad Social</label>
              {!! Form::text('nss',null,array('class'=>'form-control','ng-model'=>'empleado.nss')) !!}
            </div>

            <div class='form-group col-md-4'>
              <label>Número Fonacot</label>
              {!! Form::text('num_fonacot',null,array('class'=>'form-control','ng-model'=>'empleado.num_fonacot')) !!}
            </div>

            <div class='form-group col-md-4'>
              <label>Número ISSSTE</label>
              {!! Form::text('num_issste',null,array('class'=>'form-control','ng-model'=>'empleado.num_issste')) !!}
            </div>
          </div>
          <div class="row">
            <label></label>
            <div class='form-group col-md-4'>
              <label>Tipo de pago</label>
              {!! Form::select('tipo_pago',config('opciones.pagos'),null,array('class'=>'form-control','ng-model'=>'empleado.tipo_pago','required' => 'required')) !!}
            </div>

            <div class='form-group col-md-4' ng-show="empleado.tipo_pago==0">
              <label>Banco</label>
              {!! Form::select('banco',$bancos,null,array('class'=>'form-control','ng-model'=>'empleado.banco')) !!}
            </div>

            <div class='form-group col-md-4' ng-show="empleado.tipo_pago==0">
              <label>Cuenta bancaria</label>
              {!! Form::text('cuenta',null,array('class'=>'form-control','ng-model'=>'empleado.cuenta')) !!}
            </div>
          </div>
        </fieldset>
      </div>


      @if ($errors->any())
      {{ implode('', $errors->all('<li class="error">:message</li>')) }}
      @endif
    </div>
  </div>
</div>
{!! Form::close() !!}
</div>
@stop
