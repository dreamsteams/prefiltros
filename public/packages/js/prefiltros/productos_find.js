$(document).ready(function(){
	getCantidadProductos();
	var required = true;
	var admin = false;
	$(".title_left").on("isAdmin",function(){
		admin = true;
	});
	if($(".next").prev().hasClass("active")){
		$(".next").addClass("disabled");
	}
	recortarString();
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
      	 }
	}
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
	$("a[href*='page']").click(function(e){
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
	$(".card-new").click(function(){
		$("#productos").hide("slow");
		$("#admin-productos").show("slow");
		$(".row-pager").hide();
		required=true;
		$("input[name='id']").val(0);
		$("#save-product").html("<i class='fa fa-check'></i> Guardar");
	});
	$("#cancel-product").click(function(){
		$("#productos").show("slow");
		$("#admin-productos").hide("slow");
		$(".row-pager").show();
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
	function 
	uploadProducto(update){
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
							if($(".row-main-product").last().parent().children().length==3){
								var index_page = ($("[id*='page']").length)+1;
								$page = $("<div/>",{"id":"page-"+index_page});
								$row_new = $("<div/>",{class:"row row-main-product"});
								$page.append($row_new);
								$("#content-products").append($page);
								$li = $("<li/>");
								$a  = $("<a/>",{"href":"#page-"+index_page});
								$a.text(index_page);
								$li.append($a);
								$li.insertBefore("ul.pagination>li[class='next']");
							}else{
								$row_new = $("<div/>",{class:"row row-main-product"});
								$(".row-main-product").last().parent().append($row_new);
							}
						}
						$producto = $("<div/>",{class:"col-md-2"});
						$card 	  = $("<div/>",{class:"card","data-card-id":r[0].id});
						$card.data("descripcion",r[0].descripcion);
						$card.data("titulo",r[0].titulo);
						$view 	  = $("<div/>",{class:"view overlay hm-white-slight"});
						$img 	  = $("<img/>",{"src":"/packages/images/productos/"+r[0].imagen,class:"img-fluid","data-id":r[0].id,"style":"1350px!important;;height:135px!important;"});
						$a        = $("<a/>",{"href":"javascript:void(0)"});
						$mask	  = $("<div/>",{class:"mask"});
						$row      = $("<div/>",{class:"row"});
						$col_md_12= $("<div/>",{class:"col-md-12"});
						$h5       = $("<h5/>",{class:"text-center"});
						$search   = $("<a/>",{class:"btn btn-yt btn-floating","title":"ver detalles del producto","data-toggle":"modal","data-target":"#modal-detalles"});
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
						$refresh.data("categoria",r[0].categoria_id);
						$refresh.data("id",r[0].id);
						$i_refresh= $("<i/>",{class:"fa fa-refresh"});
						$trash 	  = $("<a/>",{class:"btn btn-yt btn-floating btn-trash","title":"Eliminar producto"});
						$trash.data("id",r[0].id);
						$i_trash  =$("<i/>",{class:"fa fa-trash"});
						$card_block=$("<div/>",{class:"card-block"});
						$card_title=$("<div/>",{class:"card-title text-center"});
						$p_card_title=$("<p/>").text(formData.get("titulo"));
						$a_carrito =$("<a/>",{class:"btn btn-carrito-add btn-info"});
						$a_carrito.data("id",r[0].id);
						$i_carrito =$("<i/>",{class:"fa fa-car"}).text("Agregar al carrito");
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
						if(!admin){
							$a_carrito.append($i_carrito);
							$card_title.append($a_carrito);
						}
						$card_block.append($card_title);
						$card.append($card_block);
						$producto.append($card);
						$(".row-main-product").last().append($producto);
					}
					$("#cancel-product").trigger("click");
					$("#file").attr("name","file");
					recortarString();
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
    $("#content-products").on("click",".btn-carrito-add",function(){
   		var datos = { 
   			id :$(this).data("id"),
   			cantidad:1
   		}

   		$.ajax({
   			"url":"/carrito-add",
   			"type":"POST",
   			data:datos
   		}).done(function(r){
   			console.log(r);
   			if($.isPlainObject(r)){
   				r.each(function(c,o){
   					$noty.show("warning",o,true,false);
   				});
   			}else{
   				$noty.show("success",'El producto "'+r[0].titulo+'" se ha agreagado exitosamente!',true,true);
   				getCantidadProductos()
   			}
   		}).fail(function(e){
   			console.log(e);
   		}).always(function(r){

   		}); 	
    });
    function getCantidadProductos(){
    	$.ajax({
    		"url":"/carrito-get-cantidad",
    		"type":"POST"
    	}).done(function(r){
    		console.log(r);
   			$(".txt-carrito-count").text(r);
    	}).fail(function(e){
    		console.log(e);
    	});
    }
    $("#content-products").on("click",".btn-refresh",function(){
    	required=false;
    	var titulo      = $(this).parent().parent().parent().parent().parent().parent().data("titulo");
    	var descripcion = $(this).parent().parent().parent().parent().parent().parent().data("descripcion");
    	$("input[name='titulo']").val(titulo);
    	$("textarea[name='descripcion']").val(descripcion);
    	$("#productos").hide("slow");
    	$(".row-pager").hide();
		$("#admin-productos").show("slow");
		$("select[name='categorias']").children().removeAttr("selected");
		$("select[name='categorias']").children("option[value='"+$(this).data("categoria")+"']").prop("selected",true);
		$("input[name='id']").val($(this).data("id"));
		$("#save-product").html("<i class='fa fa-refresh'></i> Modificar");
    });
    $("#content-products").on("click",".btn-search",function(){
    	var src = $(this).parent().parent().parent().parent().parent().find("img").attr("src");
    	var title =  $(this).parent().parent().parent().parent().parent().parent().data("titulo");
    	var description = $(this).parent().parent().parent().parent().parent().parent().data("descripcion");
    	$("#modal-detalles").find("img").attr("src",src);
    	$("#modal-detalles").find(".title-detalle").text(title);
    	$("#modal-detalles").find(".description-detalle").text(description);

    });
    $("#content-products").on("click",".btn-trash",function(){
    	var id = $(this).data("id");
        swal({
          title: "¿Seguro de eliminar el producto?",
          text: "",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#c9371a",
          confirmButtonText: "Sí, Eliminar!",
          closeOnConfirm: true
          },
          function(){
    		$.ajax({
    			"url":"/producto-remove",
    			"type":"post",
    			data:{id:id}
    		}).done(function(r){
    			if($.isPlainObject(r)){
    				$.each(r,function(c,o){
						$noty.show("warning",o,true,false);
					});
    			}else{
    				if(r=="success"){
	    				$noty.show("info","EL producto se ha eliminado exitosamente.",true,true);
	    				reordenarProductos($(".card[data-card-id='"+id+"']").parent());
    				}else{
    					$noty.show("warning","EL producto que desea eliminar no se encuentra en el sistema.",true,true);
    				}
    			}
    		}).fail(function(e){
    			console.error(e);
    		});
         });
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
       	function recortarString(){
		   $.each($(".card-title>p"),function(c,v){
			    var text = $(v).text();
			    if(text.length>24){
			        text = text.substring(0,18);
			        $(v).text(text+"...");
			    }
			});
		}
});