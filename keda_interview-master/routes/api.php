<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ReportController;

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

Route::group(['prefix' => 'auth'], function () {
    Route::post('logout', [LoginController::class,'logout'])->name('logout');
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::get('delete/{id}', [StaffController::class, 'delete_customer']);
    Route::get('all_customer', [StaffController::class, 'all_customer']);
});

Route::post('send_message', [MessageController::class, 'send']);
Route::get('history_customer', [MessageController::class, 'history_customer']);
Route::get('all_history', [MessageController::class, 'all_history']);
Route::post('report',[ReportController::class,'report']);