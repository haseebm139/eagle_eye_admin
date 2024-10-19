<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Optionally, create additional fake users

        User::create([
            'name' => 'Admin',
            'last_name' => 'User',
            'phone' => '+1 (234) 567-8901', // example phone number
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'), // Securely hash the password
            'type' => 'admin',
            'status' => 1, // Active
            'country' => 'Nicaragua', // example country
            'state' => 'Granada', // example state
            'city' => 'Diriá', // example city
            'address' => '123 Admin St, Diriá, Granada, Nicaragua', // example address
            'since' => now(),
        ]);
        User::create([
            'name' => 'User',
            'last_name' => 'User',
            'phone' => '+1 (234) 567-8901', // example phone number
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'), // Securely hash the password

            'status' => 1, // Active
            'country' => 'Nicaragua', // example country
            'state' => 'Granada', // example state
            'city' => 'Diriá', // example city
            'address' => '123 Admin St, Diriá, Granada, Nicaragua', // example address
            'since' => now(),
        ]);

        User::factory()->count(40)->create();
    }
}
