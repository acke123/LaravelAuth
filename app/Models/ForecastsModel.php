<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForecastsModel extends Model
{
    protected $table = 'forecasts';
    protected $fillable = ['city_id', 'temperature', 'forecast_date'];

    const WEATHERS = ['rainy', 'sunny', 'snowy'];

    public function getCity()
    {
        return $this->hasMany(CitiesModel::class, 'id', 'city_id');
    }
}
