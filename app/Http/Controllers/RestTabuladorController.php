<?php namespace Sirhum\Http\Controllers;

use Sirhum\Http\Requests;
use Sirhum\Http\Controllers\Controller;

use Sirhum\Tabulador;

class RestTabuladorController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /resttabuladorcontroller
	 *
	 * @return Response
	 */
	public function index()
	{
		//devuelve todos los sueldos vigentes
		$tabulador = Tabulador::whereRaw('fin is null')->get();
		return json_encode($tabulador);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /resttabuladorcontroller/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /resttabuladorcontroller
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /resttabuladorcontroller/{id}
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
	 * GET /resttabuladorcontroller/{id}/edit
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
	 * PUT /resttabuladorcontroller/{id}
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
	 * DELETE /resttabuladorcontroller/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
