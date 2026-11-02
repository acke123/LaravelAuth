<?php

namespace Database\Seeders;

use App\Models\CitiesModel;
use App\Models\WeatherModel;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = CitiesModel::all();

        foreach ($cities as $city) {
            $cityData = WeatherModel::where('city_id', $city->id)->first();
            if ($cityData instanceof WeatherModel) {
                $this->command->getOutput()->success($city->id . ' this city already exist');
                continue;
            }
            WeatherModel::create([
                'city_id' => $city->id,
                'temperature' => rand(15, 30),
            ]);
        }
    }
}
