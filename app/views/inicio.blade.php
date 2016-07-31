@extends('plantillas.base')

@section('css')

{{HTML::style('/packages/css/prefiltros/inicio.css')}}

@stop

@section('title') Bienvenido | Prefiltros! @stop
@section('container-main')

<section id="section-inicio" data-scroll-index="0">
  <div class="container">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="modal fade" id="modal-carousel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar nueva sección</h4>
              </div>
              <div class="modal-body">
                <form action="/addSection" method="POST" id="frm-section" class="form-horizontal">
                     <div class="row">
                       <div class="input-group col-md-12">
                          <i class="material-icons prefix"><i class="fa fa-text-width"></i></i>
                          <label for="titulo">titulo de la sección</label>
                          <input type="text" name="titulo"  id="titulo"  class="validate">
                        </div>      
                      </div>      
                      <div class="row">
                        <div class="input-group col-md-12">
                            <i class="material-icons prefix"><i class="fa fa-pencil-square-o"></i></i>
                            <label for="descripcion">Ingrese la descripción de la sección</label>
                            <textarea name="descripcion" id="descripcion" class="" cols="10" rows="10"></textarea>
                        </div>
                      </div>
                      <div class="row">
                         <div class="col-md-1"></div>
                         <div class="col-md-10">
                            <label for="image" class="filupp" style="margin-top:3%!important;">
                              <span class="filupp-file-name js-value">Subir imagen para la sección </span>
                              <i class="fa fa-upload"></i>
                              <input type="file" name="image" id="image" accept="image/jpg,image/png,image/jpeg,image/gif"/>
                            </label>
                          </div>
                          <div class="col-md-1"></div>
                          <input type="number" name="id" id="id" hidden>
                      </div>
              </div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-warning" data-dismiss="modal" id="btn-cancel">Cancelar</button>
                <button type="submit" class="btn btn-success" id="btn-save-seccion">Guardar sección</button>
              </div>
            </form>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
      </div>
      <div class="col-md-2"></div>
    </div>
  </div>
 </div>

<!--Carousel Wrapper-->
<div id="carousel-example-2" style="margin-top:3%!important;" class="carousel slide carousel-fade" data-ride="carousel">
  <!-- boton Gestion de sección -->
      @if(Auth::user())
      <div class="btn-carousel-modific">
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a class="dropdown-toggle btn-floating btn-large blue" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
            <!--<ul class="dropdown-menu custom-nav" role="menu">
              <li data-toggle="modal" data-target="#modal-carousel" class="btn-upload"><a><i class="fa fa-plus"></i> Agregar sección</a></li>
              <li data-toggle="modal" data-target="#modal-carousel" class="btn-refresh"><a><i style="color:#FF8800!important"  class="fa fa-refresh"></i> Modificar sección</a></li>
              <li class="btn-delete"><a><i style="color:#cc0000!important" class="fa fa-trash"></i> Eliminar sección</a></li>
            </ul> -->
              <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                  <a data-toggle="modal" data-target="#modal-carousel" class="dropdown-item btn-upload" href="/login"><i class="fa fa-plus"></i> Agregar sección</a>
                  <a data-toggle="modal" data-target="#modal-carousel" class="dropdown-item btn-refresh" href="/productos"><i style="color:#FF8800!important"  class="fa fa-refresh"></i> Modificar sección</a>
                  <a class="dropdown-item btn-delete"><i style="color:#cc0000!important" class="fa fa-trash"></i> Eliminar sección</a>
              </div>
          </li>
        </ul>
      </div>
      @endif
  <!--/ End boton Gestion sección-->
    <!--Indicators-->
    <ol class="carousel-indicators">
     @if(carousel::where("active",1)->get()->first())
        <?php $contador=0;?>
        @foreach(carousel::where("active",1)->get() as $carousel)
          @if($carousel->id==carousel::where("active",1)->get()[0]->id)
          <li data-target="#carousel-example-2" data-slide-to="{{$contador}}" class="active"></li>
          @else
          <li data-target="#carousel-example-2" data-slide-to="{{$contador}}" class=""></li>
          @endif
          <?php $contador++; ?>
        @endforeach
        @else
        <li data-target="#carousel-example-2" data-slide-to="a" class="active"></li>
        @endif
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
    	<!--First slide-->
    	 @foreach(carousel::where("active",1)->get() as $carousel)
          @if($carousel->id==carousel::where("active",1)->get()[0]->id)
          <div class="carousel-item active" data-id="{{$carousel->id}}">
          @else
          <div class="carousel-item" data-id="{{$carousel->id}}">
          @endif  
            <!--Mask color-->
            <div class="view hm-black-light text-center">
                <img src="/packages/images/secciones/{{$carousel->imagen}}" class="img-responsive" style="width:100%!important;height:50%!important;max-height:650px!important;" alt="">
                <div class="full-bg-img">
                </div>
            </div>
            <!--Caption-->
            <div class="carousel-caption">
                <div class="animated fadeInDown">
                    <h3 class="h3-responsive">{{$carousel->titulo}}</h3>
                    <p>{{$carousel->descripcion}}</p>
                </div>
            </div>
            <!--Caption-->
        </div>
        @endforeach
        <!--/First slide-->
    </div>
    <!--/.Slides-->

    <!--Controls-->
    <a class="left carousel-control" href="#carousel-example-2" role="button" data-slide="prev">
        <span class="icon-prev" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-2" role="button" data-slide="next">
        <span class="icon-next" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->

