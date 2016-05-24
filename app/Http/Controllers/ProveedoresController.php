<?php

namespace App\Http\Controllers;

use App\Proveedor;
use Validator;
use Redirect;
use Session;
use Input;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener todos los usuarios
        $proveedores = Proveedor::paginate(5);

        // Carga la vista a la cual le pasa todos los usuarios.
        return \View::make('panelUsuario.adminPagina.proveedores.indiceProveedores', compact('proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $respuesta = Proveedor::insertar($request);
        if ($respuesta["bandera"]) {
            // Session manda un mensaje de exito.
            Session::flash('message', 'Se ha registrado exitosamente el proveedor');
            // Redireccionmiento.
            if(Auth::user()->idRole == 2){
                return Redirect::route('proveedores.index');
            }
            else{
                return Redirect::route('inicioRegistro');
            }
        } else {
            // Session manda un mensaje de exito.
            Session::flash('message-fallo', 'No se logro registrar el proveedor');
            if(Auth::user()->idRole == 2){
                return Redirect::route('proveedores.index')
                ->withErrors($respuesta["validador"])
                ->withInput();
            }
            else{
                return Redirect::route('inicioRegistro')
                ->withErrors($respuesta["validador"])
                ->withInput();
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $respuesta = Proveedor::actualizar($request, $id);
        if ($respuesta["bandera"]) {
            // Session manda un mensaje de exito.
            Session::flash('message', 'Se ha modificado exitosamente el proveedor');
            // Redireccionmiento.
            return Redirect::route('proveedores.index');
        } else {
            return Redirect::route('proveedores.index')
                ->withErrors($respuesta["validador"])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Proveedor::eliminar($id);
        // Session manda un mensaje de exito.
        Session::flash('message', 'Se ha eliminado exitosamente el proveedor');
        // Redireccionmiento.
        return Redirect::route('proveedores.index');
    }
}
