@extends('layout')
@section('content')
    <div class="container py-4">
        <div class="d-flex flex-wrap gap-3">
            @foreach($cities as $city)
                @php
                    $icon = \App\Http\ForecastHelper::getIconByWeatherType($city->todayForecast->weather_type);
                @endphp
                <a href="{{ route('displayForecastForCity', ['city' => $city->name]) }}" class="btn btn-primary text-white m-2">
                    <i class="fa-solid {{ $icon }}"></i> {{ $city->name }}
                </a>
            @endforeach
        </div>
    </div>
@endsection
