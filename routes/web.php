<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;




Route::get('/', function () {
    return view('welcome');
});




// route home
Route::get('home',[HomeController::class,'index'])->name('home');
// route admin
Route::group(['prefix'=>'masterdata'],function(){
    Route::resource('guru',GuruController::class);
});
