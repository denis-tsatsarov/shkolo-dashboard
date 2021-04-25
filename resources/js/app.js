require('./bootstrap');

$(document).ready(function () {
    $('.js-sidebar-collapse').on('click', function () {
        $($(this).data('toggle')).toggleClass('active').addClass('transition');
    });

    if ($('#sidebar').length && $(window).width() < 768 && $('#sidebar').hasClass('active')) {
        $('#sidebar').removeClass('active');
    }
});
