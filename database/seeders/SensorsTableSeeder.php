<?php

namespace Database\Seeders;

use App\Models\Sensor;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SensorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++ ) {
            Sensor::create([
                "name" => $faker->unique()->userName,
                "type" => $faker->randomElement(['Temperatura', 'Humedad', 'Presión']),
                "value" => $faker->randomFloat(2, 0, 100),
                "date" => $faker->dateTimeThisYear(),
                "user_id" => rand(1, 10)
            ]);
        }
    }
}
