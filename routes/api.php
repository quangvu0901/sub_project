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
    Route::get('getOne',[ProductController::class,'getProductWithOneImg']);
    Route::get('getAll',[ProductController::class,'getProductWithAllImg']);
    Route::get('search/{name}',[ProductController::class,'search']);
});

Route::prefix('/categories')->group(function(){
    Route::get('getCategories',[CategoryController::class,'getCategories']);
});

Route::prefix('profile')->group(function (){
    Route::get('getUser',[\App\Http\Controllers\Api\ProfileController::class,'getUser']);
    Route::put('updateUser',[\App\Http\Controllers\Api\ProfileController::class,'update']);
});
