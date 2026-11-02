<?php

namespace App\Http\Controllers;

class ForecastController extends Controller
{
    public function displayForecastForCity($city)
    {
        $forecast = [
            'beograd' => [22, 23, 25, 24, 20, 18],
            'sarajevo' => [20, 24, 22, 24, 22, 15],
        ];

        $city = strtolower($city);

        if (array_key_exists($city, $forecast)) {
            foreach ($forecast[$city] as $forecastItem) {
                echo $forecastItem . " | ";
            }
        } else {
            echo "City not found";
        }
    }

}
