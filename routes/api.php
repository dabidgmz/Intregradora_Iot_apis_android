<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\VitrinaController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth.jwt');


// Rutas para CRUD de Empresas
Route::get('/empresas', [EmpresaController::class, 'index']);
Route::get('/empresas/{id}', [EmpresaController::class, 'show']);
Route::post('/empresas', [EmpresaController::class, 'create']);
Route::put('/empresas/{id}', [EmpresaController::class, 'update']);
Route::delete('/empresas/{id}', [EmpresaController::class, 'destroy']);


Route::get('/sensores/{id}', [SensorController::class, 'show']);
Route::post('/sensores', [SensorController::class, 'create']);
Route::put('/sensores/{id}', [SensorController::class, 'update']);
Route::delete('/sensores/{id}', [SensorController::class, 'destroy']);



// Rutas para el recurso Vitrina
Route::get('/vitrinas', [VitrinaController::class, 'index']);
Route::get('/vitrinas/{id}', [VitrinaController::class, 'show']);
Route::post('/vitrinas', [VitrinaController::class, 'create']);
Route::put('/vitrinas/{id}', [VitrinaController::class, 'update']);
Route::delete('/vitrinas/{id}', [VitrinaController::class, 'destroy']);


Route::middleware(['auth:api'])->group(function () {
    Route::get('/user', 'UserController@getUser');
});

Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');