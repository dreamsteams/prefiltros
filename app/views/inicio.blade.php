@extends('plantillas.base')
@section('css')
  	{{HTML::style('/packages/css/libs/bootstrap/owl.carousel.css')}}
@stop
@section('title')Bienvenido | Prefiltros!@stop
@section('container-main')
  @section('list')
     <li class="dropdown">
        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Productos <span class="caret"></span></a>
        <ul class="dropdown-menu custom-nav" role="menu">
            <li id="nav-productos"><a href="javascript:void(0)">Demo Productos</a></li>
            <li id="nav-categorias"><a href="javascript:void(0)">Categorías de productos</a></li>
            <li><a href="/productos">Catalogo de productos</a></li>
        </ul>
    </li>
   <li id="nav-about"  class=""><a href="javascript:void(0)" class=""><i class="fa fa-group"></i> ¿Quienes somos?</a></li>
   <li id="nav-ubicacion"  class=""><a href="javascript:void(0)" class=""><i class="fa fa-map-marker"></i> Contactanos</a></li>
   <li id="nav-inicio"  class=""><a href="javascript:void(0)" class=""><i class="fa fa-home"></i> Inicio</a></li>
  @stop
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
                       <div class="input-field col-md-12">
                          <i class="material-icons prefix"><i class="fa fa-text-width"></i></i>
                          <input type="text" name="titulo"  id="titulo"  class="validate">
                          <label for="titulo">Ingrese el titulo de la sección</label>
                        </div>      
                      </div>      
                      <div class="row">
                        <div class="input-field col-md-12">
                            <i class="material-icons prefix"><i class="fa fa-pencil-square-o"></i></i>
                            <textarea name="descripcion" id="descripcion" class="materialize-textarea validate"></textarea>
                            <label for="descripcion">Ingrese la descripción de la sección</label>
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
  <div id="home-carousel" class="carousel slide">
      @if(Auth::user())
      <div class="row btn-carousel-modific">
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-ellipsis-v fa-x4"></i></a>
            <ul class="dropdown-menu custom-nav" role="menu">
              <li data-toggle="modal" data-target="#modal-carousel" class=""><a href="#"><i style="font-size:1.7em;color:#20da59;" class="fa fa-plus"></i> Agregar sección</a></li>
              <li class=""><a href="#"><i style="font-size:1.7em;color:#0cdece!important;" class="fa fa-refresh"></i> Modificar sección</a></li>
              <li class=""><a href="#"><i style="font-size:1.7em; color:red;" class="fa fa-trash"></i> Eliminar sección</a></li>
            </ul>
          </li>
        </ul>
      </div>
      @endif
      <ol class="carousel-indicators">
        <?php $contador=0;?>
        @foreach(carousel::all() as $carousel)
          @if($carousel->id==carousel::all()[0]->id)
          <li data-target="#home-carousel" data-slide-to="{{$contador}}" class="active"></li>
          @else
          <li data-target="#home-carousel" data-slide-to="{{$contador}}" class=""></li>
          @endif
          <?php $contador++; ?>
        @endforeach
      </ol>
      <!--/.carousel-indicators-->
      <div class="carousel-inner">
          @foreach(carousel::all() as $carousel)
          @if($carousel->id==carousel::all()[0]->id)
          <div class="item active" data-id="{{$carousel->id}}" style="background-image: url('/packages/images/secciones/{{$carousel->imagen}}')" >
          @else
          <div class="item" data-id="{{$carousel->id}}"  style="background-image: url('/packages/images/secciones/{{$carousel->imagen}}')" >
          @endif  
              <div class="carousel-caption">
                  <div class="animated bounceInUp text-justify" id="caption1">
                      <h2>{{$carousel->titulo}}</h2>
                      <p style="font-size:1.3em!important">{{$carousel->descripcion}}></p>
                  </div>
              </div>
          </div>              
          @endforeach
         <!-- <div class="item" style="background-image: url('/packages/images/secciones/2.jpg')">                
              <div class="carousel-caption">
                  <div class="animated bounceInRight" id="caption2">
                      <h2>¿Qué estás buscando?</h2>
                      <p>En la sección de productos podrás encontrar gran variedad de productos para tu motor.</p>
                  </div>
              </div>
          </div>

          <div class="item" style="background-image: url('/packages/images/secciones/3.jpg')">                 
               <div class="carousel-caption">
                  <div class="animated bounceInDown" id="caption3">
                      <h2>Elige los productos que necesitas :)</h2>
                      <p>Agruega los productos a tu carrito de compras que encontrarás en la sección de productos, y realiza tu pedido.</p>
                  </div>
              </div>
          </div>-->
      </div>
      <!--/.carousel-inner-->
      <nav id="nav-arrows" class="nav-arrows hidden-xs hidden-sm visible-md visible-lg">
          <a class="sl-prev hidden-xs" href="#home-carousel" data-slide="prev">
              <i class="fa fa-angle-left fa-3x"></i>
          </a>
          <a class="sl-next" href="#home-carousel" data-slide="next">
              <i class="fa fa-angle-right fa-3x"></i>
          </a>
      </nav>
  </div>
