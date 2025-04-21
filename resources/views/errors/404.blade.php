@extends('layout')
@section('content')
    <div class="row bg_e6dfc0 pt-5 pb-5">
        <div class="mt-5 w-100">
            <div class="jumbotron bg_e6dfc0 m-auto text-center">
                <h1>404!</h1>
                <h3>Sorry, the page you are looking for could not be found</h3>
                <button class="mt-3" onclick="window.location='{!! url("/") !!}'">Go to home page</button>
            </div>
        </div>
    </div>
@endsection
