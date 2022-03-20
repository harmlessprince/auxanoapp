<?php

use App\Http\Controllers\Api\CategoryController as ApiCategoryController;
use App\Http\Controllers\Api\PriorityController as ApiPriorityController;
use App\Http\Controllers\Api\StatusController;
use App\Http\Controllers\Api\TechnicianController;
use App\Http\Controllers\Api\TicketAssignController;
use App\Http\Controllers\Api\TicketController as ApiTicketController;
use App\Http\Controllers\Api\TicketPriorityChangeController;
use App\Http\Controllers\Api\TicketStatusChangeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashBoardController;
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
    Route::resource('tickets', TicketController::class);
    Route::resource('roles', RoleController::class)->only(['index']);
    Route::resource('categories', CategoryController::class)->only(['index']);
    Route::resource('customers', CustomerController::class);


    Route::prefix('vue')->name('vue.')->namespace('Api')->group(function () {
        Route::patch('tickets/{ticket}/status', [TicketStatusChangeController::class, 'update']);
        Route::patch('tickets/{ticket}/priority', [TicketPriorityChangeController::class, 'update']);
        Route::patch('tickets/{ticket}/reassign', [TicketAssignController::class, 'update']);
        Route::get('statuses', [StatusController::class, 'index'])->name('statuses');
        Route::get('categories', [ApiCategoryController::class, 'index'])->name('categories');
        Route::get('priorities', [ApiPriorityController::class, 'index'])->name('priorities');
        Route::get('technicians', [TechnicianController::class, 'index']);
        Route::get('tickets', [ApiTicketController::class, 'index'])->name('tickets');
    });
});
