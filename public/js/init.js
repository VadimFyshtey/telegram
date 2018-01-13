$(document).ready(function(){
    $('.carusel').slick({
        adaptiveHeight: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        prevArrow: '<button class="slick-prev"><i class="glyphicon glyphicon-chevron-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="glyphicon glyphicon-chevron-right"></i></button>',
        responsive: [{

            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                infinite: true,
                dots: false
            }

        }, {

            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                dots: false
            }

        }, {

            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                dots: false
            }

        }]
    });
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
    });

    $("#top").scrollToTop();

});

