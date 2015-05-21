<?php namespace Sirhum;

use Illuminate\Database\Eloquent\Model;

class DatosPersonales extends Model {
	protected $guarded = ['rfc'];
	protected $fillable = ['rfc','direccion','municipio','cp','colonia','tel_casa','tel_cel','estado_civil','conyuge','escolaridad','licenciatura','maestria','doctorado','curriculum','observaciones','foto'];
	protected $table = 'datos_personales';
	protected $primaryKey='rfc';

	public function catmunicipio()
    {
        return $this->belongsTo('Sirhum\Municipios','municipio','id');
    }

	public function setObservacionesAttribute($value)
	{
		if($value==''){
			$this->attributes['observaciones']=null;
		}
		else{
			$this->attributes['observaciones']=$value;
		}
	}

	public function setCurriculumAttribute($value)
	{
		if($value==''){
			$this->attributes['curriculum']=null;
		}
		else{
			$this->attributes['curriculum']=$value;
		}
	}

	public function getUltimoGradoAttribute()
	{
		$es=config('opciones.escolaridad');
		return $es[$this->escolaridad];
	}
}
