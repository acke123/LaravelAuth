<?php

namespace App\Console\Commands;

use App\Models\CitiesModel;
use App\Models\ForecastsModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetRealWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:get-real {city}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Current weather temperature';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $city = $this->argument('city');
        $dbCity = CitiesModel::where('name', $city)->first();

        if (is_null($dbCity)) {
            $dbCity = CitiesModel::create(['name' => $city]);
        }

        $response = Http::get(env('WEATHER_API_URL') . 'v1/forecast.json',
            ['key' => env("WEATHER_API_KEY"),
                'q' => $city,
                'aqi' => 'no',
                'lang' => 'en',
                'day' => 1
            ]);
        $jsonResponse = $response->json();
        if (isset($jsonResponse['error'])) {
            $this->output->error($jsonResponse['error']['message']);
        }

        if (!is_null($dbCity->todayForecast)) {
            $this->output->comment("Command finished");
            return;
        }

        $forecastDay = $jsonResponse['forecast']['forecastday'][0];

        $temperature = $forecastDay['day']['avgtemp_c'];
        $forecast_date = $forecastDay['date'];
        $weather_type = $forecastDay['day']['condition']['text'];
        $probability = $forecastDay['day']['daily_chance_of_rain'];

        $forecast = [
            'city_id' => $dbCity->id,
            'temperature' => $temperature,
            'forecast_date' => $forecast_date,
            'weather_type' => strtolower($weather_type),
            'probability' => $probability,
        ];
        $this->output->text($forecast);
        ForecastsModel::create($forecast);
    }
}
