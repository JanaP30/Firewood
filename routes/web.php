<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PublicController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PrintoutOfOrders;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;

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

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//ProductType route
Route::get('product-type/', [ProductTypeController::class, 'index'])->name('productType.index');
Route::get('product-type/create', [ProductTypeController::class, 'create'])->name('productType.create');
Route::post('product-type/update/{id}', [ProductTypeController::class, 'update'])->name('productType.update');
Route::get('product-type/delete/{id}', [ProductTypeController::class, 'delete'])->name('productType.delete');

//Category route
Route::get('products/', [ProductController::class, 'index'])->name('products.index');
Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('products/update/{id}', [ProductController::class, 'update'])->name('products.update');
Route::get('products/delete/{id}', [ProductController::class, 'delete'])->name('products.delete');

//Order route
Route::get('order/', [OrdersController::class, 'index'])->name('order.index');
Route::get('order/create', [OrdersController::class, 'create'])->name('order.create');
Route::get('order/approved/{id}', [OrdersController::class, 'approved'])->name('order.approved');

Route::get('order/printout-of-order', [PrintoutOfOrders::class, 'index'])->name('printoutOfOrders.index');

