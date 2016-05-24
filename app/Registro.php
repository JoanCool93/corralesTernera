<?php

namespace App;

use Auth;
use DB;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'registros';
    
    /**
    * primaryKey
    *
    * @var string
    * @access protected
    */
    protected $primaryKey = 'idRegistro';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idRegistro', 'idProveedor', 'idUsuario', 'estado',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public static function comprobarRegistro(){
        $resultado = Registro::where("idUsuario", Auth::user()->idUsuario)->exists();
        if ($resultado == true) {
            $id = Registro::where("idUsuario", Auth::user()->idUsuario)->max('idRegistro');
            $registro = Registro::find($id);
            if ($registro->estado == 1) {
                return array("bandera" => true,
                    "registro" => $registro,
                    "usuario" => Usuario::find($registro->idUsuario),
                    "proveedor" => Proveedor::find($registro->idProveedor),
                    "crias" => Cria::where("idRegistro", $registro->idRegistro)->paginate(5));
            }
        }
        return array("bandera" => false);
    }

    public static function insertar(Request $datos){
        Registro::create([
            'idProveedor'	=> $datos['idProveedor'],
            'idUsuario'		=> Auth::user()->idUsuario,
            'estado'		=> 1,
        ]);
    }

    public static function finalizar($id){
        // Crea una instancia de Registo y se modifican sus atributos con los 
        //datos que se obtuvieron del formulario y se almacena en disco.
        DB::beginTransaction();
        DB::table('registros')->where('idRegistro', $id)->lockForUpdate()->get();
        try {
            $registro = Registro::find($id);
            $registro->estado = 2;
            $registro->save();
            DB::commit();
        }catch(\Exception $e)
        {
            DB::rollback();
            throw $e;
        }
    }

    public static function eliminar($id){
        Registro::destroy($id);
    }
}
