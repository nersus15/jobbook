// scroll paralax

$(window).scroll(function () {

    if ($(document).scrollTop() > 50) {
        $('.navbar').addClass('shrink');
        $('.navbar-brand, .nav-link').addClass('shrink');
        $('.navbar-brand').addClass('shrink');

    } else {
        $('.navbar').removeClass('shrink');
    }

});

$(function () {
    $('#only-number').on('keydown', '#number', function (e) {
        -1 !== $
            .inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) || /65|67|86|88/
                .test(e.keyCode) && (!0 === e.ctrlKey || !0 === e.metaKey)
            || 35 <= e.keyCode && 40 >= e.keyCode || (e.shiftKey || 48 > e.keyCode || 57 < e.keyCode)
            && (96 > e.keyCode || 105 < e.keyCode) && e.preventDefault()
    });
});
