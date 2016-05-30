<?php

namespace App;

use DB;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Dieta extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dietas';
    
    /**
    * primaryKey
    *
    * @var string
    * @access protected
    */
    protected $primaryKey = 'idDieta';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idDieta', 'nombre', 'descripcion',
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
            'nombre'		=> 'required|max:50',
            'descripcion'	=> 'required|max:255',
        );

        //  Se crea una instancia de Validator con todos los datos que obtuvo del
        //formulario usando la clase Request y los coteja con el arreglo reglas.
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
            Dieta::create([
                'nombre'		=> $datos['nombre'],
                'descripcion'	=> $datos['descripcion'],
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
            'nombre'		=> 'required|max:50',
            'descripcion'	=> 'required|max:255',
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
            // Crea una instancia de Dieta y se modifican sus atributos con los 
            //datos que se obtuvieron del formulario y se almacena en disco.
            DB::beginTransaction();
            DB::table('dietas')->where('idDieta', $id)->lockForUpdate()->get();
            try {
                $dieta = Dieta::find($id);
                $dieta->fill($r->all());
                $dieta->save();
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
        Dieta::destroy($id);
    }
}
