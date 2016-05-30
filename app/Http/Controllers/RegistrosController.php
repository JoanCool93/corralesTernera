<?php

namespace App\Http\Controllers;

use App\Registro;
use App\Dieta;
use App\Tratamiento;
use App\Proveedor;
use Validator;
use Redirect;
use Session;
use Input;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

class RegistrosController extends Controller
{

    protected $registro;
    protected $dieta;
    protected $tratamiento;
    protected $proveedor;

    public function __construct(Registro $registro, Dieta $dieta, Tratamiento $tratamiento, Proveedor $proveedor)
    {
        $this->registro = $registro;
        $this->dieta = $dieta;
        $this->tratamiento = $tratamiento;
        $this->proveedor = $proveedor;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function inicioRegistro()
    {
        $resultado = $this->registro->comprobarRegistro();
        if ($resultado["bandera"]) {
            $usuario = $resultado["usuario"];
            $proveedor = $resultado["proveedor"];
            $crias = $resultado["crias"];
            $registro = $resultado["registro"];
            $dietas = $this->dieta->lists('nombre', 'idDieta');
            $tratamientos = $this->tratamiento->lists('nombre', 'idTratamiento');
            // Carga la vista a la cual le pasa todos los usuarios.
            return \View::make('panelUsuario.empleado.registroCrias', compact('registro', 'usuario', 'proveedor', 'crias', 'dietas', 'tratamientos'));
        } else {
            $proveedores = $this->proveedor->lists('nombre', 'idProveedor');
            // Carga la vista a la cual le pasa todos los usuarios.
            return \View::make('panelUsuario.empleado.registroCriasNuevo', compact('proveedores'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->registro->crearRegistro($request);
        // Redireccionmiento.
        return Redirect::route('inicioRegistro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function finalizarRegistro($idRegistro)
    {
        $this->registro->finalizar($idRegistro);
        // Redireccionmiento.
        return Redirect::route('panelUsuario');
    }
}
