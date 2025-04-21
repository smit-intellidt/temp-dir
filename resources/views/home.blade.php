@extends('layout')
@section('content')
    <div class="row px-4 pt-4 pb-3">
        <div id="bannerImage" class="carousel slide w-100 mt-2" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{!! asset('images/banner.png') !!}" alt="Banner" class="w-100"/>
                </div>
{{--                <div class="carousel-item">--}}
{{--                    <img src="{!! asset('images/banner.png') !!}" alt="Banner" class="w-100"/>--}}
{{--                </div>--}}
            </div>
{{--            <a class="carousel-control-prev" href="#bannerImage" role="button" data-slide="prev">--}}
{{--                <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--                <span class="sr-only">Previous</span>--}}
{{--            </a>--}}
{{--            <a class="carousel-control-next" href="#bannerImage" role="button" data-slide="next">--}}
{{--                <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--                <span class="sr-only">Next</span>--}}
{{--            </a>--}}
        </div>

    </div>
    <div class="row p-2">
        <div class="col-md-12"><img src="{!! asset('images/seperator_1.png') !!}" class="img-fluid" alt="Border"/>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-md-4 border_brown mt-2 mb-1 text-center">
            <img src="{!! asset('images/img_showroom.png') !!}" alt="Show Room" class="img-fluid"/>
            <div class="view_more"><a href="{!! url('showroom') !!}">View more</a></div>
        </div>
        <div class="col-md-4 border_brown mt-2 mb-1 text-center">
            <img src="{!! asset('images/img_collectables.png') !!}" alt="Collectables" class="img-fluid"/>
            <div class="view_more"><a href="{!! url('collectables/others') !!}">View more</a></div>
        </div>
        <div class="col-md-4 mt-2 mb-1 text-center">
            <img src="{!! asset('images/img_articles.png') !!}" alt="Articles" class="img-fluid"/>
            <div class="view_more"><a href="{!! url('articles') !!}">View more</a></div>
        </div>
    </div>
@endsection
