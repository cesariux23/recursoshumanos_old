<?php namespace Sirhum;

use Illuminate\Database\Eloquent\Model;

class Adscripcion extends Model {

	//Adscripciones
	protected $table = 'cat_adscripcion';
    public $timestamps = false;

	public function empleados()
	{
		# code...
		return $this->hasMany('Sirhum\EmpleadoPlaza','adscripcion','id')->whereNotNull('fin');
	}

	public function getNumEmpleadosAttribute()
	{
		# code...
		return $this->empleados->count();
	}

}
