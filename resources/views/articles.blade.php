@extends('layout')
@section('content')
    <div class="row pt-5 pb-5 px-5">
        <div class="col-md-4 pt-5 d-md-flex align-items-md-center"><img
                    src="{!! asset('images/header_articles.png') !!}" alt="Articles" class="img-fluid"></div>
        <div class="col-md-8 pt-5 text-justify">
            <div class="my-4 rockwellstd_font">
                Welcome to the articles section of Grandpa's Old Cars. We have many articles on the history of
                automobile
                manufactures listed below.
            </div>
            <div>
                @for($i=65;$i<91;$i++)
                    <div class="d-inline-block pr-2">
                        @if(isset($all_articles[chr($i)]))
                            <a href="javascript:void(0)" onclick="scrollToDiv('{!! chr($i) !!}')"
                               class="opensans_font_family alphabets">{!! chr($i) !!}</a>
                        @else
                            <div class="disabled opensans_font_family">{!! chr($i) !!}</div>
                        @endif

                    </div>
                @endfor
            </div>
        </div>
    </div>
    <div class="position-relative">
        <div class="row px-5">
            @foreach(count($all_articles) > 0 ? $all_articles : array() as $key => $value)
                <div class="col-md-12 border_top_bottom" id="article_{!! $key !!}">
                    <div class="d-flex align-items-center py-4">
                        <div class="col-md-2"><h2 class="mb-0 baskervilleEF_font">{!! $key !!}</h2></div>
                        <div class="col-md-10">
                            <div class="row">
                                @foreach($value as $v)
                                    <div class="col-md-4 col-lg-3">
                                        <a class="article_title opensans_font_family"
                                           href="{!! $v['url'] !!}">{!! $v['title'] !!}</a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a id="back_to_top"></a>
    </div>
@endsection
@section('jquery')
    <script src="{{ asset('js/custom.js') }}"></script>
    <script type="text/javascript">
        function scrollToDiv(div) {
            $('html, body').animate({
                scrollTop: $('#article_' + div).offset().top
            }, 1000, function () {
                $('#article_' + div).addClass("blink_div");
                setTimeout(function () {
                    $('#article_' + div).removeClass("blink_div");
                }, 1000);
            });
        }
    </script>
@endsection
