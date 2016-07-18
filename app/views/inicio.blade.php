@extends('plantillas.base')
@section('css')
{{HTML::style('/packages/css/prefiltros/inicio.css')}}
@stop
@section('title')Bienvenido | Prefiltros!@stop
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
                          <input type="number" name="id" id="id" class="hidden">
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
                <img src="/packages/images/secciones/{{$carousel->imagen}}" class="img-responsive" style="width:100%!important;height:50%!important;" alt="">
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
        <img src="/packages/images/logo.png" style="margin-top:10%!important" class="img-responsive img-fluid wow fadeInLeft" alt="prefiltros logo">
    </div>
    <div class="col-md-6">
      <div class="text-justify wow fadeInDown"> 
            <p>Somos una empresa mexicana, ubicada en la ciudad de Torreón Coahuila. Especializada en el cuidado de la Admisión de Motores.

Ofreciendo repuestos, aditamentos y nuevas tecnologías en el cuidado de los motores en maquinaria diésel.


Nuestro objetivo es reducir los costos de reparaciones provocados por el mal mantenimiento o problemas de contaminantes nocivos para los motores y ayudarlos a desempeñar el mejor rendimiento.

Contamos con una gran variedad de productos de las mejores marcas para sus necesidades de filtración.</p>    
        </div>   
    </div>
  </div>
</div>
<section class="container"  id="section-productos">
  <div class="row">
      <div class="col-md-12">
        <div class="section-title text-center wow fadeInDown">
            <h2 class="text-center">Productos</h2>    
            <p class="text-center" style="color:#444">Lo más nuevo de nuestro catálogo de productos</p>
        </div>    
      </div>
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
        <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
        <li data-target="#multi-item-example" data-slide-to="1"></li>
        <li data-target="#multi-item-example" data-slide-to="2"></li>
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

            <div class="col-md-4">
                <div class="card">
                    <img class="img-fluid" src="/packages/images/productos/{{$producto->imagen}}" alt="Card image cap">
                    <div class="card-block">
                        <h4 class="card-title">{{$producto->titulo}}</h4>
                        <p class="card-text"></p>
                        <a href="#" class="btn btn-primary">Agragar al carrito</a>
                    </div>
                </div>
            </div>
        <?php $contador_productos++;$control++; ?>
        @if($contador_productos==3 || $control==$longitud)
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
            <div style="padding-left:5%!important;" class="card-panel hoverable wow fadeInUp z-depth-1" data-wow-delay="0.2s" data-wow-duration="1s">
                <iframe class="img-responsive" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d899.8925749956303!2d-103.43160865707694!3d25.55268652268355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x91d95b921ca171d6!2sPre-Filtros!5e0!3m2!1ses-419!2smx!4v1462058600340" width="800" height="860" frameborder="0" style="border:0; height:423px;" allowfullscreen></iframe>
            </div>
        </div><div class="col-md-1"></div>
    </div>
</section>

@stop

@section('js')
	{{HTML::script('/packages/js/libs/jquery/scrolling.js')}}
    {{HTML::script('/packages/js/prefiltros/inicio.js')}}
@stop