<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use App\Models\ForecastsModel;
use App\Models\WeatherModel;
use App\Services\WeatherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ForecastController extends Controller
{
    public function displayForecastForCity(CitiesModel $city)
    {
        $weatherService = new WeatherService();
        $response = $weatherService->getForecast($city);
        $sunrise = $response['astronomy']['astro']['sunrise'];
        $sunset = $response['astronomy']['astro']['sunset'];

        return view('/forecast/forecast', ['city' => $city, 'sunrise' => $sunrise, 'sunset' => $sunset]);
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
