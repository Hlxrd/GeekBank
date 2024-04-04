<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'card_number',
        'cvc',
        'rib',
        'balance',
        'expiration_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }


    public function generateFirstCard()
    {
        $currentDate = now()->hourOfDay() .  now()->minuteOfHour() + 1 . now()->secondOfMinute();
        $this->user_id = auth()->user()->id;
        $this->card_number = rand(1000000000000000, 9999999999999999);
        $this->cvc = rand(100, 999);
        $this->rib = rand(100000000000000000, 999999999999999999);
        $this->balance = 1500;
        $this->expiration_date = now()->addYear(10)->format('m-y');
        $this->save();
    }
    public function generateSecondCard()
    {
        $currentDate = now()->hourOfDay() .  now()->minuteOfHour() + 1 . now()->secondOfMinute();
        $this->user_id = auth()->user()->id;
        $this->card_number = rand(1000000000000000, 9999999999999999);
        $this->cvc = rand(100, 999);
        $this->rib = rand(100000000000000000, 999999999999999999);
        $this->balance = 4500;
        $this->expiration_date = now()->addYear(10)->format('m-y');
        $this->save();
    }
}
