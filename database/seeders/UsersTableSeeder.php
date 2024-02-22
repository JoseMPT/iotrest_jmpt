<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "username" => "admin",
            "password" => Hash::make("123456"),
            "rol" => "A"
        ]);
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++ ) {
            User::create([
                "username" => $faker->unique()->username,
                "password" => Hash::make(rand(1, 10000)),
                "rol" => $faker->randomElement(["A", "U", "D"])
            ]);
        }
    }
}
