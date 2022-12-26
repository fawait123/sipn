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
use App\Http\Controllers\KeterampilanController;
use App\Http\Controllers\PengetahuanController;
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

Route::group(['prefix'=>'nilai','middleware'=>'auth'],function(){
    // keterampilan
    Route::group(['prefix'=>'keterampilan'],function(){
        Route::get('/',[KeterampilanController::class,'index'])->name('keterampilan.index');
        Route::get('/mapel',[KeterampilanController::class,'mapel'])->name('keterampilan.mapel');
        Route::get('/create',[KeterampilanController::class,'create'])->name('keterampilan.create');
        Route::post('/store',[KeterampilanController::class,'store'])->name('keterampilan.store');
        Route::get('/edit/{keterampilan}',[KeterampilanController::class,'edit'])->name('keterampilan.edit');
        Route::put('/update/{keterampilan}',[KeterampilanController::class,'update'])->name('keterampilan.update');
    });
    // pengetahuan
    Route::group(['prefix'=>'pengetahuan'],function(){
        Route::get('/',[PengetahuanController::class,'index'])->name('pengetahuan.index');
        Route::get('/mapel',[PengetahuanController::class,'mapel'])->name('pengetahuan.mapel');
        Route::get('/create',[PengetahuanController::class,'create'])->name('pengetahuan.create');
        Route::post('/store',[PengetahuanController::class,'store'])->name('pengetahuan.store');
        Route::get('/edit/{pengetahuan}',[PengetahuanController::class,'edit'])->name('pengetahuan.edit');
        Route::put('/update/{pengetahuan}',[PengetahuanController::class,'update'])->name('pengetahuan.update');
    });
});
