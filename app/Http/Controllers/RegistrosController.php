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
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function inicioRegistro()
    {
        $resultado = Registro::comprobarRegistro();
        if ($resultado["bandera"]) {
            $usuario = $resultado["usuario"];
            $proveedor = $resultado["proveedor"];
            $crias = $resultado["crias"];
            $registro = $resultado["registro"];
            $dietas = Dieta::lists('nombre', 'idDieta');
            $tratamientos = Tratamiento::lists('nombre', 'idTratamiento');
            // Carga la vista a la cual le pasa todos los usuarios.
            return \View::make('panelUsuario.empleado.registroCrias', compact('registro', 'usuario', 'proveedor', 'crias', 'dietas', 'tratamientos'));
        } else {
            $proveedores = Proveedor::lists('nombre', 'idProveedor');
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
        Registro::insertar($request);
        // Redireccionmiento.
        return Redirect::route('inicioRegistro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function finalizarRegistro($id)
    {
        Registro::finalizar($id);
        // Redireccionmiento.
        return Redirect::route('panelUsuario');
    }
}
