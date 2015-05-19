<?php namespace Sirhum;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model {

	//clase para bitacora de actividades
	protected $fillable = ['idsesion','idaccion','tabla','complemento','idobjeto','objeto'];
	protected $table='logs';

}