</section><!-- Fin de la zona del carrucel principal -->


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
        <img src="/packages/images/logo.png" style="margin-top:10%!important" class="img-responsive wow fadeInLeft" alt="prefiltros logo">
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
<hr>
<section class="container"  id="section-productos">
  <div class="row">
      <div class="col-md-12">
        <div class="section-title text-center wow fadeInDown">
            <h2>Productos</h2>    
            <p style="color:#444">Selecciona el producto que desees y agregalo a tu carrito de compras</p>
        </div>    
      </div>
  </div>
  <!--style="margin-left:100px!important;margin-right:0px!important"-->
  <hr>
  <div class="row" style="min-width:100%;max-width:100%!important;box-sizing:border-box;">
    <div class="col-md-1"></div>
     <div class="col-md-9">
         <a class="filter-product active wow zoomInUp" data-wow-delay="0.3s" data-wow-duration="1s">Lo más nuevo</a>
         <a class="filter-product wow zoomInDown" data-wow-delay="0.3s" data-wow-duration="1s">Aleatorios</a>
     </div>
      <div class="col-md-2 wow zoomInUp" data-wow-delay="0.3s" data-wow-duration="1s">
          <i class="fa fa-arrow-left"></i>
          <i class="fa fa-arrow-right"></i>
       </div>
  </div>
  <div class="row" style="min-width:100%!important; padding-left:10%!important;padding-right:10%!important;">
      <div class="col-md-12" style="">
          <div class="owl-carousel wow fadeInLeft" style="width:100%!important" data-wow-delay="0.2s" data-wow-duration="1s">
            @foreach(producto::all() as $producto)
           <div class="item card hoverable">
                <div class="card-image">
                    <div class="view overlay hm-white-slight z-depth-1">
                        <img src="/packages/images/productos/{{$producto->imagen}}" class="img-responsive" alt="">
                        <a href="javascript:void">
                            <div class="mask waves-effect">
                                <i title="Agregar al carrito" class="fa fa-car" data-tool="tooltip"></i>
                                <i title="Ver producto" class="fa fa-home" data-tool="tooltip"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="card-content">
                    
                    
                </div>
                <!--Buttons-->
                <div class="card-btn text-center">
                    <p>{{$producto->titulo}}</p>
                </div>
                <!--/.Buttons-->
            </div>
            <!--Image Card-->
            @endforeach
        </div>
        
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
                <p class="">Aquí dejamos toda la información que puede resultarte útil para encontrarnos fácilmente</p>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-3" style="">
                <!--Image Card-->
                <div class="card hoverable wow fadeInDown" data-wow-delay="0.4s" data-wow-duration="1s">
                    <div class="card-image">
                        <div class="view overlay hm-white-slight z-depth-1">
                            <img src="/packages/images/contacto.jpg" class="img-responsive"style="width:260px;height:200px;"alt="">
                            <a href="javascript:void(0)">
                                <div class="mask waves-effect"></div>
                            </a>
                        </div>
                    </div>
                    <div class="card-content">
                        
                    </div>
                    <!--Buttons-->
                    <div class="card-btn text-center">
                         <address>
                                <h6 style="font-size:1.1em"><b>Oficina Principal</b></h6>
                                <p style="font-size:.9em ">PREFILTROS<br>
                                Torreón, Coahuila CP 27000</p>
                                <p style="font-size:.9em ">Av. Álvares 400 #505</p>
                                <p style="font-size:.9em ">Centro</p>
                                <p style="font-size:.9em ">Teléfono: +52 (871) 713-02-12<br>
                                Correo Electrónico: contacto@prefiltros.com.mx</p>
                        </address>
                    </div>
                    <!--/.Buttons-->
                </div>
                <!--Image Card-->
            </div>
        <div class="col-md-7">
            <div style="padding-left:5%!important;" class="card-panel hoverable wow fadeInUp z-depth-1" data-wow-delay="0.2s" data-wow-duration="1s">
                <iframe class="img-responsive" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d899.8925749956303!2d-103.43160865707694!3d25.55268652268355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x91d95b921ca171d6!2sPre-Filtros!5e0!3m2!1ses-419!2smx!4v1462058600340" width="800" height="510" frameborder="0" style="border:0; height:343px;" allowfullscreen></iframe>
            </div>
        </div><div class="col-md-1"></div>
    </div>
