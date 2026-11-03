@extends('admin.layout')
@section('content')
    <div class="m-3 left col-md-4">
        <form method="POST" action="{{ route('storeForecast') }}">
            @csrf
            <div class="mb-3">
                <select name="city_id" class="form-select">
                    <option disabled value="0" selected>Select City</option>
                    @foreach(\App\Models\CitiesModel::all() as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <input class="form-control" type="text" name="temperature" placeholder="Insert temperature">
            </div>

            <div class="mb-3">
                <select name="weather_type" class="form-select">
                    <option value="0" disabled selected>Choose weather</option>
                    @foreach(\App\Models\ForecastsModel::WEATHERS as $weather)
                        <option value="{{$weather}}">{{$weather}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <input class="form-control" type="text" name="probability" placeholder="Insert chance for rainfall">
            </div>
            <div class="mb-3">
                <input class="form-control" type="date" name="forecast_date">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>

        </form>
    </div>
    <div class="d-flex flex-wrap" style="gap:10px">
        @foreach(\App\Models\CitiesModel::all() as $city)
            <div class="ms-3">
                <h5>{{$city->name }}</h5>
                <ul class="list-group">
                    @foreach($city->getForecasts as $forecast)
                        @php
                            $color = \App\Http\ForecastHelper::getColorByTemperature($forecast->temperature);
                             $icon = \App\Http\ForecastHelper::getIconByWeatherType($forecast->weather_type);
                        @endphp
                        <li class="list-group-item" style="color:{{ $color }}">{{ $forecast->forecast_date }}
                            - <i class="fa-solid fa-{{$icon}}"></i> {{ $forecast->temperature }}</li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
@endsection
