<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccommodationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('accomodation')->insert([
            [
                'acc_type' => 'Local Tourist',
                'acc_price' => 350.00,
                'acc_slot' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'acc_type' => 'Foreign Tourist',
                'acc_price' => 500.00,
                'acc_slot' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}