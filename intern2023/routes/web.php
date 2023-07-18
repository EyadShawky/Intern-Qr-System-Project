<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\userCodeController;
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

Route::get('/' , [UserController::class , 'index']);
Route::post('/' , [UserController::class , 'store']);
Route::get('/admin/H8+Qmuu76HT4W7NjYRO1llEjfNC2CI59A3dQjgfCZfs=' , [adminController::class , 'index']);

