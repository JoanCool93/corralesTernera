<?php

namespace App\Http\Controllers;

use App\Sensor;
use Validator;
use Redirect;
use Session;
use Input;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

class SensoresController extends Controller
{

    protected $sensor;

    public function __construct(Sensor $sensor)
    {
        $this->sensor = $sensor;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener todos los usuarios
        $sensores = $this->sensor->paginate(5);

        // Carga la vista a la cual le pasa todos los sensores.
        return \View::make('panelUsuario.empleado.sensores.indiceSensores', compact('sensores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $respuesta = $this->sensor->insertar($request);
        if ($respuesta["bandera"]) {
            // Session manda un mensaje de exito.
            Session::flash('message', 'Se ha registrado exitosamente el sensor');
            // Redireccionmiento.
            return Redirect::route('sensores.index');
        } else {
            return Redirect::route('sensores.index')
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
        $respuesta = $this->sensor->actualizar($request, $id);
        if ($respuesta["bandera"]) {
            // Session manda un mensaje de exito.
            Session::flash('message', 'Se ha modificado exitosamente el sensor');
            // Redireccionmiento.
            return Redirect::route('sensores.index');
        } else {
            return Redirect::route('sensores.index')
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
        $this->sensor->eliminar($id);
        // Session manda un mensaje de exito.
        Session::flash('message', 'Se ha eliminado exitosamente el sensor');
        // Redireccionmiento.
        return Redirect::route('sensores.index');
    }
}
