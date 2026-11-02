<?php

namespace App\Http\Controllers;

use App\Models\WeatherModel;

class WeatherController extends Controller
{
    public function index()
    {
        $weathers = WeatherModel::all();
        return view('weather/weather', ['weathers' => $weathers]);
    }
}
