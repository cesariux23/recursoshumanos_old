
<legend class="text-muted">Hijos menores de edad</legend>

@if(count($hijos)>0)
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Nombre</th>
				<th width="200px">Fecha de nacimiento</th>
				<th width="200px">Edad</th>
				@if(isset($edit))
				<th>Acciones</th>
				@endif
			</tr>
		</thead>
		<tbody>
			@foreach($hijos as $h)
			<tr {{$h->edad<17? 'class="warning"':''}}>
				<td>{{$h->nombre}}</td>
				<td>{{$h->fechaNacimiento}}</td>
				<td><b>{{$h->edad}}</b> años</td>

				@if(isset($edit))
				<td>
					<button type="button" class="btn btn-danger" data-toggle="modal" href='#confirmacion' ng-click='h={{$h->toJson()}}'> <i class="fa fa-minus-circle"></i></button>
				</td>
				@endif
			</tr>
			@endforeach
		</tbody>
	</table>
@else
<div class="alert alert-info">
	Sin registros.
</div>
@endif
