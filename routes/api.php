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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('artesano', 'ArtesanoController');
Route::resource('producto', 'ProductoController');
Route::resource('usuario', 'UsuarioController');
Route::resource('taller', 'TallerController');
Route::resource('venta', 'VentaController');

