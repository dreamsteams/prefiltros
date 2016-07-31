$(document).ready(function(){
	// all code here
  $(".nav-item").removeClass("active");
  $("#li-productos").addClass("active");
  var required=true;
  var admin = false;
  $(".title_left").on("isAdmin",function(){
    admin = true;
  });
  $(".menu_section.menu-categorias").hide();
	$(".li-categorias").addClass("active");
	$("#frm-categorias").validate({
		rules:{
			nombre:{required:true,maxlength:40},
			file:{required:function(){
        return required;
      }},

		}
	});
    var consulta ={
      changeImagen : function(id){
          var formData = new FormData(document.getElementById("frm-update-image"));
          formData.append("id",id);
          $.ajax({
            url: "/categoria-changeImage",
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false
          })
          .done(function(response) {
            console.log(response);
            if($.isPlainObject(response)){
              $.each(response,function(c,o){
          $noty.show("warning",o,true,false);
        });
            }
            else{
              $noty.show("success","La imagen fue actualizada exitosamente!",true,true);
              $(".card img[data-id='"+id+"']").attr("src","/packages/images/categorias/"+response);
            }
          })
          .fail(function(error) {
            console.log(error);
          });
         },
     getCategorias:function(){
      $.ajax({
        "url":"categoria-get",
        "dataType":"JSON",
        "type":"post"
      }).done(function(r){
        console.log(r);
        for(var i = 0;  i<r.length;i++){// for para recorrer productos e irlos acomodando en orden
          if($(".row-main-product").last().parent().children().length==3){
            var index_page = ($("[id*='page']").length)+1;
            $page = $("<div/>",{"id":"page-"+index_page});
            $row_new = $("<div/>",{class:"row row-main-categorias"});
            $page.append($row_new);
            $("#content-products").append($page);
            $li = $("<li/>");
            $a  = $("<a/>",{"href":"#page-"+index_page});
            $a.text(index_page);
            $li.append($a);
            $li.insertBefore("ul.pagination>li[class='next']");
          }else{
            $row_new = $("<div/>",{class:"row row-main-categorias"});
            $(".row-main-categorias").last().parent().append($row_new);
            $categoria= $("<div/>",{class:"col-md-3"});
            $card     = $("<div/>",{class:"card","data-card-id":r[i].id});
            $view     = $("<div/>",{class:"view overlay hm-white-slight"});
            $img      = $("<img/>",{"src":"/packages/images/categorias/"+r[i].imagen,"data-id":r[i].id,class:"img-fluid","style":"width:100%!important;;height:160px!important;"});
            $a        = $("<a/>");
            $mask     = $("<div/>",{class:"mask"});
            $row      = $("<div/>",{class:"row"});
            $col_md_12= $("<div/>",{class:"col-md-12"});
            $h5       = $("<h5/>",{class:"text-center"});
            $search   = $("<a/>",{class:"btn btn-yt btn-floating btn-refresh","title":"ver productos de la categoría"});
            $search.data("id",r[i].id);
            $i_search = $("<i/>",{class:"fa fa-search"});
            $image    = $("<a/>",{class:"btn btn-yt btn-floating change-image","title":"Cambiar imagen de la categoría"});
            $image.data("id",r[i].id);
            $i_image  = $("<i/>",{class:"fa fa-image"});
            $refresh  = $("<a/>",{class:"btn btn-yt btn-floating btn-refresh","title":"Modificar producto"});
            $refresh.data("categoria",r[i].categoria_id);
            $refresh.data("id",r[i].id);
            $i_refresh= $("<i/>",{class:"fa fa-refresh"});
            $trash    = $("<a/>",{class:"btn btn-yt btn-floating btn-trash","title":"Eliminar producto"});
            $trash.data("id",r[i].id);
            $i_trash  =$("<i/>",{class:"fa fa-trash"});
            $card_block=$("<div/>",{class:"card-block"});
            $card_title=$("<div/>",{class:"card-title text-center"});
            $p_card_title=$("<p/>").text(r[i].titulo);
            $search.append($i_search);
            $image.append($i_image);
            $refresh.append($i_refresh);
            $trash.append($i_trash);
            $h5.append($search);
            if(admin){
              $h5.append($image);
              $h5.append($refresh);
              $h5.append($trash);
            }
            $col_md_12.append($h5);
            $row.append($col_md_12);
            $mask.append($row);
            $a.append($mask);
            $view.append($img);
            $view.append($a);
            $card.append($view);
            $card_title.append($p_card_title);
            $card_block.append($card_title);
            $card.append($card_block);
            $categoria.append($card);
            $(".row-main-categorias").last().append($categoria);

          }
        }
      }).fail(function(e){
        console.log(e);
      });
    }
  }
	$(".card-new").click(function(){
    $("input[name='id']").val(0);
    required=true;
    $("#save-categoria").html("<i class='fa fa-check'></i> Guardar");
	});

	$("#cancel-categoria").click(function(){
		document.getElementById('frm-categorias').reset();
		$(".btn-remove-image").trigger("click");
	});
	$(".img-preview").click(function(){
		$("#file").trigger("click");
	});
	$(".img-preview").on("click",".btn-remove-image",function(e){
		e.stopPropagation();
		$(".img-preview").html('<h1 class="text-center"><i class="fa fa-plus-circle"></i></h1>'+
			  '<h4 class="text-center">Agregar imagen</h4>');
		 var input = $("#file");
 	     var clon = input.clone();  // Creamos un clon del elemento original
         input.replaceWith(clon);   // 
         $("#img-categoria").attr("src","/packages/images/sin_foto.png");
	});
	$("#nombre").keyup(function(){
		if($(this).val()!==''){
			$("#name-categoria").text($(this).val());
		}else{
			$("#name-categoria").text("Nombre de la categoria");
		}
	});
  $("#categorias").on("click","a[href*='page']",function(e){
    e.preventDefault();
    $("div[id*='page']").removeClass("active");
    $("a[href*='page']").parent().removeClass("active");
    $(this).parent().addClass("active");
    $($(this).attr("href")).addClass("active");
    if($(".next").prev().hasClass("active")){
      $(".next").addClass("disabled");
    }else{
      $(".next").removeClass("disabled");
    }
    if($(".prev").next().hasClass("active")){
      $(".prev").addClass("disabled");
    }else{
      $(".prev").removeClass("disabled");
    }

  });
  $(".next,.prev").click(function(e){
    e.preventDefault();
    if(!$(this).hasClass("disabled")){
      $li = $(".pagination>li.active");
      if($(this).hasClass("next")){ 
        $li.next().addClass("active");
        
      }else{
        $li.prev().addClass("active");
      }
      $li.removeClass("active");
      if($(".next").prev().hasClass("active")){
        $(".next").addClass("disabled");
      }else{
        $(".next").removeClass("disabled");
      }
      if($(".prev").next().hasClass("active")){
        $(".prev").addClass("disabled");
      }else{
        $(".prev").removeClass("disabled");
      }
      $("div[id*='page']").removeClass("active");
      $($(".pagination>li.active>a[href*='page']").attr("href")).addClass("active");
    }
  });
	function archivo(evt) {
      var files = evt.target.files; // FileList object
       
        //Obtenemos la imagen del campo "file". 
      for (var i = 0, f; f = files[i]; i++) {         
           //Solo admitimos imágenes.
           if (!f.type.match('image.*')) {
                continue;
           }
       
           var reader = new FileReader();
           
           reader.onload = (function(theFile) {
               return function(e) {
               // Creamos la imagen.
               		  $("#img-categoria").attr("src",e.target.result);
                      document.querySelector(".img-preview").innerHTML = ['<img  class="img-categoria" src="', e.target.result,'"/>'].join('');
                     $(".img-preview").prepend($('<a href="#">'+
			 	'<a data-toggle="tooltip" data-placement="bottom" title="Quitar imagen"  class="btn btn-yt btn-floating btn-remove-image"><i class="fa fa-remove"></i></a>'+
	          '</a>'));
               };
           })(f);
 
           reader.readAsDataURL(f);
       }
}
  function uploadCategoria(update){
      formData = new FormData(document.getElementById('frm-categorias'));
      $btn = $("#save-categoria");
      $btn.prop("disabled",true);
      text = $btn.html();
      if(update){
        $btn.text("Actualizando...");
      }else{
        $btn.text("guardando...");
      }
      $.ajax({
        url:"/categoria-upload",
        type:"post",
        cache:false,
        processData:false,
        contentType:false,
        data:formData,
      }).done(function(r){
        if($.isPlainObject(r)){
          $.each(r,function(c,o){
            $noty.show("warning",o,true,false);
          });
        }else{
          if(update){
            $noty.show("success","La categoría se ha actualizado exitosamente",true,true);
            $card = $("[data-card-id='"+r[0].id+"']");
            console.log($card = $("[data-card-id='"+r[0].id+"']"));
            $card.find(".card-title>p").text(r[0].titulo);
            $card.find("img").attr("src","/packages/images/categorias/"+r[0].imagen);
            console.log($card);
          }else{
            $noty.show("success","La categoría se ha agregado exitosamente",true,true);
            if($(".row-main-categorias").last().children().length==4){
              if($(".row-main-categorias").last().parent().children().length==3){
                var index_page = ($("[id*='page']").length)+1;
                $page = $("<div/>",{"id":"page-"+index_page});
                $row_new = $("<div/>",{class:"row row-main-categorias"});
                $page.append($row_new);
                $("#content-categorias").append($page);
                $li = $("<li/>");
                $a  = $("<a/>",{"href":"#page-"+index_page});
                $a.text(index_page);
                $li.append($a);
                $li.insertBefore("ul.pagination>li[class='next']");
              }else{
                $row_new = $("<div/>",{class:"row row-main-categorias"});
                $(".row-main-categorias").last().parent().append($row_new);
              }
            }
            $categoria= $("<div/>",{class:"col-md-3"});
            $card     = $("<div/>",{class:"card","data-card-id":r[0].id});
            $view     = $("<div/>",{class:"view overlay hm-white-slight"});
            $img      = $("<img/>",{"src":"/packages/images/categorias/"+r[0].imagen,class:"img-fluid","data-id":r[0].id,"style":"width:100%!important;height:160px!important;"});
            $a        = $("<a/>");
            $mask     = $("<div/>",{class:"mask"});
            $row      = $("<div/>",{class:"row"});
            $col_md_12= $("<div/>",{class:"col-md-12"});
            $h5       = $("<h5/>",{class:"text-center"});
            $search   = $("<a/>",{class:"btn btn-yt btn-floating","title":"ver detalles del producto"});
            $search.data("toggle","tooltip");
            $search.data("placement","bottom");
            $i_search = $("<i/>",{class:"fa fa-search"});
            $image    = $("<a/>",{class:"btn btn-yt btn-floating change-image","title":"Cambiar imagen del producto"});
            $image.data("toggle","tooltip");
            $image.data("placement","bottom");
            $image.data("id",r[0].id);
            $i_image  = $("<i/>",{class:"fa fa-image"});
            $refresh  = $("<a/>",{class:"btn btn-yt btn-floating btn-refresh","title":"Modificar producto"});
            $refresh.data("toggle","tooltip");
            $refresh.data("placement","bottom");
            $refresh.data("id",r[0].id);
            $i_refresh= $("<i/>",{class:"fa fa-refresh"});
            $trash    = $("<a/>",{class:"btn btn-yt btn-floating btn-trash","title":"Eliminar producto"});
            $trash.data("id",r[0].id);
            $i_trash   =$("<i/>",{class:"fa fa-trash"});
            $card_block=$("<div/>",{class:"card-block"});
            $card_title=$("<div/>",{class:"card-title text-center"});
            $p_card_title=$("<p/>").text(r[0].titulo);
            $search.append($i_search);
            $image.append($i_image);
            $refresh.append($i_refresh);
            $trash.append($i_trash);
            $h5.append($search);
            if(admin){
              $h5.append($image);
              $h5.append($refresh);
              $h5.append($trash)
            }
            $col_md_12.append($h5);
            $row.append($col_md_12);
            $mask.append($row);
            $a.append($mask);
            $view.append($img);
            $view.append($a);
            $card.append($view);
            $card_title.append($p_card_title);
            $card_block.append($card_title);
            $card.append($card_block);
            $categoria.append($card);
            $(".row-main-categorias").last().append($categoria);
            console.info(r);
          }
          $("#cancel-categoria").trigger("click");
          $("#file").attr("name","file");
        }
      }).fail(function(e){
        console.log(e);
      }).always(function(r){
        $btn.html(text);
        $btn.prop("disabled",false);
      });
  }
     $("#content-categorias").on("click",".change-image",function(){
        $("#changeImage").data("id",$(this).data("id"));
        $("#changeImage").trigger("click");
     });
     $("#content-categorias").on("click",".btn-refresh",function(){
          required=false;
          var titulo   = $(this).parent().parent().parent().parent().parent().parent().data("titulo");
          $("input[name='nombre']").val(titulo);
          $("input[name='id']").val($(this).data("id"));
          $("#save-categoria").html("<i class='fa fa-refresh'></i> Modificar");
      });
      $("body").on("change","input[type='file']",function(){
        $("#file").attr("name","file");
            $input = $(this);
            var files = this.files;
            var file;
           if (files && files.length) {
              file = files[0];
              if (/^image\/\w+$/.test(file.type)) {
                 // cambiar imagen
                 if($input.attr("id")=="changeImage"){
                  consulta.changeImagen($input.data("id"));
                 }
              }else{
                $(".fileinput-remove.fileinput-remove-button").trigger("click");
                $noty.show("info","Porfavor elige un archivo formato png, gif, jpg o jpeg.",true,false);
              }
            }
        });
      $("#content-categorias").on("click",".btn-trash",function(){
        var id = $(this).data("id");
        swal({
          title: "¿Seguro de eliminar la categoría?",
          text: "Al eliminar la categoría también se eliminarán los productos que pertenecen a esta.",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#c9371a",
          confirmButtonText: "Sí, Eliminar!",
          closeOnConfirm: true
          },
          function(){
          $.ajax({
            "url":"/categoria-remove",
            "type":"post",
            data:{id:id}
          }).done(function(r){
            if($.isPlainObject(r)){
              $.each(r,function(c,o){
              $noty.show("warning",o,true,false);
            });
            }else{
              if(r=="success"){
                $noty.show("info","La categoría se ha eliminado exitosamente.",true,true);
                reordenarProductos($(".card[data-card-id='"+id+"']").parent());
              }else{
                $noty.show("warning","La categoría que desea eliminar no se encuentra en el sistema.",true,true);
              }
            }
          }).fail(function(e){
            console.error(e);
          });
         });
    });     
  function reordenarProductos($object){
      if($object.parent().children().length==1){
        if($object.parent().parent().children().length==1){
          $("a[href='#"+$object.parent().parent().attr("id")+"']").parent().remove();
          $("ul.pagination>li").removeClass("active");
          $("ul.pagination>li>a[href*='#page']").first().parent().addClass("active");
          $object.parent().parent().remove();
        }else{
          $object.parent().remove();
        }
      }else{
        var $row = $object.parent();
        $object.remove();
        while($row.next().length){
          $producto = $row.next().children().first().clone();
          if($row.next().children().length==1){
            if($row.next().parent().children().length==1){
              $("a[href='#"+$row.next().parent().attr("id")+"']").parent().remove();
              $("ul.pagination>li").removeClass("active");
              $("ul.pagination>li>a[href*='#page']").first().parent().addClass("active");
              $("div[id*='page']").removeClass("active");
              $("div[id*='page']").first().addClass("active");
            $row.next().parent().remove();
          }else{
            $row.next().remove();
          }
          }else{
            $row.next().children().first().remove();        
          }
          $row.append($producto); 
          $row = ($row.next().length) ? $row.next() : $row;
        }
      }
    }
//      document.getElementById('file').addEventListener('change', archivo, false);
      $("#frm-categorias").submit(function(e){
      	e.preventDefault();
        if($(this).valid()){
          if($("input[name='id']").val()==0){
            uploadCategoria(false);
          }else{
            uploadCategoria(true);
          }
      	}
      });
       
});