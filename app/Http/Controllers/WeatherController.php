<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index()
    {
        $weathers = [
            "Beograd" => 22,
            "Sarajevo" => 23,
            "Novi Sad" => 24,
            "Ljubljana" => 26,
        ];

        return view('weather/weather', ['weathers' => $weathers]);
    }
}
