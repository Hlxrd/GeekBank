<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'seller_or_buyer',
        'double_auth_permition',
        'double_auth_code',
        'double_auth_expires_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function generateTwoFactorCode()
    {
        $currentDate = now()->hourOfDay() .  now()->minuteOfHour() + 1 . now()->secondOfMinute();
        $this->double_auth_code = rand(100000, 999999);
        $this->double_auth_expires_at = now()->addSecond(30);
        $this->save();
    }

    public function resetTwoFactorCode()
    {
        $this->double_auth_code = null;
        $this->double_auth_expires_at = null;
        $this->save();
    }
}
