<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ZonaController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\DomicilioController;
use App\Http\Controllers\EstablecimientoController;
use App\Http\Controllers\Loopback;

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

//Rutas especiales
Route::post('/loopback', [Loopback::class, 'loopback']);


//Rutas de loggeo y registro
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    //Rutas de logout
    Route::get('/logout', [AuthController::class, 'logout']);

    //Rutas de Zonas
    Route::get('/zonas', [ZonaController::class, 'index']);
    Route::get('/zonas/{id}', [ZonaController::class, 'show']);
    Route::post('/zonas', [ZonaController::class, 'store']);
    Route::put('/zonas/{id}', [ZonaController::class, 'update']);
    Route::delete('/zonas/{id}', [ZonaController::class, 'destroy']);

    //Rutas de Ofertas
    Route::get('/ofertas', [OfertaController::class, 'index']);
    Route::get('/ofertas/{id}', [OfertaController::class, 'show']);
    Route::post('/ofertas', [OfertaController::class, 'store']);
    Route::put('/ofertas/{id}', [OfertaController::class, 'update']);
    Route::delete('/ofertas/{id}', [OfertaController::class, 'destroy']);

    //Rutas de Domicilios
    Route::get('/domicilios', [DomicilioController::class, 'index']);
    Route::get('/domicilios/{id}', [DomicilioController::class, 'show']);
    Route::post('/domicilios', [DomicilioController::class, 'store']);
    Route::put('/domicilios/{id}', [DomicilioController::class, 'update']);
    Route::delete('/domicilios/{id}', [DomicilioController::class, 'destroy']);

    //Rutas de Establecimientos
    Route::get('/establecimientos', [EstablecimientoController::class, 'index']);
    Route::get('/establecimientos/{id}', [EstablecimientoController::class, 'show']);
    Route::post('/establecimientos', [EstablecimientoController::class, 'store']);
    Route::put('/establecimientos/{id}', [EstablecimientoController::class, 'update']);
    Route::delete('/establecimientos/{id}', [EstablecimientoController::class, 'destroy']);

});
