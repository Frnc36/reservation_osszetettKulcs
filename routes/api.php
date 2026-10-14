<?php

use App\Http\Controllers\AirlineController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('airlines/{airline}',[AirlineController::class,'show']);
Route::get('airlines/{airline}',[AirlineController::class,'destroy']);