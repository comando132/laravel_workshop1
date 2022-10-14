<?php

use App\Http\Controllers\CarsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [CarsController::class, 'index']);
Route::get('/cars', [CarsController::class, 'index']);

Route::get('/cars/create', [CarsController::class, 'create'])->middleware('auth');
Route::get('/cars/edit/{car}',[CarsController::class, 'edit'])->middleware('auth');
Route::get('/cars/manage', [CarsController::class, 'manage'])->middleware('auth');

Route::post('/cars', [CarsController::class, 'store'])->middleware('auth');
Route::put('/cars/{car}', [CarsController::class, 'update'])->middleware('auth');
Route::delete('/cars/{car}', [CarsController::class, 'destroy'])->middleware('auth');


Route::get('/login', [UsersController::class, 'login'])->name('login')->middleware('guest');
Route::post('/authenticate', [UsersController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [UsersController::class, 'logout'])->middleware('auth');


