$(document).ready(function(){
   $("input[name='telefono']").mask('(000) 000-0000',{placeholder:"(999) 999-9999"});
   $("#frm-cotizacion").validate({
      rules:{
        nombre:{required:true},
        apellido_paterno:{required:true},
        correo:{required:true,email:true},
        telefono:{maxlength:15}
      }
   });
   getCantidadProductos();
   function getCantidadProductos(){
    	$.ajax({
    		"url":"/carrito-get-cantidad",
    		"type":"POST"
    	}).done(function(r){
   			$(".txt-carrito-count").text(r);
    	}).fail(function(e){
    		console.error(e);
    	});
    }
    function reordenarProductos($object){
    	if($object.parent().children().length==1){
    		$object.parent().remove();
    	}else{
    		var $row = $object.parent();
    		$object.remove();
    		while($row.next().length){
    			$producto = $row.next().children().first().clone();
    			if($row.next().children().length==1){
    				$row.next().remove();
    			}else{
    				$row.next().children().first().remove(); 				
    			}
    			$row.append($producto);	
    			$row = ($row.next().length) ? $row.next() : $row;
    		}
    	}
    }
    $("#content-products").on("click",".btn-n-products",function(){
    	var $input;
    	if($(this).hasClass("btn-left")){
    		$input = $(this).next();
    		if($input.val()>1){
	    		$input.val(parseInt($input.val())-1);
    		}
    	}else{
    		$input = $(this).prev();
    		$input.val(parseInt($input.val())+1);
    	}
    	var data ={
    		id:$(this).data("id"),
    		cantidad:$input.val()
    	};
    	$.ajax({
    		"url":"/carrito-more-one",
    		"type":"POST",
    		"data":data
    	}).done(function(r){
    		console.info(r);
    		if($.isPlainObject(r)){
    			$.each(r,function(c,o){
					$noty.show("warning",o,true,false);
				});
    		}else{

    		}
    	}).fail(function(e){
    		console.error(e);
    	});
    });
    $(".btn-empty-cart").click(function(){
	 	swal({
          title: "¿Está seguro de que desea vaciar el carrito?",
          text: "",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#c9371a",
          confirmButtonText: "Sí, Vaciar!",
          closeOnConfirm: true
          },
          function(){
        		$.ajax({
        		"url":"/emptyCarrito",
        		"type":"get"
    	    	}).done(function(r){
    				getCantidadProductos();
    				$noty.show("info",'El carrito se ha vaciado exitosamente!',true,true);
            $("#content-products").empty();
    	    	});
         });
    });
    $("#frm-cotizacion").submit(function(e){
      e.preventDefault();
      if($("#frm-cotizacion").valid()){
        $btn = $("#btn-send-cotizacion");
        $btn.prop("disabled",true);
        $btn.addClass("striped-btn");
        var text = $btn.html();
        $btn.html("<i class='fa fa-paper-plane'></i> Enviando cotización..."); 
       $ajax=  $.ajax({
           url:"/send-cotizacion",
           type:"POST",
           dataType:"JSON",
           data:$("#frm-cotizacion").serialize()
        }).done(function(r){
          console.log(r);
          if($.isPlainObject(r)){
              $.each(r,function(c,o){
               $noty.show("warning",o,true,false);
              });
            }else if(r=="0"){
              swal({
              title: "No se pudo enviar la cotización!",
              text: "La envió de cotización no se pudo realizar por que se perdio la conexión con el servidor de correo, verifique su conexión a internet e intentelo de nuevo, si el problema continua pongase en contacto con el administrador de la pagina web!",
              type: "warning"});
             // $noty.show("warning",'La envió de cotización no se pudo realizar por que se perdio la conexión con el servidor de correo, verifique su conexión a internet e intentelo de nuevo, si el problema continua pongase en contacto con el administrador de la pagina web!',true,true);
            }else{
              $(".btn-cancel").trigger("click");
              $noty.show("success",'La cotización de productos se ha enviado exitosamente, espere la respuesta del administrador!',true,true);
              setTimeout(function(){
                document.location="/productos";
              },2000);
            }
        }).fail(function(e){
          console.log(e);
        }).always(function(r){
          console.log(r);
          $btn.prop("disabled",false);
          $btn.removeClass("striped-btn");
          $btn.html(text);
        });
        console.log($ajax.done());
      }
    });
    $("#content-products").on("click",".btn-carrito-quit",function(){
    	var id = $(this).data("id");
    	var $btn  = $(this);
    	swal({
          title: "¿Seguro quitar producto del carrito?",
          text: "",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#c9371a",
          confirmButtonText: "Sí, Quitar!",
          closeOnConfirm: true
          },
          function(){
        		$.ajax({
        		"url":"carrito-quit",
        		"type":"post",
        		"data":{id:id}
    	    	}).done(function(r){
    	    		if($.isPlainObject(r)){
    	    			$.each(r,function(c,o){
    						$noty.show("warning",o,true,false);
    					});
    	    		}else{
    		    		getCantidadProductos();
    		    		$noty.show("info",'El producto "'+r[0].titulo+'" se ha quitado exitosamente!',true,true);
    		    		reordenarProductos($btn.parent().parent().parent().parent().parent());
    	    		}
    	    	});
         });
    });
});