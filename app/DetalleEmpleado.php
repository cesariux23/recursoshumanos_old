<?php namespace Sirhum;

use Illuminate\Database\Eloquent\Model;

class DetalleEmpleado extends Model {
	protected $fillable = [];
	protected $table="detalle_empleado";
	public function empleado()
	{
		//return $this->hasMany('Sueldo','id_asignacion','empleado');
		return $this->belongsTo('EmpleadoPlaza','id_asignacion','id');
	}
	public function percepciones()
	{
		//return $this->hasMany('Sueldo','id_asignacion','empleado');
		return $this->belongsTo('Percepciones','id_asignacion','empleado');
	}
	public function deducciones()
	{
		//return $this->hasMany('Sueldo','id_asignacion','empleado');
		return $this->belongsTo('Deducciones','id_asignacion','empleado');
	}

	public function scopeRfc($query, $rfc)
	{
		# busca por rfc
		if($rfc!="")
		$query->where('rfc','LIKE','%'.$rfc.'%');
	}

	public function scopeNombre($query, $nombre)
	{
		# busca por nombre
		if($nombre!="")
		$query->where('nombre_completo','LIKE','%'.$nombre.'%');
	}

	public function scopeAdscripcion($query, $id)
	{
		# busca por adcripcion
		if($id!="")
		$query->where('id_adscripcion',$id);
	}
}
