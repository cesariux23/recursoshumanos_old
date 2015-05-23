@extends('app')
@section('content')
<div class="container" ng-controller="registrohijoctl" ng-init="rfc='{{$empleado->rfc}}'">

	<div>
	<div class="pull-right">
		<a href="{{ route('empleados.show',$empleado->rfc) }}" class="btn btn-info"><i class="fa fa-chevron-left"></i> Regresar</a>
	</div>
	<h1>Hijos</h1>
</div>
<hr>

<div class="row">
    @include('empleados.partials.datos')
    <div class="col-xs-9 col-xs-9 contenedor_datos">

<div class="well">
	{!! Form::open(array('route' =>'hijos.store', 'name'=>'fhijos')) !!}
	<input type="hidden" name="rfc_empleado" id="rfc_empleado" class="form-control" value="<%rfc%>">
		<div class="form-group">
		<label class="control-label">Nombre*</label>
		<input type="text" name="nombre" class="form-control" placeholder="Nombre completo" ng-model="hijo.nombre" mayus required>
	</div>
	<div class="row">
		<div class="form-group col-md-4">
			<label class="control-label">CURP*</label>
			<input type="text" name="curp" class="form-control mayus" placeholder="CURP a 18 caracteres" ng-model="hijo.curp" minlength="18" pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$" maxlength="18" ng-blur="calcula_fecha()" required>
		</div>
		<div class="form-group col-md-4">
			<label>Sexo*</label>
			<div>
				<label class="radio-inline">
					<input type="radio" name="sexo" value="M" ng-model="hijo.sexo" required> Masculino
				</label>
				<label class="radio-inline">
					<input type="radio" name="sexo" value="F" ng-model="hijo.sexo" required> Femenino
				</label>
			</div>
		</div>
		<div class="form-group col-md-4">
			<label class="control-label">Fecha de Nacimiento*</label>
			<div class="input-group date" id="fhijo">
				<input type="text" name="fecha_nac" class="form-control mayus" placeholder="aaaa/mm/dd" ng-model="hijo.fecha_nac" required><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			</div>
		</div>

	</div>
	<button type="submit" class="btn btn-primary" ng-disabled="!fhijos.$valid"><i class="fa fa-save"></i> Agregar</button>
	{!! Form::close() !!}
</div>

@include('flash::message')

@include('hijos.tabla',['edit'=>true])

</div>
<div class="modal fade" id="confirmacion">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Borrar</h4>
			</div>
			<div class="modal-body">
				<p>¿Esta seguro que desea borrar a <b><%h.nombre%>?</b></p>
			</div>
			<div class="modal-footer">
				 	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-danger" ng-click="borrar()"><i class="fa fa-trash"></i> Borrar</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</div>
@stop

@section('scripts')
<script src="{{ asset('js/controllers/hijos/create.js') }}"></script>
@stop
