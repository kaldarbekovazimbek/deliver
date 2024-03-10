<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::get('users', [UserController::class, 'index']);
Route::post('users', [UserController::class, 'store']);
Route::get('users/{userId}', [UserController::class, 'show']);
Route::put('users/{userId}', [UserController::class, 'update']);
Route::delete('users/{userId}', [UserController::class, 'destroy']);

Route::get('restaurants', [RestaurantController::class,'index']);
Route::post('restaurants', [RestaurantController::class,'store']);
Route::get('restaurants/{restaurantId}', [RestaurantController::class,'show']);
Route::put('restaurants/{restaurantId}', [RestaurantController::class,'update']);
Route::delete('restaurants/{restaurantId}', [RestaurantController::class,'destroy']);
