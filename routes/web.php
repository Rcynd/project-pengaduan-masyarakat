<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TanggapanController;

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
    
    // Register Route
    Route::get('/registrasi',[RegisterController::class , 'admin']);
    Route::get('/registrasi/create',[RegisterController::class , 'create']);
    Route::post('/registrasi/create',[RegisterController::class , 'push']);
    Route::get('/registrasi/edit/{user:username}', [RegisterController::class, 'edit']);
    Route::post('/registrasi/edit/{user:username}', [RegisterController::class, 'update']);
    Route::get('/registrasi/hapus/{user:username}', [RegisterController::class, 'destroy']);

    // Masyarakat Route
    Route::get('/masyarakat',[MasyarakatController::class , 'index']);
    Route::get('/masyarakat/create',[MasyarakatController::class , 'create']);
    Route::post('/masyarakat/create',[MasyarakatController::class , 'push']);
    Route::get('/masyarakat/edit/{user:username}', [MasyarakatController::class, 'edit']);
    Route::post('/masyarakat/edit/{user:username}', [MasyarakatController::class, 'update']);
    Route::get('/masyarakat/hapus/{user:username}', [MasyarakatController::class, 'destroy']);

    // Pengaduan Route
    Route::get('/pengaduan',[PengaduanController::class , 'index']);
    Route::get('/pengaduan/create',[PengaduanController::class , 'create']);
    Route::post('/pengaduan/create',[PengaduanController::class , 'push']);
    Route::get('/pengaduan/edit/{user:nik}', [PengaduanController::class, 'edit']);
    Route::post('/pengaduan/edit/{user:nik}', [PengaduanController::class, 'update']);
    Route::get('/pengaduan/hapus/{user:nik}', [PengaduanController::class, 'destroy']);
    Route::get('/pengaduan/selesai/{user:id}', [PengaduanController::class, 'selesai']);
    Route::get('/pengaduan/proses/{user:id}', [PengaduanController::class, 'proses']);
    Route::get('/pengaduan/reset/{user:id}', [PengaduanController::class, 'reset']);
    Route::get('/pengaduan/detail/{user:id}', [PengaduanController::class, 'detail']);
    
    // Tanggapan Route
    Route::get('/tanggapan',[TanggapanController::class , 'index']);
    Route::post('/tanggapan/create',[TanggapanController::class , 'store']);
    Route::get('/tanggapan/detail/{user:id}', [TanggapanController::class, 'detail']);
    Route::get('/tanggapan/selesai/{user:id}', [PengaduanController::class, 'selesai']);

    // Tanggapan Route
    Route::get('/laporan',[LaporanController::class , 'index']);
    Route::post('/laporan/create',[LaporanController::class , 'store']);
    Route::get('/laporan/detail/{user:id}', [LaporanController::class, 'detail']);
    
    Route::get('/welcome', function(){
        return view('contekan');
    });
    Route::post('/logout',[LoginController::class, 'logout']);
});
