<?php

use App\Http\Controllers\API\alarmsController;
use App\Http\Controllers\API\controlsController;
use App\Http\Controllers\API\DataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ProductController;

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

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('products', ProductController::class);
    Route::resource('data', DataController::class);

    Route::controller(DataController::class)->group(function(){
    Route::post('data-store', 'store');
    Route::post('data-showRecent', 'showRecent');
    Route::post('data-show/{id}', 'show');
    });

    Route::controller(alarmsController::class)->group(function(){
    Route::post('alarm-store', 'store');
    Route::post('alarm-show', 'show');
    });
    Route::controller(controlsController::class)->group(function(){
        Route::post('control-waterPump', 'waterPump');
        Route::post('control-waterPump', 'index');
//    Route::post('alarm-show', 'show');
    });
});
