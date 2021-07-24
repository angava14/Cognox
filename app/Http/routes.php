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

// Login
Route::get('/', function () {
    return view('login');
});
Route::get('/logout', 'LoginController@logout')->name('login');
Route::post('/', 'LoginController@login')->name('login');

// Home Screen
Route::get('/home/{id}', 'HomeController@index')->name('home');

// Transacciones
Route::get('/transacciones/{id}', 'TransaccionesController@index')->name('transacciones');
Route::get('/listatransferencias/{id}', 'TransaccionesController@listatransferencias')->name('listatransferencias');
Route::get('/cuentas/{id}', 'TransaccionesController@cuentas')->name('cuentas');
Route::post('/transferir', 'TransaccionesController@transferir')->name('transferir');




