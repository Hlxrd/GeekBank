<?php

namespace Database\Seeders;

use App\Models\Investment_option;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Investment_optionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Investment_option::insert([
            [
                'name' => 'Short-Invest',
                'description' => 'Return 10% of the fund every 5 seconds for 10 times',
                'return_rate' => 10,
                'interval_seconds' => 5,
                'max_iterations' => 10,
            ],
            [
                'name' => 'Medium-Invest',
                'description' => 'Return 20% of the fund every 1 minute for 10 times',
                'return_rate' => 20,
                'interval_seconds' => 60,
                'max_iterations' => 10,
            ],
            [
                'name' => 'Long-Invest',
                'description' => 'Return 50% of the fund every 5 minutes for 10 times',
                'return_rate' => 50,
                'interval_seconds' => 300,
                'max_iterations' => 10,
            ]
        ]);
    }
}
