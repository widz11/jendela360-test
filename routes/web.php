<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Cars\CarsController;
use App\Http\Controllers\Sales\ReportSalesController;
use App\Http\Controllers\Sales\SalesController;
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

Route::get('/', [AuthController::class, 'index']);
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::prefix('sales')->group(function () {
        Route::get('/', [SalesController::class, 'index'])->name('sales');
        Route::get('/create', [SalesController::class, 'create']);
        Route::post('/create', [SalesController::class, 'store']);
        Route::get('/edit/{id}', [SalesController::class, 'edit']);
        Route::post('/update/{id}', [SalesController::class, 'update']);
        Route::get('/delete/{id}', [SalesController::class, 'delete']);
        Route::get('/report', [ReportSalesController::class, 'todayReport']);
    });

    Route::prefix('cars')->group(function () {
        Route::get('/', [CarsController::class, 'index'])->name('cars');
        Route::get('/create', [CarsController::class, 'create']);
        Route::post('/create', [CarsController::class, 'store']);
        Route::get('/edit/{id}', [CarsController::class, 'edit']);
        Route::post('/update/{id}', [CarsController::class, 'update']);
        Route::get('/delete/{id}', [CarsController::class, 'delete']);
    });
});
