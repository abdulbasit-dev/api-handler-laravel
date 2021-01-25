<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "basit",
            "email" => "basit@test.com",
            "password" => bcrypt("password")
        ]);
        User::create([
            "name" => "jane",
            "email" => "jane@test.com",
            "password" => bcrypt("password")
        ]);
        User::create([
            "name" => "ahmed",
            "email" => "ahmed@test.com",
            "password" => bcrypt("password")
        ]);
    }
}
