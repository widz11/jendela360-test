<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Cars\CarsController;
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
    Route::get('sales', [SalesController::class, 'index'])->name('sales');
    Route::get('cars', [CarsController::class, 'index'])->name('cars');
});
