<?php

namespace App;

use DB;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'proveedores';
    
    /**
    * primaryKey
    *
    * @var string
    * @access protected
    */
    protected $primaryKey = 'idProveedor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idProveedor', 'nombre', 'rfc', 'descripcion', 'direccion', 'telefono', 'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public static function insertar(Request $datos)
    {
        //Se crea un arreglo contra el cual se cotejaran los datos que se reciban.
        $reglas = array(
            'nombre'		=> 'required|max:50',
            'rfc'			=> 'required|max:50',
            'descripcion'	=> 'required|max:255',
            'direccion'		=> 'required|max:50',
            'telefono'		=> 'required|min:7|max:17',
            'email'			=> 'required|email|max:255|unique:proveedores',
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
            Proveedor::create([
                'nombre'		=> $datos['nombre'],
                'rfc'			=> $datos['rfc'],
                'descripcion'	=> $datos['descripcion'],
                'direccion'		=> $datos['direccion'],
                'telefono'		=> $datos['telefono'],
                'email'			=> $datos['email'],
            ]);
        }
        return array(
                "bandera" => true,
                "validador" => $validador,
        );
    }

    public static function actualizar(Request $r, $id)
    {   
        //Se crea un arreglo contra el cual se cotejaran los datos que se reciban.
        $reglas = array(
            'nombre'		=> 'required|max:50',
            'rfc'			=> 'required|max:50',
            'descripcion'	=> 'required|max:255',
            'direccion'		=> 'required|max:50',
            'telefono'		=> 'required|min:7|max:17',
            'email'			=> 'required|email|max:255|unique:proveedores,email,'.$id.',idProveedor',
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
            DB::table('proveedores')->where('idProveedor', $id)->lockForUpdate()->get();
            try {
                $proveedor = Proveedor::find($id);
                $proveedor->fill($r->all());
                $proveedor->save();
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

    public static function eliminar($id){
        Proveedor::destroy($id);
    }

}
