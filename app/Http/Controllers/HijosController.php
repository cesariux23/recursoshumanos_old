<?php

class HijosController extends \BaseController {

	/**
	 * Display a listing of hijos
	 *
	 * @return Response
	 */
	public function index()
	{
		$hijos = Hijos::all();

		return View::make('hijos.index', compact('hijos'));
	}

	/**
	 * Show the form for creating a new hijo
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('hijos.create');
	}

	/**
	 * Store a newly created hijo in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();
		$h=Hijos::create($data);
		Logs::create(array('idsesion'=>Session::getId(),'idaccion'=>31,'tabla'=>'Hijos','idobjeto'=>$h->id,'complemento'=>'RFC empleado:'.$data['rfc_empleado']));
		Notification::success('Registrado correctamente.');
		return Redirect::back();
	}

	/**
	 * Display the specified hijo.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$empleado=Empleado::find($id);
		$hijos=$empleado->hijos;
		return View::make('hijos.show', compact('empleado','hijos'));
	}

	/**
	 * Show the form for editing the specified hijo.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$hijo = Hijos::find($id);

		return View::make('hijos.edit', compact('hijo'));
	}

	/**
	 * Update the specified hijo in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$hijo = Hijos::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Hijo::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$hijo->update($data);

		return Redirect::route('hijos.index');
	}

	/**
	 * Remove the specified hijo from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Hijos::destroy($id);
		Notification::success('Registro borrado correctamente.');
	}

}
