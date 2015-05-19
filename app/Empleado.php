<?php namespace Sirhum;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model {

	//

	protected $guarded =['rfc'];
	protected $fillable = ['rfc','homoclave','num_empleado','nombre','paterno','materno','curp','tipo','fecha_nacimiento','sexo','correo','tipo_pago','nss','cuenta','banco','num_fonacot','tipo_sangre','num_issste','fecha_ingreso'];
	protected $table = 'empleado';
	protected $primaryKey='rfc';
    public $timestamps = false;
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
        return $this->datosLaborales()->whereNull('fin')->first()->plaza; 
    }

    public function getNombreCompletoAttribute()
    {
    	# Regresa el nombre completo

    	return $this->nombre.' '.$this->paterno.' '.$this->materno;    
    }

}
