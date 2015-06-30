  <div>
    <legend class="text-muted">Datos Personales</legend>
    <div class="row">
      @if(!isset($editar))
      <div class="form-group col-md-3">
        <label class="control-label">RFC*</label>
        <input type="text" name="rfc" id="rfc" class="form-control mayus" placeholder="RFC a 10 caracteres" ng-model="empleado.rfc" required minlength="10" maxlength="10" pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])" ng-change="datos.rfc=empleado.rfc" ng-blur="validarfc()">
      </div>
      @endif
      <div class="form-group col-md-2">
        <label class="control-label">Homo clave</label>
        <input type="text" name="homo" id="homo" class="form-control mayus" ng-model="empleado.homoclave" maxlength="3" >
      </div>


      <div class="form-group col-md-3">
        <label class="control-label">CURP*</label>
        <input type="text" name="curp" id="curp" class="form-control mayus" placeholder="CURP a 18 caracteres" ng-model="empleado.curp" required minlength="18" pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$" maxlength="18" ng-blur="llenagenero()">
      </div>
      @if(!isset($editar))
      <div class="form-group col-md-3" ng-show="empleado.fecha_nacimiento">
        <label class="control-label">Fecha de Nacimiento</label>
        <br>
        <b><%empleado.fecha_nacimiento%></b>
      </div>
      <div class="form-group col-md-1" ng-show="empleado.sexo">
        <label class="control-label">Sexo</label>
        <br>
        <b><%empleado.sexo%></b>
      </div>
      @endif
    </div>

    <div class="row">
      <div class="form-group col-md-4">
        <label class="control-label">
          Primer apellido*</label>
          <input type="text" name="paterno" id="paterno" class="form-control" placeholder="Primer apellido" ng-model="empleado.paterno" required mayus>
        </div>
        <div class="form-group col-md-4">
          <label class="control-label">Segundo apellido</label>
          <input type="text" name="materno" id="materno" class="form-control" placeholder="Segundo apellido" ng-model="empleado.materno" mayus>
        </div>
        <div class="form-group col-md-4">
          <label class="control-label">Nombre(s)*</label>
          <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre(s)" ng-model="empleado.nombre" required mayus>
        </div>
    </div>
    <div class="row">
      <div class="form-group col-md-2">
        <label class="control-label">Tipo de Sangre</label>
        <input type="text" name="tipo_sangre" id="tipo_sangre" class="form-control" ng-model="empleado.tipo_sangre" maxlength="4" mayus>
      </div>
    </div>

    <div class="row">
      <div class='form-group col-md-2'>
        <label>Estado civil</label>
        {!! Form::select('datos[estado_civil]',config('opciones.estadocivil'),null,array('class'=>'form-control','ng-model'=>'datos.estado_civil')) !!}
      </div>
      <div class='form-group col-md-5' ng-show="datos.estado_civil==1">
        <label>Conyuge</label>
        {!! Form::text('datos[conyuge]',null,array('class'=>'form-control','ng-model'=>'datos.conyuge','mayus'=>'')) !!}
      </div>

      <div class="form-group col-md-2">
        <label>¿Tiene hijos?</label>
        <div>
          <label class="radio-inline">
            <input type="radio" name="datos[hijos]" ng-model="datos.hijos" ng-value="1" required> Sí
          </label>
          <label class="radio-inline">
            <input type="radio" name="datos[hijos]" ng-model="datos.hijos" ng-value="0" required ng-change="datos.hijosmenores=false"> No
          </label>
        </div>
      </div>

      <div class="form-group col-md-3" ng-show="datos.hijos==1">
        <label>¿Tiene hijos menores de edad?</label>
        <div>
          <label class="radio-inline">
            <input type="radio" name="datos[hijosmenores]" ng-model="datos.hijosmenores" ng-value="1" ng-required="datos.hijos"> Sí
          </label>
          <label class="radio-inline">
            <input type="radio" name="datos[hijosmenores]" ng-model="datos.hijosmenores" ng-value="0" ng-required="datos.hijos" ng-click="hijosform=false"> No
          </label>
        </div>
      </div>
    </div>

<legend class="text-muted">Datos de localización</legend>
    <div class="row">
      <div class="form-group col-md-4">
        <label class="control-label">Correo electrónico*</label>
        <input type="email" name="correo" id="correo" class="form-control" placeholder="Correo" ng-model="empleado.correo" required>
      </div>
      <div class='form-group col-md-4'>
        <label>Teléfono de casa</label>
        {!! Form::text('datos[tel_casa]',null,array('class'=>'form-control','ng-model'=>'datos.tel_casa')) !!}
      </div>

      <div class='form-group col-md-4'>
        <label> Teléfono celular</label>
        {!! Form::text('datos[tel_cel]',null,array('class'=>'form-control','ng-model'=>'datos.tel_cel')) !!}
      </div>
    </div>
    <div class="row">
      <div class='form-group col-md-12'>
        <label>Dirección *</label>
        {!! Form::text('datos[direccion]',null,array('class'=>'form-control','ng-model'=>'datos.direccion', 'required' => 'required','mayus'=>'')) !!}
      </div>
    </div>
    <div class="row">
      <div class='form-group col-md-4'>
        <label>Colonia</label>
        {!! Form::text('datos[colonia]',null,array('class'=>'form-control','ng-model'=>'datos.colonia','mayus'=>'')) !!}
      </div>
      <div class='form-group col-md-2'>
        <label>C.P.</label>
        {!! Form::text('datos[cp]',null,array('class'=>'form-control','ng-model'=>'datos.cp','maxlength'=>'5','solonumeros')) !!}
      </div>



      <div class='form-group col-md-6'>
        <label>Municipio *</label>
        {!! Form::select('datos[municipio]',$municipios,null,array('class'=>'form-control','ng-model'=>'datos.municipio','required' => 'required')) !!}
      </div>

    </div>

    </div>
