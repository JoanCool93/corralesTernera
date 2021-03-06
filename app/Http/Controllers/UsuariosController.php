<?php

namespace App\Http\Controllers;

use App\Usuario;
use Validator;
use Redirect;
use Session;
use Input;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

class UsuariosController extends Controller
{

    protected $usuario;

    public function __construct(Usuario $usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener todos los usuarios
        $usuarios = $this->usuario->paginate(5);

        // Carga la vista a la cual le pasa todos los usuarios.
        return \View::make('panelUsuario.adminPagina.usuarios.indiceUsuarios', compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $respuesta = $this->usuario->insertar($request);
        if ($respuesta["bandera"]) {
            // Session manda un mensaje de exito.
            Session::flash('message', 'Se ha registrado exitosamente el usuario');
            // Redireccionmiento.
            return Redirect::route('usuarios.index');
        } else {
            return Redirect::route('usuarios.index')
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
        $respuesta = $this->usuario->actualizar($request, $id);
        if ($respuesta["bandera"]) {
            // Session manda un mensaje de exito.
            Session::flash('message', 'Se ha modificado exitosamente el usuario');
            // Redireccionmiento.
            return Redirect::route('usuarios.index');
        } else {
            return Redirect::route('usuarios.index')
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
        $this->usuario->eliminar($id);
        // Session manda un mensaje de exito.
        Session::flash('message', 'Se ha eliminado exitosamente el usuario');
        // Redireccionmiento.
        return Redirect::route('usuarios.index');
    }
}
