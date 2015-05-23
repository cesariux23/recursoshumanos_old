<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs hidden-print" role="tablist">
    <li role="presentation" class="active"><a href="#base" aria-controls="home" role="tab" data-toggle="tab">Base</a></li>
    <li role="presentation"><a href="#confianza" aria-controls="profile" role="tab" data-toggle="tab">Confianza</a></li>
    <li role="presentation"><a href="#honorarios" aria-controls="messages" role="tab" data-toggle="tab">Honorarios</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="base">
      <h3 class="text-muted">Personal basificado</h3>
      @include('catalogos.'.$catalogo.'.tabla', array('plazas'=>$datos['B']));
    </div>
    <div role="tabpanel" class="tab-pane" id="confianza">
      <h3 class="text-muted">Personal de confianza</h3>
      @include('catalogos.'.$catalogo.'.tabla', array('plazas'=>$datos['C']));
    </div>
    <div role="tabpanel" class="tab-pane" id="honorarios">
      <h3 class="text-muted">Personal de honorarios</h3>
      @include('catalogos.'.$catalogo.'.tabla', array('plazas'=>$datos['H']));
    </div>

    <div role="tabpanel" class="tab-pane" id="settings">...</div>
  </div>

</div>
