<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\User;
use Faker\Factory as Faker;

class NewsTableSeeder extends Seeder
{
    public function run()
    {
        $user = User::inRandomOrder()->first();
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            News::create([
                'title' => $faker->sentence,
                'subtitle' => $faker->sentence,
                'content' => $faker->paragraph,
                'image' => $faker->imageUrl(640, 480, 'news'),
                'created_at' => now(),
                'updated_at' => now(),
                'fk_user' => $user->id
            ]);
        }
    }
}