</section>

  <div class="container-fluid" data-scroll-index="0" id="section-about">
  <div class="row">

      <div class="col-md-12">
        <div class="section-title text-center wow fadeInDown">
            <h2>¿ Quiénes Somos  <i class="fa fa-group"> </i> ?</h2>    
        </div>    
      </div>
  </div>
  <div class="row">
    <div class="col-md-6">
        <img src="/packages/images/logo.png" style="margin-top:10%!important;"  class="img-responsive img-fluid wow fadeInLeft" alt="prefiltros logo">
    </div>
    <div class="col-md-6">
      <div class="text-justify wow fadeInDown"> 
            <p class="text-about">Somos una empresa mexicana, ubicada en la ciudad de Torreón Coahuila. Especializada en el cuidado de la Admisión de Motores.

Ofreciendo repuestos, aditamentos y nuevas tecnologías en el cuidado de los motores en maquinaria diésel.


Nuestro objetivo es reducir los costos de reparaciones provocados por el mal mantenimiento o problemas de contaminantes nocivos para los motores y ayudarlos a desempeñar el mejor rendimiento.

Contamos con una gran variedad de productos de las mejores marcas para sus necesidades de filtración.</p>    
        </div>   
    </div>
  </div>
</div>
<section class="container" id="section-productos">
  <!--<div class="row">
      <div class="col-md-12">
        <div class="section-title text-center wow fadeInDown">
            <h2 class="text-center">Nuestros Productos</h2>    
            <p class="text-center" style="color:#444">Lo más nuevo de nuestro catálogo de productos</p>
        </div>    
      </div>
  </div>-->
   <div class="row">
    <div class="col-md-5"></div>
    <div class="col-md-2 text-left">
      <a role="button" class="btn btn-info" href="/productos"><i class="fa fa-tag"></i> Ver todos los productos</a>
    </div>
    <div class="col-md-1"></div>
  </div>
  <!--style="margin-left:100px!important;margin-right:0px!important"-->
  <div class="row" style="min-width:100%!important; padding-left:10%!important;padding-right:10%!important;">
      <div class="col-md-12" style="">
   			
