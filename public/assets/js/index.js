$(function () {
    $(window).scroll(function () {
        if ($('.navbar').offset().top > 100) {
            $('.fixed-top').addClass('sabitMenu');
        } else {
            $('.fixed-top').removeClass('sabitMenu');
        }
    })
})