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
// Routes for sales
Route::get('/', [SaleController::class, 'index'])->name('index');
Route::get('/sales/{sale_id}', [SaleController::class, 'show']);
Route::get('/sales/edit/{sale_id}', [SaleController::class, 'edit'])->name('sales.edit');
Route::get('/sale-creation', [SaleController::class, 'create'])->name('sales.create');
Route::put('/sales/update/{sale_id}', [SaleController::class, 'update'])->name('sales.update');
Route::post('/sales/store', [SaleController::class, 'store'])->name('sales.store');
Route::get('/sales/delete/{sale_id}', [SaleController::class, 'destroy'])->name('sales.delete');

// Routes for employees
Route::get('/employees-creation', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employees.store');

//  Routes for customers 
Route::get('/customers-creation', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers/store', [CustomerController::class, 'store'])->name('customers.store');

//  Routes for products 
Route::get('/products-creation', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');

// Routes for load dinamic data
Route::get('/employeesList', [EmployeeController::class, 'getEmployees'])->name('employeesList');
Route::get('/customersList', [CustomerController::class, 'getCustomers'])->name('customersList');
Route::get('/productsList', [ProductController::class, 'getProducts'])->name('productsList');