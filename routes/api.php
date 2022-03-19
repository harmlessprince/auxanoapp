<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PriorityController;
use App\Http\Controllers\Api\StatusController;
use App\Http\Controllers\Api\TechnicianController;
use App\Http\Controllers\Api\TicketAssignController;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Api\TicketPriorityChangeController;
use App\Http\Controllers\Api\TicketStatusChangeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth')->group(function () {
    Route::patch('tickets/{ticket}/status', [TicketStatusChangeController::class, 'update']);
    Route::patch('tickets/{ticket}/priority', [TicketPriorityChangeController::class, 'update']);
    Route::patch('tickets/{ticket}/reassign', [TicketAssignController::class, 'update']);
    Route::get('statuses', [StatusController::class, 'index']);
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('priorities', [PriorityController::class, 'index']);
    Route::get('technicians', [TechnicianController::class, 'index']);
    
    Route::get('tickets', [TicketController::class, 'index']);
});

