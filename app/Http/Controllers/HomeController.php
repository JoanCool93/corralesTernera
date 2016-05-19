<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function contacto()
    {
        return view('landmarkPrincipal.contacto');
    }

    public function historia()
    {
        return view('landmarkPrincipal.historia');
    }

    public function mision()
    {
        return view('landmarkPrincipal.mision');
    }

    public function vision()
    {
        return view('landmarkPrincipal.vision');
    }

    public function objetivos()
    {
        return view('landmarkPrincipal.objetivos');
    }

    public function valores()
    {
        return view('landmarkPrincipal.valores');
    }

    public function panelUsuario()
    {
        switch (Auth::user()->idRole) {
            case 2:          
                return view('panelUsuario.adminPagina.panelAdmin');
                break;
            case 3:          
                return view('panelUsuario.dptoVeterinaria.panelVet');
                break;
            case 4:          
                return view('panelUsuario.empleado.panelEmpleado');
                break;
        }
    }
}
