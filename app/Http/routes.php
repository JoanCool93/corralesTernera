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

	Route::group(['prefix' => '/panelUsuario/empleado',
		'middleware' => ['auth', 'roles'],
		// Roles a permitir
		'roles' => ['Empleado']], function () {
			Route::get('/registroCrias', [
				'as' => 'inicioRegistro',
				'uses' => 'RegistrosController@inicioRegistro', 
			]);

			Route::post('/registroCrias', [
				'as' => 'registro.store',
				'uses' => 'RegistrosController@store', 
			]);

			Route::post('/finalizarRegistro/{idRegistro}', [
				'as' => 'registro.finalizar',
				'uses' => 'RegistrosController@finalizarRegistro', 
			]);

			Route::resource('proveedores', 'ProveedoresController', [
				'only' => ['store'],
				'names' => ['store' => 'proveedores.store2',]
			]);

			Route::resource('crias', 'CriasController', [
				'only' => ['index', 'store', 'update', 'destroy'],
				'names' => [
					'index' => 'crias.index',
					'store' => 'crias.store',
					'update' => 'crias.update',
					'destroy' => 'crias.destroy',]
			]);

			Route::get('/asignacionSensores', [
				'as' => 'indiceCriasGrasa2',
				'uses' => 'CriasController@indiceCriasGrasa2', 
			]);

			Route::post('/asignacionSensores/{id}', [
				'as' => 'asignacionSensor',
				'uses' => 'CriasController@asignarSensor', 
			]);

			Route::get('/registroSensores', [
				'as' => 'indiceCriasSensores',
				'uses' => 'CriasController@indiceCriasSensores', 
			]);

			Route::post('/registroSensores/{id}', [
				'as' => 'signosVitales.store',
				'uses' => 'SignosVitalesController@store', 
			]);

			Route::resource('sensores', 'SensoresController', [
				'only' => ['index', 'store', 'update', 'destroy'],
				'names' => [
					'index' => 'sensores.index',
					'store' => 'sensores.store',
					'update' => 'sensores.update',
					'destroy' => 'sensores.destroy',]
			]);
	});

	Route::group(['prefix' => '/panelUsuario/veterinaria',
		'middleware' => ['auth', 'roles'],
		// Roles a permitir
		'roles' => ['Departamento de veterinaria']], function () {

			Route::resource('dietas', 'DietasController', [
				'only' => ['index', 'store', 'update', 'destroy'],
				'names' => [
					'index' => 'dietas.index',
					'store' => 'dietas.store',
					'update' => 'dietas.update',
					'destroy' => 'dietas.destroy',]
			]);

			Route::resource('tratamientos', 'TratamientosController', [
				'only' => ['index', 'store', 'update', 'destroy'],
				'names' => [
					'index' => 'tratamientos.index',
					'store' => 'tratamientos.store',
					'update' => 'tratamientos.update',
					'destroy' => 'tratamientos.destroy',]
			]);

			Route::get('/procesoCriaEnferma', [
				'as' => 'indiceCriasEnfermas',
				'uses' => 'CriasController@indiceCriasEnfermas', 
			]);

			Route::post('/procesoCriaEnferma/{idCria}', [
				'as' => 'procesarCuarentena',
				'uses' => 'CriasController@procesarCuarentena', 
			]);
	});

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
});