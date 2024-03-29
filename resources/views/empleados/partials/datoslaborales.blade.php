
  <div>
    @if(isset($editar) && $empleado->tipo!='H')
    <legend class="text-muted">Datos laborales</legend>
    <div class="row">
    @endif

    @if(!isset($editar))
    <legend class="text-muted">Datos laborales</legend>
    <div class="row">
      <div class="form-group col-md-5">
        <label>Tipo de Empleado*</label>
        <div>
          <label class="radio-inline">
            <input type="radio" value="B" name="tipo" ng-model="empleado.tipo" ng-click="cambiatipo('B')"> Base
          </label>
          <label class="radio-inline">
            <input type="radio" value="C" name="tipo" ng-model="empleado.tipo" ng-click="cambiatipo('C')"> Confianza
          </label>
          <label class="radio-inline">
            <input type="radio" value="H" name="tipo" ng-model="empleado.tipo" ng-click=" cambiatipo('H')"> Honorarios
          </label>
        </div>
      </div>

      <div class="form-group col-md-4">
        <label class="control-label">Fecha de Ingreso*</label>
        <div class="input-group date">
          <input type="text" class="form-control"placeholder="aaaa/mm/dd" title="Ingreso como trabajador" name="fecha_ingreso" id="fingreso" ng-model="empleado.fecha_ingreso" required ng-change="cargo.inicio=empleado.fecha_ingreso"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        </div>
      </div>
    @endif
  </div>
    <div class="row" ng-hide="empleado.tipo=='H'">
      <div class="form-group col-md-4">
        <label class="control-label">Número de Seguro Social</label>
        <input type="text" name="nss" id="nss" class="form-control" placeholder="NSS" ng-model="empleado.nss">
      </div>
      <div class="form-group col-md-4">
        <label class="control-label">Número de Fonacot</label>
        <input type="text" name="num_fonacot" id="nfonacot" class="form-control" placeholder="Número de fonacot" ng-model="empleado.num_fonacot">
      </div>
      <div class="form-group col-md-4">
        <label class="control-label">Número de ISSSTE</label>
        <input type="text" name="num_issste" id="nissste" class="form-control" placeholder="Número de ISSSTE" ng-model="empleado.num_issste">
      </div>
    </div>
    <legend class="text-muted">Pago</legend>
    <div class="row">
      <div class="form-group col-md-4">
        <label class="control-label">Tipo de Pago*</label>
        <select name="tipo_pago" id="tipo_pago" class="form-control" ng-model="empleado.tipo_pago" required ng-change="validapago()">
          <option value="0">Deposito bancario</option>
          <option value="1">Cheque</option>
        </select>
      </div>

      <div class='form-group col-md-4' ng-show="empleado.tipo_pago==0">
        <label>Banco</label>
        {!! Form::select('banco',$bancos,null,array('id'=>"banco",'class'=>'form-control','ng-model'=>'empleado.banco','ng-required'=>"empleado.tipo_pago==0")) !!}
      </div>
      <div class="form-group col-md-4" ng-show="empleado.tipo_pago==0">
        <label class="control-label">Cuenta</label>
        <input type="text" name="cuenta" id="cuenta" class="form-control" placeholder="Número de cuenta bancaria" ng-model="empleado.cuenta" minlength="10" maxlength="16" ng-disabled="!empleado.banco" solonumeros>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-4" ng-show="empleado.tipo_pago==0">
        <label class="control-label">Cuenta CLABE</label>
        <input type="text" name="cuentac" id="cuentac" class="form-control" placeholder="Número de cuenta CLABE" ng-model="empleado.cuentaclabe" minlength="18" maxlength="18" ng-disabled="!empleado.banco" solonumeros>
      </div>
    </div>

      @if(!isset($editar))
      <fieldset>
        <legend class="text-muted">Datos de la plaza</legend>
        <div class="row">
          <div class="form-group col-md-3">
            <label class="control-label">Número de empleado*</label>
            <input type="text" name="num_empleado" id="num_empleado" class="form-control" required maxlength="10" ng-model="empleado.num_empleado" ng-change="cargo.num_empleado=empleado.num_empleado" MAYUS>
          </div>
        </div>
      <div class="row">
        <div class="form-group col-md-2">
          <label class="control-label">Clave*</label>
          <input type="text" id="ads" ng-model="cargo.adscripcion" class="form-control txt" required>
        </div>
        <div class="form-group col-md-10">
          <label class="control-label">Adscripción*</label>
              <select name="adscripcion" id="idads" class="form-control" ng-model="cargo.adscripcion" required>
                <option value="" disabled selected style='display:none;'>-- Seleccione --</option>
                @foreach($adscripciones as $ads)
                @if($ads->id==$ads->agrupador)
                <?php $agrupador = $ads->agrupador ?>
                <optgroup label="{{ substr($ads->id,0,3) }}">
                  @endif
                  <option value="{{ $ads->id }}">{{ $ads->id." ".$ads->adscripcion }}</option>
                  @if(isset($agrupador))
                  @if($ads->agrupador!=$agrupador)
                </optgroup>
                <?php $agrupador = null; ?>
                @endif
                @endif
                @endforeach
              </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label">Plaza*</label>
        <div class="row">
          <div class="col-md-2">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#selectPlaza"><i class="fa fa-list"></i> Seleccione</button>
          </div>
          <div class="col-md-8 ">
            <span class="form-control">
              <span ng-show="plaza.clave"><b><% plaza.clave%></b> -- <%plaza.descripcion%></span>
              <span ng-show="!plaza.clave" class="text-muted"> De clic en el botón para seleccionar</span>
            </span>
          </div>
          <div class="col-md-2" ng-show="empleado.tipo=='B'">
            <div class="checkbox">
              <label>
                <input type="checkbox" ng-model="cargo.ocupacion">
                <b>Interinato</b>
              </label>
            </div>

          </div>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-4">
          <label class="control-label">Fecha de inicio*</label>
          <div class="input-group date">
            <input type="text" class="form-control" placeholder="aaaa/mm/dd" title="Inicio de labores en el cargo" name="finicio" id="finicio" ng-model="cargo.inicio" required><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
          </div>
        </div>
        <div class="form-group col-md-4">
          <label class="control-label">Horario</label>
          <select name="horario" id="horario" class="form-control" ng-model="horario">
            <option value="">-- Seleccione --</option>
            @foreach($horarios as $h)
            @if(isset($h->hora_salida_comida))
            <option value="{{ $h->id }}">{{ date('H:i',strtotime($h->hora_entrada))." a ".date('H:i',strtotime($h->hora_salida_comida))." hrs. -- ".date('H:i',strtotime($h->hora_entrada_comida))." a ".date('H:i',strtotime($h->hora_salida)).' hrs.' }}</option>
            @else
            <option value="{{ $h->id }}">{{ date('H:i',strtotime($h->hora_entrada))." a ".date('H:i',strtotime($h->hora_salida))." hrs." }}</option>
            @endif
            @endforeach
          </select>
        </div>
      </div>
      <!--
      <div class="row">
        <div class="form-group col-md-3">
          <label class="control-label">Sueldo bruto mensual*</label>
          <div class="input-group">
            <span class="input-group-addon">$</span>
            <input type="text" flotante name="sueldo" id="sueldo" class="form-control" ng-model="sueldo.sueldo_bruto" required ng-disabled="empleado.tipo!='H'" ng-blur="compruebaSueldo(sueldo.sueldo_bruto)" placeholder="<%sph%>">
          </div>
        </div>
        <div class="form-group col-md-4" ng-show="empleado.tipo!='H'">
          <label class="control-label">Compensación garantizada</label>
          <div class="input-group">
            <span class="input-group-addon">$</span>
            <input type="text" flotante name="compensacion" id="compensacion" class="form-control" ng-model="sueldo.compensacion" disabled="disabled">
          </div>
        </div>
      </div>
      -->
    @endif
  </fieldset>
  </div>
