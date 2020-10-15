<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ------------------------- 
// ### Route Employee
// --------------------------
Route::get('/employee', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employee');
Route::get('/employee/create', [App\Http\Controllers\EmployeeController::class, 'create'])->name('employee.create');
Route::post('employee/store', [App\Http\Controllers\EmployeeController::class, 'store'])->name('employee.store');
Route::get('employee/edit/{employee}', [App\Http\Controllers\EmployeeController::class, 'edit'])->name('employee.edit');
Route::post('employee/update/{employee}', [App\Http\Controllers\EmployeeController::class, 'update'])->name('employee.update');
Route::get('employee/destroy/{employee}', [App\Http\Controllers\EmployeeController::class, 'destroy'])->name('employee.destroy');
// update
// destroy

// ------------------------- 
// ### Route User
// --------------------------
Route::get('users/', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::get('users/profile/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('user.profile');

// ------------------------- 
// ### Route Product
// --------------------------
Route::get('products/', [App\Http\Controllers\ProductController::class, 'index'])->name('product');
Route::get('products/create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
Route::post('products/store', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
Route::get('products/edit/{product}', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
Route::post('products/update/{product}', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
Route::delete('products/destroy/{product}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('product.destroy');
// update
// destroy

// ------------------------- 
// ### Route Sale
// --------------------------
Route::get('sale/', [App\Http\Controllers\SaleController::class, 'index'])->name('sale');
Route::post('sale/store', [App\Http\Controllers\SaleController::class, 'store'])->name('sale.store');
Route::get('invoice/{sale}', [App\Http\Controllers\SaleController::class, 'show'])->name('invoice');
Route::get('print/{sale}', [App\Http\Controllers\SaleController::class, 'print'])->name('print');