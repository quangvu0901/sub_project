<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;

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

Route::middleware(['api','auth','verified','check_user'])->prefix('/')->group(function (){

});

Route::middleware('api')->prefix('/')->group(function (){
    Route::post('/login',[\App\Http\Controllers\AuthController::class,'login']);
    Route::get('/logout',[\App\Http\Controllers\AuthController::class,'logout']);
    Route::post('/register',[\App\Http\Controllers\AuthController::class,'register']);
});


Route::middleware('api')->prefix('/products')->group(function(){
    Route::get('index',[ProductController::class,'index']);
});

Route::middleware('api')->prefix('/categories')->group(function(){
    Route::get('index',[CategoryController::class,'index']);
});
