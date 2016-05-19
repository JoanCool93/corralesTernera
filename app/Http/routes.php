<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {

	Route::get('/', function () {
    	return view('landmarkPrincipal.welcome');
	});

	//Route::auth();

	//Rutas de autenticación...
	Route::get('login', 'Auth\AuthController@showLoginForm');
	Route::post('login', 'Auth\AuthController@login');
	Route::get('logout', 'Auth\AuthController@logout');

	// Rutas para restablecimiento de contraseñas...
	Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
	Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
	Route::post('password/reset', 'Auth\PasswordController@reset');

	//Rutas del primer landmark
	Route::get('/Nosotros/historia', 'HomeController@historia');
	Route::get('/Nosotros/mision', 'HomeController@mision');
	Route::get('/Nosotros/vision', 'HomeController@vision');
	Route::get('/Nosotros/objetivos', 'HomeController@objetivos');
	Route::get('/Nosotros/valores', 'HomeController@valores');
	Route::get('/Contacto', 'HomeController@contacto');

	//Rutas para el envio de correo de contacto
	Route::post('/correo', [
		'as' => 'mail.store',
		'uses' => 'MailController@store'
	]);

	Route::get('/panelUsuario', [
		'as' => 'panelUsuario',
		'middleware' => ['auth'],
		'uses' => 'HomeController@panelUsuario', 
	]);

	Route::group(['prefix' => '/panelUsuario/admin',
		'middleware' => ['auth', 'roles'],
		// Roles a permitir
		'roles' => ['Administrador']], function () {

			Route::resource('usuarios', 'UsuariosController', [
				'only' => ['index', 'store', 'update', 'destroy'],
				'names' => [
					'index' => 'usuarios.index',
					'store' => 'usuarios.store',
					'update' => 'usuarios.update',
					'destroy' => 'usuarios.destroy',]
			]);

			Route::resource('corrales', 'CorralesController', [
				'only' => ['index', 'store', 'update', 'destroy'],
				'names' => [
					'index' => 'corrales.index',
					'store' => 'corrales.store',
					'update' => 'corrales.update',
					'destroy' => 'corrales.destroy',]
			]);

			Route::resource('proveedores', 'ProveedoresController', [
				'only' => ['index', 'store', 'update', 'destroy'],
				'names' => [
					'index' => 'proveedores.index',
					'store' => 'proveedores.store',
					'update' => 'proveedores.update',
					'destroy' => 'proveedores.destroy',]
			]);
	});

	Route::group(['prefix' => '/panelUsuario/veterinaria',
		'middleware' => ['auth', 'roles'],
		// Roles a permitir
		'roles' => ['Departamento de veterinaria']], function () {

	});

	Route::group(['prefix' => '/panelUsuario/empleado',
		'middleware' => ['auth', 'roles'],
		// Roles a permitir
		'roles' => ['Empleado']], function () {

	});

});