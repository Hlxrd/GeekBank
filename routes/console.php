<?php

use App\Models\Card;
use App\Models\Loan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

Artisan::command('inspire', function () {
    dump(Auth::user());
})->purpose('Display an inspiring quote')->hourly();


// Artisan::command('test', function () {
//     $date = now()->format('m-Y');
//     dd($date);
// });

Schedule::call(function () {
    $loans = Loan::where('is_paid_off' , false)->get();
    foreach ($loans as $loan) {
        if (!$loan->is_paid_off && $loan->amount > 0) {
            $loan->amount = $loan->amount * 0.1; 
            $loan->save();
            
        } else {
            $loan->is_paid_off = true ; 
            $loan->save();
        }
    }
})->everyTwoSeconds();
