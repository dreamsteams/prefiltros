$(document).ready(function(){
	// all code here
	$(".li-categorias").addClass("active");
	$("#frm-categorias").validate({
		rules:{
			nombre:{required:true,maxlength:40},
			file:{required:true},

		}
	});
	$(".card-new").click(function(){
		$("#categorias").hide("slow");
		$("#admin-categorias").show("slow");
	});

	$("#cancel-categoria").click(function(){
		$("#categorias").show("slow");
		$("#admin-categorias").hide("slow");
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
             
//      document.getElementById('file').addEventListener('change', archivo, false);
      $("#frm-categorias").submit(function(e){
      	e.preventDefault();
        if($(this).valid()){
          $btn = $("#save-categoria");
          $btn.prop("disabled",true);
          var text = $btn.text();
          $btn.text("guardando...");
      		var formData = new FormData(document.getElementById('frm-categorias'));
      		$.ajax({
      			url:'/categoria-upload',
      			type:"POST",
      			cache: false,
                contentType: false,
                processData: false,
                data:formData,


      		}).done(function(r){
      			console.log(r);
            if($.isPlainObject(r)){
              $.each(r,function(c,o){
                $noty.show("warning",o,true,false);
              });
            }else{
              $noty.show("success","La categoría se ha agregado exitosamente",true,true);
              $("#cancel-categoria").trigger("click");
            }
      		}).fail(function(e){
      			console.log(e);
      		}).always(function(r){
            $btn.prop("disabled",false);
            $btn.text(text);
      		});
      	}
      });
      
});