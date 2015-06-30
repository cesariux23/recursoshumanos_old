<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function ()
{
	# code...
	return redirect()->route('empleados.index');
});

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);



//empleados
Route::resource('empleados', 'EmpleadosController');

//Catalogos
Route::resource('catalogos', 'CatalogosController');

//rest
Route::resource('restempleados', 'RestEmpleadosController');
Route::resource('restplazas', 'RestPlazasController');
Route::resource('resttabulador', 'RestTabuladorController');
Route::resource('nominas', 'NominasController');

//reportes
Route::resource('reportes', 'ReportesController');

//reportes
Route::resource('plazas', 'PlazasController');


//Solicitud Banco
Route::get('reportes/generarsolicitudbanco/{rfc}',	'ReportesController@generaSolicitudBanco');
Route::resource('hijos', 'HijosController');
