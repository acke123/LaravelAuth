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
            $lastTemperature = null;
            for ($i = 1; $i <= 30; $i++) {
                $weatherType = ForecastsModel::WEATHERS[rand(0, 3)];

                $probability = null;
                if ($weatherType == 'rainy' || $weatherType == 'snowy') {
                    $probability = rand(1, 100);
                }
                $temperature = 0;
                if (!is_null($lastTemperature)) {
                    $minTemperature = $lastTemperature - 5;
                    $maxTemperature = $lastTemperature + 5;
                    $temperature = rand($minTemperature, $maxTemperature);
                } else {
                    switch ($weatherType)
                    {
                        case 'sunny':
                            $temperature = rand(-20, 45);
                            break;
                        case 'cloudy':
                            $temperature = rand(-20, 15);
                            break;
                        case 'rainy':
                            $temperature = rand(-10, 45);
                            break;
                        case 'snowy':
                            $temperature = rand(-50, 1);
                            break;
                    }
                }

                ForecastsModel::create([
                   'city_id' => $city->id,
                   'temperature' => $temperature,
                   'forecast_date' => $faker->dateTimeBetween('now', '+31 days')->format('Y-m-d'),
                    'weather_type' => $weatherType,
                    'probability' => $probability,
                ]);
                $lastTemperature = $temperature;
            }
        }
    }
}
