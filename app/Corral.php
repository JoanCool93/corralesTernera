<?php

namespace App;

use DB;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Corral extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'corrales';
    
    /**
    * primaryKey
    *
    * @var string
    * @access protected
    */
    protected $primaryKey = 'idCorral';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idCorral', 'descripcion', 'ancho', 'largo', 'capacidad', 'tipoCorral',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function insertar(Request $datos)
    {
        //Se crea un arreglo contra el cual se cotejaran los datos que se reciban.
        $reglas = array(
            'descripcion'	=> 'required|max:255',
            'ancho'			=> 'required',
            'largo'			=> 'required',
            'capacidad'		=> 'required',
            'tipoCorral'	=> 'required|max:10',
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
            // Crea una instancia de Usuario y se modifican sus atributos con los 
            //datos que se obtuvieron del formulario y se almacena en disco.
            Corral::create([
                'descripcion'	=> $datos['descripcion'],
                'ancho'			=> $datos['ancho'],
                'largo'			=> $datos['largo'],
                'capacidad'		=> $datos['capacidad'],
                'tipoCorral'	=> $datos['tipoCorral'],
            ]);
        }
        return array(
                "bandera" => true,
                "validador" => $validador,
        );
    }

    public function actualizar(Request $r, $id)
    {   
        //Se crea un arreglo contra el cual se cotejaran los datos que se reciban.
        $reglas = array(
            'descripcion'	=> 'required|max:255',
            'ancho'			=> 'required',
            'largo'			=> 'required',
            'capacidad'		=> 'required',
            'tipoCorral'	=> 'required|max:10',
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
            DB::table('corrales')->where('idCorral', $id)->lockForUpdate()->get();
            try {
                $corral = Corral::find($id);
                $corral->fill($r->all());
                $corral->save();
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

    public function eliminar($id){
        Corral::destroy($id);
    }

    public function obtenerCorral(){
        return Corral::where('tipoCorral', '<>', 3)->orWhere('capacidadUsada', '<', 'capacidad')->first();
    }

    public function obtenerCorralCuarentena(){
        return Corral::where('tipoCorral', 3)->orWhere('capacidadUsada', '<', 'capacidad')->first();
    }
}