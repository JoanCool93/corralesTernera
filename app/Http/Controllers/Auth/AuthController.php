<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Validator;
use App\Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/panelUsuario';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */

    //private $usuario = Usuario::newInstance();

    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => 'required|max:255',
            'apellidoPaterno' => 'required|max:255',
            'apellidoMaterno' => 'required|max:255',
            'email' => 'required|email|max:255|unique:usuarios',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return Usuario::create([
            'nombre'            => $data['nombre'],
            'apellidoPaterno'   => $data['apellidoPaterno'],
            'apellidoMaterno'   => $data['apellidoMaterno'],
            'email'             => $data['email'],
            'password'          => bcrypt($data['password']),
            'idRole'            => 4,
        ]);
    }

/*    public function register(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        //Auth::guard($this->getGuard())->login($this->create($request->all()));
        Auth::guard($this->getGuard());
        $this->create($request->all());
        return;
    }*/
}
