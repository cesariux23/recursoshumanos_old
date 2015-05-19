<?php namespace Sirhum;

use Illuminate\Database\Eloquent\Model;

class Deducciones extends Model {
	protected $fillable = ['empleado','iddeduccion','monto','qna_inicio','qna_fin'];
	public function deduccion()
    {
        return $this-> belongsTo('CatDeducciones','iddeduccion','id');
    }
}
