<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ShippingRate;
class ShippingRatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shippingRates = [
            [
                'name' => 'Pickup from Eagle Eye',
                'rate' => 0,
            ],
            [
                'name' => 'Flat Rate Shipping',
                'rate' => 15.99,
            ],
            [
                'name' => 'Flat Rate: Over 47"',
                'rate' => 36.95,
            ],
            [
                'name' => 'Use My Carrier',
                'rate' => 0,
            ],
            [
                'name' => 'Air Freight',
                'rate' => 150.00,
            ],
        ];

        // Insert the shipping rates into the database using Eloquent
        foreach ($shippingRates as $rate) {
            ShippingRate::create($rate);
        }
    }
}
