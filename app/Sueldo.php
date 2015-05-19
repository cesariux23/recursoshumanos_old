<?php namespace Sirhum;

use Illuminate\Database\Eloquent\Model;

class Sueldo extends Model {
	protected $fillable = ['empleado','id_tabulador','sueldo_bruto','compensacion','inicio','sueldo_qna','compensacion_qna'];
	protected $table='sueldo';
}
