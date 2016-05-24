<?php

namespace App;

use DB;
use App\Sensor;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Cria extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'crias';
    
    /**
    * primaryKey
    *
    * @var string
    * @access protected
    */
    protected $primaryKey = 'idCria';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idCria', 'idRegistro', 'peso', 'altura', 'edad', 'colorPelaje', 'raza', 'colorMusculo', 'clasificacion', 'estado', 'idDieta', 'idTratamiento', 'idSensor',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function setPesoAttribute($valor){
        $this->attributes['peso'] = $valor;

        //Si alguno de los valores requeridos para clasificar la cria no ha sido
        //asignado entonces no se clasifica
        if (isset($this->attributes['peso']) && isset($this->attributes['altura']) && isset($this->attributes['edad'])) {
            $this->attributes['clasificacion'] = Cria::clasificar($this->attributes['peso'],$this->attributes['altura'],$this->attributes['edad']);
        }
        
    }

    public function setAlturaAttribute($valor){
        $this->attributes['altura'] = $valor;

        //Si alguno de los valores requeridos para clasificar la cria no ha sido
        //asignado entonces no se clasifica
        if (isset($this->attributes['peso']) && isset($this->attributes['altura']) && isset($this->attributes['edad'])) {
            $this->attributes['clasificacion'] = Cria::clasificar($this->attributes['peso'],$this->attributes['altura'],$this->attributes['edad']);
        }
    }

    public function setEdadAttribute($valor){
        $this->attributes['edad'] = $valor;

        //Si alguno de los valores requeridos para clasificar la cria no ha sido
        //asignado entonces no se clasifica
        if (isset($this->attributes['peso']) && isset($this->attributes['altura']) && isset($this->attributes['edad'])) {
            $this->attributes['clasificacion'] = Cria::clasificar($this->attributes['peso'],$this->attributes['altura'],$this->attributes['edad']);
        }
        
    }

    public static function insertar(Request $datos)
    {
        //Se crea un arreglo contra el cual se cotejaran los datos que se reciban.
        $reglas = array(
            'idCria'		=> 'required|unique:crias',
            'idRegistro'	=> 'required|integer',
            'peso'          => 'required|digits_between:1,6',
            'altura'        => 'required|digits_between:1,4',
            'edad'          => 'required|integer',
            'colorPelaje'   => 'required|max:50',
            'raza'          => 'required|max:50',
            'colorMusculo'  => 'required|max:50',
            'estado'        => 'required|integer',
            'idDieta'       => 'required|integer',
            'idTratamiento' => 'required|integer',
        );

        //  Se crea una instancia de Validator con todos los datos que obtuvo del
        //formulario usando la clase Input y los coteja con el arreglo rules.
        $validador = Validator::make($datos->all(), $reglas);

        //  Procesa la validación si hay algun error regresa a la pagina de registro
        //mostrando un mensaje con el error que se dio y manteniendo los datos a
        //excepción de contraseña.
        if ($validador->fails()) {
            return array(
                "bandera" => false,
                "validador" => $validador,
            );
        } else { 
            // Crea una instancia de Cria y se modifican sus atributos con los 
            //datos que se obtuvieron del formulario y se almacena en disco.
            Cria::create([
                'idCria'        => $datos['idCria'],
                'idRegistro'    => $datos['idRegistro'],
                'peso'          => $datos['peso'],
                'altura'		=> $datos['altura'],
                'edad'		    => $datos['edad'],
                'colorPelaje'   => $datos['colorPelaje'],
                'raza'          => $datos['raza'],
                'colorMusculo'  => $datos['colorMusculo'],
                'clasificacion' => Cria::clasificar($datos['peso'],$datos['altura'],$datos['edad']),
                'estado'        => $datos['estado'],
                'idDieta'       => $datos['idDieta'],
                'idTratamiento' => $datos['idTratamiento'],
                'idSensor'      => 0,
            ]);
        }
        return array(
                "bandera" => true,
                "validador" => $validador,
        );
    }

    //Método para la clasificación de la cria
    private static function clasificar($peso, $altura, $edad){
        if ($peso < 100 && $altura < 0.80 && $edad < 3) {
            return  1;
        } elseif ($peso < 300 && $altura < 1.20 && $edad < 8) {
            return  2;
        } elseif ($peso < 500 && $altura < 1.70 && $edad < 12) {
            return  3;
        }else{
            return  0;
        }
    }

    public static function actualizar(Request $r, $id)
    {   
        //Se crea un arreglo contra el cual se cotejaran los datos que se reciban.
        $reglas = array(
            'idCria'        => 'required|unique:crias,idCria,'.$id.',idCria',
            'idRegistro'    => 'required|integer',
            'peso'          => 'required|digits_between:1,6',
            'altura'        => 'required|digits_between:1,4',
            'edad'          => 'required|integer',
            'colorPelaje'   => 'required|max:50',
            'raza'          => 'required|max:50',
            'colorMusculo'  => 'required|max:50',
            'estado'        => 'required|integer',
            'idDieta'       => 'required|integer',
            'idTratamiento' => 'required|integer',
        );

        //  Se crea una instancia de Validator con todos los datos que obtuvo del
        //formulario usando la clase Input y los coteja con el arreglo rules.
        $validador = Validator::make($r->all(), $reglas);

        //  Procesa la validación si hay algun error regresa a la pagina de registro
        //mostrando un mensaje con el error que se dio y manteniendo los datos a
        //excepción de contraseña.
        if ($validador->fails()) {
            return array(
                "bandera" => false,
                "validador" => $validador,
            );
        } else { 
            // Crea una instancia de Usuario y se modifican sus atributos con los 
            //datos que se obtuvieron del formulario y se almacena en disco.
            DB::beginTransaction();
            DB::table('crias')->where('idCria', $id)->lockForUpdate()->get();
            try {
                $cria = Cria::find($id);
                $cria->fill($r->all());
                $cria->save();
                DB::commit();
            }catch(\Exception $e)
            {
                DB::rollback();
                throw $e;
            }
        }
        return array(
                "bandera" => true,
                "validador" => $validador,
            );
    }

    public static function asignarSensor(Request $request, $id){
        // Crea una instancia de Usuario y se modifican sus atributos con los 
        //datos que se obtuvieron del formulario y se almacena en disco.
        DB::beginTransaction();
        DB::table('crias')->where('idCria', $id)->lockForUpdate()->get();
        DB::table('sensores')->where('idSensor', $request->idSensor)->lockForUpdate()->get();
        try {
            $cria = Cria::find($id);

            //Bloquea la tupla del sensor actual para modificar su estado
            // a 1 (disponible).
            DB::table('sensores')->where('idSensor', $cria->idSensor)->lockForUpdate()->get();
            $sensorActual = Sensor::find($cria->idSensor);
            $sensorActual->estado = 1;
            $sensorActual->save();

            //Se asigna el nuevo sensor a la cria.
            $cria->idSensor = $request->idSensor;
            $cria->save();

            //Si el sensor es distinto del sensor default (Ninguno) se actualiza el estado.
            if ($request->idSensor > 1) {
                $sensorNuevo = Sensor::find($request->idSensor);
                $sensorNuevo->estado = 2;
                $sensorNuevo->save();
            }
            
            DB::commit();
            return true;

        }catch(\Exception $e)
        {
            DB::rollback();
            throw $e;
            return false;
        }
    }

    public static function evaluarCria($presionSanguinea, $frecuenciaCardiaca, $frecuenciaRespiratoria, $temperatura){
        if ($frecuenciaCardiaca < 60 || $frecuenciaRespiratoria < 12 || $temperatura < 35 || $frecuenciaCardiaca > 100 || $frecuenciaRespiratoria > 20 || $temperatura > 38 || $presionSanguinea > 140) {
            return 3;
        }
        return 1;
    }

    public static function procesarCuarentena(Request $request, $id){
        // Crea una instancia de Usuario y se modifican sus atributos con los 
        //datos que se obtuvieron del formulario y se almacena en disco.
        DB::beginTransaction();
        DB::table('crias')->where('idCria', $id)->lockForUpdate()->get();
        try {
            $cria = Cria::find($id);

            //Se asigna dieta y tratamiento a la cria y el estado pasa a 4 (Cuarentena).
            $cria->idDieta = $request->idDieta;
            $cria->idTratamiento = $request->idTratamiento;
            $cria->estado = 4;
            $cria->save();            
            DB::commit();
            return true;
        }catch(\Exception $e)
        {
            DB::rollback();
            throw $e;
            return false;
        }
    }

    public static function eliminar($id){
        Cria::destroy($id);
    }
}
