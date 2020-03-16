<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::group([
    'middleware' => 'cors',
    'prefix' => 'auth'
], function () {
    Route::post('login', 'UsuarioController@login');
    Route::post('signup', 'UsuarioController@signup');
    Route::post('logout', 'UsuarioController@logout');
    Route::post('refresh', 'UsuarioController@refresh');
    Route::post('me', 'UsuarioController@me');
    Route::post('obtenerLinkNuevaContrasena', 'ContrasenaController@obtenerLinkNuevaContrasena');
    Route::post('cambiarContrasena', 'ContrasenaController@cambiarContrasena');
    //Route::resource('materia','MateriaController');
});

//Versionamiento de la Ruta
Route::group([
    'prefix'=>'/v1.0',
    'middleware' => 'jwt.verify',
], function() {
    //Manejo de Estudiante
    Route::resource('estudiante','EstudianteController');
    //Manejo de Profesor
    Route::resource('profesor','ProfesorController');
    //Manejo de Facultad
    Route::resource('facultad','FacultadController');
    //Manejo de Carrera
    Route::resource('carrera','CarreraController');
    //Manejo de Malla Curricular
    Route::resource('malla','MallaCurricularController');
    //Manejo de Materia
    Route::resource('materia','MateriaController');
    //Manejo de Temas x Materia
    Route::resource('tema','TemasController');
});
