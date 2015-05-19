<?php

class NominasController extends \BaseController {


	/**
	 * Display a listing of nominas
	 *
	 * @return Response
	 */
	public function index()
	{
		$nominas = Nomina::all();
		// se determina la quincena actual
		// se saca el consecutivo de acuerdo al mes
		$q=date('n')*2;
		//si el dia es menor a 16, estamos en la primer quincena del mes
		if(date('j')<16)
			$q-=1;
		$actual= CatQuincena::find($q);
		$qnas=CatQuincena::all();
		//Busca el objeto quincena en la base de datos
		$quincena=Quincena::find(date('Y').str_pad($actual->id, 2, "0", STR_PAD_LEFT));
		//echo date('Y').str_pad($actual, 2, "0", STR_PAD_LEFT);
		return View::make('nominas.index', compact('nominas','qnas','actual','quincena'));
	}

	/**
	 * Show the form for creating a new nomina
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('nominas.create');
	}

	/**
	 * Store a newly created nomina in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		/*
		$validator = Validator::make($data = Input::all(), Nomina::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		*/

		$data = Input::all();
		//$quincena=$data['quincena'];
		//$data = Input::all();
		//$data['tipo']=(int)$data['tipo'];
		//se crea la quincena
		$quincena=new Quincena();
		$quincena->fill($data);
		$id=$quincena->anio.//$quincena->id_quincena;
		str_pad($quincena->id_quincena, 2, "0", STR_PAD_LEFT);
		//se marca como extraordinaria
		if($quincena->tipo==1){
			$id=$id.'E';									
		}
		//se guarda la quincena
		$quincena->id=$id;
		$quincena->save();

		Notification::success('Nomina <b>'.$quincena->id.'</b> iniciada correctamente.');
		return Redirect::route('nominas.show',$id);
		//var_dump($data);
	}

	/**
	 * Display the specified nomina.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$quincena = Quincena::find($id);
		//$empleados = DetalleEmpleado::whereNotNull('descripcion')->get();

		//var_dump($quincena->nomina);
		
		//$empleados=Nomina::where('quincena','=',$id)


		//Se calcula la quincena actual para compararla
		$actual=date('n')*2;
		//si el dia es menor a 16, estamos en la primer quincena del mes
		if(date('j')<16)
			$actual-=1;
		$actual=str_pad($actual, 2, "0", STR_PAD_LEFT);
		//identificador de la quincena actual
		$actual=date('Y').$actual;
		//Se calcula la parte entera del ID de la quincena
		$q=substr($id,0,6);
		//se valida que aplique en nomina
		if($actual==$q){
			//crea nomina
			foreach (EstatusNomina::whereNull('quincena')->get() as $e) {
			 	//insertar empleados a nomina
				$n=[];
				$n['empleado']=$e->id_asignacion;
				$n['rfc']=$e->ocupa;
				$n['quincena']=$id;
				Nomina::create($n);
			}
			//eliminas las baja
			foreach(BajasNomina::all() as $b){
				//se busca la nomina
				$n=Nomina::find($b->id);
				// se eliminan las percepciones y las deducciones de las bajas

				/*
				* Falta aun :P
				*/

				//se elimina la nomina
				$n->delete();
			}

			//marcar todas las percepciones como libres
			DB::table('percepciones')->update(array('qna_actual'=>null));
			

			// se marcan las percepciones actuales
			$query=DB::table('percepciones')->where('qna_inicio','<=',$id);
			
			//se actualizan las percepciones y las deducciones
			if($quincena->tipo==1){
			//asocia percepciones a la quincena activa (Extrahordinarias)
				$query->where('extraordinaria','=',1);

			}else{
				$query->Where('qna_fin','>=',$id);
			}
			$query->whereNull('qna_actual')
			->orWhereNull('qna_fin')
			->update(array('qna_actual'=>$id));


			// se calcula ISR y se actualiza la nomina
			//recorrer totales de nomina y actualizar ISR de empleados
			foreach (BaseGrabable::all() as $bg) {
				# se busca el rango de ISR
				$i=ISR::where('limite_inf','<=',$bg->base)
					->where('limite_sup','>=',$bg->base)
					->first();
				
				$exedente=$bg->base-$i->limite_inf;
				$impuesto_marginal=($exedente*$i->exedente)/100;
				$isr=$impuesto_marginal+$i->cuota_fija;
				$d=Deducciones::firstOrCreate(['iddeduccion'=>1,'empleado'=>$bg->empleado])
								->update(['monto'=>$isr,'qna_inicio'=>$id]);				
			}

			//marcar todas las deducciones como libres
			DB::table('deducciones')->update(array('qna_actual'=>null));
			// se marcan las deducciones actuales
			$query=DB::table('deducciones')->where('qna_inicio','<=',$id);
			//se actualizan las deducciones
			if($quincena->tipo==1){
			//asocia deducciones a la quincena activa (Extrahordinarias)
				$query->where('extraordinaria','=',1);

			}else{
				$query->Where('qna_fin','>=',$id);
			}
			$query->whereNull('qna_actual')
			->orWhereNull('qna_fin')
			->update(array('qna_actual'=>$id));


			
		}
		
		//limpio totales
		DB::table('nomina')->update(array('total_percepciones'=>null,'total_deducciones'=>null,'neto'=>null));
		// SE ACTUALIZAN LOS TOTALES EN PERCEPCIONES y DEDUCCIONES CON UN JOIN A LASS VISTAS
		DB::Table('nomina')
		->join('total_percepciones', 'total_percepciones.empleado', '=', 'nomina.empleado')
		->join('total_deducciones', 'total_deducciones.empleado', '=', 'nomina.empleado')
		->where('nomina.quincena', $quincena->id)
		->update(array('nomina.total_percepciones' => DB::Raw('`total_percepciones`.`total`'), 'nomina.total_deducciones' => DB::Raw('`total_deducciones`.`total`')));

		$total_per=DB::table('nomina')->sum('total_percepciones');
		$total_ded=DB::table('nomina')->sum('total_deducciones');
		//DB::Table('nomina')->update(array('neto'=>DB::Raw('`total_percepciones`')-DB::Raw('`total_deducciones`') ));
		DB::update(DB::raw('UPDATE nomina SET neto = total_percepciones - total_deducciones'));
		$total_neto=DB::table('nomina')->sum('neto');


		//DEDUCCIONES
		/*
		DB::Table('nomina')
		->join('total_deducciones', 'total_deducciones.empleado', '=', 'nomina.empleado')
		->where('nomina.quincena', $quincena->id)
		->update(array('nomina.total_deducciones' => DB::Raw('`total_deducciones`.`total`')));
	*/
		//$total_ded=DB::table('nomina')->sum('total_deducciones');


		
		$empleados=$quincena->nomina->load('datos','puesto');
		return View::make('nominas.show', compact('quincena','empleados','total_per','total_ded','total_neto'));
		
		
	}

	/**
	 * Show the form for editing the specified nomina.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$nomina = Nomina::find($id);
		$percepciones=Percepciones::where('qna_actual','=',$nomina->quincena)
		->where('empleado','=',$nomina->empleado)
		->get();
		$deducciones=Deducciones::where('qna_actual','=',$nomina->quincena)
		->where('empleado','=',$nomina->empleado)
		->get();
		return View::make('nominas.edit', compact('nomina','percepciones','deducciones'));
	}

	/**
	 * Update the specified nomina in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$nomina = Nomina::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Nomina::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$nomina->update($data);

		return Redirect::route('nominas.index');
	}

	/**
	 * Remove the specified nomina from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Nomina::destroy($id);

		return Redirect::route('nominas.index');
	}

}
