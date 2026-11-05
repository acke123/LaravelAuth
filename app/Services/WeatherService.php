<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{
    public function getForecast($city)
    {
        $response = Http::get(env('WEATHER_API_URL') . 'v1/astronomy.json',
            ['key' => env("WEATHER_API_KEY"),
                'q' => $city->name,
                'aqi' => 'no',
                'lang' => 'en',
            ]);
        return $response->json();
    }

    public function getRealWeather($city)
    {
        $response = Http::get(env('WEATHER_API_URL') . 'v1/forecast.json',
            ['key' => env("WEATHER_API_KEY"),
                'q' => $city,
                'aqi' => 'no',
                'lang' => 'en',
                'day' => 1
            ]);
        return $response;
    }
}
