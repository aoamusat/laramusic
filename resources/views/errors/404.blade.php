@extends('errors.master')

    @section('content')
        <h2>Error 404. Page not found. Possible causes:</h2>
        <br>
        <ul class="">
            <li class="">Invalid URL</li>
            <li class="">Page have been removed</li>
            <li class="">Server Error</li>
        </ul><br>
        <div>
            <p>Go back <a href="{{ route('home') }}">Home</a></p>
        </div>
        <br>
    @endsection