<?php

namespace App\Http\Controllers;

use App\Cria;
use App\Dieta;
use App\Tratamiento;
use App\Registro;
use App\Sensor;
use Validator;
use Redirect;
use Session;
use Input;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

class CriasController extends Controller
{
    /**
     * Muestra un listado de las crias.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener todas las crias
        $crias = Cria::paginate(5);

        $registro = new Registro();
        $registro->idRegistro = null;

        $dietas = Dieta::lists('nombre', 'idDieta');
        $tratamientos = Tratamiento::lists('nombre', 'idTratamiento');

        // Carga la vista a la cual le pasa todos los usuarios.
        return \View::make('panelUsuario.empleado.crias.indiceCrias', compact('crias', 'registro', 'dietas', 'tratamientos'));
    }

    /**
     * Muestra un listado de las crias con clasificación grasa de cobertura tipo 2.
     *
     * @return \Illuminate\Http\Response
     */
    public function indiceCriasGrasa2(){
        // Obtener las crias con clasificación grasa de cobertura tipo 2
        $crias = Cria::where('clasificacion', 2)->paginate(5);

        $sensores = Sensor::where('estado', 1)->lists('descripcion', 'idSensor');

        // Carga la vista a la cual le pasa todos los crias.
        return \View::make('panelUsuario.empleado.crias.indiceCriasGrasa2', compact('crias', 'sensores'));
    }

    /**
     * Muestra un listado de las crias con clasificación grasa de cobertura tipo 2.
     *
     * @return \Illuminate\Http\Response
     */
    public function indiceCriasSensores(){
        // Obtener las crias cuyo sensor no sea Ninguno
        $crias = Cria::where('idSensor', '<>', 1)->paginate(5);

        // Carga la vista a la cual le pasa todos los crias.
        return \View::make('panelUsuario.empleado.crias.indiceCriasSensores', compact('crias'));
    }

    /**
     * Muestra un listado de las crias con clasificación grasa de cobertura tipo 2.
     *
     * @return \Illuminate\Http\Response
     */
    public function indiceCriasEnfermas(){
        // Obtener las crias cuyo sensor no sea Ninguno
        $crias = Cria::where('estado', 3)->paginate(5);

        $dietas = Dieta::lists('nombre', 'idDieta');
        $tratamientos = Tratamiento::lists('nombre', 'idTratamiento');

        // Carga la vista a la cual le pasa todos los crias.
        return \View::make('panelUsuario.dptoVeterinaria.crias.indiceCriasEnfermas', compact('crias', 'dietas', 'tratamientos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $respuesta = Cria::insertar($request);
        if ($respuesta["bandera"]) {
            // Session manda un mensaje de exito.
            Session::flash('message', 'Se ha registrado exitosamente la cria');
            // Redireccionmiento.
            return Redirect::route('inicioRegistro');
        } else {
            return Redirect::route('inicioRegistro')
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
        $respuesta = Cria::actualizar($request, $id);
        if ($respuesta["bandera"]) {
            // Session manda un mensaje de exito.
            Session::flash('message', 'Se ha modificado exitosamente la cria');
            // Redireccionmiento.
            return Redirect::back();
        } else {
            return Redirect::back()
                ->withErrors($respuesta["validador"])
                ->withInput();
        }
    }

    /**
     * Se les asigna el sensor a la cria con clasificacion grasa de cobertura 2.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function asignarSensor(Request $request,$id)
    {
        $respuesta = Cria::asignarSensor($request, $id);
        if ($respuesta) {            
            // Session manda un mensaje de exito.
            Session::flash('message', 'Se ha asignado exitosamente el sensor a la cria');
            // Redireccionmiento.
            return Redirect::route('indiceCriasGrasa2');
        } else {
            // Session manda un mensaje de exito.
            Session::flash('message-fallo', 'No se ha logrado asignar  el sensor a la cria');
            return Redirect::route('indiceCriasGrasa2');
        }
    }

    /**
     * Se les asigna el sensor a la cria con clasificacion grasa de cobertura 2.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function procesarCuarentena(Request $request,$id)
    {
        $respuesta = Cria::procesarCuarentena($request, $id);
        if ($respuesta) {            
            // Session manda un mensaje de exito.
            Session::flash('message', 'Se ha procesado exitosamente la cuarentena');
            // Redireccionmiento.
            return Redirect::route('indiceCriasEnfermas');
        } else {
            // Session manda un mensaje de exito.
            Session::flash('message-fallo', 'No se ha logrado procesar la cuarentena');
            return Redirect::route('indiceCriasEnfermas');
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
        Cria::eliminar($id);
        // Session manda un mensaje de exito.
        Session::flash('message', 'Se ha eliminado exitosamente la cria');
        // Redireccionmiento.
        return Redirect::back();
    }
}
