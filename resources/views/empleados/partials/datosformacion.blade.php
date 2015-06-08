<legend class="text-muted">Formación profesional</legend>
<div class="row">
  <div class='form-group col-md-6'>
    <label>Escolaridad *</label>
    {!! Form::select('datos[escolaridad]',config('opciones.escolaridad'),null,array('class'=>'form-control','ng-model'=>'datos.escolaridad','required' => 'required')) !!}
  </div>
  <div class="form-group col-md-6">
    <div ng-show='datos.escolaridad>2 && datos.escolaridad<6'>
      <label>Licenciatura</label>
      {!! Form::text('datos[licenciatura]',null,array('class'=>'form-control','ng-model'=>'datos.licenciatura','mayus'=>'')) !!}
    </div>
    <div ng-show='datos.escolaridad>3 && datos.escolaridad<6'>
      <label>Maestria</label>
      {!! Form::text('datos[maestria]',null,array('class'=>'form-control','ng-model'=>'datos.maestria','mayus'=>'')) !!}
    </div>
    <div ng-show='datos.escolaridad>4 && datos.escolaridad<6'>
      <label>Doctorado</label>
      {!! Form::text('datos[doctorado]',null,array('class'=>'form-control','ng-model'=>'datos.doctorado','mayus'=>'')) !!}
    </div>

    <div ng-show='datos.escolaridad==6'>
      <label>Especifique</label>
      {!! Form::text('datos[otro]',null,array('class'=>'form-control','ng-model'=>'datos.otro','mayus'=>'','ng-required'=>"datos.escolaridad==6")) !!}
    </div>
  </div>
</div>

<div class='form-group'>
  <label>Sintesis curricular</label>
  {!! Form::textArea('datos[curriculum]',null,array('class'=>'form-control','ng-model'=>'datos.curriculum',"rows"=>"3")) !!}
</div>

<div class='form-group'>
  <label>Observaciones</label>
  {!! Form::textArea('datos[observaciones]',null,array('class'=>'form-control','ng-model'=>'datos.observaciones',"rows"=>"3")) !!}
</div>
