<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;




Route::get('/', function () {
    return view('welcome');
});




// route admin
Route::group(['prefix'=>'masterdata'],function(){
    Route::resource('guru',GuruController::class);
});
