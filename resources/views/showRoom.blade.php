@extends('layout')
@section('content')
    <div class="position-relative">
        <div class="row pt-5 pb-3 px-5">
            <div class="col-md-4 pt-5 d-md-flex align-items-md-center"><img
                        src="{!! asset('images/header_showroom.png') !!}" alt="Show room" class="img-fluid"></div>
            <div class="col-md-8 pt-5 text-justify d-flex align-items-center rockwellstd_font">Welcome to the Show Room
                section of my website. This section contains cars I have owned or still own.If you are like me, you will
                enjoy looking through the pictures below.
            </div>
        </div>
        <div class="row gallery pt-5">
            @foreach (!$products->isEmpty() ? $products : array() as $d)
                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                    <a href="{!! asset("uploads/".$d->featured_image) !!}" class="d-block text-center">
                        <img src="{!! asset("uploads/".$d->thumbnail_image) !!}" alt="{!! $d->name !!}"
                             @if($d->description != "")title="{!! $d->description !!}"@endif height="168" class="w-md-100"/>
                    </a>
                    <h6 class="text-center text-uppercase my-3 color_27180e font-weight-bold baskervilleEF_font">{!! $d->description !!}</h6>
                </div>
            @endforeach
        </div>
        <a id="back_to_top"></a>
    </div>
@endsection
@section('jquery')
    <link href="{{ asset('css/simple-lightbox.css') }}" rel="stylesheet">
    <script src="{{ asset('js/simple-lightbox.jquery.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection
