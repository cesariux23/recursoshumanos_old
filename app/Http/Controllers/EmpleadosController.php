<?php namespace Sirhum\Http\Controllers;

use DateTime;

use Sirhum\Http\Requests;
use Sirhum\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Session;
use Sirhum\Logs;
use Sirhum\Adscripcion;
use Sirhum\Empleado;
use Sirhum\Hijos;
use Sirhum\EmpleadoPlaza;
use Sirhum\DetalleEmpleado;
use Sirhum\DatosPersonales;
use Sirhum\Sueldo;
use Sirhum\Bancos;
use Sirhum\Municipios;
use Sirhum\Horarios;
use Sirhum\Plazas;
use Sirhum\Plaza;
use Sirhum\PlazasAutorizadas;
use Sirhum\EstatusPlaza;
use Sirhum\PercepcionesAuto;
use Sirhum\DeduccionesAuto;
use Sirhum\EmpleadoHorario;





class EmpleadosController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of empleados
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{	//log
		Logs::create(array('idsesion'=>Session::get('sesion'),'idaccion'=>20,'tabla'=>'empleado'));
		$adscripciones = [''=>'-- Todas las adcripciones --']+Adscripcion::lists('adscripcion','id');
		$empleados=DetalleEmpleado::rfc($request->input('rfc'))->nombre($request->input('nombre'))->adscripcion($request->input('adscripcion'))->paginate(20);
		$empleados->setPath('public/empleados');
		return view('empleados.index',compact('adscripciones','empleados'));
	}

	/**
	 * Show the form for creating a new empleado
	 *
	 * @return Response
	 */
	public function create()
	{
		Logs::create(array('idsesion'=>Session::get('sesion'),'idaccion'=>21,'tabla'=>'empleado'));

		$bancos=Bancos::all();
		$municipios=[''=>'--seleccione--']+Municipios::lists('municipio','id');
		$adscripciones=Adscripcion::all();
		$horarios=Horarios::all();
		$plazas=Plazas::all();
		return view('empleados.create', compact('bancos','municipios', 'adscripciones','plazas','horarios'));
	}

	/**
	 * Store a newly created empleado in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		/*$validator = Validator::make($data = Input::all(), Empleado::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}*/


		//se recuperan los datos del empleado
		$empleado=json_decode($request->get('empleado'));
		//se convierten las fechas al formato de mysql
		//$fecha=new DateTime($empleado->fecha_nacimiento);
		//$empleado->fecha_nacimiento=$fecha->format('Y-m-d');
		//$fecha=new DateTime($empleado->fecha_ingreso);
		//$empleado->fecha_ingreso=$fecha->format('Y-m-d');

		//se guarda el empleado
		Empleado::create((array)$empleado);

		//log
		Logs::create(array('idsesion'=>Session::get('sesion'),'idaccion'=>31,'tabla'=>'Empleado','idobjeto'=>$empleado->rfc));
		//se recuperan los datos generales
		//$datos=json_decode($request->get('datos'));
		$datos=(object)$request->get('datos');
		$datos->rfc=$empleado->rfc;
		//se sube la foto
		if($request->hasFile('foto')){
			$file = $request->file("foto");
			$extension = $request->file('foto')->getClientOriginalExtension();
			$file->move("images/fotos",$empleado->rfc.".".$extension);
			$datos->foto="images/fotos/".$empleado->rfc.".".$extension;
		}
		//se guardan los datos generales
		DatosPersonales::create((array)$datos);
		//log
		Logs::create(array('idsesion'=>Session::get('sesion'),'idaccion'=>41,'tabla'=>'Datos personales','idobjeto'=>$empleado->rfc));
		//se busca el id de la plaza
		# se carga la zona
		$zona=$request->get('zona_plaza');

		//se recuperan los datos de la plaza
		$plaza=json_decode($request->get('cargo'));

		//Se asigna el id de la plaza
		$plaza->id_plaza=$this->buscaPlaza($zona);
		//se guardan los datos en empleado_plaza
		$registro=EmpleadoPlaza::create((array)$plaza);
		//log
		Logs::create(array('idsesion'=>Session::get('sesion'),'idaccion'=>41,'tabla'=>'Cargo','idobjeto'=>$registro->id,'complemento'=>'RFC: '.$empleado->rfc.', Plaza: '.$plaza->clave_plaza.', Adscripcion: '.$plaza->adscripcion));
		//se recuperan los datos del sueldo
		$sueldo=json_decode($request->get('sueldo_emp'));
		//se guarda el registro, se envia la fecha de ingreso al instituto
		$this->asignaSueldo($sueldo, $registro, $empleado->fecha_ingreso);
		###########
		//calcula las perseciones que tienen los empleados por default
		$this->calculaPercecionesAuto($registro, $empleado->fecha_ingreso);

		//calcula las deducciones que tienen los empleados por default
		$this->calculaDeduccionesAuto($registro, $empleado->fecha_ingreso);

		/*****/
		//registra hijos
		foreach (json_decode($_POST['hijos']) as $h) {
			$h->rfc_empleado=$empleado->rfc;
			$h2=Hijos::create((array)$h);
			Logs::create(array('idsesion'=>Session::get('sesion'),'idaccion'=>41,'tabla'=>'Hijos','idobjeto'=>$h2->id,'complemento'=>'RFC empleado:'.$empleado->rfc));

		}

		//asigna horario
		if($request->get('horario')!= ''){
			$hor=EmpleadoHorario::create(array('empleado'=>$registro->id,'idhorario'=>$request->get('horario')));
			Logs::create(array('idsesion'=>Session::get('sesion'),'idaccion'=>41,'tabla'=>'Horario','idobjeto'=>$hor->id,'complemento'=>'RFC: '.$empleado->rfc));
		}

		//se notifica y redirecciona
		flash()->success('Registrado correctamente.');
		return redirect()->route('empleados.show',$empleado->rfc);
	}

	/**
	 * Display the specified empleado.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$empleado = Empleado::findOrFail($id);
		Logs::create(array('idsesion'=>Session::get('sesion'),'idaccion'=>22,'tabla'=>'empleado','idobjeto'=>$id));
		return view('empleados.show', compact('empleado'));
	}

	/**
	 * Show the form for editing the specified empleado.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		Logs::create(array('idsesion'=>Session::get('sesion'),'idaccion'=>23,'tabla'=>'empleado','idobjeto'=>$id));
		$empleado = Empleado::find($id);
		$municipios=Municipios::all()->lists('municipio','id');
		$bancos=Bancos::all()->lists('banco','id');
		return view('empleados.edit', compact('empleado','municipios','bancos'));
		//var_dump($empleado);
	}

	/**
	 * Update the specified empleado in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$empleado = Empleado::findOrFail($id);
		$data = $request->all();
		/*
		$validator = Validator::make($data = Input::all(), Empleado::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		*/

		$empleado->update($data);
		//se sube la foto
		$datos=$data['datos'];
		if($request->hasFile('foto')){
			$file = $request->file("foto");
			$extension = $request->file('foto')->getClientOriginalExtension();
			$file->move("images/fotos",$empleado->rfc.".".$extension);
			$datos['foto']="images/fotos/".$empleado->rfc.".".$extension;
		}

		$empleado->datos->update($datos);
		flash()->success('Actualizado correctamente.');
		return redirect()->route('empleados.show',$id);
	}

	/**
	 * Remove the specified empleado from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Empleado::destroy($id);

		return redirect()->route('empleados.index');
	}



	/**
	*Busca y/o genera el id de la plaza para asignar
	* @param  array Sueldo,  objeto Empleado, date fecha (ingreso)
	**/

	public function asignaSueldo($sueldo,$empleado, $fecha=null)
	{
		//se calcula el sueldo quincenal
		$sueldo_qna=$sueldo->sueldo_bruto/2;
		$sueldo->sueldo_qna=$sueldo_qna;
		$sueldo->sueldo_dia=$sueldo_qna/15;

		if(isset($sueldo->compensacion)){
			//se calcula la compensacion quincenal
			$compensacion_qna=$sueldo->compensacion/2;
			$sueldo->compensacion_qna=$compensacion_qna;
			$sueldo->compensacion_dia=$compensacion_qna/15;
		}
		//Formato de la fecha
		$finicio=new DateTime($empleado->inicio);
		// la fecha de inicio de la vigencia es la misma que la de inicio en el puesto
		$sueldo->inicio=$finicio->format('Y-m-d');
		//se vincula el id
		$sueldo->empleado=$empleado->id;

		$hoy=new DateTime();
		// se cancelan todos  los sueldo que tenga vinculados el empleado
		foreach (Sueldo::where('empleado','=',$empleado->id)->whereNull('fin') as $s) {
			//se asigna la fecha de fin = hoy
			$s->fin=$hoy()->format('Y-m-d');
			$s->save();
		}

		//se guarda el nuevo sueldo
		$su=Sueldo::create((array)$sueldo);
		//log
		Logs::create(array('idsesion'=>Session::get('sesion'),'idaccion'=>41,'tabla'=>'Sueldo','idobjeto'=>$su->id,'complemento'=>'tabulador'));

		$actual=$this->calculaQuincena();
		if(isset($fecha)){
			//identificador de la quincena de inicio
				$inicio=$this->calculaQuincena(new DateTime($fecha));

			//si las quincenas son iguales entonces se calcula diferencia
				if($actual==$inicio){
					$p=$this->calculaProporcional(new DateTime($fecha));
				//si existen diferencias se calcula el proporcional y se agrega a las percepciones
					if($p>0){
					//sueldo
						$empleado->createPercepcion(1,$sueldo_qna,$actual,$p);
					if(isset($compensacion_qna)){
						//Compensacion
						$empleado->createPercepcion(2,$compensacion_qna,$actual,$p);
					}
					// se incrementa la quincena para programar el sueldo quincenal las siguentes quincenas
					$actual+=1;
				}

			}
		}
		//si no existen diferencias o ya se crearon en la base de datos las percepciones
		//se programan  las percepciones quincenales
		//se agrega el el sueldo a las percepciones

		//sueldo
		$empleado->createPercepcion(1,$sueldo_qna,$actual);
		if(isset($compensacion_qna)){
			//se agrega la compensacion
			$empleado->createPercepcion(2,$compensacion_qna,$actual);
		}
	}


	public function calculaPercecionesAuto($empleado, $fecha=null)
	{
		// se determinan las percepciones que aplican a determinado tipo de empleado
		/*
		switch ($empleado->tipo) {
			case 'B':
				# base
				$percepciones=PercepcionesAuto::where('base','=',1)->get();
				break;
			case 'C':
				# code...
				$percepciones=PercepcionesAuto::where('confianza','=',1)->get();
				break;
			case 'H':
				# code...
				$percepciones=PercepcionesAuto::where('honorario','=',1)->get();
				break;
		}*/

		$percepciones=PercepcionesAuto::where('aplica','like','%'.$empleado->tipo.'%')->get();
		$p=0;
		$actual=$this->calculaQuincena();
		$referencia=$this->calculaQuincena(new DateTime($fecha));
		if($actual==$referencia)
			//se determina si existe un proporcional
			$p=$this->calculaProporcional(new DateTime($fecha));
		//asigna percepciones por default
		foreach ($percepciones as $per) {
			#quincena en la que se aplica
			$a=$actual;

			#nivel del empleado
			$ne=$empleado->catPlaza->nivel;
			//se recuperan los niveles a los que aplican
			$nivel=json_decode($per->nivel);
			//se valida que aplique al nivel
			if(isset($nivel)){
				$aplica=false;
				if(in_array($ne, $nivel))
					$aplica=true;
			}else{
				$aplica=true;
			}
			if($aplica){
				if(isset($per->unidad)){
				//se calcula el valor para la percepcion
				switch ($per->id) {
					//cuota sindical
					case '5':
						# code...
						$valor=($empleado->sueldo->sueldo_qna*$per->valor)/100;
						$per->valor=$valor;
						break;

					default:
						# code...
						break;
				}
			}
				//si existe un proporcional y el monto es mayor a 0
				if($p>0 && $per->valor>0){
					//se genera la percepcion
					$empleado->createPercepcion($per->idpercepcion,$per->valor,$a,$p);
					//se incrementa la quincena
					$a+=1;
				}
				//se programa la percepcion
				$empleado->createPercepcion($per->idpercepcion,$per->valor,$a);
			}
		}



	}


	public function calculaDeduccionesAuto($empleado, $fecha=null)
	{
		// se determinan las percepciones que aplican a determinado tipo de empleado
		/*
		switch ($empleado->tipo) {
			case 'B':
				# base
				$percepciones=PercepcionesAuto::where('base','=',1)->get();
				break;
			case 'C':
				# code...
				$percepciones=PercepcionesAuto::where('confianza','=',1)->get();
				break;
			case 'H':
				# code...
				$percepciones=PercepcionesAuto::where('honorario','=',1)->get();
				break;
		}*/

		$deducciones=DeduccionesAuto::where('aplica','like','%'.$empleado->tipo.'%')->get();
		$p=0;
		$actual=$this->calculaQuincena();
		$referencia=$this->calculaQuincena(new DateTime($fecha));
		if($actual==$referencia)
			//se determina si existe un proporcional
			$p=$this->calculaProporcional(new DateTime($fecha));
		//asigna percepciones por default
		foreach ($deducciones as $ded) {
			#quincena en la que se aplica
			$a=$actual;

			#nivel del empleado
			$ne=$empleado->catPlaza->nivel;
			//se recuperan los niveles a los que aplican
			$nivel=json_decode($ded->nivel);
			//se valida que aplique al nivel
			if(isset($nivel)){
				$aplica=false;
				if(in_array($ne, $nivel))
					$aplica=true;
			}else{
				$aplica=true;
			}
			if($aplica){
				//si existe un proporcional y el monto es mayor a 0 y si la percepcion es proporcional
				if($p>0 && $ded->valor>0 && $ded->proporcional){
					//se genera la percepcion
					$empleado->createDeduccion($ded->iddeduccion,$ded->valor,$a,$p);
					//se incrementa la quincena
					$a+=1;
				}
				//se programa la percepcion
				$empleado->createDeduccion($ded->iddeduccion,$ded->valor,$a);
			}
		}



	}

	/**
	 * Muestra los hijos del empleado.
	 *
	 * @param  string  $id
	 * @return Response
	 */
	public function hijos($id)
	{
		# code...
		$empleado=Empleado::find($id);
		$hijos=$empleado->hijos;
		return view('empleados.hijos', compact('empleado','hijos'));

	}

	public function buscaPlaza($id)
	{
		# code...
		$autoriadas=PlazasAutorizadas::find($id);
		//se busca la primera disponible
		$idplaza=EstatusPlaza::where('zona_plaza','=',$id)->whereNull('ocupa')->first();
		//si no hay libre se crea
		if(!isset($idplaza)){
			# se cuentan los ids creados
			$plazas_creadas=EstatusPlaza::where('zona_plaza','=',$id)->count();
			//se crea una nueva
			$idplaza=new Plaza;
			$idp=$plazas_creadas+1;
			$idp=$id.str_pad($idp, 3, "0", STR_PAD_LEFT);
			$idplaza->id=$idp;
			$idplaza->zona_plaza=$id;
			$idplaza->save();
		}
		return $idplaza->id;
	}


	/**
	 * Calcula la quincena en la que esta una fecha especifica.
	 *
	 * @param  DateTime  $fecha
	 * @return Response
	 */
	public function calculaQuincena($fecha=null)
	{
		if(!isset($fecha)){
			$fecha=new DateTime();
		}
		//dia del mes de acuerdo a la fecha
		$d=$fecha->format('j');
		// se calcula la quincena
		$qna=$fecha->format('n')*2;
		//si el dia es menor a 16, estamos en la primer quincena del mes
		if($fecha->format('j')<16)
			$qna-=1;
		else{
			// estamos en la segunda
			$u=$fecha->format('t');
			//si es el ultimo dia de la quincena
			//se agrega al siguiente ejercicio
			if($d==$u){
				$qna+=1;
			}
		}
		//identificador de la quincena
		$quincena=$fecha->format('Y').$qna;
		return $quincena;
	}

	/**
	 * Calcula el proporcional de acuerdo a una fecha.
	 *
	 * @param  DateTime  $fecha
	 * @return Response
	 */
	public function calculaProporcional($fecha)
	{
		//quincena relativa al calculo del proporcional
		$quincena=$this->calculaQuincena($fecha);
		//se inicializa el proporcional en 0
		$p=0;
		//Se validan los dias
		$d=$fecha->format('j');
		// se determina si es la primera o la segunda quincena
		$q=$quincena%2;
		//para la primera
		if($q==1){
			if($d>1 && $d<15)
				//se calcula la diferencia de dias
				$p=15-$d;
		}
		//para la segunda quincena
		else{
			//Se determina el ultimo dia
			$u=$fecha->format('t');
			//se resta 1 cuando el ultimo dia es 31
			if($u==31)
				$u-=1;
			if($d>16 && $d<$u)
				//se calcula la diferencia de dias, se ajusta aumentando 1
				$p=($u-$d)+1;
		}
		return  $p;
	}
}
