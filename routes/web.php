<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Constants\Params;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', function () {
    return view('index');
})->name('index');

Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile', [ProfileController::class, 'profile'])->name('profile.profile');
});

require __DIR__.'/auth.php';

Route::middleware(['auth','check_user'])->prefix('/admin')->group(function (){
    Route::prefix('users')->group( function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user');
        Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/store', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
        Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('admin.user.delete');
    });

    Route::prefix('products')->group(function () {
        Route::get('/', [\App\Http\Controllers\ProductController::class, 'index'])->name('admin.product');
        Route::get('/create', [\App\Http\Controllers\ProductController::class, 'create'])->name('admin.product.create');
        Route::post('/store', [\App\Http\Controllers\ProductController::class, 'store'])->name('admin.product.store');
        Route::get('/edit/{id}', [\App\Http\Controllers\ProductController::class, 'edit'])->name('admin.product.edit');
        Route::post('/update/{id}', [\App\Http\Controllers\ProductController::class, 'update'])->name('admin.product.update');
        Route::get('/delete/{id}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('admin.product.delete');
    });

    Route::prefix('categories')->group(function () {
        Route::get('/', [\App\Http\Controllers\CategoryController::class, 'index'])->name('admin.category');
        Route::get('/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/store', [\App\Http\Controllers\CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/edit/{id}', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('/update/{id}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('admin.category.update');
        Route::get('/delete/{id}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('admin.category.delete');
    });
});



