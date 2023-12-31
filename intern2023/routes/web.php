<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\userCodeController;
use App\Http\Controllers\ExportController;
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

Route::get('/', [UserController::class, 'index'])->name('form');
Route::post('/', [UserController::class, 'store']);
Route::get('/qr', [userCodeController::class, 'qrCode'])->name('Home.qr');
Route::post('/user-code', [userCodeController::class, 'store'])->name('user-code.store');
Route::get('/export/{format}', 'ExportController@ExportController')->name('export.download');

Route::middleware('guest')->group(function () {
Route::get('/admin/pdRkAAT+XxepOb8drasiSw==/login' , [AuthController::class , 'loginForm']);
Route::post('/admin/pdRkAAT+XxepOb8drasiSw==/login' , [AuthController::class , 'login'])->name('login');

Route::get('/admin/pdRkAAT+XxepOb8drasiSw==/create-admin' , [AuthController::class , 'registerForm']);
Route::post('/admin/pdRkAAT+XxepOb8drasiSw==/create-admin' , [AuthController::class , 'register']);
});

Route::middleware('auth')->group(function(){
    Route::post('/admin/pdRkAAT+XxepOb8drasiSw==/logout' , [AuthController::class , 'logout']);

});

Route::middleware('admins')->group(function () {
    Route::get('/admin/pdRkAAT+XxepOb8drasiSw==', [adminController::class, 'index']);
    Route::get('/admin/pdRkAAT+XxepOb8drasiSw==/qr', [adminController::class, 'adminQR']);

    Route::middleware('super')->group(function () {
        Route::get('/admin/pdRkAAT+XxepOb8drasiSw==/dashboard', [dashboardController::class, 'index'])->name('admin');
        Route::get('/admin/pdRkAAT+XxepOb8drasiSw==/dashboard/create', [dashboardController::class, 'create']);
        Route::post('/admin/pdRkAAT+XxepOb8drasiSw==/dashboard', [dashboardController::class, 'store']);
        Route::get('/admin/pdRkAAT+XxepOb8drasiSw==/dashboard/{dashboards}/edit', [dashboardController::class, 'edit'])->name('dashboard.edit');
        Route::put('/admin/pdRkAAT+XxepOb8drasiSw==/dashboard/{dashboards}', [dashboardController::class, 'update']);
        Route::get('/admin/pdRkAAT+XxepOb8drasiSw==/create-admin', [AuthController::class, 'registerForm']);
        Route::post('/admin/pdRkAAT+XxepOb8drasiSw==/create-admin', [AuthController::class, 'register']);
    });


});
