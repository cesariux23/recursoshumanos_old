<?php namespace Sirhum\Http\Controllers;

use Sirhum\Http\Requests;
use Sirhum\Http\Controllers\Controller;

use Sirhum\Plazas;

class RestPlazasController extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /restadscripcion
	 *
	 * @return Response
	 */
	public function index()
	{
		//devuelve todas las plazas
		$plazas = Plazas::all();
		return json_encode($plazas);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /restadscripcion/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /restadscripcion
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /restadscripcion/{id}
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
	 * GET /restadscripcion/{id}/edit
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
	 * PUT /restadscripcion/{id}
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
	 * DELETE /restadscripcion/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
