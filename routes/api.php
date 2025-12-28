<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\LigaController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| AUTENTICACIÓN
|--------------------------------------------------------------------------
*/
Route::post('/login', [AuthController::class, 'login']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/*
|--------------------------------------------------------------------------
| CLUBES
|--------------------------------------------------------------------------
*/
// Lectura pública
Route::get('/clubs', [ClubController::class, 'index']);
Route::get('/clubs/{club}', [ClubController::class, 'show']);

// Modificación solo ADMIN
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::post('/clubs', [ClubController::class, 'store']);
    Route::put('/clubs/{club}', [ClubController::class, 'update']);
    Route::delete('/clubs/{club}', [ClubController::class, 'destroy']);
});

/*
|--------------------------------------------------------------------------
| JUGADORES
|--------------------------------------------------------------------------
*/
// Lectura pública
Route::get('/jugadores', [JugadorController::class, 'index']);
Route::get('/jugadores/{jugador}', [JugadorController::class, 'show']);

// Modificación solo ADMIN
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::post('/jugadores', [JugadorController::class, 'store']);
    Route::put('/jugadores/{jugador}', [JugadorController::class, 'update']);
    Route::delete('/jugadores/{jugador}', [JugadorController::class, 'destroy']);
});

/*
|--------------------------------------------------------------------------
| LIGAS
|--------------------------------------------------------------------------
*/
// Lectura pública
Route::get('/ligas', [LigaController::class, 'index']);
Route::get('/ligas/{liga}', [LigaController::class, 'show']);

// Modificación solo ADMIN
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::post('/ligas', [LigaController::class, 'store']);
    Route::put('/ligas/{liga}', [LigaController::class, 'update']);
    Route::delete('/ligas/{liga}', [LigaController::class, 'destroy']);
});

/*
|--------------------------------------------------------------------------
| PARTIDOS
|--------------------------------------------------------------------------
*/
// Lectura pública
Route::get('/partidos', [PartidoController::class, 'index']);
Route::get('/partidos/{partido}', [PartidoController::class, 'show']);

// Modificación solo ADMIN
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::post('/partidos', [PartidoController::class, 'store']);
    Route::put('/partidos/{partido}', [PartidoController::class, 'update']);
    Route::delete('/partidos/{partido}', [PartidoController::class, 'destroy']);
});


