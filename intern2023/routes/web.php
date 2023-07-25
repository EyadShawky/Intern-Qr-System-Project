<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCodeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ExportControllerTwo;
use App\Http\Controllers\DashboardController;
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

Route::get('/export/{format}', [ExportController::class, 'export'])->name('export.download');
Route::get('/export', [ExportControllerTwo::class, 'index']);

Route::middleware('guest')->group(function () {
    Route::get('/admin/pdRkAAT+XxepOb8drasiSw==/login', [AuthController::class, 'loginForm']);
    Route::post('/admin/pdRkAAT+XxepOb8drasiSw==/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::post('/admin/pdRkAAT+XxepOb8drasiSw==/logout', [AuthController::class, 'logout']);
});

Route::middleware('admins')->group(function () {
    Route::get('/admin/pdRkAAT+XxepOb8drasiSw==', [AdminController::class, 'index']);
    Route::get('/admin/pdRkAAT+XxepOb8drasiSw==/qr', [AdminController::class, 'adminQR']);

    Route::middleware('super')->group(function () {
        Route::get('/admin/pdRkAAT+XxepOb8drasiSw==/dashboard', [DashboardController::class, 'index'])->name('admin');
        Route::get('/admin/pdRkAAT+XxepOb8drasiSw==/dashboard/create', [DashboardController::class, 'create']);
        Route::post('/admin/pdRkAAT+XxepOb8drasiSw==/dashboard', [DashboardController::class, 'store']);
        Route::get('/admin/pdRkAAT+XxepOb8drasiSw==/dashboard/{dashboards}/edit', [DashboardController::class, 'edit'])->name('dashboard.edit');
        Route::put('/admin/pdRkAAT+XxepOb8drasiSw==/dashboard/{dashboards}', [DashboardController::class, 'update']);
        Route::get('/admin/pdRkAAT+XxepOb8drasiSw==/create-admin', [AuthController::class, 'registerForm']);
        Route::post('/admin/pdRkAAT+XxepOb8drasiSw==/create-admin', [AuthController::class, 'register']);
    });
});
?>