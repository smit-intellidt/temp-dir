$(document).ready(function () {
    if (typeof SimpleLightbox != 'undefined') {
        $('.gallery a').simpleLightbox({
            uniqueImages: false
        });
    }

    $('body').scroll(function () {
        if ($(this).scrollTop() > 600) {
            $('#back_to_top').addClass('show');
        } else {
            $('#back_to_top').removeClass('show');
        }
    });
    $('#back_to_top').on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({scrollTop: 0});
    });
});
