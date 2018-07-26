$('.recommendations').slick({
    infinite: true,
    speed: 300,
    slidesToShow: 7,
    slidesToScroll: 1,
    prevArrow: '<div class="slick-btn"><button type="button" class="slick-prev slick-arrow"><img src="../img/slider-prev-arrow.png"></button></div>',
    nextArrow: '<div class="slick-btn"><button type="button" class="slick-next slick-arrow"><img src="../img/slider-next-arrow.png"></button></div>',
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
                
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});