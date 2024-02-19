<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "username" => "admin",
            "password" => "123456",
            "rol" => "A"
        ]);
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++ ) {
            User::create([
                "username" => $faker->unique()->username,
                "password" => rand(1, 10000),
                "rol" => $faker->randomElement(["A", "U", "D"])
            ]);
        }
    }
}
