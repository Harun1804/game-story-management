<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GameProjectController;
use App\Http\Controllers\SectionController;

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

Route::prefix('auth')->name('auth.')->controller(AuthController::class)->group(function(){
    Route::get('/login','loginForm')->name('login');
    Route::post('/login-process','login')->name('login.process');
});

Route::middleware('auth')->group(function(){
    Route::get('/dashboard',DashboardController::class)->name('dashboard');
    Route::resource('game-project',GameProjectController::class);
    Route::prefix('game-project')->group(function(){
        Route::resource('game-section',SectionController::class,[
            "except" => ['index']
        ]);
    });
});
