@extends('app')
@section('content')
<div class="container" ng-init="rfc='{{$empleado->rfc}}'">

	<div>
		<div class="pull-right">
			<a href="{{ route('empleados.show',$empleado->rfc) }}" class="btn btn-info"><i class="fa fa-chevron-left"></i> Ir al cardex</a>
		</div>
		<h1>Hijos</h1>
	</div>
	<hr>

	<div class="row">
		@include('empleados.partials.datos')
		<div class="col-xs-9 col-xs-9 contenedor_datos">

			<div class="well" ng-init="hijosform=true;">
				{!! Form::open(array('route' =>'hijos.store', 'name'=>'fhijos')) !!}
				<input type="hidden" name="rfc_empleado" id="rfc_empleado" class="form-control" value="<%rfc%>">

				@include('hijos.form')
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
						{!! Form::open(array('route' =>'hijos.destroy', 'method' => 'DELETE')) !!}
						<input type="hidden" name="id" value="<%h.id%>">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Borrar</button>
						{!! Form::close() !!}
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

	</div>
	<%h%>
	@stop
