<?php namespace Sirhum;

use Illuminate\Database\Eloquent\Model;

class Hijos extends Model {
	protected $fillable = ['rfc_empleado','nombre','fecha_nac','curp','sexo','nombreh'];
	protected $table="hijos";


	public function getFechaNacimientoAttribute()
	{
		return $this->fecha($this->fecha_nac,true);
	}

	public function setNombrehAttribute($nombre)
	{
		$this->nombre=$nombre;
	}

	public function getEdadAttribute()
	{
		# Calcula la edad...
		return (int)((time()-strtotime($this->fecha_nac))/31556926);
	}


	//da formato a las fechas que se necesiten
	public function fecha($fecha,$corta)
	{
		$meses=config('opciones.meses');
		$fecha=strtotime($fecha);
		if($corta){
			$mes=substr($meses[date('n',$fecha)],0,3);
			$separador='/';
		}
		else{
			$mes=$meses[date('n',$fecha)];
			$separador=' de ';
		}


		return date('d',$fecha).$separador.$mes.$separador.date('Y',$fecha);
	}
}
