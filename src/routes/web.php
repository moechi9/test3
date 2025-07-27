<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Weight_logController;

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

Route::post('/register/step2', [Weight_logController::class, 'register2']);

Route::middleware('auth')->group(function () {
        Route::get('/weight_logs', [Weight_logController::class, 'weight_logs']);
        Route::get('/weight_logs/goal_setting', [Weight_logController::class, 'goalSetting']);
        Route::get('/weight_logs/goal_update', [Weight_logController::class, 'goalUpdate']);
});

// Route::get('/weight_logs/create', [Weight_logController::class, 'create']);
// Route::post('/weight_logs/create', [Weight_logController::class, 'create']);

Route::get('/weight_logs/{weightLogId}', [Weight_logController::class, 'detail'])->name('weight_log.weightLogId');
Route::patch('/weight_logs/{weightLogId}/update', [Weight_logController::class, 'update'])->name('product.productId.update');
