<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // user
    Route::get('/dashboard/user', [UserController::class, 'index'])->name('user.index');
    Route::put('/dashboard/user/approve', [UserController::class, 'approveStatus'])->name('user.approve');
    Route::put('/dashboard/user/deactive', [UserController::class, 'deactiveStatus'])->name('user.deactivate');
    // category
    Route::get('/dashboard/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/dashboard/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/dashboard/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/dashboard/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::put('/dashboard/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/dashboard/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    //product
    Route::get('/dashboard/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/dashboard/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/dasboard/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/dashboard/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/dashboard/product/{id}/update', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/dashboard/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    // userpage
    Route::get('/profile-user', [UserController::class, 'showProfile'])->name('profileuser.index');
    // detail produk
    Route::get('/detail-produk/{id}', [HomeController::class, 'detailProduk'])->name('detail-produk');
});



require __DIR__ . '/auth.php';
