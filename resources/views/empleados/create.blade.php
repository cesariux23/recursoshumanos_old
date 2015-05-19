@extends('app')
@section('content')
<div class="container">
	<script type="text/ng-template" id="errores">
	<dd ng-message="required">Campo requerido.</dd>
	<dd ng-message="pattern">Valor no valido.</dd>
</script>

<div ng-controller="registroempleadosctl" ng-init="empleado.tipo='H';
				fplaza.tipo='H';
				empleado.tipo_pago=0;
				panel=1;
				datos.estado_civil=0;
				cargo.tipo='H';
				sueldo.empleado=0;
				cargo.ocupacion=false;
				sph='----'">
	{!! Form::open(array('route' => 'empleados.store', 'files' => true, 'name'=>'registro')) !!}
	<div>
		<div class="pull-right">
			<a href="{{ URL::to('empleados') }}" class="btn btn-default"><i class="fa fa-times"></i> Cancelar</a>
			<a class="btn btn-success" ng-disabled="!registro.$valid" data-toggle="modal" href='#confirmacion'><i class="fa fa-save"></i> Guardar</a>
		</div>
		<h1>Registro de empleado</h1>
	</div>
	<hr>
	<!-- Datos objetos-->
	<input type="hidden" name="empleado" id="empleado" class="form-control" value="<%empleado%>">
	<input type="hidden" name="datos" id="datos" class="form-control" value="<%datos%>">
	<input type="hidden" name="cargo" id="cargo" class="form-control" value="<%cargo%>">
	<input type="hidden" name="sueldo_emp" id="sueldo_emp" class="form-control" value="<%sueldo%>">
	<input type="hidden" name="zona_plaza" id="zona_plaza" class="form-control" value="<%plaza.zona_plaza%>">
	<input type="hidden" name="hijos" id="hijos" class="form-control" value="<%hijos%>">
	<!-- contenedor-->
	<div class="row">
		<div class="col-md-3">
			<div class="fondo_perfil">
				<img class="perfil" src="{{ URL::asset('images/perfil.png') }}" id="foto" ng-class="{perfil_default:!foto}">
				<span class="btn btn-info fileinput-button">
					<i class="glyphicon glyphicon-plus"></i>
					<span>Agregar Foto</span>
					<input type="file"  id="files" name="foto"  fileread="foto">
				</span>
			</div>
			<br>
			<!--Errores de llenado -->
			@include('empleados.partials.erroresregistro')
		</div>
		<div class="col-md-9 contenedor_datos">

			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li class="active"><a href="#datos_personales" role="tab" data-toggle="tab" ng-click="panel=1">Datos personales</a></li>
				<li><a href="#datos_generales" role="tab" data-toggle="tab" ng-click="panel=2">Datos Generales</a></li>
				<li><a href="#datos_laborales" role="tab" data-toggle="tab" ng-click="panel=3">Datos laborales</a></li>
				<li><a href="#datos_hijos" role="tab" data-toggle="tab" ng-click="panel=4">Hijos</a></li>
			</ul>

			<!-- Tab panes -->
			<!-- Datos Personales -->
			<div class="tab-content">
				@include('empleados.partials.datospersonales')
					<!--Datos Generales-->
					<div class="tab-pane" id="datos_generales">
					  <br>
					  <div class="well">
							@include('empleados.partials.datosgen')
						</div>
					</div>
					<!--Datos Laborales-->
					@include('empleados.partials.datoslaborales')
					<!--Hijos-->
					@include('empleados.partials.datoshijos')
				</div>
			</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="selectPlaza" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
						<h4 class="modal-title" id="myModalLabel">Seleccione la plaza</h4>
					</div>
					<div class="modal-body">
						<div class="row well">
							<legend class="text-muted">Filtro</legend>
							<div class="form-group col-md-3" ng-show="fplaza.tipo!='H'">
								<label>Zona económica</label>
								<select name="zona" id="input" class="form-control" ng-model="fplaza.zona_eco">
									<option value="">-- Ninguna --</option>
									<option value="2">ZONA II</option>
									<option value="3">ZONA III</option>
								</select>
							</div>
							<div class="form-group col-md-3">
								<label>Clave</label>
								<input type="text" class="form-control" ng-model="fplaza.clave" placeholder="Clave de la plaza">
							</div>
							<div class="form-group col-md-6">
								<label>Descripción</label>
								<input type="text" class="form-control" ng-model="fplaza.descripcion" placeholder="Clave de la plaza">
							</div>
						</div>
						<div>
							<div id="table-scroll">
								<table class="table table-striped table-hover table-bordered table-condensed">
									<thead>
										<tr>
											<th>Clave</th>
											<th ng-show="fplaza.tipo!='H'">Zona económica</th>
											<th>Descripción</th>
											<th>Seleccionar</th>
										</tr>
									</thead>
									<tbody>
										<tr  ng-repeat="p in (tabulador| filter:fplaza)">
											<td><%p.clave%></td>
											<td ng-show="fplaza.tipo!='H'"><%p.zona_eco%></td>
											<td><%p.descripcion%></td>
											<td>
												<button type="button" class="btn btn-sm btn-success" ng-click="asigna_plaza(p)" data-dismiss="modal"><i class="fa fa-check"></i> </button>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="confirmacion">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Confirmación</h4>
					</div>
					<div class="modal-body">
						<div class="alert alert-warning">
							<div class="row">
								<div class="col-md-1">
									<i class="fa fa-info-circle fa-3x"></i>
								</div>
								<div class="col-md-11">
									<p>En este formulario existe información que no se puede editar despues de guardar, por lo que se le recomienda verificar antes de continuar.</p>
								</div>
							</div>
						</div>
						<div class="well">
							<p><b>RFC</b>: <%empleado.rfc%></p>
							<p ng-show="empleado.homoclave!=''"><b>Homoclave</b>: <%empleado.homoclave%></p>
							<p><b>Nombre</b>: <%empleado.nombre%></p>
							<p><b>A. Paterno</b>: <%empleado.paterno%></p>
							<p><b>A. Materno</b>: <%empleado.materno%></p>
							<p><b>CURP</b>: <%empleado.curp%></p>
							<p><b>Fecha de nacimiento</b>: <%empleado.fecha_nacimiento%></p>
							<p><b>Sexo</b>: <%empleado.sexo%></p>
						</div>
						<p>¿Esta seguro que desea continuar?</b></p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-pencil"></i> Editar</button>
						<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Continuar</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		{!! Form::close() !!}
	</div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/controllers/empleados/create.js') }}"></script>
@stop
