<div class="fondo_perfil">
  @if(isset($empleado->datos->foto))
  <div class="fondo_perfil">
      <img class="perfil" src="{{ asset( $empleado->datos->foto ) }}" id="foto">
  </div>
  @else
  <div class="fondo_perfil">
      <img class="perfil perfil_default" src="{{ URL::asset('images/perfil.png') }}" id="foto">
      <p class="visible-print text-muted text-center">Sin Fotografia</p>
  </div>
  @endif
  @if(isset($editar))
    <span class="btn btn-warning fileinput-button">
      <i class="fa fa-refresh"></i>
      <span>Cambiar Foto</span>
      <input type="file"id="files" name="foto">
    </span>
  @endif
</div>
