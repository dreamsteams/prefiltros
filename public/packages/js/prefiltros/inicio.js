$(document).ready(function(){

    $('.owl-carousel').owlCarousel({
        items:4,
        loop:false,
        margin:10,
        autoWidth:true,
        autoplay:true,
        autoplayTimeout:500,
        autoplayHoverPause:true,
        autoHeight:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:6
            }
        }
    });
     $('.owl-carousel').trigger('autoplay.play.owl',[1000]);
    $('.play').on('click',function(){
        $('.owl-carousel').trigger('autoplay.play.owl',[1000]);
    });
    $('.stop').on('click',function(){
        owl.trigger('autoplay.stop.owl')
    });
    $("#section-productos>.row>.col-md-2>i.fa.fa-arrow-left").click(function(){
        $("#section-productos>.row>.col-md-12>.owl-carousel>.owl-nav>.owl-prev").trigger("click");
    });
    $("#section-productos>.row>.col-md-2>i.fa.fa-arrow-right").click(function(){
        $("#section-productos>.row>.col-md-12>.owl-carousel>.owl-nav>.owl-next").trigger("click");
    });
    $("*[data-tool='tooltip']").tooltipster({
        animation:'swing',
        position:'bottom'
    });
    $("body").on("change","input[type='file']",function(){
    /*var value = $("input[type='file']").val();
    $('.js-value').text(value); ponerle el texto al input file con la ruta del archivo*/
              $input = $(this);
              var value = $input[0].files[0].name;
              var files = this.files;
              var file;
             if (files && files.length) {
                file = files[0];
                if (/^image\/\w+$/.test(file.type)) {
                  if($input.attr("id")=="image"){
                    $('.js-value').text("Subir imagen para la seccion ("+value+")"); //asignar sólo el nombre del archivo
                  }else{
                    $(".js-value-user").text("Subir imagen de perfil ("+value+")");
                  }
                }else swal("Archivo no aceptado", "Porfavor elige un archivo formato png,jpg o jpeg.", "error");
              }
          

          });
    $("#frm-section").submit(function(e){
        e.preventDefault();
        formdata = new FormData(document.getElementById('frm-section'));
        formdata.append("titulo",$("#titulo").val());
        formdata.append("descripcion",$("#descripcion").val());
        $.ajax({
            url:$("#frm-section").attr("action"),
            type:"POST",
            data:formdata,
            cache:false,
            contentType: false,
            processData: false

        }).done(function(r){
            console.log(r)
            if($.isPlainObject(r)){
                $.each(r,function(c,o){
                    $noty.show("warning",o,true,false);
                });
            }else{
                $noty.show("success","La sección del carousel se ha agregado exitosamente.",true,true);
                $("#btn-cancel").trigger("click");
            }
        }).fail(function(e){
            console.log(e);
        }).always(function(){

        });
    });
});