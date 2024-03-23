<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerKalkulator;

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [ControllerKalkulator::class,'getRiwayatAll']);
Route::post('/hitung', [ControllerKalkulator::class,'hitung']);
Route::delete('/hitung', [ControllerKalkulator::class,'clearRiwayatAll']);
