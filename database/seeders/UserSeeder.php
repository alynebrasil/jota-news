<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        User::create([
            'name' => $faker->name,
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => "editor$i@example.com",
                'password' => Hash::make('password'),
                'role' => 'editor',
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => "reader$i@example.com",
                'password' => Hash::make('password'),
                'role' => 'reader',
            ]);
        }
    }
}
