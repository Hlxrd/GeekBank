<?php

namespace Database\Seeders;

use App\Models\Bills;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 0; $i < 20; $i++) {
            Bills::insert([
                'title' => 'Bill ' . ($i + 1),
                'price' => mt_rand(100, 10000) / 100, 
                'due_date' => now()->addDays(rand(1, 30)),
            ]);
        }
    }
}
