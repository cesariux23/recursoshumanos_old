<?php namespace Sirhum;

use Illuminate\Database\Eloquent\Model;

class Plaza extends Model {
	protected $fillable = ['id','zona_plaza'];
	public $incrementing = false;
	protected $table='plazas';
}
