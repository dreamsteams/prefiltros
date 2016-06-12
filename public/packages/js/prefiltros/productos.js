$(document).ready(function(){
	required = true;
	var consulta ={
     	changeImagen : function(id){
	        var formData = new FormData(document.getElementById("frm-update-image"));
	        formData.append("id",id);
	        $.ajax({
	          url: "/producto-changeImage",
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
	            $(".card img[data-id='"+id+"']").attr("src","/packages/images/productos/"+response);
	          }
	        })
	        .fail(function(error) {
	          console.log(error);
	        });
      	 },
		 getProducts:function(){
			$.ajax({
				"url":"producto-get",
				"dataType":"JSON",
				"type":"post"
			}).done(function(r){
				console.log(r);
				for(var i = 0;  i<r.length;i++){// for para recorrer productos e irlos acomodando en orden
					if($(".row-main-product").last().children().length==6){// cuando el numero de productos llegue a 6 esto indicara que un renglon esta lleno por lo cual nos pasaremos a crear uno nuevo
						$row_products = $("<div/>",{class:"row row-main-product"});
						$("#content-products").append($row_products);
					}else{ // creación de un nuevo producto
						$producto = $("<div/>",{class:"col-md-2"});
						$card 	  = $("<div/>",{class:"card","data-card-id":r[i].id});
						$card.data("descripcion",r[i].descripcion);
						$view 	  = $("<div/>",{class:"view overlay hm-white-slight"});
						$img 	  = $("<img/>",{"src":"/packages/images/productos/"+r[i].imagen,"data-id":r[i].id,class:"img-fluid","style":"1350px!important;;height:135px!important;"});
						$a        = $("<a/>",{"href":"javascript:void(0)"});
						$mask	  = $("<div/>",{class:"mask"});
						$row      = $("<div/>",{class:"row"});
						$col_md_12= $("<div/>",{class:"col-md-12"});
						$h5       = $("<h5/>",{class:"text-center"});
						$search   = $("<a/>",{class:"btn btn-yt btn-floating","title":"ver detalles del producto"});
						$search.data("toggle","tooltip");
						$search.data("placement","bottom");
						$i_search = $("<i/>",{class:"fa fa-search"});
						$image    = $("<a/>",{class:"btn btn-yt btn-floating change-image","title":"Cambiar imagen den producto"});
						$image.data("toggle","tooltip");
						$image.data("placement","bottom");
						$image.data("id",r[i].id);
						$i_image  = $("<i/>",{class:"fa fa-image"});
						$refresh  = $("<a/>",{class:"btn btn-yt btn-floating btn-refresh","title":"Modificar producto"});
						$refresh.data("toggle","tooltip");
						$refresh.data("placement","bottom");
						$refresh.data("categoria",r[i].categoria_id);
						$refresh.data("id",r[i].id);
						$i_refresh= $("<i/>",{class:"fa fa-refresh"});
						$trash 	  = $("<a/>",{class:"btn btn-yt btn-floating btn-trash","title":"Eliminar producto"});
						$trash.data("id",r[i].id);
						$i_trash  =$("<i/>",{class:"fa fa-trash"});
						$card_block=$("<div/>",{class:"card-block"});
						$card_title=$("<div/>",{class:"card-title text-center"});
						$p_card_title=$("<p/>").text(r[i].titulo);
						$a_carrito =$("<a/>",{"href":"jacascript:void(0)",class:"btn btn-info"});
						$i_carrito =$("<i/>",{class:"fa fa-car"}).text("Agregar al carrito");
						$search.append($i_search);
						$image.append($i_image);
						$refresh.append($i_refresh);
						$trash.append($i_trash);
						$h5.append($search);
						$h5.append($image);
						$h5.append($refresh);
						$h5.append($trash);
						$col_md_12.append($h5);
						$row.append($col_md_12);
						$mask.append($row);
						$a.append($mask);
						$view.append($img);
						$view.append($a);
						$card.append($view);
						$a_carrito.append($i_carrito);
						$card_title.append($p_card_title);
						$card_title.append($a_carrito);
						$card_block.append($card_title);
						$card.append($card_block);
						$producto.append($card);
						$(".row-main-product").last().append($producto);

					}
				}
			}).fail(function(e){
				console.log(e);
			});
		}
	}
    consulta.getProducts();
	$(".li-productos").addClass("active");
	$("#frm-productos").validate({
		rules:{
			nombre:{required:true,maxlength:50},
			descripcion:{required:true,maxlength:1255},
			categorias:{required:true,number:true,maxlength:4},
			file:{required:function(){
				return required;
			}}
		}
	});
	$(".card-new").click(function(){
		$("#productos").hide("slow");
		$("#admin-productos").show("slow");
		required=true;
		$("input[name='id']").val(0);
		$("#save-product").html("<i class='fa fa-check'></i> Guardar");
	});
	$("#cancel-product").click(function(){
		$("#productos").show("slow");
		$("#admin-productos").hide("slow");
	});
	function uploadProducto(update){
		formData = new FormData(document.getElementById('frm-productos'));
			formData.append("categoria",$("#categorias").val());
			$btn = $("#save-product");
			$btn.prop("disabled",true);
			text = $btn.html();
			if(update){
				$btn.text("Actualizando...");
			}else{
				$btn.text("guardando...");
			}
			$.ajax({
				url:"/producto-upload",
				type:"post",
				cache:false,
				processData:false,
				contentType:false,
				data:formData,
			}).done(function(r){
				console.log(r);
				if($.isPlainObject(r)){
					$.each(r,function(c,o){
						$noty.show("warning",o,true,false);
					});
				}else{
					if(update){
						$noty.show("success","El producto se ha actualizado exitosamente",true,true);
						$card = $("[data-card-id='"+r[0].id+"']");
						$card.data("descripcion",r[0].descripcion);
						$card.find(".card-title>p").text(r[0].titulo);
						$card.find("img").attr("src","/packages/images/productos/"+r[0].imagen);
						$card.find(".btn-refresh").data("categoria",r[0].categoria_id);
						console.log($card);
					}else{
						$noty.show("success","El producto se ha agregado exitosamente",true,true);
						if($(".row-main-product").last().children().length==6){
							$row_new = $("<div/>",{class:"row row-main-product"});
							$("#content-products").append($row_new);
						}
						$producto = $("<div/>",{class:"col-md-2"});
						$card 	  = $("<div/>",{class:"card","data-card-id":r[0].id});
						$card.data("descripcion",r[0].descripcion);
						$view 	  = $("<div/>",{class:"view overlay hm-white-slight"});
						$img 	  = $("<img/>",{"src":"/packages/images/productos/"+r[0].imagen,class:"img-fluid","data-id":r[0].id,"style":"1350px!important;;height:135px!important;"});
						$a        = $("<a/>",{"href":"javascript:void(0)"});
						$mask	  = $("<div/>",{class:"mask"});
						$row      = $("<div/>",{class:"row"});
						$col_md_12= $("<div/>",{class:"col-md-12"});
						$h5       = $("<h5/>",{class:"text-center"});
						$search   = $("<a/>",{class:"btn btn-yt btn-floating","title":"ver detalles del producto"});
						$search.data("toggle","tooltip");
						$search.data("placement","bottom");
						$i_search = $("<i/>",{class:"fa fa-search"});
						$image    = $("<a/>",{class:"btn btn-yt btn-floating change-image","title":"Cambiar imagen den producto"});
						$image.data("toggle","tooltip");
						$image.data("placement","bottom");
						$image.data("id",r[0].id);
						$i_image  = $("<i/>",{class:"fa fa-image"});
						$refresh  = $("<a/>",{class:"btn btn-yt btn-floating btn-refresh","title":"Modificar producto"});
						$refresh.data("toggle","tooltip");
						$refresh.data("placement","bottom");
						$refresh.data("categoria",r[0].categoria_id);
						$refresh.data("id",r[0].id);
						$i_refresh= $("<i/>",{class:"fa fa-refresh"});
						$trash 	  = $("<a/>",{class:"btn btn-yt btn-floating btn-trash","title":"Eliminar producto"});
						$trash.data("id",r[0].id);
						$i_trash  =$("<i/>",{class:"fa fa-trash"});
						$card_block=$("<div/>",{class:"card-block"});
						$card_title=$("<div/>",{class:"card-title text-center"});
						$p_card_title=$("<p/>").text(formData.get("titulo"));
						$a_carrito =$("<a/>",{"href":"jacascript:void(0)",class:"btn btn-info"});
						$i_carrito =$("<i/>",{class:"fa fa-car"}).text("Agregar al carrito");
						$search.append($i_search);
						$image.append($i_image);
						$refresh.append($i_refresh);
						$trash.append($i_trash);
						$h5.append($search);
						$h5.append($image);
						$h5.append($refresh);
						$h5.append($trash)
						$col_md_12.append($h5);
						$row.append($col_md_12);
						$mask.append($row);
						$a.append($mask);
						$view.append($img);
						$view.append($a);
						$card.append($view);
						$a_carrito.append($i_carrito);
						$card_title.append($p_card_title);
						$card_title.append($a_carrito);
						$card_block.append($card_title);
						$card.append($card_block);
						$producto.append($card);
						$(".row-main-product").last().append($producto);
					}
					$("#cancel-product").trigger("click");
					$("#file").attr("name","file");
				}
			}).fail(function(e){
				console.log(e);
			}).always(function(r){
				$btn.html(text);
				$btn.prop("disabled",false);
			});
	}
	$("#frm-productos").submit(function(e){
		e.preventDefault();
		if($(this).valid()){
			if($("input[name='id']").val()==0){
				uploadProducto(false);
			}else{
				uploadProducto(true);
			}
		}
	});
    $("#content-products").on("click",".change-image",function(){
    	$("#changeImage").data("id",$(this).data("id"));
    	$("#changeImage").trigger("click");
    });
    $("#content-products").on("click",".btn-refresh",function(){
    	required=false;
    	var titulo      = $(this).parent().parent().parent().parent().parent().parent().parent().find(".card-block").children().first().find("p").text();
    	var descripcion = $(this).parent().parent().parent().parent().parent().parent().parent().data("descripcion");
    	$("input[name='titulo']").val(titulo);
    	$("textarea[name='descripcion']").val(descripcion);
    	$("#productos").hide("slow");
		$("#admin-productos").show("slow");
		$("select[name='categorias']").children().removeAttr("selected");
		$("select[name='categorias']").children("option[value='"+$(this).data("categoria")+"']").prop("selected",true);
		$("input[name='id']").val($(this).data("id"));
		$("#save-product").html("<i class='fa fa-refresh'></i> Modificar");
    });
    $("#content-products").on("click",".btn-trash",function(){
    	alert("Mira no más, quieren eliminar el producto que tiene el id: "+$(this).data("id"));
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
                $noty.show("info","Porfavor elige un archivo formato png,jpg o jpeg.",true,false);
           	  }
            }
        });
});