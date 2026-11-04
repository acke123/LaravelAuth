<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use App\Models\ForecastsModel;
use Illuminate\Http\Request;

class ForecastController extends Controller
{
    public function displayForecastForCity(CitiesModel $city)
    {
        return view('/forecast/forecast', ['city' => $city]);
    }

    public function getSearchData(Request $request)
    {
        $request->validate(['city'=> 'required']);
        $cities = CitiesModel::with('todayForecast')->where('name', 'like', '%' . $request->city . '%')->get();
        if (count($cities) == 0) {
            return redirect()->back()->with('error', "Not found");
        }
        return view('search_result', ['cities' => $cities]);
    }
}
