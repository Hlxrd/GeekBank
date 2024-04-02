<?php

use App\Http\Controllers\DoubleAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellerController;
use App\Http\Middleware\SellerMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/verify', [DoubleAuthController::class, 'index'])->name('doubleAuth.index');
Route::post('/verify/verityCode', [DoubleAuthController::class, 'verityCode'])->name('doubleAuth.verityCode');
Route::get('/verify/resendCode', [DoubleAuthController::class, 'resendCode'])->name('doubleAuth.resendCode');

Route::get('/home/index',[HomeController::class , 'index'])->name('home.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
