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
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\PrakerinController;
use App\Http\Controllers\SikapController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\PengetahuanController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\CatatanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\HomeController;



// route login
Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::post('/login',[AuthController::class,'login'])->name('login.action');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

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
    // prakerin
    Route::group(['prefix'=>'prakerin'],function(){
        Route::get('/',[PrakerinController::class,'index'])->name('prakerin.index');
        Route::get('/siswa',[PrakerinController::class,'wali'])->name('prakerin.wali');
        Route::get('/create',[PrakerinController::class,'create'])->name('prakerin.create');
        Route::post('/store',[PrakerinController::class,'store'])->name('prakerin.store');
        Route::get('/edit/{prakerin}',[PrakerinController::class,'edit'])->name('prakerin.edit');
        Route::put('/update/{prakerin}',[PrakerinController::class,'update'])->name('prakerin.update');
        Route::put('/destroy/{prakerin}',[PrakerinController::class,'destroy'])->name('prakerin.destroy');
    });
    // absen
    Route::group(['prefix'=>'absen'],function(){
        Route::get('/',[AbsenController::class,'index'])->name('absen.index');
        Route::get('/siswa',[AbsenController::class,'wali'])->name('absen.wali');
        Route::get('/create',[AbsenController::class,'create'])->name('absen.create');
        Route::post('/store',[AbsenController::class,'store'])->name('absen.store');
        Route::get('/edit/{absen}',[AbsenController::class,'edit'])->name('absen.edit');
        Route::put('/update/{absen}',[AbsenController::class,'update'])->name('absen.update');
        Route::put('/destroy/{absen}',[AbsenController::class,'destroy'])->name('absen.destroy');
    });
    // sikap
    Route::group(['prefix'=>'sikap'],function(){
        Route::get('/',[SikapController::class,'index'])->name('sikap.index');
        Route::get('/siswa',[SikapController::class,'wali'])->name('sikap.wali');
        Route::get('/create',[SikapController::class,'create'])->name('sikap.create');
        Route::post('/store',[SikapController::class,'store'])->name('sikap.store');
        Route::get('/edit/{sikap}',[SikapController::class,'edit'])->name('sikap.edit');
        Route::put('/update/{sikap}',[SikapController::class,'update'])->name('sikap.update');
        Route::put('/destroy/{sikap}',[SikapController::class,'destroy'])->name('sikap.destroy');
    });
    // catatatn
    Route::group(['prefix'=>'catatan'],function(){
        Route::get('/',[CatatanController::class,'index'])->name('catatan.index');
        Route::get('/siswa',[CatatanController::class,'wali'])->name('catatan.wali');
        Route::get('/create',[CatatanController::class,'create'])->name('catatan.create');
        Route::post('/store',[CatatanController::class,'store'])->name('catatan.store');
        Route::get('/edit/{catatan}',[CatatanController::class,'edit'])->name('catatan.edit');
        Route::put('/update/{catatan}',[CatatanController::class,'update'])->name('catatan.update');
        Route::put('/destroy/{catatan}',[CatatanController::class,'destroy'])->name('catatan.destroy');
    });
    // ekstrakurikuler
    Route::group(['prefix'=>'ekstrakurikuler'],function(){
        Route::get('/',[EkstrakurikulerController::class,'index'])->name('ekstrakurikuler.index');
        Route::get('/siswa',[EkstrakurikulerController::class,'wali'])->name('ekstrakurikuler.wali');
        Route::get('/create',[EkstrakurikulerController::class,'create'])->name('ekstrakurikuler.create');
        Route::post('/store',[EkstrakurikulerController::class,'store'])->name('ekstrakurikuler.store');
        Route::get('/edit/{ekstrakurikuler}',[EkstrakurikulerController::class,'edit'])->name('ekstrakurikuler.edit');
        Route::put('/update/{ekstrakurikuler}',[EkstrakurikulerController::class,'update'])->name('ekstrakurikuler.update');
        Route::put('/destroy/{ekstrakurikuler}',[EkstrakurikulerController::class,'destroy'])->name('ekstrakurikuler.destroy');
    });
});


// nilai siswa
Route::group(['prefix'=>'siswa'],function(){
    Route::get('nilai',[NilaiController::class,'index'])->name('siswa.nilai.index');
    Route::get('nilai/download',[NilaiController::class,'download'])->name('siswa.nilai.download');
});
