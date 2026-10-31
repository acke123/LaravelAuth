<?php

namespace Database\Seeders;

use App\Models\WeatherModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $weathers = [
            "Beograd" => 22,
            "Sarajevo" => 23,
            "Novi Sad" => 24,
            "Ljubljana" => 26,
        ];

        foreach ($weathers as $city => $temperature) {
            WeatherModel::create([
                'city' => $city,
                'temperature' => $temperature,
            ]);
        }
    }
}
