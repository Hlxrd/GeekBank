<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
        'gender',
        'city',
        'double_auth_permition',
        'double_auth_validate',
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

    public function cards()
    {
        return $this->hasMany(Card::class);
    }
    public function crypto()
    {
        return $this->hasMany(crypto::class);
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function investments()
    {
        return $this->hasMany(Investment::class);
    }
    public function loans()
    {
        return $this->hasMany(Loan::class);
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
