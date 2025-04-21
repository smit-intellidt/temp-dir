<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=""/>
    <title><?php echo env('APP_NAME') ?></title>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-75TLD78025"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-75TLD78025');
    </script>
    <link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <script src="{!! asset('js/jquery-3.1.0.js') !!}"></script>
    <script src="{!! asset('js/popper.min.js') !!}"></script>
    <script src="{!! asset('js/bootstrap.min.js') !!}"></script>
</head>
<body>
<div id="outer_div">
    <div class="container">
        <div class="row">
            <img src="{!! asset("images/bg_top.jpg") !!}" alt="Banner" class="img-fluid"/>
        </div>
    </div>
    <div class="container" id="content_container">
        <div class="row">
            <nav class="navbar navbar-expand-lg w-100" id="header_menu">

                <!--  Show this only on mobile to medium screens  -->
                <a class="navbar-brand d-lg-none" href="{!! url("/") !!}" id="header_logo">
                    <img src="{!! asset("images/logo.png") !!}" alt="Logo"/>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle"
                        aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarToggle">
                    <ul class="navbar-nav">
                        
                        <li class="nav-item">
                            <a class="nav-link{!! \Request::is('for-sale') ? ' active' : '' !!}" style="padding-right:0px"
                               href="{!! url('/press-release') !!}">Press Release
                            </a>
                        </li>
                        
                        
                        <li class="nav-item">
                            <a class="nav-link{!! \Request::is('showroom') ? ' active' : '' !!}"
                               href="{!! url("/showroom") !!}">show room
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    </ul>
                    <!--   Show this only lg screens and up   -->
                    <a class="navbar-brand d-none d-lg-block" href="{!! url("/") !!}" id="header_logo">
                        <img src="{!! asset("images/logo.png") !!}" alt="Logo"/>
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link{!! \Request::is('collectables/*') ? ' active' : '' !!}"
                               href="javascript:void(0)" role="button" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                collectables
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item{!! \Request::is('for-sale') ? ' active' : '' !!}"
                                       href="{!! url('/for-sale') !!}">For sale
                                    </a>
                                @php
                                    $categories = \TCG\Voyager\Models\Category::where("is_collectable",1)->get();
                                @endphp
                                @foreach($categories as $c)
                                    <a class="dropdown-item{!! \Request::is('collectables/'.$c->slug) ? ' active' : '' !!}"
                                       href="{!! url('collectables').'/'.$c->slug !!}">{!! $c->name !!}</a>
                                @endforeach
                                
                                                     
                                  
             
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{!! \Request::is('articles') ? ' active' : '' !!}"
                               href="{!! url('/articles') !!}">articles
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
        <div>
            @yield('content')
        </div>
        <div class="row p-2">
            <div class="col-md-12"><img src="{!! asset('images/seperator_2.png') !!}" class="img-fluid" alt="Border"/>
            </div>
        </div>
        <div class="row pt-3 pb-2 px-2">
            <div class="col-lg-6 col-md-4 d-md-flex align-items-md-center">
                <img src="{!! asset('images/buy_sell_trade.png') !!}" class="img-fluid mb-3" alt="Contact"/>
            </div>
            <div class="col-lg-6 col-md-8">
                <div class="row">
                    <!--<div class="col-sm-12 col-md-6 col-lg-4 mb-2">-->
                    <!--    <div class="brown_box_outer">-->
                    <!--        <div class="brown_box"><a-->
                    <!--                    href="tel:{!! setting('site.phone1') !!}">T. {!! setting('site.phone1') !!}</a>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="col-sm-12 col-md-6 col-lg-6 mb-2">
                        <div class="brown_box_outer">
                            <div class="brown_box"><a
                                        href="tel:{!! setting('site.phone2') !!}">C. {!! setting('site.phone2') !!}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 mb-2">
                        <div class="brown_box_outer">
                            <div class="brown_box"><a
                                        href="mailto:{!! setting('site.site_email') !!}">E. {!! setting('site.site_email') !!}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pb-2 px-2">
            <div class="col-md-12"><img src="{!! asset('images/seperator_2.png') !!}" class="img-fluid" alt="Border"/>
            </div>
        </div>
        <div class="row">
            <footer>© <?php echo date('Y') ?> {!! setting('site.copyright') !!}</footer>
        </div>
    </div>
</div>
</div>
@yield('jquery')
</body>

</html>
