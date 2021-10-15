<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PublicController;
use App\Http\Controllers\OrdersController;

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

Route::get('/', [App\Http\Controllers\PublicController::class, 'index']);
Route::post('/store-order', [OrdersController::class, 'store'])->name('order.store');
Route::get('/success/{id}', [OrdersController::class, 'success']);    


// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//ProductType route
Route::get('product-type/', [App\Http\Controllers\ProductTypeController::class, 'index'])->name('productType.index');
Route::get('product-type/create', [App\Http\Controllers\ProductTypeController::class, 'create'])->name('productType.create');
Route::post('product-type/update/{id}', [App\Http\Controllers\ProductTypeController::class, 'update'])->name('productType.update');
Route::get('product-type/delete/{id}', [App\Http\Controllers\ProductTypeController::class, 'delete'])->name('productType.delete');

//Category route
Route::get('products/', [App\Http\Controllers\CategoryController::class, 'index'])->name('products.index');
Route::get('products/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('products.create');
Route::post('products/update/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('products.update');
Route::get('products/delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('products.delete');

//Order route
Route::get('order/', [App\Http\Controllers\OrderController::class, 'index'])->name('order.index');
Route::get('order/create', [App\Http\Controllers\OrderController::class, 'create'])->name('order.create');
Route::get('order/approved/{id}', [App\Http\Controllers\OrderController::class, 'approved'])->name('order.approved');

