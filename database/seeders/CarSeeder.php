<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Car::create([
            'brand_id' => 1,
            'name' => 'Force',
            'plate' => 'ABC123',
            'transmission' => 'manual',
            'fuel_type' => 'petrol',
            'seats' => 6,
            'price_per_day' => 3000000,
            'thumbnail' => 'assets/images/force.png',
            'status' => 'available'
        ]);
    }
}
