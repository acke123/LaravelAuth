<?php

namespace App\Http\Controllers;

use App\Models\ForecastsModel;
use Illuminate\Http\Request;

class AdminForecastsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'city_id' => 'required|exists:cities,id',
            'temperature' => 'required|numeric',
            'weather_type' => 'required',
            'forecast_date' => 'required|date'
        ]);

        ForecastsModel::create($request->all());
        return redirect()->back();
    }
}
