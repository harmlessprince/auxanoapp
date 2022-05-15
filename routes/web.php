<?php

use App\Http\Controllers\Api\CategoryController as ApiCategoryController;
use App\Http\Controllers\Api\DashboardController as ApiDashboardController;
use App\Http\Controllers\Api\PriorityController as ApiPriorityController;
use App\Http\Controllers\Api\StatusController;
use App\Http\Controllers\Api\AgentController;
use App\Http\Controllers\Api\TaskController as ApiTaskController;
use App\Http\Controllers\Api\TicketAssignController;
use App\Http\Controllers\Api\TicketController as ApiTicketController;
use App\Http\Controllers\Api\TicketPriorityChangeController;
use App\Http\Controllers\Api\TicketStatusChangeController;
use App\Http\Controllers\Api\UserController as ApiUserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\CategoryList;
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
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');


    Route::prefix('vue')->name('vue.')->namespace('Api')->group(function () {
        Route::patch('tickets/{ticket}/status', [TicketStatusChangeController::class, 'update']);
        Route::patch('tickets/{ticket}/priority', [TicketPriorityChangeController::class, 'update']);
        Route::patch('tickets/{ticket}/reassign', [TicketAssignController::class, 'update']);
        Route::get('statuses', [StatusController::class, 'index'])->name('statuses');
        Route::get('priorities', [ApiPriorityController::class, 'index'])->name('priorities');
        Route::get('agents', [AgentController::class, 'index']);
        Route::get('users', [ApiUserController::class, 'index']);
        Route::get('tickets', [ApiTicketController::class, 'index'])->name('tickets');
        Route::get('dashboard', [ApiDashboardController::class, 'index'])->name('dashboard.index');
        Route::prefix('tasks')->group(function () {
            Route::post('/', [ApiTaskController::class, 'store'])->name('tasks.store');
            Route::get('/', [ApiTaskController::class, 'index'])->name('tasks.index');
            Route::patch('/{task}', [ApiTaskController::class, 'update'])->name('tasks.update');
            Route::patch('/{task}/mark', [ApiTaskController::class, 'mark'])->name('tasks.mark');
            Route::patch('/{task}/assign', [ApiTaskController::class, 'assign'])->name('tasks.assign');
            Route::delete('/{task}/delete', [ApiTaskController::class, 'destroy'])->name('tasks.destroy');
        });
        Route::prefix('categories')->group(function () {
            Route::get('/', [ApiCategoryController::class, 'index'])->name('categories.name');
            Route::patch('/{category}', [ApiCategoryController::class, 'update'])->name('categories.update');
            Route::delete('/{category}', [ApiCategoryController::class, 'destroy'])->name('categories.delete');
        });
    });
});
