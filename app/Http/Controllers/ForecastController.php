<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use App\Models\ForecastsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class ForecastController extends Controller
{
    public function displayForecastForCity(CitiesModel $city)
    {
        return view('/forecast/forecast', ['city' => $city]);
    }

    public function getSearchData(Request $request)
    {
        $request->validate(['city'=> 'required']);
        $city = $request->city;

        Artisan::call("weather:get-real", ['city' => $city]);

        $cities = CitiesModel::with('todayForecast')->where('name', 'like', '%' . $request->city . '%')->get();
        if (count($cities) == 0) {
            return redirect()->back()->with('error', "Not found");
        }

        $userFavorites = [];
        if (Auth::check()) {
            $userFavorites = Auth::user()->cityFavorites;
            $userFavorites = $userFavorites->pluck('city_id')->toArray();
        }

        return view('search_result', ['cities' => $cities, 'userFavorites' => $userFavorites]);
    }
}
