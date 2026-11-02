<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use App\Models\ForecastsModel;

class ForecastController extends Controller
{
    public function displayForecastForCity(CitiesModel $city)
    {
        $forecasts = ForecastsModel::where('city_id', $city->id)->get();
        return view('/forecast/forecast', ['forecasts' => $forecasts]);
    }

}
