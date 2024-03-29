<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\CheckoutController;
use App\Http\Controllers\API\TransactionController;
use Illuminate\Support\Facades\Route;

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


// Route::get('products', 'API\ProductController@all');

Route::get('/products', [\App\Http\Controllers\API\ProductController::class, 'all']);

Route::post('checkout', [CheckoutController::class, 'checkout']);

Route::get('/transactions/{id}', [\App\Http\Controllers\API\TransactionController::class, 'get']);
