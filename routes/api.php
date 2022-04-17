<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\ClothesController;
use App\Http\Controllers\api\CustomerController;
use App\Http\Controllers\api\PriceController;
use App\Http\Controllers\api\TransactionController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);



Route::group(['prefix' => 'admin', 'middleware' => 'auth:sanctum'], function () {

    // Tester
    Route::get('{user:id}', [UserController::class, 'show']);

    // Logout
    Route::post('logout', [AuthController::class, 'logout']);

    // Customer
    Route::post('customer', [CustomerController::class, 'store']);
    Route::delete('customer', [CustomerController::class, 'destroy']);

    // Price
    Route::post('price', [PriceController::class, 'store']);
    Route::delete('price', [PriceController::class, 'destroy']);

    // Transaction
    Route::post('transaction', [TransactionController::class, 'store']);

    // Clothes
    Route::post('clothes', [ClothesController::class, 'store']);
});
