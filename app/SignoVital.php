<?php

namespace App;

use App\Cria;
use DB;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class SignoVital extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'signosVitales';
    
    /**
    * primaryKey
    *
    * @var string
    * @access protected
    */
    protected $primaryKey = 'idSignos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idSignos', 'idSensor', 'presionSanguinea', 'frecuenciaCardiaca', 'frecuenciaRespiratoria', 'temperatura',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public static function insertar(Request $datos, $id)
    {
        //Se crea un arreglo contra el cual se cotejaran los datos que se reciban.
        $reglas = array(
            'idSensor'					=> 'required|integer',
            'presionSanguinea'          => 'required|integer|max:200',
            'frecuenciaCardiaca'        => 'required|integer|max:200',
            'frecuenciaRespiratoria'	=> 'required|integer|max:99',
            'temperatura'       		=> 'required|digits_between:1,3',
        );

        //  Se crea una instancia de Validator con todos los datos que obtuvo del
        //formulario usando la clase Request y los coteja con el arreglo rules.
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
            // Crea una instancia de SignoVital y se modifican sus atributos con los 
            //datos que se obtuvieron del formulario y se almacena en disco.
            SignoVital::create([
                'idSensor'					=> $datos['idSensor'],
                'presionSanguinea'			=> $datos['presionSanguinea'],
                'frecuenciaCardiaca'		=> $datos['frecuenciaCardiaca'],
                'frecuenciaRespiratoria'	=> $datos['frecuenciaRespiratoria'],
                'temperatura'				=> $datos['temperatura'],
            ]);

            // Crea una instancia de Cria y se modifican sus atributos con los 
            //datos que se obtuvieron del formulario y se almacena en disco.
            DB::beginTransaction();
            DB::table('crias')->where('idCria', $id)->lockForUpdate()->get();
            try {
                $cria = Cria::find($id);
                $cria->estado = Cria::evaluarCria($datos['presionSanguinea'], $datos['frecuenciaCardiaca'], $datos['frecuenciaRespiratoria'], $datos['temperatura']);
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
}
