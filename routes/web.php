<?php

use App\Http\Controllers\PinjamController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/pinjams', \App\Http\Controllers\PinjamController::class, 'index');

Route::middleware(['auth'])->group(function(){
    Route::resource('pinjams', PinjamController::class);
    Route::resource('/pinjams', \App\Http\Controllers\PinjamController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
