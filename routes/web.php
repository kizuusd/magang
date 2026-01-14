<?php

use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\DivisionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    
    return redirect()->route('karyawans.index'); 
});


Route::resource('karyawans', KaryawanController::class);
Route::resource('positions', PositionController::class);
Route::resource('divisions', DivisionController::class);