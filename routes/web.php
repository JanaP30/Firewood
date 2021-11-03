<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PublicController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PrintoutOfOrders;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminMiddleware;

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

//Auth::routes(['register' => false]);
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);

Route::get('/home', [HomeController::class, 'index'])->name('home');

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
Route::get('order/get-by-email/{email}', [OrdersController::class, 'getOrdersByEmail']);



Route::get('order/printout-of-order', [PrintoutOfOrders::class, 'index'])->name('printoutOfOrders.index');

Route::prefix('admin')->group(function(){
    Route::get('orders', [OrdersController::class, 'getAdminOrders']);
    Route::get('/orders/index', [OrdersController::class, 'index'])->name('orders.index')->middleware([AdminMiddleware::class]);
    Route::get('/orders/show/{id}', [OrdersController::class, 'show'])->name('orders.show')->middleware([AdminMiddleware::class]);
});

