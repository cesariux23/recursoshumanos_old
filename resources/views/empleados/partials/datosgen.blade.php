<legend class="text-muted">Datos Generales</legend>
<div class="row">
  <div class='form-group col-md-3'>
    <label>Dirección *</label>
    {!! Form::text('datos[direccion]',null,array('class'=>'form-control','ng-model'=>'datos.direccion', 'required' => 'required','mayus'=>'')) !!}
  </div>


  <div class='form-group col-md-3'>
    <label>Colonia</label>
    {!! Form::text('datos[colonia]',null,array('class'=>'form-control','ng-model'=>'datos.colonia','mayus'=>'')) !!}
  </div>
  <div class='form-group col-md-2'>
    <label>C.P.</label>
    {!! Form::text('datos[cp]',null,array('class'=>'form-control','ng-model'=>'datos.cp')) !!}
  </div>



  <div class='form-group col-md-4 '>
    <label>Municipio *</label>
    {!! Form::select('datos[municipio]',$municipios,null,array('class'=>'form-control','ng-model'=>'datos.municipio','required' => 'required')) !!}
  </div>

</div>
<div class="row">
  <div class='form-group col-md-6'>
    <label>Teléfono</label>
    {!! Form::text('datos[tel_casa]',null,array('class'=>'form-control','ng-model'=>'datos.tel_casa')) !!}
  </div>

  <div class='form-group col-md-6'>
    <label> Teléfono celular</label>
    {!! Form::text('datos[tel_cel]',null,array('class'=>'form-control','ng-model'=>'datos.tel_cel')) !!}
  </div>
</div>

<div class="row">
  <div class='form-group col-md-6'>
    <label>Estado civil</label>
    {!! Form::select('datos[estado_civil]',config('opciones.estadocivil'),null,array('class'=>'form-control','ng-model'=>'datos.estado_civil')) !!}
  </div>
  <div class='form-group col-md-6' ng-show="datos.estado_civil==1">
    <label>Conyuge</label>
    {!! Form::text('datos[conyuge]',null,array('class'=>'form-control','ng-model'=>'datos.conyuge','mayus'=>'')) !!}
  </div>
</div>

<div class="row">
  <div class='form-group col-md-6'>
    <label>Escolaridad *</label>
    {!! Form::select('datos[escolaridad]',config('opciones.escolaridad'),null,array('class'=>'form-control','ng-model'=>'datos.escolaridad','required' => 'required')) !!}
  </div>
  <div class="form-group col-md-6">
    <div ng-show='datos.escolaridad>2'>
      <label>Licenciatura</label>
      {!! Form::text('datos[licenciatura]',null,array('class'=>'form-control','ng-model'=>'datos.licenciatura','mayus'=>'')) !!}
    </div>
    <div ng-show='datos.escolaridad>3'>
      <label>Maestria</label>
      {!! Form::text('datos[maestria]',null,array('class'=>'form-control','ng-model'=>'datos.maestria','mayus'=>'')) !!}
    </div>
    <div ng-show='datos.escolaridad>4'>
      <label>Doctorado</label>
      {!! Form::text('datos[doctorado]',null,array('class'=>'form-control','ng-model'=>'datos.doctorado','mayus'=>'')) !!}
    </div>
  </div>
</div>

<div class='form-group'>
  <label>Curriculum</label>
  {!! Form::textArea('datos[curriculum]',null,array('class'=>'form-control','ng-model'=>'datos.curriculum',"rows"=>"3")) !!}
</div>

<div class='form-group'>
  <label>Observaciones</label>
  {!! Form::textArea('datos[observaciones]',null,array('class'=>'form-control','ng-model'=>'datos.observaciones',"rows"=>"3")) !!}
</div>
