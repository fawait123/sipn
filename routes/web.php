<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\KepalaSekolahController;
use App\Http\Controllers\AjaranController;
use App\Http\Controllers\WaliController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;



// route login
Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::post('/login',[AuthController::class,'login'])->name('login.action');

// route home
Route::get('home',[HomeController::class,'index'])->name('home')->middleware('auth');
// route admin
Route::group(['prefix'=>'datamaster','middleware'=>'auth'],function(){
    Route::get('guru/mapel/{kd_guru}',[GuruController::class,'gurMap'])->name('guru.mapel.form');
    Route::post('guru/mapel/{kd_guru}',[GuruController::class,'mapel'])->name('guru.mapel.action');
    Route::resource('guru',GuruController::class);
    Route::resource('mapel',MapelController::class);
    Route::resource('prodi',ProdiController::class);
    Route::resource('siswa',SiswaController::class);
    Route::resource('ekskul',EkskulController::class);
    Route::resource('ajaran',AjaranController::class);
    Route::resource('wali',WaliController::class);
    Route::resource('kepalasekolah',KepalaSekolahController::class);
    Route::resource('pengguna',PenggunaController::class);
});
