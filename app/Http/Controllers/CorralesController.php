<?php

namespace App\Http\Controllers;

use App\Corral;
use Validator;
use Redirect;
use Session;
use Input;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

class CorralesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener todos los usuarios
        $corrales = Corral::paginate(5);

        // Carga la vista a la cual le pasa todos los usuarios.
        return \View::make('panelUsuario.adminPagina.corrales.indiceCorrales', compact('corrales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $respuesta = Corral::insertar($request);
        if ($respuesta["bandera"]) {
            // Session manda un mensaje de exito.
            Session::flash('message', 'Se ha registrado exitosamente el corral');
            // Redireccionmiento.
            return Redirect::route('corrales.index');
        } else {
            return Redirect::route('corrales.index')
                ->withErrors($respuesta["validador"])
                ->withInput();
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
        $respuesta = Corral::actualizar($request, $id);
        if ($respuesta["bandera"]) {
            // Session manda un mensaje de exito.
            Session::flash('message', 'Se ha modificado exitosamente el corral');
            // Redireccionmiento.
            return Redirect::route('corrales.index');
        } else {
            return Redirect::route('corrales.index')
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
        Corral::eliminar($id);
        // Session manda un mensaje de exito.
        Session::flash('message', 'Se ha eliminado exitosamente el corral');
        // Redireccionmiento.
        return Redirect::route('corrales.index');
    }
}
