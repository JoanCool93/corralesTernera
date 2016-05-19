<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function store(Request $request)
    {
        Mail::send('correo.contacto', $request->all(), function($mensaje){
            $mensaje -> subject('Correo de contacto');
            $mensaje -> to('josek106@gmail.com');
        });

        Session::flash('message', 'El mensaje ha sido enviado correctamente');
        return Redirect::to('/Contacto');
    }
}
