$(document).ready(function(){
    // dar like a una publicacion
    $(".footer-public>#like").click(function(){
        if(!$(this).hasClass("like")){
            $(this).addClass("like");
            $(this).css({"color":"#ee7e32",transition:".5s"});
        }
        else{
            $(this).removeClass("like");
            $(this).css({"color":"#ee7e32",transition:".5s"});
        }
    });
    // dar click en el boton de commentar
    $(".btn-comment,.btn-comment-min").click(function(){
        $("html,body").animate({scrollTop:150},'slow');
        $("#menu-portada").fadeOut('slow',function(){
            $("#menu-modificar").fadeIn('slow',function(){
            });
        });
    });
    //click en el boton cancelar cuando se encuentre en el menu de publicar, para regresar al menu principal
    $(".btn-cancelar,.btn-cancelar-min").click(function(){
        $("html,body").animate({scrollTop:10},'slow');
        $("#menu-modificar").fadeOut('fast',function(){
            $("#menu-portada").fadeIn('fast');
        });
    });
    //dar click en comentar para aparecer y desaparecer el menu de comentar
    $(".comentar").click(function(){
        $(".comentario").toggle();
        moveScroll(150);
    });
    function moveScroll(n)
    {
        n+=$(window).scrollTop();
        $("html,body").animate({scrollTop:n},'slow');
    }
    $(".show-comments").click(function(){
       $(".comentarios").toggle();
        moveScroll(150);
    });

});
