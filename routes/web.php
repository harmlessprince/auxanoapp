<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
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



require __DIR__ . '/auth.php';
Route::middleware('auth')->group(function () {
    Route::get('/', [DashBoardController::class, 'index'])->name('home');
    Route::get('/dashboard', [DashBoardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('tickets', TicketController::class)->only(['index', 'create', 'store']);
    Route::resource('roles', RoleController::class)->only(['index']);
    Route::resource('categories', CategoryController::class)->only(['index']);
    Route::resource('customers', CustomerController::class);
});
