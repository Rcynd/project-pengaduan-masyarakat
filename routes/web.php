<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\AduanController;

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
Route::get('/font', function () {
    return view('font');
});

Route::middleware('guest')->group(function () {

    // Login Route
    Route::get('/login',[LoginController::class, 'index'])->name('login');
    Route::post('/login',[LoginController::class, 'authenticate']);

    // Register Route
    Route::get('/register',[RegisterController::class, 'index']);
    Route::post('/register',[RegisterController::class, 'store']);

});

Route::middleware(['admin'])->group(function () {
    // Register Route
    Route::get('/registrasi',[RegisterController::class , 'admin']);
    Route::get('/registrasi/create',[RegisterController::class , 'create']);
    Route::post('/registrasi/create',[RegisterController::class , 'push']);
    Route::get('/registrasi/edit/{user:username}', [RegisterController::class, 'edit']);
    Route::post('/registrasi/edit/{user:username}', [RegisterController::class, 'update']);
    Route::get('/registrasi/hapus/{user:username}', [RegisterController::class, 'destroy']);

    
    Route::get('/cetak-laporan', [LaporanController::class, 'cetakLaporan']);
});

Route::middleware(['petugas'])->group(function () {
    // Laporan Route
    Route::get('/laporan',[LaporanController::class , 'index']);
    Route::post('/laporan/create',[LaporanController::class , 'store']);
    Route::get('/laporan/detail/{user:id}', [LaporanController::class, 'detail']);

    // Masyarakat Route
    Route::get('/masyarakat',[MasyarakatController::class , 'index']);
    Route::get('/masyarakat/create',[MasyarakatController::class , 'create']);
    Route::post('/masyarakat/create',[MasyarakatController::class , 'push']);
    Route::post('/masyarakat/validasi/{masyarakat:nik}',[MasyarakatController::class , 'validasi']);
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
    Route::get('/tanggapan/hapus/{user:id}', [TanggapanController::class, 'destroy']);
    
});


Route::middleware(['masyarakat'])->group(function () {
    Route::get('/aduan',[AduanController::class , 'index']);
    Route::get('/aduan/create',[AduanController::class , 'create']);
    Route::post('/aduan/create',[AduanController::class , 'store']);
    Route::get('/aduan/detail/{user:id}', [AduanController::class, 'detail']);
    Route::get('/aduan/hapus/{user:id}', [AduanController::class, 'destroy']);

});
Route::middleware(['auth'])->group(function () {
    // Dashboard Route
    Route::get('/dashboard',[DashboardController::class , 'index']);
    
    // Logout Route
    Route::post('/logout',[LoginController::class, 'logout']);
});
