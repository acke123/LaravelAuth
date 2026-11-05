<p>Sunrise is at: {{$sunrise}}</p>
<p>Sunset is at: {{$sunset}}</p>
@foreach($city->getForecasts as $forecast)
    <p>Date: {{ $forecast->forecast_date }} - Temperature: {{ $forecast->temperature }}</p>
@endforeach
