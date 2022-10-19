<?php

use App\Http\Controllers\Api\CarsController;
use App\Http\Controllers\Api\BrandsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/cars', [CarsController::class, 'index'])->middleware('throttle:cars_limiter');
Route::get('/cars/{car_id}', [CarsController::class, 'show'])->middleware('throttle:car_limiter');
Route::get('/brands', [BrandsController::class, 'index'])->middleware('throttle:brands_limiter');
