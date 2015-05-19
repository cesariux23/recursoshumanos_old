<?php namespace Sirhum;

use Illuminate\Database\Eloquent\Model;

class Percepciones extends Model {
	protected $fillable = ['empleado','idpercepcion'];
	public function percepcion()
    {
        return $this-> belongsTo('CatPercepciones','idpercepcion','id');
    }
}
