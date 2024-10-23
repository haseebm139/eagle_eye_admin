<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Uncategorized', 'slug' => 'uncategorized'],
            ['name' => 'Apex', 'slug' => 'apex'],
            ['name' => 'Big Truck Rental', 'slug' => 'btr'],
            ['name' => 'Champion', 'slug' => 'champion-2'],
            ['name' => 'City of Dallas', 'slug' => 'cod'],
            ['name' => 'Cummins', 'slug' => 'cummins'],
            ['name' => 'CVS', 'slug' => 'cvs'],
            ['name' => 'FCC/Premier', 'slug' => 'fcc.premier'],
            ['name' => 'Fleet', 'slug' => 'fleet'],
            ['name' => 'Frontier', 'slug' => 'frontier'],
            ['name' => 'G&H', 'slug' => 'gandh'],
            ['name' => 'Internal', 'slug' => 'internal'],
            ['name' => 'LETCO', 'slug' => 'letco'],
            ['name' => 'Mesquite', 'slug' => 'mesquite'],
            ['name' => 'NTTA', 'slug' => 'ntta'],
            ['name' => 'Prime Pest', 'slug' => 'pest'],
            ['name' => 'Products', 'slug' => 'products'],
            ['name' => 'Texas DPS', 'slug' => 'texasdps'],
            ['name' => 'The Ground Up', 'slug' => 'tgu'],
            ['name' => 'Waste', 'slug' => 'waste'],
            ['name' => 'Waste Connections', 'slug' => 'wasteconnect'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
