@extends('layout')
@section('content')
    <div class="position-relative">
        <div class="row pt-5 pb-3 px-5">
            <div class="col-md-4 pt-5 d-md-flex align-items-md-center"><img
                    src="{!! asset('images/header_sale.png') !!}" alt="For Sale" class="img-fluid"></div>
            <div class="col-md-8 pt-5 text-justify d-flex align-items-center rockwellstd_font">Below are the list of classic cars that are for sale. Please feel free to contact me if you request additional photos and/or have any requests.
            </div>
        </div>
        <div class="row gallery pt-5">
            @foreach (!$products->isEmpty() ? $products : array() as $p)
                @include('item',["p" => $p])
            @endforeach
        </div>
        <a id="back_to_top"></a>
    </div>
@endsection
@section('jquery')
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection
