<?php

use App\Http\Controllers\AdminForecastsController;
use App\Http\Controllers\AdminWeatherController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::view('/','welcome');
Route::get('/forecast/search', [ForecastController::class, 'getSearchData'])->name('searchCity');

Route::view('/home','Hello world');

Route::view('/about', 'about');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/weather', [WeatherController::class, 'index']);
Route::view('admin/weather', 'admin/weather_index');
Route::post('admin/weather/store', [AdminWeatherController::class, 'store'])->name('storeWeather');


Route::get('/forecast/{city:name}', [ForecastController::class, 'displayForecastForCity'])->name('displayForecastForCity');
Route::view('/admin/forecast', 'admin/forecast_index');
Route::post('/admin/forecast/store', [AdminForecastsController::class, 'store'])->name('storeForecast');



require __DIR__ . '/auth.php';
