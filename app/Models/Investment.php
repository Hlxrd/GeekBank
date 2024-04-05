<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;

    protected $fillable = [
        'nameInvest',
        'user_id',
        'investment_option_id',
        'amount',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function investment_option(){
        return $this->belongsTo(Investment_option::class);
    }
}
