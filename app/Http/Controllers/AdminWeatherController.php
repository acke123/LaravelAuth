<?php

namespace App\Http\Controllers;

use App\Models\WeatherModel;
use Illuminate\Http\Request;

class AdminWeatherController extends Controller
{
    public function store(request $request)
    {
        $request->validate([
            'temperature' => 'required|numeric',
            'city_id' => 'required|exists:cities,id',
        ]);

        $weather = WeatherModel::where(['city_id' => $request->city_id])->first();
        $weather->temperature = $request->temperature;
        $weather->save();

        return redirect()->back();
    }
}
