<?php

namespace App\Http;

class ForecastHelper
{
    const WEATHER_ICONS = [
        'rainy' => 'fa-cloud-rain',
        'snowy' => 'fa-snowflake',
        'sunny' => 'fa-sun',
        'cloudy' => 'fa-cloud-sun',
        null => 'fa-question',
    ];

    public static function getColorByTemperature($temperature)
    {
        if ($temperature <= 0) {
            $color = "lightblue";
        } else if ($temperature >= 1 && $temperature <= 15) {
            $color = "blue";
        } else if ($temperature > 15 && $temperature <= 25) {
            $color = "green";
        } else {
            $color = "red";
        }

        return $color;
    }

    public static function getIconByWeatherType($weatherType)
    {
        $icon = match($weatherType) {
            'rainy' => 'fa-cloud-rain',
            'snowy' => 'fa-snowflake',
            'sunny' => 'fa-sun',
            'cloudy' => 'fa-cloud-sun',
            null => 'fa-question',
            default => 'fa-cloud-sun-rain',
        };
        return $icon;
    }
}
