<form method="POST" action="{{ route('storeWeather') }}">
    @csrf
    <input type="text" name="temperature" placeholder="Insert temperature">
    <select name="city_id">
        <option disabled value="0" selected>Select City</option>
        @foreach(\App\Models\CitiesModel::all() as $city)
            <option value="{{$city->id}}">{{$city->name}}</option>
        @endforeach
    </select>
    <button>Save</button>
</form>

<div class="row">
    @foreach(\App\Models\WeatherModel::all() as $weather)
        <p>{{ $weather->getCity->name }}-{{$weather->temperature}}</p>
    @endforeach
    <p></p>
</div>
