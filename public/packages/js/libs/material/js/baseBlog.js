$(document).ready(function(){
    //temas para establecer en la pagina
    //-------------------------------------------------------------------------------------//
    var temas = {
        blue :{bgHeader:"rgb(36, 36, 165)",bgAside:"rgba(16, 16, 16, 0.87)"},
        orange :{bgHeader:"rgb(180, 76, 32)",bgAside:"rgba(16, 16, 16, 0.87)"},
        purple :{bgHeader:"purple",bgAside:"black"},
        black :{bgHeader:"black",bgAside:"black"},
        red :{bgHeader:"rgba(159, 12, 12, 0.92)",bgAside:"rgba(16, 16, 16, 0.87)"},
        green:{bgHeader:"#209620",bgAside:"rgb(25, 36, 38)"},
        yellow:{bgHeader:"rgb(219, 207, 0)",bgAside:"rgba(16, 16, 16, 0.87)"},
    }
    //---------------------------------------------------------------------------------//

    $(".toggle-menu").click(function(){//click en una opcion de la barra lateral derecha

        // si  tiene la clase de la flechita hacia la izquierda se la quitamos y ponemos la flechita hacia abajo y mostramos todas las opciones
        if($(this).children().find(".fa-chevron-left").hasClass('fa-chevron-left')){
            $(this).addClass("active")
            $(this).parent().parent().css("overflow","auto");
            $(this).children().find(".fa-chevron-left").attr('class','fa fa-chevron-down');
            $(this).parent().find(".navbar-left-sublist").show();
            $(this).parent().find(".navbar-left-sublist").css({"animation":".8s show 1"});
            //eliminar animacion al tanscurrir 1 segundo
            setTimeout(function(){
                $(this).parent().find(".navbar-left-sublist").css({"animation":""});
            },1100);
            $(".navbar_left").animate({scrollTop:200},'slow');
        }
        else{
            //ocultar opciones del submenu
            $(this).removeClass("active")
            $(this).parent().find(".navbar-left-sublist").css({"animation":".8s hide 1 forwards"});
            $(this).children().find(".fa-chevron-down").attr('class','fa fa-chevron-left');
            $(this).parent().parent().css("overflow","auto");
           //eliminar animacion al tanscurrir 1 segundo
            setTimeout(function(){
                $(this).parent().find(".navbar-left-sublist").css({"animation":""});
                $(this).parent().find(".navbar-left-sublist").addClass("hidden");
            },1100);
            //regresar scroll hacia arriba
            $(".navbar_left").animate({scrollTop:0},'slow');
        }
    });
//------------  Establecer tema al dar click en una opcion ---------------------
    $(".navbar-left-sublist>li").click(function(){
        //obtener color de fondo para el navbar header
        var header = eval("temas."+$(this).children().find("span.color").attr("class").split(" ")[1]+".bgHeader;");
        //obtener el coloor de fondo para el navbar lateral
        var navbar_left = eval("temas."+$(this).children().find("span.color").attr("class").split(" ")[1]+".bgAside;");
        // establecer colores a los navbar
        $(".my_navbar").css("background",header);
        $(".navbar_left").css("background",navbar_left);
        $(".tabs-3").css("background",header);
    });
/// ------------------------------------ fin establecer tema--------------------------------- ///
// ------------------------------------------- btn toggle ------///
    $("#btn-navbar-left").click(function(e){

        //mostrar ventana modal con transicion
        $("#myaside").css("z-index","9999");

        $("#myaside").show();
        $("#myaside").css("animation",".5s show 1");
        //mostrar con transicion
        $("#mask").fadeIn(1000),
        $("#mask").fadeTo("fast",0.8);

    });
    $("#mask").click(function(){

        $("#mask").hide();
        $("#myaside").css("animation",".7s hide 1 forwards");
        setTimeout(function(){
            $("#myaside").hide();
            $("#myaside").css("animation","");
        },800);

    });
    $(window).resize(function(){
       if($(window).width()>894)
       {
           $("#mask").hide();
           $("#myaside").css({"z-index":""});
           $("#myaside").show();
          //  console.log($(window).width());

       }
       else
       {
           $("#myaside").hide();
           $("#myaside").css("z-index","9999");
       }
    });


});
