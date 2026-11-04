@extends('layout')
@section('content')
    <div class="d-flex flex-wrap container mt-5">
        @if(\Illuminate\Support\Facades\Session::has('error'))
            <div class="container mb-3"><p class="text-danger">{{\Illuminate\Support\Facades\Session::get('error')}}</p>
            <a href="/login" class="btn btn-info">Log in</a></div>
        @endif
        @foreach($cities as $city)
            @php
                $icon = \App\Http\ForecastHelper::getIconByWeatherType($city->todayForecast?->weather_type);
            @endphp
            <div class="btn-group me-4 mb-3">
                @if(in_array($city->id, $userFavorites))
                <a href="{{ route('city.unfavorite', ['city' => $city->id]) }}" class="btn btn-primary text-white me-1">
                    <i class="text-white fa-sharp fa-solid fa-heart"></i>
                </a>
                @else
                    <a href="{{ route('city.favorite',['city' => $city->id]) }}" class="btn btn-primary text-white me-1">
                        <i class="fa-regular fa-heart"></i>
                    </a>
                @endif
                <a href="{{ route('displayForecastForCity', ['city' => $city->name]) }}" class="btn btn-primary text-white">
                    <i class="fa-solid {{ $icon }}"></i> {{ $city->name }}
                </a>
            </div>
        @endforeach
    </div>
@endsection
