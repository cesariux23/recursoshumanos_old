
<table class="table table-bordered table-striped">
	<thead>
		<tr>
      <th>CURP</th>
			<th>Nombre</th>
			<th>Fecha de nacimiento</th>
      @if(isset($edit))
			<th>Acciones</th>
      @endif
		</tr>
	</thead>
	<tbody>
		@foreach($hijos as $h)
		<tr id="{{$h->id}}">
      <td>{{$h->curp}}</td>
			<td>{{$h->nombre}}</td>
			<td>{{$h->fechaNacimiento}}</td>
      @if(isset($edit))
			<td>
				<button type="button" class="btn btn-danger" data-toggle="modal" href='#confirmacion' ng-click='h={{$h->toJson()}}'> <i class="fa fa-minus-circle"></i></button>
			</td>
      @endif
		</tr>
		@endforeach
	</tbody>
</table>
