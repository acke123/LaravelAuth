<?php
namespace App\Http;

class ForecastHelper
{
    public static function getColorByTemperature($temperature)
    {
        if($temperature <= 0)
        {
            $color = "lightblue";
        }
        else if($temperature >= 1 && $temperature <= 15)
        {
            $color = "blue";
        }
        else if($temperature > 15 && $temperature <= 25)
        {
            $color = "green";
        }
        else
        {
            $color = "red";
        }

        return $color;
    }

    public static function getIconByWeatherType($weatherType)
    {
        $icon = '';
        if ($weatherType == "snowy") {
            $icon = "snowflake";
        } else if ($weatherType == "rainy") {
            $icon = "cloud-rain";
        } else if ($weatherType == "sunny") {
            $icon = "sun";
        }
        return $icon;
    }
}
