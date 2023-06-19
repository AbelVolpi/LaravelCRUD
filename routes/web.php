<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
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
// Routes for screens
Route::get('/', [SaleController::class, 'index']);
Route::get('/sales/{sale_id}', [SaleController::class, 'show']);
Route::get('/test', [SaleController::class, 'create'])->name('sales.create');
Route::get('/sales/edit/{sale_id}', [SaleController::class, 'edit']);
Route::post('/sales/store', [SaleController::class, 'store'])->name('sales.store');

// Routes for load dinamic data
Route::get('/employeesList', [EmployeeController::class, 'getEmployees'])->name('employeesList');
Route::get('/customersList', [CustomerController::class, 'getCustomers'])->name('customersList');
Route::get('/productsList', [ProductController::class, 'getProducts'])->name('productsList');
