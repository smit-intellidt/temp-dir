@extends('layout')
@section('content')
    <div class="position-relative">
        <div class="row pt-5 pb-3 px-5">
            <div class="col-md-4 pt-5 d-md-flex align-items-md-center"><img
                    src="{!! asset('images/header_collectables.png') !!}" alt="Collectables" class="img-fluid"></div>
            <div class="col-md-8 pt-5 text-justify d-flex align-items-center rockwellstd_font">Over the years I have collected many Juke
                Boxes, Pianos, Music Boxes and Phonographs. These mechanical wonders were and are still today marvels of
                ingenuity that bring smiles to both young and old faces.
            </div>
        </div>
        <div class="row pt-5 px-5">
            <div class="col-md-6 text-uppercase text-left offset-1">
                <h4 class="mb-3 baskervilleEF_font letter_spacing_0_2 color_27180e">{!! $category_detail->description !!}</h4>
            </div>
        </div>
        <div class="row gallery">
            @foreach (!$data->isEmpty() ? $data : array() as $d)
                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                    <a href="{!! asset("uploads/".$d->featured_image) !!}" class="d-block h-100 text-center">
                        <img src="{!! asset("uploads/".$d->thumbnail_image) !!}" alt="{!! $category_detail->name !!}"
                             height="168" class="w-md-100">
                    </a>
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
