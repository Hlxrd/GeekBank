<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment_option extends Model
{
    use HasFactory;

    protected $fillable  = [
        'name',
        'description',
        'return_rate',
        'interval_seconds',
        'max_iterations',
    ];

    public function investments(){
        return $this->hasMany(Investment::class);
    }
}
