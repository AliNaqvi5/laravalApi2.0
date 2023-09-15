<?php

use App\Http\Controllers\API\alarmsController;
use App\Http\Controllers\API\controlsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\dashboardController::class, 'index'])->name('dashboard');

Route::controller(alarmsController::class)->group(function(){
    Route::get('alarm-show', 'show');
    Route::get('alarm-ack/{id}', 'ack');
});


Route::controller(controlsController::class)->group(function(){
    Route::post('control-waterPump', 'waterPump');
//    Route::post('alarm-show', 'show');
});
