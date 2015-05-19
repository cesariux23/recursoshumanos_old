<?php namespace Sirhum;

use Illuminate\Database\Eloquent\Model;

class Hijos extends Model {
	protected $fillable = ['rfc_empleado','nombre','fecha_nac','curp'];
	protected $table="hijos";
}
