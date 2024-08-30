<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Generate 30 random users using the UserFactory
        User::factory()->count(30)->create();

        // You can also create a specific user with custom data
        User::factory()->create([
            'name' => 'Samweli Mnyone',
            'email' => 'samymnyone06@gmail.com',
            'address'=>'P.o.Box 703 Nkuhungu,Dodoma',
            'phone' => '0758564018', // Specific Tanzanian phone number
            'photo'=> NULL,
            'password' => bcrypt('123'), // Ensure this matches the password format in your factory
            'role' => 'administrator',
            'email_verified_at' => now(),
            'remember_token' => \Illuminate\Support\Str::random(10),
        ]);
    }
}
