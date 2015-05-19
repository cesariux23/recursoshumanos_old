@extends('app')
@section('content')

<div class="container">
<?php
        $fecha=strtotime($empleado->fecha_nacimiento);
        $fecha_ingreso=strtotime($empleado->fecha_ingreso);
        $edad = (int)((time()-$fecha)/31556926);
        $meses =array("","Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $escolaridad=array('Primaria','Secundaria','Bachillerato','Licenciatura','Maestria','Doctorado');
        $tipo_e=['H'=>'HONORARIOS','B'=>'BASE','C'=>'CONFIANZA'];
        ?>
<div>
    <div class="pull-right hidden-print">
        <a href="{{ route('empleados.index') }}" class="btn btn-info"><i class="fa fa-chevron-left"></i> Volver</a>
        <a href="{{ route('empleados.edit',$empleado->rfc) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Editar datos personales</a>
        <a href="{{ route('hijos.show',$empleado->rfc) }}" class="btn btn-default"><i class="fa fa-users"></i> Editar hijos</a>
        <button type="submit" class="btn btn-primary" onclick="window.print()"><i class="fa fa-print"></i> Imprimir</button>
    </div>
    <h1>Cardex</h1>
    <hr class="hidden-print">
</div>
@include('flash::message')
<!-- contenedor-->
<div class="row">
    <div class="col-xs-3" id="datos">
        @if(isset($empleado->datos->foto))
        <div class="fondo_perfil">
            <img class="perfil" src="{{ asset( $empleado->datos->foto ) }}" id="foto">
        </div>
        @else
        <div class="fondo_perfil fondo_perfil_default">
            <img class="perfil perfil_default" src="{{ URL::asset('images/perfil.png') }}" id="foto">
            <p class="visible-print text-muted text-center">Sin Fotografia</p>
        </div>
        @endif
        <h3 class="text-muted hidden-print">{{$empleado->nombre." ".$empleado->paterno." ".$empleado->materno}}</h3>
        <h4 class="visible-print">{{$empleado->nombre." ".$empleado->paterno." ".$empleado->materno}}</h4>
        <div class="row">
            <p class="col-md-6">RFC<br><b>{{$empleado->rfc}}</b></p>
            @if(isset($empleado->homoclave))
                <p class="col-md-6">Homoclave<br><b>{{$empleado->homoclave}}</b></p>
            @endif
        </div>

        <p>CURP<br><b>{{$empleado->curp}}</b></p>
        <p>Fecha de nacimiento<br><b>{{strToUpper(date('d',$fecha).' de '.$meses[date('n',$fecha)].' de '.date('Y',$fecha)) }}</b></p>
        <div class="row">
            <p class="col-xs-6">Edad<br><b>{{$edad}} AÑOS</b></p>
            <p class="col-xs-6">Sexo<br><b>{{$empleado->sexo}}</b></p>
        </div>
        <p>Correo<br><b>{{$empleado->correo}}</b></p>
        @if(isset($empleado->tipo_sangre))
        <p>Tipo de sangre<br><b>{{$empleado->tipo_sangre}}</b></p>
        @endif
    </div>
    <div class="col-xs-9 col-xs-9 contenedor_datos">
        <div class="">
                <legend class="text-muted">Datos Personales</legend>
                    <div class="row">
                        <p class="col-md-5 col-xs-6">Dirección<br><b>{{$empleado->datos->direccion}}</b></p>
                        <p class="col-md-3 col-xs-6">Colonia<br><b>{{ $empleado->datos->colonia}}</b></p>
                        <p class="col-md-1 col-xs-2">C.P<br><b>{{$empleado->datos->cp }}</b></p>
                        <p class="col-md-3 col-xs-10">Municipio<br><b>{{$empleado->datos->catmunicipio->municipio }}</b></p>
                    </div>
                    <div class="row">
                        <p class="col-md-2 col-xs-6">Telefono de Casa<br><b>{{ $empleado->datos->tel_casa}}</b></p>
                        <p class="col-md-3 col-xs-6">Telefono de Celular<br><b>{{ $empleado->datos->tel_cel}}</b></p>
                        <p class="col-md-2 col-xs-2">Estado Civil<br><b>{{$empleado->datos->estado_civil==0? 'SOLTERO':'CASADO'}}</b></p>
                        @if($empleado->datos->estado_civil==1)
                            <p class="col-md-5 col-xs-10">Conyuge<br><b>{{ $empleado->datos->conyuge}}</b></p>
                        @endif
                    </div>
                    <div class="row">
                        <p class="col-md-3 col-xs-6">Escolaridad<br><b>{{strToUpper($escolaridad[$empleado->datos->escolaridad]) }}</b></p>
                        @if($empleado->datos->escolaridad>2)
                            <p class="col-md-3 col-xs-6">Licenciatura<br><b>{{ $empleado->datos->licenciatura }}</b></p>
                        @endif
                        @if($empleado->datos->escolaridad>3)
                            <p class="col-md-3 col-xs-6">Maestria<br><b>{{ $empleado->datos->maestria }}</b></p>
                        @endif
                        @if($empleado->datos->escolaridad>4)
                            <p class="col-md-3 col-xs-6">Doctorado<br><b>{{ $empleado->datos->doctorado }}</b></p>
                        @endif
                    </div>
                    @if(isset($empleado->datos->curriculum))
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Curriculum</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $empleado->datos->curriculum }}</td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Observaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @if(isset($empleado->datos->observaciones))
                                <td>{{ $empleado->datos->observaciones }}</td>
                                @else
                                <td class="text-muted">Ninguna observación.</td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                    @if(count($empleado->hijos)>0)
                    <legend class="text-muted">Hijos</legend>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>CURP</th>
                                <th>Nombre</th>
                                <th>Fecha de nacimiento</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($empleado->hijos as $h)
                            <tr>
                                <td>{{$h->curp}}</td>
                                <td>{{$h->nombre}}</td>
                                <td>{{$h->fecha_nac}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @endif

                 <div id="datospersonales">
                 <legend class="text-muted">Datos laborales</legend>
                    <div class="row">
                        <p class="col-xs-4">Tipo de Empleado<br><b>{{$tipo_e[$empleado->tipo] }}</b></p>
                        <p class="col-xs-4">Número de Empleado<br><b>{{ $empleado->num_empleado }}</b></p>
                        <p class="col-xs-4">Fecha de Ingreso<br><b>{{ date('d',$fecha_ingreso).'/'.strToUpper(substr($meses[date('n',$fecha_ingreso)],0,3)).'/'.date('Y',$fecha_ingreso) }}</b></p>
                    </div>
                    <div class="row">
                        <p class="col-xs-4">Tipo de Pago<br><b>{{ $empleado->tipo_pago==0? 'DEPOSITO BANCARIO':'CHEQUE' }}</b></p>
                        @if($empleado->tipo_pago==0)
                        <p class="col-xs-4">Banco<br><b>{{ $empleado->catbanco->banco}}</b></p>
                        <p class="col-xs-4">Cuenta<br><b>{{ $empleado->cuenta }}</b></p>
                        @endif
                    </div>


                <div>
                    <div class="pull-right">
                        <button class="btn btn-warning"> <i class="fa fa-edit"></i> Editar</button>   
                    </div>
                     <legend class="text-muted">Historial Laboral</legend>
                </div>
                <br>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Periodo</th>
                            <th>Adscripción</th>
                            <th>Plaza</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($empleado->datosLaborales as $dl)
                    <tr>
                        <td>{{$dl->inicio}} -- {{$dl->fin==null? 'Actualidad':$dl->fecha_ingreso }}</td>
                        <td>
                            {{$dl->catadscripcion->adscripcion}}
                            @if($dl->ocupacion==1)
                                <p><span class="label label-warning">Interinato</span></p>
                            @endif
                        </td>
                        <td>{{$dl->catplaza->descripcion}}</td>
                    </tr>


                    @endforeach

                    </tbody>
                </table>
                </div>

            </div>
        </div>

</div>

        @stop
