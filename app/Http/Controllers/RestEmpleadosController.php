<?php namespace Sirhum\Http\Controllers;


use Sirhum\Http\Requests;
use Sirhum\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Sirhum\Empleado;

class RestEmpleadosController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /restempleados
	 *
	 * @return Response
	 */
	public function index()
	{
		//devuelve todos los empleados
		$empleados = DetalleEmpleado::all();
		return json_encode($empleados);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /restempleados/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /restempleados
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /restempleados/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		//devuelve el empleado
		$empleado = Empleado::find($id);
		if(isset($empleado))
			return json_encode($empleado);
		else
			return 0;
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /restempleados/{id}/edit
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
	 * PUT /restempleados/{id}
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
	 * DELETE /restempleados/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
