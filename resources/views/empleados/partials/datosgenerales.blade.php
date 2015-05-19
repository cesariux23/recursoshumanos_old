<div class="tab-pane" id="datos_generales">
  <br>
  <div class="well">
    <div class="row">
      <div class="form-group col-md-10">
        <label class="control-label">Dirección*</label>
        <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Dirección" ng-model="datos.direccion" required mayus>
      </div>
      <div class="form-group col-md-2">
        <label class="control-label">C. P.</label>
        <input type="text" name="cp" id="cp" class="form-control" placeholder="" ng-model="datos.cp" maxlength="5">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label class="control-label">Colonia</label>
        <input type="text" name="colonia" id="colonia" class="form-control" placeholder="Colonia" ng-model="datos.colonia" mayus>
      </div>
      <div class="form-group col-md-6">
        <label class="control-label">Municipio*</label>
        <select name="municipio" id="municipio" class="form-control" ng-model="datos.municipio" required>
          <option value="" disabled selected style='display:none;'>--Seleccione --</option>
          @foreach($municipios as $mun)
          <option value="{{$mun->id}}">{{$mun->municipio}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label class="control-label">Teléfono de Casa</label>
        <input type="text" name="tel_casa" id="tel_casa" class="form-control" placeholder="Telefono de casa" ng-model="datos.tel_casa">
      </div>
      <div class="form-group col-md-6">
        <label class="control-label">Teléfono de Celular</label>
        <input type="text" name="tel_cel" id="tel_cel" class="form-control" placeholder="Telelefono celular" ng-model="datos.tel_cel">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label class="control-label">Estado Civil</label>
        <select name="estado_civil" id="estado_civil" class="form-control" ng-model="datos.estado_civil">
          <option value="0">Soltero</option>
          <option value="1">Casado</option>
        </select>
      </div>
      <div class="form-group col-md-6" ng-show="datos.estado_civil==1">
        <label class="control-label">Nombre del Conyuge</label>
        <input type="text" name="conyuge" id="conyuge" class="form-control" placeholder="Conyuge"ng-model='datos.conyuge' mayus>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label class="control-label">Escolaridad*</label>
        <select name="escolaridad" id="escolaridad" class="form-control" ng-model="datos.escolaridad" required>
          <option value="" disabled selected style='display:none;'>-- Seleccione --</option>
          <option value="0">Primaria</option>
          <option value="1">Secundaria</option>
          <option value="2">Bachillerato</option>
          <option value="3">Licenciatura</option>
          <option value="4">Maestria</option>
          <option value="5">Doctorado</option>
        </select>
      </div>
      <div class="form-group col-md-6">
        <div ng-show="datos.escolaridad>2">
          <label class="control-label">Licenciatura</label>
          <input type="text" name="licenciatura" id="licenciatura" class="form-control" placeholder="Licenciatura" ng-model="datos.licenciatura" mayus>
        </div>
        <div ng-show="datos.escolaridad>3">
          <label class="control-label">Maestria</label>
          <input type="text" name="maestria" id="maestria" class="form-control" placeholder="Maestria" ng-model="datos.maestria" mayus>
        </div>
        <div ng-show="datos.escolaridad>4">
          <label class="control-label">Doctorado</label>
          <input type="text" name="doctorado" id="doctorado" class="form-control" placeholder="Doctorado" ng-model="datos.doctorado" mayus>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label">Curriculum</label>
      <textarea class="form-control" name="curriculum" id="curriculum" rows="3" placeholder="Curriculum"></textarea>
    </div>
    <div class="form-group">
      <label class="control-label">Observaciones</label>
      <textarea class="form-control" name="observaciones" rows="3" placeholder="Observaciones"></textarea>
    </div>
  </div>
</div>
