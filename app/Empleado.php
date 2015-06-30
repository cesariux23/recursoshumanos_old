<?php namespace Sirhum;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model {

	//

	protected $guarded =['rfc'];
	protected $fillable = ['rfc','homoclave','num_empleado','nombre','paterno','materno','curp','tipo','fecha_nacimiento','sexo','correo','tipo_pago','nss','cuenta','banco','num_fonacot','tipo_sangre','num_issste','fecha_ingreso'];
	protected $table = 'empleado';
	protected $primaryKey='rfc';

	public $tipos=['H'=>'HONORARIOS','B'=>'BASE','C'=>'CONFIANZA'];

	public function datos()
	{
		return $this->hasOne('Sirhum\DatosPersonales','rfc','rfc');
	}

	public function datosLaborales()
	{
		return $this->hasMany('Sirhum\EmpleadoPlaza','rfc','rfc');
	}
	public function hijos()
	{
		return $this->hasMany('Sirhum\Hijos','rfc_empleado','rfc');
	}
	public function catbanco()
	{
		return $this-> belongsTo('Sirhum\Bancos','banco','id');
	}

	public function getPlazaActualAttribute()
	{
		# Regresa el nombre de la plaza
		return $this->datosLaborales()->whereNull('fin')->first();
	}

	public function getNombreCompletoAttribute()
	{
		# Regresa el nombre completo

		return $this->nombre.' '.$this->paterno.' '.$this->materno;
	}

	public function getFechaNacAttribute()
	{
		# Regresa la fecha de nacimiento
		return $this->fecha($this->fecha_nacimiento);
	}

	public function getFechaIngAttribute()
	{
		# Regresa la fecha de nacimiento
		return $this->fecha($this->fecha_ingreso);
	}

	public function getEdadAttribute()
	{
		# Calcula la edad...
		return (int)((time()-strtotime($this->fecha_nacimiento))/31556926);
	}

	public function getTipoEmpleadoAttribute()
	{
			# Regresa el tipo de empleado
			return $this->tipos[$this->tipo];
	}
	public function getPagoAttribute()
	{
			# Regresa el tipo de pago
			$pagos=config('opciones.pagos');
			return $pagos[$this->tipo_pago];
	}

	public function setMaternoAttribute($materno)
	{
		# asigna el valor del segun apellido
		if($materno==null or $materno=='? object:null ?'){
			$materno='';
		}
		$this->attributes['materno']=$materno;
	}



	public function setBancoAttribute($banco)
	{
			# asigna el valor del banco
			if($banco=='' or $banco=='? object:null ?'){
				$banco=null;
			}
			$this->attributes['banco']=$banco;
	}


	//da formato a las fechas que se necesiten
	public function fecha($fecha)
	{
		$meses=config('opciones.meses');
		$fecha=strtotime($fecha);
		$mes=substr($meses[date('n',$fecha)],0,3);
		$separador='/';

		return date('d',$fecha).$separador.$mes.$separador.date('Y',$fecha);
	}
}
