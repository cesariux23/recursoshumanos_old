<?php

class CatalogoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /catalogo
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		/*
		if(isset($_GET['RFC'])){
			$empleados = Empleado::where('rfc','like','%'.$_GET['RFC'].'%')->
						orderBy('estado')->
						orderBy('estado')->
						get();
			$busqueda=true;
		}
		else{
			$empleados = Empleado::orderBy('estado')->
									orderBy('estado')->
									get();;
		}
		*/	
		$plazas=Plazas::all();
		$bancos=Bancos::all();
		$percepciones=CatPercepciones::all();
		$deducciones=CatDeducciones::all();
		$adscripciones=Adscripcion::all();
		$tabulador=Tabulador::all();
		return View::make('catalogos.index',compact('plazas','bancos','adscripciones','percepciones','deducciones', 'tabulador'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /catalogo/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /catalogo
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /catalogo/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /catalogo/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /catalogo/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /catalogo/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}