$(document).ready(function(){
    $('.banner').slick({
        infinite: true,
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true, 
        prevArrow: '<button type="button" class="slick-prev"></button>',
        nextArrow: '<button type="button" class="slick-next"></button>',
        autoplay: true,     // Ativa o autoplay
        autoplaySpeed: 2000 // Tempo de autoplay (em milissegundos)
    });
});

$(document).ready(function(){
    $('.carrosel-ONG').slick({
        infinite: true,
        slidesToShow: 4,   
        slidesToScroll: 4,  
        dots: true,         
        arrows: true,       
        prevArrow: '<button type="button" class="slick-prev"></button>',
        nextArrow: '<button type="button" class="slick-next"></button>',
    });
});