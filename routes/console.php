<?php

use App\Models\Card;
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


// Schedule::call(function () {
//     $user = User::find(auth());
//     dump($user);
// })->everyTwoSeconds();