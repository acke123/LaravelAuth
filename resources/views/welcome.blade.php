@extends('layout')
@section('content')
    <div class="container d-flex flex-column justify-content-center min-vh-100">
        <div class="mx-auto" style="max-width: 600px; width: 100%;">
            <h1 class="mb-3">
                <i class="fa-solid fa-house"></i> Pronađi svoj grad
            </h1>
            @if(\Illuminate\Support\Facades\Session::has('error'))
                <p class="text-danger"> {{\Illuminate\Support\Facades\Session::get('error')}}</p>
            @endif
            <form method="GET" action="{{ route('searchCity') }}">
                <div class="mb-3">
                    <input type="text" name="city" class="form-control" placeholder="Unesi ime grada">
                </div>
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fa-solid fa-magnifying-glass-location"></i> Pronađi
                </button>
            </form>
        </div>
    </div>
@endsection
