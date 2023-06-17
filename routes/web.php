<?php

use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

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

Route::get('/', [SaleController::class, 'index']);
Route::post('/confirmation_data', [RegisterController::class, 'resgiterConfirmation'])->name('confirmation_data');
Route::post('/finish', [RegisterController::class, 'finish'])->name('finish');