<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductAdminController;
use App\Http\Controllers\ProductDetailController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/product/{id}', [ProductController::class, 'detail'])->name('product.detail');

Route::prefix('admin')->group(function () {
    // CRUD cho SanPham
    Route::get('products', [ProductAdminController::class, 'index'])->name('products.index');
    Route::get('products/create', [ProductAdminController::class, 'create'])->name('products.create');
    Route::post('products', [ProductAdminController::class, 'store'])->name('products.store');
    Route::get('products/{id}/edit', [ProductAdminController::class, 'edit'])->name('products.edit');
    Route::put('products/{id}', [ProductAdminController::class, 'update'])->name('products.update');
    Route::delete('products/{id}', [ProductAdminController::class, 'destroy'])->name('products.destroy');

    // CRUD cho SanPhamChiTiet
    Route::get('products/{sanPhamId}/details/create', [ProductDetailController::class, 'create'])->name('product-details.create');
    Route::post('product-details', [ProductDetailController::class, 'store'])->name('product-details.store');
    Route::get('product-details/{id}/edit', [ProductDetailController::class, 'edit'])->name('product-details.edit');
    Route::put('product-details/{id}', [ProductDetailController::class, 'update'])->name('product-details.update');
    Route::delete('product-details/{id}', [ProductDetailController::class, 'destroy'])->name('product-details.destroy');
});