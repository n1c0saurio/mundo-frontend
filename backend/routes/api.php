<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Rutas para la API de Marca
 */
Route::get('/marcas', 'App\Http\Controllers\MarcaController@index');
Route::get('/marcas/{marca}', 'App\Http\Controllers\MarcaController@show');
Route::get('/marcas/{marca}/modelos', 'App\Http\Controllers\MarcaController@listarModelos');
Route::get('/marcas/{marca}/dispositivos', 'App\Http\Controllers\MarcaController@listarDispositivos');

/**
 * Rutas para la API de Modelo
 */
Route::get('/modelos', 'App\Http\Controllers\ModeloController@index');
Route::get('/modelos/marca/{marca_id}', 'App\Http\Controllers\ModeloController@listarPorMarca');
Route::get('/modelos/{modelo}/dispositivos', 'App\Http\Controllers\ModeloController@listarDispositivos');

/**
 * Rutas para la API de Bodega
 */
Route::get('/bodegas', 'App\Http\Controllers\BodegaController@index');
Route::get('/bodegas/{bodega}/dispositivos', 'App\Http\Controllers\BodegaController@listarDispositivos');

/**
 * Rutas para la API de Dispositivo
 */
Route::get('/dispositivos', 'App\Http\Controllers\DispositivoController@index');