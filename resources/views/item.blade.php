<div class="col-sm-12 col-md-6 col-lg-4 mb-4">
    <a class="d-block text-center" href="{!! url("product-detail/".base64_encode($p->id)) !!}">
        <img src="{!! asset("uploads/".$p->thumbnail_image) !!}" alt="{!! $p->name !!}"
             height="168" class="w-md-100">
    </a>
    <h6 class="text-center text-uppercase my-3 color_27180e font-weight-bold baskervilleEF_font"><a href="{!! url("product-detail/".base64_encode($p->id)) !!}">{!! $p->name !!}</a></h6>
</div>
