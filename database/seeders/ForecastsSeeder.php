<?php

namespace Database\Seeders;

use App\Models\CitiesModel;
use App\Models\ForecastsModel;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ForecastsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = CitiesModel::all();
        $faker = Factory::create();

        foreach ($cities as $city) {
            for ($i = 1; $i <= 5; $i++) {
                ForecastsModel::create([
                   'city_id' => $city->id,
                   'temperature' => $faker->randomFloat(2, 15,30),
                   'forecast_date' => $faker->dateTimeBetween('now', '+31 days')->format('Y-m-d'),
                ]);
            }
        }
    }
}
