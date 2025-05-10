<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\checkRole;
use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Admin\Product;
use App\Livewire\Admin\UserLists;
use App\Livewire\Dashboard;
use App\Livewire\UserAuthenticated;
use App\Livewire\UserRegistration;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::view('/', 'welcome')->name('home');

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'checkrole:admin'])
    ->group(function () {
        Route::get('/dashboard', AdminDashboard::class)->name('dashboard');
        Route::get('/products', Product::class)->name('products');
        Route::get('/userlists', UserLists::class)->name('userlist');
    });
Route::middleware('guest')->group(function () {
    Route::get('/register', UserRegistration::class)->name('register');
    Route::get('/login', UserAuthenticated::class)->name('login');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    })->name('logout');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
});
