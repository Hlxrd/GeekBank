<?php

use App\Http\Controllers\BillsController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\DoubleAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransferController;
use App\Http\Middleware\SellerMiddleware;
use Illuminate\Support\Facades\Route;


// TODO bill routes
Route::get('/home/bill', [BillsController::class, 'index'])->name('bill.index');
Route::post('/home/bill/pay', [BillsController::class, 'pay'])->name('bill.pay');

Route::get('/home/investment', [InvestmentController::class, 'invest'])->name('home.invest');

// ! 
Route::get('/home/transaction', [TransactionController::class, 'index'])->name('transaction.index');

// ? double auth routes
Route::get('/2fa', [DoubleAuthController::class, 'index'])->name('doubleAuth.index');
Route::post('/2fa/switchAuthOption', [DoubleAuthController::class, 'switchAuthOption'])->name('doubleAuth.switchAuthOption');
Route::post('/2fa/verityCode', [DoubleAuthController::class, 'verityCode'])->name('doubleAuth.verityCode');
Route::get('/2fa/resendCode', [DoubleAuthController::class, 'resendCode'])->name('doubleAuth.resendCode');

// ^ transfer routes
Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified', '2fa'])->name('home.index');
Route::get('/home/transfer', [TransferController::class, 'index'])->name('transfer.index');
Route::post('/home/transfer/handlTransfer', [TransferController::class, 'handlTransfer'])->name('transfer.handlTransfer');

// & card routes
Route::get('/home/myCard', [CardController::class, 'index'])->name('myCard.index');
Route::post('/home/myCard/addCard', [CardController::class, 'store'])->name('myCard.store');
Route::delete('/home/myCard/delete/{card}', [CardController::class, 'destroy'])->name('myCard.destroy');
Route::post('/home/myCard/distributeBalance', [CardController::class, 'distributeBalance'])->name('myCard.distributeBalance');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
