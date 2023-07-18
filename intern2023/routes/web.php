<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\UserController;
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
Route::get('/admin/pdRkAAT+XxepOb8drasiSw==' , [adminController::class , 'index']);
    
