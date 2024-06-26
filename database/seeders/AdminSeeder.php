<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Pest\Plugins\Profile;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'phone_number' => 123456,
            'city' => 'city',
            'gender' => 'male',
            // 'double_auth_permition' => 'chi7aja',
            // 'double_auth_code' => 'chi7aja',
            // 'double_auth_expires_at' => 'chi7aja',
            // 'email_verified_at' => 'chi7aja',
        ]);
    }
}
