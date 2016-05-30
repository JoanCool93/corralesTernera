<?php

namespace App\Http\Controllers;

use App\SignoVital;
use Validator;
use Redirect;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;

class SignosVitalesController extends Controller
{

    protected $signoVital;

    public function __construct(SignoVital $signoVital)
    {
        $this->signoVital = $signoVital;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $respuesta = $this->signoVital->crearRegitroSignos($request, $id);
        if ($respuesta["bandera"]) {
            // Session manda un mensaje de exito.
            Session::flash('message', 'Se ha realizado exitosamente el registro de signos vitales');
            // Redireccionmiento.
            return Redirect::route('indiceCriasSensores');
        } else {
            return Redirect::route('indiceCriasSensores')
                ->withErrors($respuesta["validador"])
                ->withInput();
        }
    }
}
