<?php

namespace App;

use DB;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    /**
    * primaryKey
    *
    * @var string
    * @access protected
    */
    protected $primaryKey = 'idUsuario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellidoPaterno', 'apellidoMaterno', 'email', 'password', 'idRole',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'idRole', 'remember_token',
    ];

    public function setPasswordAttribute($valor){
        if (!empty($valor)){
            $this->attributes['password'] = \Hash::needsRehash($valor) ? \Hash::make($valor) : $valor;
        }
    }

    public function role(){
        return $this->hasOne('App\Role', 'idRole', 'idRole');
    }

    public function hasRole($roles){
        $this->have_role = $this->getUserRole();
        // Check if the user is a root account
        if($this->have_role->nombre == 'Root') {
            return true;
        }
        if(is_array($roles)){
            foreach($roles as $need_role){
                if($this->checkIfUserHasRole($need_role)) {
                    return true;
                }
            }
        } else{
            return $this->checkIfUserHasRole($roles);
        }
        return false;
    }

    private function getUserRole(){
        return $this->role()->getResults();
    }

    private function checkIfUserHasRole($need_role){
        return (strtolower($need_role)==strtolower($this->have_role->nombre)) ? true : false;
    }

    public static function insertar(Request $datos)
    {
        //Se crea un arreglo contra el cual se cotejaran los datos que se reciban.
        $reglas = array(
            'nombre'            => 'required|max:255',
            'apellidoPaterno'   => 'required|max:255',
            'apellidoMaterno'   => 'required|max:255',
            'email'             => 'required|email|max:255|unique:usuarios',
            'password'          => 'required|min:6|confirmed',
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
            Usuario::create([
                'nombre'            => $datos['nombre'],
                'apellidoPaterno'   => $datos['apellidoPaterno'],
                'apellidoMaterno'   => $datos['apellidoMaterno'],
                'email'             => $datos['email'],
                'password'          => bcrypt($datos['password']),
                'idRole'            => $datos['idRole'],
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
            'nombre'            => 'required|max:255',
            'apellidoPaterno'   => 'required|max:255',
            'apellidoMaterno'   => 'required|max:255',
            'email'             => 'required|email|max:255|unique:usuarios,email,'.$id.',idUsuario',
            'password'          => 'min:6|confirmed',
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
            DB::table('usuarios')->where('idUsuario', $id)->lockForUpdate()->get();
            try {
                $plaza = Usuario::find($id);
                $plaza->fill($r->all());
                $plaza->save();
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
        Usuario::destroy($id);
    }
}