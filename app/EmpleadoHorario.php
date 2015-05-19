<?php namespace Sirhum;

use Illuminate\Database\Eloquent\Model;

class EmpleadoHorario extends Model {
	protected $fillable = ['idhorario','empleado'];
	protected $table="horario_empleado";
}
