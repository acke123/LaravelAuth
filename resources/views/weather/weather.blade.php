@foreach($weathers as $weather)
    <p>Grad: {{$weather->getCity->name}} | temperatura: {{@$weather->temperature}}</p>
@endforeach
