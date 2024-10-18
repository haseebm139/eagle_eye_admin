<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product; // Ensure you have this model
use App\Models\ProductImage; // Ensure you have this model
use Faker\Factory as Faker;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Create 10 fake products
        foreach (range(1, 10) as $index) {
            // Create the product
            $product = Product::create([
                'name' => $faker->word(), // Product name
                'category' => $faker->word(), // Product category
                'cost_price' => $faker->randomFloat(2, 1, 100), // Cost price
                'sell_price' => $faker->randomFloat(2, 1, 100), // Selling price
                'stock' => $faker->numberBetween(0, 100), // Quantity in stock
                'short_description' => $faker->sentence(), // Short description
                'long_description' => $faker->paragraph(), // Long description
                'time' => $faker->time(), // Time
                'date' => $faker->date(), // Date
                'is_discount' => $faker->boolean(), // Discount flag
                'is_discount2' => $faker->boolean(), // Second discount flag
                'is_expire' => $faker->boolean(), // Expiry flag
            ]);

            // Create 3 images for the product
            foreach (range(1, 3) as $imageIndex) {

                ProductImage::create([
                    'product_id' => $product->id,
                    'path' => 'documents/products/'.rand(1, 4).'.png', // Random image URL
                    'status' => 1, // Default status as Active
                ]);
            }
        }
    }
}
