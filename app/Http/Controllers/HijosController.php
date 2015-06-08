<?php namespace Sirhum\Http\Controllers;

use Session;
use Sirhum\Http\Requests;
use Sirhum\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Sirhum\Empleado;
use Sirhum\Hijos;
use Sirhum\Logs;

class HijosController extends Controller {

	/**
	 * Display a listing of hijos
	 *
	 * @return Response
	 */
	public function index()
	{
		$hijos = Hijos::all();

		return view('hijos.index', compact('hijos'));
	}

	/**
	 * Show the form for creating a new hijo
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('hijos.create');
	}

	/**
	 * Store a newly created hijo in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$data = $request->all();
		$h=Hijos::create($data);
		\DB::table('datos_personales')
            ->where('rfc', $h->rfc_empleado)
            ->update(array('hijos' => 1,'hijosmenores'=>1));
		Logs::create(array('idsesion'=>Session::get('sesion'),'idaccion'=>31,'tabla'=>'Hijos','idobjeto'=>$h->id,'complemento'=>'RFC empleado:'.$data['rfc_empleado']));
		flash()->success('Registrado correctamente.');
		return redirect()->back();
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
		return view('hijos.show', compact('empleado','hijos'));
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

		return view('hijos.edit', compact('hijo'));
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

		$validator = Validator::make($data = $request->all(), Hijo::$rules);

		if ($validator->fails())
		{
			return redirect()->back()->withErrors($validator)->withInput();
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
	public function destroy(Request $request, $id)
	{
		$hijo=Hijos::find($request->input('id'));
		$rfc=$hijo->rfc_empleado;
		Hijos::destroy($request->input('id'));
		//ajusta los valores de hijos a empleados
		$empleado=Empleado::find($rfc);
		if(count($empleado->hijos)==0){
			$empleado->datos->hijosmenores=0;
			$empleado->datos->save();
		}
		flash()->success('Registro borrado correctamente.');
		return redirect()->route('hijos.show',$rfc);
	}

}
