<?php namespace Sirhum\Http\Controllers;

use Sirhum\Http\Requests;
use Sirhum\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Sirhum\Plazas;
use Sirhum\Adscripcion;

class CatalogosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//regresa el catalogo correspondiente
		$catalogo=$id;
		switch ($id) {
			case 'plazas':
				# code...
				$datos=[];
				$datos['H']=Plazas::where('tipo','H')->orderBy('clave', 'ASC')->get();
				$datos['B']=Plazas::where('tipo','B')->orderBy('clave', 'ASC')->get();
				$datos['C']=Plazas::where('tipo','C')->orderBy('clave', 'ASC')->get();
				break;
			case 'adscripciones':
				$datos=Adscripcion::paginate();
				$datos->setPath('public/catalogos/adscripciones');
			default:
				# code...
				break;
		}
		return view('catalogos.show',compact('catalogo','datos'));
	}

	/**
	 * Show the form for editing the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
