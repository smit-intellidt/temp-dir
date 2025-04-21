@extends('layout')
@section('content')
    <div class="position-relative">
        <!--<div class="row pt-5 pb-3 px-5">-->
        <!--    <div class="col-md-4 pt-5 d-md-flex align-items-md-center"><img-->
        <!--            src="{!! asset('images/header_sale.png') !!}" alt="For Sale" class="img-fluid"></div>-->
            
        <!--</div>-->
        <div class="row press">
          <img src="{!! asset('images/press_release_jim.jpg') !!}" alt="Press Release" class="img-fluid" >
        </div>
        <a id="back_to_top"></a>
    </div>
@endsection
@section('jquery')
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection
