<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use App\Models\ForecastsModel;

class ForecastController extends Controller
{
    public function displayForecastForCity(CitiesModel $city)
    {
        return view('/forecast/forecast', ['city' => $city]);
    }

}
