@extends('layout')
@section('content')
    <div class="row pt-5 pb-5 px-lg-3">
        <a href="{!! url('/for-sale') !!}" class="ml-5 pt-5">&lt; Back to For sale</a>
    </div>
    <div class="row pb-3 px-lg-5 px-3">
        <div class="col-lg-6 mb-md-5">
            <div id="product_carousel" class="carousel slide" data-ride="carousel" align="center" data-interval="false">
                <div class="position-relative">
                    <div class="carousel-inner">
                        @foreach($product_images as $key => $i)
                            <div class="carousel-item {!! ($key == 0 ? "active" : "") !!}"><img
                                        src="{!! asset("uploads/".$i) !!}" alt="{!! $product_data->name !!}"
                                        class="img-fluid">
                            </div>
                        @endforeach
                    </div>
                    @if(count($product_images) != 1)
                        <a class="carousel-control-prev" href="#product_carousel" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span></a>
                        <a class="carousel-control-next" href="#product_carousel" data-slide="next">
                            <span class="carousel-control-next-icon"></span> </a>
                    @endif
                </div>
{{--                @if(count($product_images) != 1)--}}
{{--                    <ol class="carousel-indicators list-inline">--}}
{{--                        @foreach($product_images as $key => $i)--}}
{{--                            <li class="list-inline-item {!! ($key == 0 ? "active" : "") !!}">--}}
{{--                                <a id="carousel-selector-{!! $key !!}" class="selected d-block"--}}
{{--                                   data-slide-to="{!! $key !!}"--}}
{{--                                   data-target="#product_carousel">--}}
{{--                                    <img src="{!! asset("uploads/".$i) !!}" class="w-100" height="113"></a></li>--}}
{{--                        @endforeach--}}
{{--                    </ol>--}}
{{--                @endif--}}
            </div>
        </div>
        <div class="col-lg-6">
            <div class="px-lg-4 m-auto">
                <h4 class="text-uppercase color_27180e letter_spacing_0_1 text-break baskervilleEF_font">{!! $product_data->name !!}</h4>
                <div class="text-justify mt-4">{!! $product_data->description !!}</div>
                {{--                <div class="mt-4">--}}
                {{--                    <div class="d-flex justify-content-between">--}}
                {{--                        <div>Product Code:</div>--}}
                {{--                        <div>{!! $product_data->product_code != "" ? $product_data->product_code : 'N/A' !!}</div>--}}
                {{--                    </div>--}}
                {{--                    <div class="d-flex justify-content-between mt-2">--}}
                {{--                        <div>Dimensions:</div>--}}
                {{--                        <div--}}
                {{--                            class="text-left">{!! $product_data->dimensions != "" ? $product_data->dimensions : 'N/A' !!}</div>--}}
                {{--                    </div>--}}
                {{--                    <div class="d-flex justify-content-between mt-2">--}}
                {{--                        <div>Condition:</div>--}}
                {{--                        <div>{!! $product_data->condition != "" ? $product_data->condition : 'N/A' !!}</div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                <div class="mt-5">
                    <div class="brown_box_outer mr-3 d-inline-block mb-3">
                        <button
                                onclick="sendMail('{!! $product_data->name !!}','{!! url("product-detail/".base64_encode($product_data->id)) !!}','Offer')">
                            Make An Offer
                        </button>
                    </div>
                    <div class="brown_box_outer d-inline-block">
                        <button class="px-lg-4"
                                onclick="sendMail('{!! $product_data->name !!}','{!! url("product-detail/".base64_encode($product_data->id)) !!}','Enquiry regarding')">
                            Enquiry
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="px-5 w-100">
            <h4 class="w-100 pt-5 text-center border_top color_27180e baskervilleEF_font">You Might Also Like</h4>
        </div>
    </div>
    <div class="row gallery pt-3 pb-2">
        @foreach (!$other_products->isEmpty() ? $other_products : array() as $p)
            @include('item',["p" => $p])
        @endforeach
    </div>
@endsection
@section('jquery')
    <script type="text/javascript">
        function sendMail(product_name, product_url, subject) {
            var body = "I am interested in the following item.%0D%0A%0D%0A" + product_url + "%0D%0A%0D%0A";
            window.location.href = "mailto:{!! setting('site.site_email') !!}?subject=" + subject + " - '" + product_name + "'&body=" + body;
        }
    </script>
@endsection
