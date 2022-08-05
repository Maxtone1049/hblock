

$(document).ready(function () {
    if ($('#slider').length > 0) {

        $('.slider').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 4,
            lazyLoad: 'ondemand',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }


    $("#search-actions .nav-link").on('click', function () {
        $('#search-actions .nav-link').removeClass('active')

        var self = $(this);
        self.addClass('active');

        $('#advertTypes').val(self.attr('data'));
        $('#propertyTypes').val(self.attr('ptype'));
    })
});
