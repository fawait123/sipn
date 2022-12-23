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
use App\Http\Controllers\HomeController;




Route::get('/', function () {
    return view('welcome');
});


// route home
Route::get('home',[HomeController::class,'index'])->name('home');
// route admin
Route::group(['prefix'=>'datamaster'],function(){
    Route::resource('guru',GuruController::class);
    Route::resource('mapel',MapelController::class);
    Route::resource('prodi',ProdiController::class);
    Route::resource('siswa',SiswaController::class);
    Route::resource('ekskul',EkskulController::class);
    Route::resource('ajaran',AjaranController::class);
    Route::resource('wali',WaliController::class);
    Route::resource('kepalasekolah',KepalaSekolahController::class);
});
