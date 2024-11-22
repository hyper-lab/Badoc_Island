<?php
// database/seeders/AccommodationSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Accommodation;

class AccommodationSeeder extends Seeder
{
    public function run()
    {
        Accommodation::create([
            'acc_type' => 'Single Room',
            'acc_slot' => 1,
            'acc_price' => 1000.00
        ]);

        Accommodation::create([
            'acc_type' => 'Double Room',
            'acc_slot' => 2,
            'acc_price' => 1800.00
        ]);

        Accommodation::create([
            'acc_type' => 'Family Room',
            'acc_slot' => 4,
            'acc_price' => 3500.00
        ]);
    }
}