<!--Carousel Wrapper-->
<div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

    <!--Controls-->
    <div class="controls-top">
        <a class="btn-floating btn-small" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
        <a class="btn-floating btn-small" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right"></i></a>
    </div>
    <!--/.Controls-->

    <!--Indicators-->
    <ol class="carousel-indicators">
    <?php $contador_productos =0; $longitud = count($productos);$control=0;$contador_slide=0;?>
    @foreach($productos as $producto)
    <!--Slides-->
    @if($contador_productos==0)
    @if($productos[0]->id == $producto->id)
        <li data-target="#multi-item-example" data-slide-to="{{$contador_slide}}" class="active"></li>
    @else
        <li data-target="#multi-item-example" data-slide-to="{{$contador_slide}}"></li>
    @endif
    <?php $contador_slide++; ?>
    @endif
    <?php $contador_productos++;$control++; ?>
    @if($contador_productos==4 || $control==$longitud)
    <?php $contador_productos=0;?>
    @endif
    @endforeach
    </ol>
    <!--/.Indicators-->

    <div class="carousel-inner" role="listbox">

        <!--First slide-->
		<?php $contador_productos =0; $longitud = count($productos);$control=0;?>
		@foreach($productos as $producto)
		<!--Slides-->
		@if($contador_productos==0)
			@if($productos[0]->id == $producto->id)
        <div class="carousel-item active">
        	@else
    	<div class="carousel-item">
    	 	@endif
    	@endif
            <div class="col-md-3">
                <div class="card">
                    <img class="img-responsive img-fluid" style="max-with:200px!important;max-height:200px!important;min-height:100px!important;min-width:100px!important;" src="/packages/images/productos/{{$producto->imagen}}" alt="Card image cap">
                    <div class="card-block text-center">
                        <h6 class="card-title">{{$producto->titulo}}</h6>
                        <p class="card-text"></p>
                        <a data-id="{{$producto->id}}" class="btn btn-primary btn-carrito-add"><i class="fa fa-shopping-cart"></i> Agragar al carrito</a>
                    </div>
                </div>
            </div>
        <?php $contador_productos++;$control++; ?>
        @if($contador_productos==4 || $control==$longitud)
        </div>
        <?php $contador_productos=0;?>
        @endif
        <!--/.First slide-->
     @endforeach
    </div>
    <!--/.Slides-->

</div>
<!--/.Carousel Wrapper-->

        
      </div>
  </div>
  <div class="row visible-lg visible-md" style="padding-top:3%!important; margin:0!important;">
   <!--   <div class="col-md-8"></div>
      <div class="col-md-2"></div>
      <div class="col-md-2">
        <div class="colors"data-color="colors-blue"></div>          
        <div class="colors" data-color="colors-gray"></div>          
        <div class="colors" data-color="colors-brown"></div>          
      </div>-->
  </div>
</section>
<section class="container-fluid" id="section-ubicacion">
    <div class="row" style="">
        <div class="col-md-12">
            <div class="text-center section-title wow fadeInRight" data-wow-delay="0.4s" data-wow-duration="1s">                
                <h2 style="font-size:2em;">¿Dónde nos ubicamos?</h2>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-3" style="">
                <!--Image Card-->
                <!--Card-->
				<div class="card">

				    <!--Card image-->
				    <img class="img-fluid" src="/packages/images/contacto.jpg" class="img-responsive"style="width:260px;height:200px;" alt="Card image cap">
				    <!--/.Card image-->

				    <!--Card content-->
				    <div class="card-block">
				        <!--Title-->
				        <!--Text-->
				        <div class="card-btn text-center">
	                         <address>
	                                <h6 style="font-size:1.1em"><b>Oficina Principal</b></h6>
	                                <p style="font-size:.9em ">PREFILTROS<br>
	                                Torreón, Coahuila CP 27000</p>
	                                <p style="font-size:.9em ">Av. Álvares 400 #505</p>
	                                <p style="font-size:.9em ">Teléfono: +52 (871) 713-02-12<br>
	                                Correo Electrónico: contacto@prefiltros.com.mx</p>
	                        </address>
                    	</div>
				    </div>
				    <!--/.Card content-->

					</div>
			
                <!--Image Card-->
            </div>
        <div class="col-md-7">
            <div style="" class="card hoverable wow fadeInUp z-depth-1" data-wow-delay="0.2s" data-wow-duration="1s">
                <iframe class="img-responsive" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d899.8925749956303!2d-103.43160865707694!3d25.55268652268355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x91d95b921ca171d6!2sPre-Filtros!5e0!3m2!1ses-419!2smx!4v1462058600340" width="800" height="860" frameborder="0" style="border:0; height:423px;" allowfullscreen></iframe>
            </div>
        </div><div class="col-md-1"></div>
    </div>
