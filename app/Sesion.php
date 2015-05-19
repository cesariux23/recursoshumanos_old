<?php namespace Sirhum;

use Illuminate\Database\Eloquent\Model;

class Sesion extends Model {

	//Model de la tabla que almacena las sesiones
	protected $fillable = ['id','idusuario'];
	protected $table="sesion";
}
