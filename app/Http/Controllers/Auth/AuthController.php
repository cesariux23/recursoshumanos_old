<?php namespace Sirhum\Http\Controllers\Auth;

use Sirhum\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Http\Request;
use Session;
use Sirhum\Logs;
use Sirhum\Sesion;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	public function postLogin(Request $request)
{
    $this->validate($request, [
        'username' => 'required',
        'password' => 'required',
    ]);

    $credentials = $request->only('username', 'password');

    if ($this->auth->attempt($credentials, $request->has('remember')))
    {

        //return redirect()->intended($this->redirectPath());
        //Notification::success('Bienvenido');
		$sesion=Sesion::create(array('idusuario'=>$this->auth->user()->id));
		Session::put('sesion', $sesion->id);
		Logs::create(array('idsesion'=>Session::get('sesion'),'idaccion'=>11));
		return redirect('empleados');
    }

    return redirect($this->loginPath())
                ->withInput($request->only('username', 'remember'))
                ->withErrors([
                    'username' => 'Datos incorrectos.',
                ]);
}



	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

}
