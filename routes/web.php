<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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
    return redirect()->route('auth.login');
});

Route::prefix('auth')->name('auth.')->group(function(){
    Route::get('/login',[AuthController::class,'loginForm'])->name('login');
    Route::post('/login-process',[AuthController::class,'login'])->name('login.process');
});

Route::middleware('auth')->group(function(){
    Route::get('/dashboard',DashboardController::class)->name('dashboard');
});
