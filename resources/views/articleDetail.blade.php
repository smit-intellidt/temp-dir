@extends('layout')
@section('content')
    <div class="row pt-5 pb-5 px-lg-5">
        <a href="{!! url('/articles') !!}" class="ml-5 pt-5">&lt; Back to Articles</a>
    </div>
    <div class="row pb-4 px-4 px-lg-5">
        <div class="col-md-12">
            <h1 class="text-uppercase text-center w-100 color_27180e text-break baskervilleEF_font letter_spacing_0_2">{!! $data->title !!}</h1>
            <div class="mt-4 opensans_font_family px-lg-5 text-justify" id="description">{!! $data->description !!}</div>
{{--            <div class="w-100 px-lg-5 d-flex justify-content-between my-5">--}}
{{--                <button @if($prev_record) onclick="window.location='{!! url("articles/" . $prev_record->slug) !!}'"--}}
{{--                        @else disabled @endif>Previous article--}}
{{--                </button>--}}
{{--                <button @if($next_record) onclick="window.location='{!! url("articles/" . $next_record->slug) !!}'"--}}
{{--                        @else disabled @endif>Next article--}}
{{--                </button>--}}
{{--            </div>--}}
        </div>
    </div>
@endsection
