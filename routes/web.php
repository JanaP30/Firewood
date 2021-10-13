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


//TypeOfWood route
Route::get('typeOfWood/', [App\Http\Controllers\TypeOfWoodController::class, 'index'])->name('typeOfWood.index');
Route::get('typeOfWood/create', [App\Http\Controllers\TypeOfWoodController::class, 'create'])->name('typeOfWood.create');
Route::post('typeOfWood/update/{id}', [App\Http\Controllers\TypeOfWoodController::class, 'update'])->name('typeOfWood.update');
Route::get('typeOfWood/delete/{id}', [App\Http\Controllers\TypeOfWoodController::class, 'delete'])->name('typeOfWood.delete');

//Category route
Route::get('category/', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
Route::get('category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
Route::post('category/update/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
Route::get('category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('category.delete');

//Order route
Route::get('order/', [App\Http\Controllers\OrderController::class, 'index'])->name('order.index');
Route::get('order/create', [App\Http\Controllers\OrderController::class, 'create'])->name('order.create');
Route::get('order/approved/{id}', [App\Http\Controllers\OrderController::class, 'approved'])->name('order.approved');