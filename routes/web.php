<?php

use App\Http\Controllers\DoubleAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\TransferController;
use App\Http\Middleware\SellerMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/2fa', [DoubleAuthController::class, 'index'])->name('doubleAuth.index');
Route::post('/2fa/switchAuthOption', [DoubleAuthController::class, 'switchAuthOption'])->name('doubleAuth.switchAuthOption');
Route::post('/2fa/verityCode', [DoubleAuthController::class, 'verityCode'])->name('doubleAuth.verityCode');
Route::get('/2fa/resendCode', [DoubleAuthController::class, 'resendCode'])->name('doubleAuth.resendCode');

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified', '2fa'])->name('home.index');
Route::get('/home/transfer', [TransferController::class, 'index'])->name('transfer.index');
Route::post('/home/transfer/handlTransfer', [TransferController::class, 'handlTransfer'])->name('transfer.handlTransfer');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
