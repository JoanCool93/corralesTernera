<?php

namespace App\Http\Controllers;

use App\Tratamiento;
use Validator;
use Redirect;
use Session;
use Input;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

class TratamientosController extends Controller
{

    protected $tratamiento;

    public function __construct(Tratamiento $tratamiento)
    {
        $this->tratamiento = $tratamiento;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener todos los usuarios
        $tratamientos = $this->tratamiento->paginate(5);

        // Carga la vista a la cual le pasa todos los usuarios.
        return \View::make('panelUsuario.dptoVeterinaria.tratamientos.indiceTratamientos', compact('tratamientos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $respuesta = $this->tratamiento->insertar($request);
        if ($respuesta["bandera"]) {
            // Session manda un mensaje de exito.
            Session::flash('message', 'Se ha registrado exitosamente el tratamiento');
            // Redireccionmiento.
            return Redirect::route('tratamientos.index');
        } else {
            return Redirect::route('tratamientos.index')
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
        $respuesta = $this->tratamiento->actualizar($request, $id);
        if ($respuesta["bandera"]) {
            // Session manda un mensaje de exito.
            Session::flash('message', 'Se ha modificado exitosamente el tratamiento');
            // Redireccionmiento.
            return Redirect::route('tratamientos.index');
        } else {
            return Redirect::route('tratamientos.index')
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
        $this->tratamiento->eliminar($id);
        // Session manda un mensaje de exito.
        Session::flash('message', 'Se ha eliminado exitosamente el tratamiento');
        // Redireccionmiento.
        return Redirect::route('tratamientos.index');
    }
}
