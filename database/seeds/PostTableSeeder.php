<?php

use App\Post;
use App\User;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 20; $i++) {
            Post::create([
                "user_id" => User::inRandomOrder()->first()->id,
                "title" => $faker->sentence(8),
                "body" => $faker->sentence(20)
            ]);
        }
    }
}
