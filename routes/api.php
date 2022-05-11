<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ZonaController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\DomicilioController;
use App\Http\Controllers\EstablecimientoController;
use App\Http\Controllers\OpcionesEstablecimientoController;

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

    /* 
     * Rutas de Opciones para Establecimientos:
     * 
     * 1 - Turno 
     * 2 - Sector
     * 3 - Nivel
     * 4 - Modalidad
     * 5 - Ambito 
     * 
     * Requieren de rutas especiales para obtenerse como opciones en el proceso de creación de establecimientos. 
     * No es necesario un ABM completo de estos, ya que se rigen por la Ley de Educación.
     */

     Route::get('/turno', [OpcionesEstablecimientoController::class, 'indexTurno']);
     Route::get('/sector', [OpcionesEstablecimientoController::class, 'indexSector']);
     Route::get('/nivel', [OpcionesEstablecimientoController::class, 'indexNivel']);
     Route::get('/modalidad', [OpcionesEstablecimientoController::class, 'indexModalidad']);
     Route::get('/ambito', [OpcionesEstablecimientoController::class, 'indexAmbito']);


});
