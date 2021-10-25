<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\v1\OrdersController;
use App\Http\Controllers\API\v1\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



//API version 1
Route::prefix('v1')->group(function(){

    Route::get('check-qty', [OrdersController::class, 'getCheckQty']);
    Route::get('get-products', [ProductController::class, 'getProducts']);
    Route::get('get-productTypes', [ProductController::class, 'getProductTypes']);
    Route::get('get-orders', [OrdersController::class, 'getOrders']);

});
