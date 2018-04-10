if ( $(window).width() < 768 ) {
    $('.collapse').on('show.bs.collapse', function () {
        $('.site_logo').css('display', 'block');
        $('.navbar_menu1').removeClass('pull-left');
        $('.navbar_menu2').removeClass('pull-right');
    });

    $('.collapse').on('hide.bs.collapse', function () {
        $('.site_logo').css('display', 'none');
        $('.navbar_menu1').addClass('pull-left');
        $('.navbar_menu2').addClass('pull-right');
    });
} else{
    $('.site_logo').css('display', 'block');
    $('.navbar_menu1').addClass('pull-left');
    $('.navbar_menu2').addClass('pull-right');
}