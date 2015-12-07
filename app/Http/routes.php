<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index')->name('home');

Route::get('medicos/{id}', 'MedicoController@show')->name('medico_show');

Route::get('especialidad/{id}', 'EspecialidadController@show')->name('especialidad_index');

Route::get('centros_medicos/{id}','CentroMedicoController@show')->name('centro_medico_show');

Route::get('horas_medicas/{id}/agendar', 'HoraMedicaController@agendar');

Route::get('horas_medicas/{id}/cancelar', 'HoraMedicaController@cancelar');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	]);
