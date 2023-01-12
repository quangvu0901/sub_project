<?php

use App\Http\Controllers\CMS\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth', 'verified','check_user'])->prefix('users')->group( function () {
    Route::get('/index', [UserController::class, 'index'])->name('user.index');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
});

Route::middleware(['auth', 'verified','check_user'])->prefix('products')->group(function () {
    Route::get('/index', [\App\Http\Controllers\CMS\ProductController::class, 'index'])->name('product.index');
    Route::get('/create', [\App\Http\Controllers\CMS\ProductController::class, 'create'])->name('product.create');
    Route::post('/store', [\App\Http\Controllers\CMS\ProductController::class, 'store'])->name('product.store');
    Route::get('/edit/{id}', [\App\Http\Controllers\CMS\ProductController::class, 'edit'])->name('product.edit');
    Route::post('/update/{id}', [\App\Http\Controllers\CMS\ProductController::class, 'update'])->name('product.update');
    Route::get('/delete/{id}', [\App\Http\Controllers\CMS\ProductController::class, 'destroy'])->name('product.delete');
});

Route::middleware(['auth', 'verified','check_user'])->prefix('categories')->group(function () {
    Route::get('/index', [\App\Http\Controllers\CMS\CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [\App\Http\Controllers\CMS\CategoryController::class, 'create'])->name('category.create');
    Route::post('/store', [\App\Http\Controllers\CMS\CategoryController::class, 'store'])->name('category.store');
    Route::get('/edit/{id}', [\App\Http\Controllers\CMS\CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/update/{id}', [\App\Http\Controllers\CMS\CategoryController::class, 'update'])->name('category.update');
    Route::get('/delete/{id}', [\App\Http\Controllers\CMS\CategoryController::class, 'destroy'])->name('category.delete');
});