</section>
<div class="container-fluid" id="section-categorias-marcas">
  <div class="row">
    <div class="col-md-6">
      <section class="conainer-fluid" id="section-categorias" data-scroll-index="6">
          <div class="section-title text-center wow fadeInDown" data-wow-delay="0.2s" data-wow-duration="1s">
              <h2>Nuestras Categorías</h2>    
          </div>  
          <!--Carousel Wrapper-->
        <div id="multi-item-example-2" class="carousel slide carousel-multi-item" data-ride="carousel">

            <!--Controls-->
            <div class="controls-top">
                <a class="btn-floating btn-small" href="#multi-item-example-2" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                <a class="btn-floating btn-small" href="#multi-item-example-2" data-slide="next"><i class="fa fa-chevron-right"></i></a>
            </div>
            <!--/.Controls-->

            <!--Indicators-->
            <ol class="carousel-indicators">
            <?php $contador_categorias =0; $longitud = count(categoria::where("active","=",1)->get());$control=0;$contador_slide=0;?>
            @foreach(categoria::where("active","=",1)->get() as $categoria)
            <!--Slides-->
            @if($contador_categorias==0)
            @if(categoria::where("active","=",1)->get()[0]->id == $categoria->id)
                <li data-target="#multi-item-example-2" data-slide-to="{{$contador_slide}}" class="active"></li>
            @else
                <li data-target="#multi-item-example-2" data-slide-to="{{$contador_slide}}"></li>
            @endif
            <?php $contador_slide++; ?>
            @endif
            <?php $contador_categorias++;$control++; ?>
            @if($contador_categorias==3 || $control==$longitud)
            <?php $contador_categorias=0;?>
            @endif
            @endforeach
            </ol>
            <!--/.Indicators-->

            <div class="carousel-inner" role="listbox">

                <!--First slide-->
            <?php $contador_categorias =0; $longitud = count(categoria::where("active","=",1)->get());$control=0;?>
            @foreach(categoria::where("active","=",1)->get() as $categoria)
            <!--Slides-->
            @if($contador_categorias==0)
              @if(categoria::where("active","=",1)->get()[0]->id == $categoria->id)
                <div class="carousel-item active">
                  @else
              <div class="carousel-item">
                @endif
              @endif
                    <div class="col-md-4">
                        <div class="card">
                            <img class="img-fluid" style="max-width:150px;min-width:120px;max-height:125px;min-height:120px;" src="/packages/images/categorias/{{$categoria->imagen}}" alt="Card image cap">
                            <div class="card-block text-center">
                                <h6 class="card-title text-center">{{$categoria->titulo}}</h6>
                                <p class="card-text"></p>
                                <a href="/productos-categoria/{{$categoria->id}}" class="btn btn-primary">Ver y corizar</a>
                            </div>
                        </div>
                    </div>
                <?php $contador_categorias++;$control++; ?>
                @if($contador_categorias==3 || $control==$longitud)
                </div>
                <?php $contador_categorias=0;?>
                @endif
                <!--/.First slide-->
             @endforeach
            </div>
            <!--/.Slides-->

        </div>
        <!--/.Carousel Wrapper-->
        </section>
    </div>
    <div class="col-md-6">
      <section class="conainer-fluid" id="section-marcas" data-scroll-index="6">
          <div class="section-title text-center wow fadeInDown" data-wow-delay="0.2s" data-wow-duration="1s">
              <h2>Nuestras marcas</h2>    
          </div>  
          <!--Carousel Wrapper-->
        <div id="multi-item-example-3" class="carousel slide carousel-multi-item" data-ride="carousel">

            <!--Controls-->
            <div class="controls-top">
                <a class="btn-floating btn-small" href="#multi-item-example-3" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                <a class="btn-floating btn-small" href="#multi-item-example-3" data-slide="next"><i class="fa fa-chevron-right"></i></a>
            </div>
            <!--/.Controls-->

            <!--Indicators-->
            <ol class="carousel-indicators">
            <?php $contador_categorias =0; $longitud = count(marca::all());$control=0;$contador_slide=0;?>
            @foreach(marca::all() as $marca)
            <!--Slides-->
            @if($contador_categorias==0)
            @if(categoria::all()[0]->id == $marca->id)
                <li data-target="#multi-item-example-3" data-slide-to="{{$contador_slide}}" class="active"></li>
            @else
                <li data-target="#multi-item-example-3" data-slide-to="{{$contador_slide}}"></li>
            @endif
            <?php $contador_slide++; ?>
            @endif
            <?php $contador_categorias++;$control++; ?>
            @if($contador_categorias==3 || $control==$longitud)
            <?php $contador_categorias=0;?>
            @endif
            @endforeach
            </ol>
            <!--/.Indicators-->

            <div class="carousel-inner" role="listbox">

                <!--First slide-->
            <?php $contador_categorias =0; $longitud = count(marca::all());$control=0;?>
            @foreach(marca::all() as $marca)
            <!--Slides-->
            @if($contador_categorias==0)
              @if(marca::all()[0]->id == $marca->id)
                <div class="carousel-item active">
                  @else
              <div class="carousel-item">
                @endif
              @endif
                    <div class="col-md-4">
                        <div class="card">
                            <img class="img-fluid" style="max-width:150px;min-width:120px;max-height:125px;min-height:150px;" src="/packages/images/marcas/{{$marca->imagen}}" alt="Card image cap">
                            <div class="card-block text-center">
                                <h3 class="card-title text-center">{{$marca->nombre}}</h3>
                                <p class="card-text"></p>
                            </div>
                        </div>
                    </div>
                <?php $contador_categorias++;$control++; ?>
                @if($contador_categorias==3 || $control==$longitud)
                </div>
                <?php $contador_categorias=0;?>
                @endif
                <!--/.First slide-->
             @endforeach
            </div>
            <!--/.Slides-->

        </div>
        <!--/.Carousel Wrapper-->
        </section>
    </div>
  </div>
