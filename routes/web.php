<?php

use App\Http\Controllers\CryptoController;
use App\Http\Controllers\DoubleAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellerController;
use App\Http\Middleware\SellerMiddleware;
use App\Models\crypto;
use Illuminate\Support\Facades\Route;


// Route::get('/products', [ProductController::class, 'index'])->middleware(['auth', 'verified'])->name('product.index');
// Route::get('/seller', [SellerController::class, 'index'])->middleware(SellerMiddleware::class)->name('seller.index');
// Route::get('/seller/products', [SellerController::class, 'sellerProducts'])->middleware(SellerMiddleware::class)->name('seller.sellerProducts');
// Route::post('/product/store', [SellerController::class, 'store'])->name('product.store');
Route::get('verify', [DoubleAuthController::class, 'index'])->name('doubleAuth.index');
Route::post('verify/verityCode', [DoubleAuthController::class, 'verityCode'])->name('doubleAuth.verityCode');
Route::get('verify/resendCode', [DoubleAuthController::class, 'resendCode'])->name('doubleAuth.resendCode');
Route::get('/crypto',[CryptoController::class,'index'])->name('crypto.crypto');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
