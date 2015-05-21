@extends('app')
@section('content')

<div ng-controller="empleadosctl" class="container">
  <div>
    <div class="pull-right">
      <a href="{{ route('empleados.create') }}" class="btn btn-primary"><i class="fa fa-user-plus"></i> Registrar</a>
    </div>
    <h1>Empleados</h1>
  </div>

  <div class="well">
      {!! Form::model(Request::all(),array('route' => 'empleados.index', 'method' => 'GET')) !!}
      <legend>Busqueda</legend>
      <div class="row">
        <div class=" col-md-2">
          <input type="text" class="form-control" placeholder="RFC" name="rfc" ng-model="b.rfc">
        </div>
        <div class=" col-md-4">
          <input type="text" class="form-control" placeholder="Nombre" name="nombre" ng-model="b.nombre">
        </div>
        <div class="col-md-5">
          <select type="text" class="form-control" name="adscripcion" ng-model="b.id_adscripcion">
            <option value="">-- Todas las adscripciones --</option>
            @foreach($adscripciones as $a)
            <option value="{{$a->id}}">{{$a->adscripcion}}</option>
            @endforeach
          </select>
        </div>
        <div>
          <button class="btn btn-danger" type="button" ng-show="lista=(empleados| filter:b); lista.length<empleados.length" ng-click="b=null"><i class="fa fa-times"></i> Limpiar</button>
          <button type="submit" class="btn btn-success">Buscar</button>
        </div>
      </div>
    {!!Form::close()!!}
  </div>
  <div class="alert" ng-show="lista.length<empleados.length" ng-class="{'alert-warning':lista.length==0,'alert-info':lista.length>0}">
    <div ng-show="lista.length==0">
      <h3>Resultados</h3>
      <p>No se encontraron coincidencias.</p>
    </div>
    <p ng-show="lista.length>0">Se encontraron <b><%lista.length%></b> coincidencias.</p>
  </div>

  @if($empleados->total()==0)
  <div class="alert alert-warning">
    <h3>Resultados</h3>
    <p>No se encontraron resultados.</p>
  </div>
  @else
  <p>
    <b>{{$empleados->total()}}</b> empleado(s).
  </p>
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Puesto</th>
        <th width="180px">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($empleados as $e)
      <tr>
        <td>
          {{ $e->nombre_completo }}
          <br>
          <b>{{ $e->rfc }}</b>

        </td>
        <td>
          {{ $e->descripcion }}
          <br>
          <span class="text-muted">{{ $e->adscripcion }}</span>
        </td>
        <td>
          <a href="{{ route('empleados.show',$e->rfc) }}" class="btn btn-default" title="Ver información"><span class="fa fa-user"></span></a>
          <a href="{{ route('empleados.edit',$e->rfc) }}" class="btn btn-info" title="Editar datos personales"><span class="fa fa-edit"></span></a>
          <button type="button" class="btn btn-danger" title="Borrar" ng-show="e.estado==0"> <i class="fa fa-times-circle"></i> Borrar</button>
          <button type="button" class="btn btn-success" title="Autorizar" ng-show="e.estado==0"> <i class="fa fa-refresh fa-spin"></i> Autorizar</button>
          <a class="btn btn-danger" ng-show="e.estado==1" data-toggle="modal" href='#baja' ng-click="darBaja(e)"> <i class="fa fa-minus-circle"></i> Baja</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endif



  <div class="modal fade" id="baja">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Baja de empleado</h4>
        </div>
        <div class="modal-body">
          <div class="alert alert-warning">
            <div class="row">
              <div class="col-md-1">
                <i class="fa fa-warning fa-3x"></i>
              </div>
              <div class="col-md-11">
                <p>Es importante que verifique que el empleado que va a dar de baja sea el correcto.
                  <br>
                  Se requiere que especifique el motivo por el cual se da de baja.</p>
                </div>
              </div>
            </div>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>RFC</th>
                  <td><%baja.rfc%></td>
                </tr>
                <tr>
                  <th>Nombre completo</th>
                  <td><%baja.nombre_completo%></td>
                </tr>
                <tr>
                  <th>Plaza</th>
                  <td><%baja.descripcion%></td>
                </tr>
                <tr>
                  <th>Adscripción</th>
                  <td><%baja.adscripcion%></td>
                </tr>
              </table>
              <div class="form-group  well">
                <label for="input" class="control-label">Motivo de la baja:</label>
                <textarea name="motivo" id="motivo" class="form-control" value="" required="required" ng-model="motivo"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
              <button type="button" class="btn btn-danger" ng-disabled="!motivo"><i class="fa fa-minus-circle" ></i> Dar de baja</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

    </div>
    @endsection

    @section('scripts')
    <script src="{{ URL::asset('js/controllers/empleados/index.js') }}"></script>
    @endsection
