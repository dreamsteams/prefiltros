$(document).ready(function(){
    var disabled=false;
    var required=true;
    var id=0;
    var titulo;
    var descripcion;
    $.each($(".producto-title"),function(c,v){
        var text = $(v).text();
        if(text.length>24){
            text = text.substring(0,18);
            $(v).text(text+"...");
        }
    });
   $("#frm-section").validate({
        rules:{
            "titulo":{required:true},
            "descripcion":{required:true},
            "image":{required:function(){
                return required;
            }},
        }
   });
   $("#frmContacto").validate({
        rules:{
            "email":{required:true,email:true},
            "asunto":{required:true},
            "comentarios":{required:true}
        }
   });
   $("#contacto").click(function(){
        if($("#frmContacto").valid()){
            var text = $("#contacto").text();
            $("#contacto").text("Enviando...");
            $("#contacto").prop("disabled",true);
            $.ajax({
                "url":$("#frmContacto").attr("action"),
                "type":"POST",
                "data":$("#frmContacto").serialize()
            }).done(function(r){
                console.log(r);
                if($.isPlainObject(r)){
                    $.each(r,function(c,o){
                        $noty.show("warning",o,true,false);
                    });
                }else{
                    if(r==0){
                         swal({
                          title: "Notificación de prefiltros.",
                          text: "No se ha enviado el correo por que se pudo establecer la conexión con el servidor de correo, verifique su conexión a interntet si este problema continua pongase en contacto con el administrador de la pagina",
                          type: "info"
                          });
                        //$noty.show("info","",true,false);
                    }else{
                        $noty.show("success","EL envió de tus dudas, comentarios y/o sugerencias se ha enviado exitosamente.",true,true);
                        document.getElementById('frmContacto').reset();
                    }
                }
            }).fail(function(e){

            }).always(function(){
                $("#contacto").text(text);
                $("#contacto").prop("disabled",false);
            });
        }
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
                    if($("input[name='id']").val()!=0){
                        disabled=false;
                        $("#btn-save-seccion").prop("disabled",disabled);
                    }
                  }
                }else swal("Archivo no aceptado", "Porfavor elige un archivo formato png,jpg o jpeg.", "warning");
              }
          

          });
    $(".btn-refresh").click(function(e){
        $("#btn-save-seccion").text("MODIFICAR SECCIÓN");
        $("#modal-carousel .modal-title").html('<i class="fa fa-gear"></i> Modificar sección');
        id = $(".carousel-inner .carousel-item.active").data("id");
        $("#btn-save-seccion").prop("disabled",true);
        $("input[name='id']").val(id);
        required=false;
        titulo = $(".carousel-inner .carousel-item.active>.carousel-caption h3").text();
        descripcion = $(".carousel-inner .carousel-item.active>.carousel-caption p").text();
        $("input[name='titulo']").val(titulo);
        $("textarea[name='descripcion']").val(descripcion);
        setTimeout(function(){
            $("input[name='titulo']").trigger("focus");
        },1000);
    });
    $(".btn-upload").click(function(e){
        $("#btn-save-seccion").text("GUARDAR SECCIÓN");
        $("#modal-carousel .modal-title").html('<i class="fa fa-plus"></i> Agregar nueva sección');
        $("imput[name='id']").val("0");
        document.getElementById("frm-section").reset();
        $("#btn-save-seccion").prop("disabled",false);
        required=true;
    });
    $("input[name='titulo'],textarea[name='descripcion']").keyup(function(){
        if($("input[name='titulo']").val() != titulo || $("textarea[name='descripcion']").val()!=descripcion){
            $("#btn-save-seccion").prop("disabled",false);
        }else{
            $("#btn-save-seccion").prop("disabled",true);
        }
    });
    $(".btn-delete").click(function(){
        id = $(".carousel-inner .carousel-item.active").data("id");
        $("input[name='id']").val(id);
         swal({
          title: "¿Seguro de eliminar esta sección?",
          text: "",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#c9371a",
          confirmButtonText: "Sí, Eliminar!",
          closeOnConfirm: true
          },
          function(){
            $.ajax({
                "url":"/carousel-remove",
                "type":"post",
                data:{id:id}
            }).done(function(r){
                if($.isPlainObject(r)){
                    $.each(r,function(c,o){
                        $noty.show("warning",o,true,false);
                    });
                }else{
                    if(r=="success"){
                        $noty.show("info","La sección se ha eliminado exitosamente.",true,true);
                        document.location="/";
                    }else{
                        
                    }
                }
            }).fail(function(e){
                console.error(e);
            });
         }).always(function(){
              
         });
    });
    $("#btn-cancel").click(function(){
         var clon = $("input[name='image']").clone();  // Creamos un clon del elemento original
          $("input[name='image']").replaceWith(clon);   // Y sustituimos el original por el clon
          $('.js-value').text("Subir imagen para la sección ");
    });
    $("#frm-section").submit(function(e){
        e.preventDefault();
        if($("#frm-section").valid()){
            $("#btn-save-seccion").prop("disabled",true);
            if($("input[name='id']").val()==0){
                $("#btn-save-seccion").text("Guardando...");
                var upadate=false;
            }else{
                $("#btn-save-seccion").text("Modificando...");
                var upadate = true;
            }
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
                    if(upadate){
                         $noty.show("success","La sección del carousel se ha actualizado exitosamente.",true,true);
                          $(".carousel-inner .carousel-item[data-id='"+id+"'] img").attr("src","/packages/images/secciones/"+r[0].imagen);
                          $(".carousel-inner .carousel-item[data-id='"+id+"'] h3").text(r[0].titulo);
                          $(".carousel-inner .carousel-item[data-id='"+id+"'] p").text(r[0].descripcion);
                         $("#btn-cancel").trigger("click");
                    }else{
                        $noty.show("success","La sección del carousel se ha agregado exitosamente.",true,true);
                        $("#btn-cancel").trigger("click");
                        document.location="/";
                    }
                }
            }).fail(function(e){
                console.log(e);
            }).always(function(){
                var clon = $("input[name='image']").clone();  // Creamos un clon del elemento original
                $("input[name='image']").replaceWith(clon);   // Y sustituimos el original por el clon
                $('.js-value').text("Subir imagen para la sección ");
            });
        }
    });
});