/* ========================================================================= */
/*  Preloader Script
/* =========================================================================

window.onload = function () {
    document.getElementById('loading-mask').style.display = 'none';
} */

$(function(){
    /* ========================================================================= */
    /*  Menu item highlighting
    /* ========================================================================= */

    $noty={
        show:function(type,text,sound,soundSucces){
             switch(type){
                case "success": 
                    Notifier.success(text,"Prefiltros: ");
                break;
                case "error": 
                    Notifier.error(text,"Prefiltros: ");
                break;
                case "info": 
                    Notifier.info(text,"Prefiltros: ");
                break;
                case "warning": 
                    Notifier.warning(text,"Prefiltros: ");
                break;
             }
             if(sound){
                if(soundSucces)
                    document.getElementById('noty-success').play();
                else
                    document.getElementById('noty-error').play();
             }
        }
    }
    $('#nav').onePageNav({
        filter: ':not(.external)',
        scrollSpeed: 950,
        scrollThreshold: 1
    });

    // Slider Height
    var slideHeight = $(window).height();
    $('#home-carousel .carousel-inner .item, #home-carousel .video-container').css('height',slideHeight);

    $(window).resize(function(){'use strict',
        $('#home-carousel .carousel-inner .item, #home-carousel .video-container').css('height',slideHeight);
    });

    // portfolio filtering

    $("#projects").mixItUp();

    //fancybox

/*    $(".fancybox").fancybox({
        padding: 0,

        openEffect : 'elastic',
        openSpeed  : 650,

        closeEffect : 'elastic',
        closeSpeed  : 550,
    });*/

/* ========================================================================= */
/*  On scroll fade/bounce fffect
/* ========================================================================= */

    wow = new WOW({
        animateClass: 'animated',
        offset: 100,
        mobile: false
    });
    wow.init();
});
 $(window).scroll(function () {
        if ($(window).scrollTop() > 30) {// Aquí es cuando se scrolleo hacia bajo y es donde le daras un estilo visible a la barra o como tu gustes
  //          $(".navbar").css("unique-color");/*00C7FC*/
            $(".navbar").addClass("animated-nav");
            $(".dropdown-menu").removeClass("custom-nav");
        } else {
            $(".dropdown-menu").addClass("custom-nav");// Aquí se supone que la barra debería ser transparente.
    //        $(".navbar").css("background","rgba(63, 114, 155, 0.38)!important");
            $(".navbar").removeClass("animated-nav");
        }
    });

    $(".fancybox").fancybox({
        padding: 0,

        openEffect : 'elastic',
        openSpeed  : 650,

        closeEffect : 'elastic',
        closeSpeed  : 550,
    });
    $(".colors").click(function(){
        $(".colors").removeClass("active");
        $(this).addClass("active");
        $(this).parent().parent().parent().attr("data-color",$(this).data("color"));
       
    });