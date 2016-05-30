<?php

namespace App\Http\Controllers;

use App\Dieta;
use Validator;
use Redirect;
use Session;
use Input;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

class DietasController extends Controller
{

    protected $dieta;

    public function __construct(Dieta $dieta)
    {
        $this->dieta = $dieta;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener todos los usuarios
        $dietas = $this->dieta->paginate(5);

        // Carga la vista a la cual le pasa todos los dietass.
        return \View::make('panelUsuario.dptoVeterinaria.dietas.indiceDietas', compact('dietas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $respuesta = $this->dieta->insertar($request);
        if ($respuesta["bandera"]) {
            // Session manda un mensaje de exito.
            Session::flash('message', 'Se ha registrado exitosamente el dieta');
            // Redireccionmiento.
            return Redirect::route('dietas.index');
        } else {
            return Redirect::route('dietas.index')
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
        $respuesta = $this->dieta->actualizar($request, $id);
        if ($respuesta["bandera"]) {
            // Session manda un mensaje de exito.
            Session::flash('message', 'Se ha modificado exitosamente el dieta');
            // Redireccionmiento.
            return Redirect::route('dietas.index');
        } else {
            return Redirect::route('dietas.index')
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
        $this->dieta->eliminar($id);
        // Session manda un mensaje de exito.
        Session::flash('message', 'Se ha eliminado exitosamente el dieta');
        // Redireccionmiento.
        return Redirect::route('dietas.index');
    }
}
