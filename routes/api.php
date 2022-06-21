<?php

use App\Http\Controllers\AsignaturasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//rutas principales de la api
Route::group([
    'prefix' => 'auth'
], function () {
    
    Route::post('login', [AuthController::class, 'login']);
    Route::post('signup', [AuthController::class, 'signUp']);
    
    Route::group([
    'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', [AuthController::class, 'logout']);
        Route::get('user', [AuthController::class, 'user']);

    });
});


Route::group([
    'prefix' => 'asignaturas',
    'middleware' => 'cors'
    // 'middleware' => 'auth:api' // TODO remove to have under auth
], function () {
    Route::get('/', [AsignaturasController::class, 'index']); // view list
    Route::post('/store', [AsignaturasController::class, 'store']); // store by post request
    Route::get('/{id}', [AsignaturasController::class, 'show']);  // show single assignatura by id
    Route::post('/update/{id}', [AsignaturasController::class, 'update']); // update post request by id
    Route::delete('/delete/{id}', [AsignaturasController::class, 'destroy']); // delete
});