</section>
<section class="conainer-fluid" id="section-categorias" data-scroll-index="6">
  <div class="section-title text-center wow fadeInDown" data-wow-delay="0.2s" data-wow-duration="1s">
      <h2>Categorías de productos</h2>    
  </div>       
    <nav class="project-filter clearfix text-center wow fadeInLeft"  data-wow-delay="0.5s">
        <ul class="list-inline">
          <li><a href="javascript:;" class="filter" data-filter="all">Todo</a></li>
            <li><a href="javascript:;" class="filter" data-filter=".nosotros">Lo más nuevo</a></li>
            <li><a href="javascript:;" class="filter" data-filter=".paseos">Anteriores</a></li>
        </ul>
    </nav>
    <div id="projects" class="clearfix wow zoomInDown" data-wow-delay="0.9s" data-wow-duration="1s">
      @foreach(categoria::all() as $categoria)
      <figure class="mix portfolio-item paseos">
        {{HTML::Image('/packages/images/categorias/'.$categoria->imagen,'Imágen de categoría',array('class'=>'img-responsive view overlay hm-white-slight z-depth-1'))}}
            <a href="/packages/images/categorias/{{$categoria->imagen}}" title="{{$categoria->titulo}}" data-tool="tooltip"  rel="portfolio" class="fancybox"><span class="plus plus1 fa fa-search-plus"></a>
            <a href="javacript:void" title="Ver productos" data-tool="tooltip" class=""><span class="plus plus2 fa fa-refresh"></span></a> 
            <figcaption class="mask">
                <h3>{{$categoria->titulo}}</h3>
            </figcaption>
        </figure>
        @endforeach
  </div>
</section>
<section class="container-fluid" style="" id="section-contact" data-scroll-index="7">
        <div class="row">
            <div class="section-title text-center wow fadeInDown" data-wow-delay="0.7s" data-wow-duration="1s" style="margin-bottom:0!important">
                <h2 style="font-size:1.5em;">¿Tienes alguna duda? ¡Contáctanos!</h2>
                <p class="" style="font-size:1em!important">Queremos escucharte. Para esto, a continuación te proporcionamos el siguiente formulario para que podamos conocer tus dudas, sugerencias, comentarios o puntos de vista.</p>
            </div>    
            <div class="row" style="margin-top:0!important;margin-bottom:10%!important;margin-right:1px!important;">   
               <div class="col-md-3"></div>
                <div class="col-md-6 wow zoomInRight" data-wow-delay="0.7s" data-wow-duration="1s">
                    <div class="contact-form clearfix">
                        <div class="panel panel-my">
                            <div class="panel-heading">
                                <h5 class="text-center">Contáctanos!</h5>
                            </div>
                            <div class="panel-body">
                                <form action="/" method="post" id="frmContacto">
                                    <div class="form-group">
                                        <label class="sr-only" for="email">E-mail</label>
                                        <div class="input-group">
                                          <div class="input-group-addon">
                                            <span class="fa fa-user" aria-hidden="true"></span>
                                          </div>
                                          <input type="text" class="form-control floating-label" id="email" name="email" placeholder="Ingresa tu e-mail">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="asunto">Asunto</label>
                                        <div class="input-group">
                                          <div class="input-group-addon">
                                            <span class="fa fa-envelope" aria-hidden="true"></span>
                                          </div>
                                          <input type="text" class="form-control floating-label" id="asunto" name="asunto" placeholder="Asunto">
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
</section>
@stop
@section('js')
    {{HTML::script('/packages/js/libs/bootstrap/owl.carousel.min.js')}}
    {{HTML::script('/packages/js/libs/jquery/scrolling.js')}}
    {{HTML::script('/packages/js/prefiltros/inicio.js')}}
    <script type="text/javascript">

    </script>
@stop