</div>
<section class="container-fluid" id="section-contact" style="overflow: hidden;padding-left:0;padding-right:0;" data-scroll-index="7">
  <div class="opacity">
        <div class="row">
            <div class="section-title text-center wow fadeInDown" data-wow-delay="0.7s" data-wow-duration="1s" style="margin-bottom:0!important">
                <h2 style="font-size:1.5em;color:#fff;">¿Tienes alguna duda? ¡Contáctanos!</h2>
            </div>    
            <div class="row" style="margin-top:0!important;margin-bottom:10%!important;margin-right:1px!important;">   
               <div class="col-md-3"></div>
                <div class="col-md-6 wow zoomInRight" data-wow-delay="0.7s" data-wow-duration="1s">
                    <div class="contact-form clearfix">
                        <div class="panel panel-my">
                            <div class="panel-heading">
                               <!-- <h5 class="text-center">Contáctanos!</h5>-->
                            </div>
                            <div class="panel-body" >
                                <form action="/send-request" method="post" id="frmContacto">
                                    <div class="form-group">
                                        <label class="sr-only" for="email">E-mail</label>
                                        <div class="input-group">
                                          <div class="input-group-addon">
                                            <span class="fa fa-user" aria-hidden="true"></span>
                                          </div>
                                          <input type="email" class="form-control floating-label" id="email" name="email" placeholder="Ingresa tu e-mail" style="color:#fff;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="asunto">Asunto</label>
                                        <div class="input-group">
                                          <div class="input-group-addon">
                                            <span class="fa fa-envelope" aria-hidden="true"></span>
                                          </div>
                                          <input type="text" class="form-control floating-label" id="asunto" name="asunto" placeholder="Asunto" style="color:#fff;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="5" placeholder="Escribenos tus dudas, comentarios y/o sugerencias" id="comentarios" name="comentarios"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-success btn-form pull-right" id="contacto">Enviar</button>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end .contact-form -->
                </div> <!-- .col-md-6 -->
            </div>

        </div>
    </div>
</section>
@stop

@section('js')

	{{HTML::script('/packages/js/libs/jquery/scrolling.js')}}
  {{HTML::script('/packages/js/prefiltros/inicio.js')}}
  <script type="text/javascript">
      $("#li-inicio>a").attr("href","#");
      $("#li-product-news").removeAttr("hidden");
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
     $(".btn-carrito-add").on("click",function(){
          var datos = { 
            id :$(this).data("id"),
            cantidad:1
          }
          console.log(datos);
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
  </script>
@stop