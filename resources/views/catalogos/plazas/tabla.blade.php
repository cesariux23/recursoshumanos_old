<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Clave</th>
      <th>Descripcion</th>
      <th>Nivel</th>
      <th>Número de plazas autorizadas</th>
      <th>Número de plazas ocupadas</th>
    </tr>
  </thead>
  <tbody>
    @foreach($plazas as $p)
    <tr>
      <td>{{ $p->clave }}</td>
      <td>{{ $p->descripcion }}</td>
      <td>{{ $p->nivel }}</td>
      <td>{{ $p->autorizadas }}</td>
      <td>
        @if($p->ocupadas>0)
          <b>{{ $p->ocupadas }}</b>
        @else
        <span class="text-muted">0</span>
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
