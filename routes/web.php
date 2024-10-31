<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ProductVariantController;
use App\Http\Controllers\Dashboard\VariantStockController;
use App\Http\Controllers\Dashboard\TransactionController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\ProductImageController;
use App\Http\Controllers\LandingController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/watermark/{category}', [LandingController::class, 'watermark'])->name('watermark');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Category
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    //Product
    Route::get('products', [ProductController::class, 'index'])->name('dashboard.products.index');
    Route::post('products', [ProductController::class, 'store'])->name('dashboard.products.store');
    Route::get('products/{product}', [ProductController::class, 'edit'])->name('dashboard.products.edit');
    Route::put('products/{product}', [ProductController::class, 'update'])->name('dashboard.products.update');
    Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('dashboard.products.destroy');
    //Product Variant
    Route::get('products/{product}/variants', [ProductVariantController::class, 'index'])->name('product-variants.index');
    Route::post('products/{product}/variants', [ProductVariantController::class, 'store'])->name('product-variants.store');
    Route::get('products/{product}/variants/{productVariant}', [ProductVariantController::class, 'edit'])->name('product-variants.edit');
    Route::put('products/{product}/variants/{productVariant}', [ProductVariantController::class, 'update'])->name('product-variants.update');
    Route::delete('products/{product}/variants/{productVariant}', [ProductVariantController::class, 'destroy'])->name('product-variants.destroy');
    //Variant Stock
    Route::get('products/{product}/variants/{productVariant}/stocks', [VariantStockController::class, 'index'])->name('variant-stocks.index');
    Route::post('products/{product}/variants/{productVariant}/stocks', [VariantStockController::class, 'store'])->name('variant-stocks.store');
    Route::get('products/{product}/variants/{productVariant}/stocks/{variantStock}', [VariantStockController::class, 'edit'])->name('variant-stocks.edit');
    Route::put('products/{product}/variants/{productVariant}/stocks/{variantStock}', [VariantStockController::class, 'update'])->name('variant-stocks.update');
    Route::delete('products/{product}/variants/{productVariant}/stocks/{variantStock}', [VariantStockController::class, 'destroy'])->name('variant-stocks.destroy');
    //Transaction
    Route::get('transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('transactions/{transaction}', [TransactionController::class, 'edit'])->name('transactions.edit');
    Route::put('transactions/{transaction}/update-status', [TransactionController::class, 'updateStatus'])->name('transactions.updateStatus');
    Route::delete('transactions/{transaction}', [TransactionController::class, 'destroy'])->name('transactions.destroy');
    //User
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    //Product Image
    Route::post('product-images', [ProductImageController::class, 'store'])->name('dashboard.product-images.store');
});

require __DIR__.'/auth.php';
