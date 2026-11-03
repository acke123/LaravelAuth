<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CitiesModel extends Model
{
    protected $table = 'cities';
    protected $fillable = ['name'];

    public function getForecasts()
    {
        return $this->hasMany(ForecastsModel::class, 'city_id', 'id')
            ->orderBy('forecast_date');
    }
}
