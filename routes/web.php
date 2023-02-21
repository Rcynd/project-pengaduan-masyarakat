<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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
    return view('welcome.welcome');
});

Route::middleware('guest')->group(function () {

    // Login Route
    Route::get('/login',[LoginController::class, 'index'])->name('login');
    Route::post('/login',[LoginController::class, 'authenticate']);

    // Register Route
    Route::get('/register',[RegisterController::class, 'index']);
    Route::post('/register',[RegisterController::class, 'store']);

});
Route::middleware(['auth'])->group(function () {

    // Dashboard Route
    Route::get('/dashboard',[DashboardController::class , 'index']);

    
    
    Route::get('/welcome', function(){
        return view('contekan');
    });
    Route::get('/logout',[LoginController::class, 'logout']);
});
