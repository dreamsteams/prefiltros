$(document).ready(function(){
   $(window).scroll(function () {
        if ($(window).scrollTop() > 10) {
  //          $(".navbar").css("unique-color");/*00C7FC*/
            $(".navbar").addClass("animated-nav");
        } else {
    //        $(".navbar").css("background","rgba(63, 114, 155, 0.38)!important");
            $(".navbar").removeClass("animated-nav");
        }
    });
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:1000,
        autoplayHoverPause:true,
        items:5,
        rtl: true,
        lazyContent:true,
        smartSpeed:500,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });
    $('.play').on('click',function(){
        $('.owl-carousel').trigger('autoplay.play.owl',[1000])
    });
    $('.stop').on('click',function(){
        owl.trigger('autoplay.stop.owl')
    });

});