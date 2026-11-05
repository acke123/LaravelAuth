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
        if (in_array($weatherType, self::WEATHER_ICONS)) {
            return self::WEATHER_ICONS[$weatherType];
        }
        return 'fa-cloud-sun-rain';
    }
}
