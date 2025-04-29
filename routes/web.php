<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Livewire\UserRegistration;
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

Route::view('/', 'welcome')->name('home');

Route::prefix('admin.')->middleware('is_admin')->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('admin.product.index');
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('admin.product.show');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.product.store');
    Route::put('/product/{id}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');

    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('admin.category.show');
    Route::post('/categories', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::put('/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
});

Route::view("/register",UserRegistration::class);

