<?php

use App\Http\Controllers\PiglyController;
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



Route::middleware('auth')->group(function () {
    Route::get('/weight_logs', [PiglyController::class, 'index']);
    Route::post('/register/step2', [PiglyController::class, 'CurrentWeight']);
    Route::post('/logout', [PiglyController::class, 'logout'])->name('logout');
    Route::get('/wight_logs/goal_setting', [PiglyController::class, 'getSettingWeight']);
    Route::get('/weight_logs/{weightLog_id}/update', [PiglyController::class, 'getUpdateData']);
});

Route::middleware('guest')->group(function () {
    Route::post('/login', [PiglyController::class, 'postLogin'])->name('login');
    Route::get('/register/step1', [PiglyController::class, 'getRegister']);
    Route::post('/register/step1', [PiglyController::class, 'postRegister']);
});
