<?php namespace Sirhum;

Use Session;

Use Sirhum\CatPercepciones;
use Illuminate\Database\Eloquent\Model;

class EmpleadoPlaza extends Model {
	protected $fillable = ['rfc','num_empleado','adscripcion','clave_plaza','tipo','inicio','id_plaza','ocupacion'];
	protected $table="empleado_plaza";


    public function catplaza()
    {
        # regresa el objeto relacionado con la tabla plaza
        return $this-> belongsTo('Sirhum\CatPlaza','clave_plaza','clave');
    }
    public function horario()
    {
        # regresa el objeto relacionado con la tabla sueldo
        return $this-> hasMany('Sirhum\Horarios','empleado','id');
    }
    public function sueldo()
    {
        # regresa el objeto relacionado con la tabla sueldo
        return $this-> hasMany('Sirhum\Sueldo','empleado','id');
    }

    public function getPlazaAttribute()
    {
        # Regresa la descripcion de la plaza
        return $this->catplaza->descripcion;
    }

    public function catadscripcion()
    {
        return $this->belongsTo('Sirhum\Adscripcion','adscripcion','id');
    }

    public function getNombreAdscripcionAttribute()
    {
        # Regresa la adscripcion
        return $this->catadscripcion->adscripcion;
    }



//funciones

    /*
    * funcion que crea cualquier percepcion
    */
    public function createPercepcion($id,$valor,$quincena,$dias=null)
    {
        //se busca la percepcion
        $p=CatPercepciones::find($id);
        //texto para el log
        $texto=$p->concepto;
        $s=new Percepciones();
        //$s=Percepciones::firstOrNew(['empleado'=>$this->id,'idpercepcion'=>$id]);
        $s->empleado=$this->id;
        $s->idpercepcion=$id;
        //inicializa valores
        $s->exento=0;
        $s->activa=1;
        $s->qna_inicio=$quincena;
        $s->qna_fin=null;
        //Es un valor proporcional
        if(isset($dias)){
            //se calcula el valor diario y se multiplica por los dias
            $valor=($valor/15)*$dias;
            $s->qna_fin=$quincena;
            $s->observacion="proporcional a ".$dias." dias";
            $s->dias=$dias;
            $texto.=", ".$s->observacion." . Valido solo en la qna. ";
        }else{
            $texto.=", valido desde la qna. ";
        }
        $texto.=$quincena;
        $s->monto=$valor;
        $s->save();
        Logs::create(array('idsesion'=>Session::get('sesion'),'idaccion'=>41,'tabla'=>'Percepcion','idobjeto'=>$s->id,'complemento'=>$texto));
    }

    /*
    * funcion que crea cualquier deduccion
    */
    public function createDeduccion($id,$valor,$quincena,$dias=null)
    {
        //se busca la percepcion
        $p=CatDeducciones::find($id);
        //texto para el log
        $texto=$p->concepto;
        $s=new Deducciones();
        $s->empleado=$this->id;
        $s->iddeduccion=$id;
        $s->qna_inicio=$quincena;
        //Es un valor proporcional
        if(isset($dias)){
            //se calcula el valor diario y se multiplica por los dias
            $valor=($valor/15)*$dias;
            $s->qna_fin=$quincena;
            $s->observacion="proporcional a ".$dias." dias";
            $s->dias=$dias;
            $texto.=", ".$s->observacion." . Valido solo en la qna. ";
        }else{
            $texto.=", valido desde la qna. ";
        }
        $texto.=$quincena;
        $s->monto=$valor;
        $s->save();
        Logs::create(array('idsesion'=>Session::get('sesion'),'idaccion'=>41,'tabla'=>'Deduccion','idobjeto'=>$s->id,'complemento'=>$texto));
    }
}
