<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


use App\Http\Controllers\GrapfController;
use App\Http\Controllers\DistanceController;
use App\Http\Controllers\TitikController;
use App\Http\Controllers\ButTitikController;

Route::get('/grapf', [GrapfController::class, 'showShortestPath']);

Route::get('/ttrgf', function () {
    return view('graff');
});
Route::get('/find-route', [GrapfController::class, 'findShortestRoute']);

Route::get('/calculate-distance', function(){
    return view('calculate_distance');
});
Route::post('/calculate-distance/store', [DistanceController::class, 'store']);
Route::get('/', [TitikController::class,'index']);
Route::get('/new', [TitikController::class,'index']);
Route::get('/ButTitik', [ButTitikController::class,'index']);

Route::post('/titik/store', [TitikController::class,'store']);
Route::post('/ButTitik/store', [ButTitikController::class,'store']);
Route::get('/titik/hitung', [TitikController::class, 'hitungJarak']);

