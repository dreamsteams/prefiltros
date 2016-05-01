<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="keywords" content="prefiltros">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="/packages/images/prefiltros_icon.png">
    <title>Bienvenido | prefiltros</title>
    <!-- Zona de archivos de estilo -->
    {{HTML::style('/packages/css/libs/bootstrap/bootstrap.min.css')}}
    {{HTML::style('/packages/css/libs/awensome/css/font-awesome.min.css')}}
  	{{HTML::style('/packages/css/libs/animate/animate.min.css')}}
  	{{HTML::style('/packages/css/libs/material/mdb.min.css')}}
  	{{HTML::style('/packages/css/libs/material/material-fullpalette.min.css')}}
  	{{HTML::style('/packages/css/libs/material/ripples.min.css')}}
  	{{HTML::style('/packages/css/libs/material/roboto.min.css')}}
  	{{HTMl::style('/packages/css/libs/bootstrap/owl.carousel.css')}}
  	{{HTML::style('/packages/css/prefiltros/inicio.css')}}
  	{{HTML::style('/packages/css/prefiltros/responsive.css')}}
  	<style>
      input[type=text]:focus:not([readonly]) {
        border-bottom: 1px solid #1548f2!important;
        } 
    </style>
  	<!-- / Fin de la zona de archivos de estilo -->
  	
</head>
<body>
  <div class="container-fluid" style="padding-left:0!important;padding-right:0!important;">
    <!-- Zona para la barra de navefación de la pagina principal -->
     <nav class="navbar navbar-fixed-top z-depth-2">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand waves-effect waves-light"><b><i class="fa fa-gears"></i> Prefiltros</b></a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                    <ul class="nav navbar-nav navbar-right">
                       <li class=""><a href="" class="waves-effect waves-light"><i class="fa fa-cart-arrow-down"></i> Productos</a></li>  
                       <li class=""><a href="#" class="waves-effect waves-light"><i class="fa fa-group"></i> ¿Quienes somos?</a></li>
                       <li class=""><a class="waves-effect waves-light"><i class="fa fa-map-marker"></i> Contactanos</a></li>
                       <li class="active"><a href="#" class="waves-effect waves-light"><i class="fa fa-home"></i> Inicio</a></li>
                    <!--    <li class="dropdown">
                            <a href="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                                <li class="divider"></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>-->
                    </ul>
                <!--    <form class="navbar-form navbar-right" role="search">
                        <div class="form-group waves-effect waves-light">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                    </form>-->
                </div>
            </div>
        </nav>
    <!-- Fin de la zona de la barra de navegación-->
    <!-- Zona de el carrucel principal de la página -->
<section id="section-inicio" data-scroll-index="0">
	<div id="home-carousel" class="carousel slide">
	    <ol class="carousel-indicators">
	        <li data-target="#home-carousel" data-slide-to="0" class="active"></li>
	        <li data-target="#home-carousel" data-slide-to="1"></li>
	        <li data-target="#home-carousel" data-slide-to="2"></li>
	    </ol>
	    <!--/.carousel-indicators-->
	    <div class="carousel-inner">
	        <div class="item active"  style="background-image: url('/packages/images/1.jpg')" >
	            <div class="carousel-caption">
	                <div class="animated bounceInUp text-center" id="caption1">
	                    <h2>¡Bienvenido a Prefiltros!<br>Especialistas en admisión de Motores</h2>
	                    <p style="font-size:1em!important">CODOS – COPLES – REDUCCIONES - ABRAZADERAS – PREFILTROS (MICAS) – PRELIMPIADORES – CARCAZAS – FILTROS (AUTOMOTIZ – PESADO) – TAPAS DE CARCAZA – TAPAS PARA LLUVIA (CROMADAS Y PLASTICO) CARCAZAS DESECHABLES – VALVULAS EVACUADORAS DE POLVO – INDICADORES DE RESTRICCIÓN - SEPARADORES AIRE/ACEITE - FILTROS DE CABINA (AUTOMOTRIZ – AGRICULTURA - CONSTRUCCION).<br></p>
	                </div>
	            </div>
	        </div>              

	        <div class="item" style="background-image: url('/packages/images/2.jpg')">                
	            <div class="carousel-caption">
	                <div class="animated bounceInRight" id="caption2">
	                    <h2>¿Qué estás buscando?</h2>
	                    <p>En la sección de productos podrás encontrar gran variedad de productos para tu motor.</p>
	                </div>
	            </div>
	        </div>

	        <div class="item" style="background-image: url('/packages/images/3.jpg')">                 
	             <div class="carousel-caption">
	                <div class="animated bounceInDown" id="caption3">
	                    <h2>Elige los productos que necesitas :)</h2>
	                    <p>Agruega los productos a tu carrito de compras que encontrarás en la sección de productos, y realiza tu pedido.</p>
	                </div>
	            </div>
	        </div>
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
<div class="container-fluid" id="section-about">
  <div class="row">
      <div class="col-md-12">
        <div class="section-title text-center wow fadeInDown">
            <h2>¿Quiénes Somos?</h2>    
        </div>    
      </div>
  </div>
  <div class="row">
    <div class="col-md-6">
        <i class="fa fa-group fa-4x">  <i class="fa fa-question fa-x4"></i></i>
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
<section class="container-fluid" id="section-productos">
  <div class="row">
      <div class="col-md-12">
        <div class="section-title text-center wow fadeInDown">
            <h2>Productos</h2>    
            <p>Selecciona el producto que desees y agregalo a tu carrito de compras</p>
        </div>    
      </div>
  </div>
  <div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10">
       <div class="owl-carousel owl-theme owl-loaded" id="products-carousel">
            <div class="item"><img class="img-responsive" src="/packages/images/productos/codo1.jpg" alt="productos"></div>
            <div class="item"><img class="img-responsive" src="/packages/images/productos/codo2.jpg" alt="productos"></div>
            <div class="item"><img class="img-responsive" src="/packages/images/productos/codo45.jpg" alt="productos"></div>
            <div class="item"><img class="img-responsive" src="/packages/images/productos/codo45-2.jpg" alt="productos"></div>
            <div class="item"><img class="img-responsive" src="/packages/images/productos/abrazaderas.jpg" alt="productos"></div>
            <div class="item"><img class="img-responsive" src="/packages/images/productos/abrazaderas2.jpg" alt="productos"></div>
            <div class="item"><img class="img-responsive" src="/packages/images/productos/abrazaderas3.png" alt="productos"></div>
            <div class="item"><img class="img-responsive" src="/packages/images/productos/abrazaderas4.png" alt="productos"></div>
            <div class="item"><img class="img-responsive" src="/packages/images/productos/coples.jpg" alt="productos"></div>
            <div class="item"><img class="img-responsive" src="/packages/images/productos/coples2.jpg" alt="productos"></div>
            <div class="item"><img class="img-responsive" src="/packages/images/productos/cople3.jpg" alt="productos"></div>
            <div class="item"><img class="img-responsive" src="/packages/images/productos/cople4.jpg" alt="productos"></div>
            <div class="item"><img class="img-responsive" src="/packages/images/productos/coples5.jpg" alt="productos"></div>
        </div>
    </div>
    <div class="col-md-1"></div>
  </div>
</section>
<section class="conainer-fluid" id="section-categorias" data-scroll-index="6">
	<div class="section-title text-center wow fadeInDown">
	    <h2>Categorías de productos</h2>    
	    <p>Aquí te mostramos nuestra galería, en donde podemos representarte un poco nuestra familia. <i class="fa fa-paw"></i></p>
	</div>       
    <nav class="project-filter clearfix text-center wow fadeInLeft"  data-wow-delay="0.5s">
        <ul class="list-inline">
        	<li><a href="javascript:;" class="filter" data-filter="all">Galería</a></li>
            <li><a href="javascript:;" class="filter" data-filter=".nosotros">Nosotros</a></li>
            <li><a href="javascript:;" class="filter" data-filter=".paseos">Paseos</a></li>
            <li><a href="javascript:;" class="filter" data-filter=".estetica">Estética</a></li>
        </ul>
    </nav>
    <div id="projects" class="clearfix">
    	<figure class="mix portfolio-item paseos">
    		{{HTML::Image('/packages/images/productos/abrazaderas.jpg','Imágen de categoría',array('class'=>'img-responsive'))}}
            <a href="/assets/Imagenes/Home/portafolio/paseos6.jpg" title="Título de la imagen" rel="portfolio" class="fancybox"><span class="plus fa fa-plus"></span></a>
            <figcaption class="mask">
                <h3>Abrazaderas</h3>
            </figcaption>
        </figure>
		<figure class="mix portfolio-item nosotros">
    		{{HTML::Image('/packages/images/productos/cople3.jpg','Imágen del portafolio',array('class'=>'img-responsive'))}}
            <a href="/assets/Imagenes/Home/portafolio/nosotros1.jpg" title="Título de la imagen" rel="portfolio" class="fancybox"><span class="plus"></span></a>
            <figcaption class="mask">
                <h3>Coples</h3>
            </figcaption>
        </figure>
        <figure class="mix portfolio-item paseos">
    		{{HTML::Image('/packages/images/productos/prefiltro.gif','Imágen del portafolio',array('class'=>'img-responsive'))}}
            <a href="/assets/Imagenes/Home/portafolio/paseos9.jpg" title="Título de la imagen" rel="portfolio" class="fancybox"><span class="plus"></span></a>
            <figcaption class="mask">
                <h3>Prefiltros</h3>
            </figcaption>
        </figure>
        <figure class="mix portfolio-item paseos">
    		{{HTML::Image('/packages/images/productos/prelimpiador.png','Imágen del portafolio',array('class'=>'img-responsive'))}}
            <a href="/assets/Imagenes/Home/portafolio/paseos4.jpg" title="Título de la imagen" rel="portfolio" class="fancybox"><span class="plus"></span></a>
            <figcaption class="mask">
                <h3>Prelimpiadores</h3>
            </figcaption>
        </figure>
        <figure class="mix portfolio-item paseos">
    		{{HTML::Image('/packages/images/productos/carcasas.png','Imágen del portafolio',array('class'=>'img-responsive'))}}
            <a href="/assets/Imagenes/Home/portafolio/paseos10.jpg" title="Título de la imagen" rel="portfolio" class="fancybox"><span class="plus"></span></a>
            <figcaption class="mask">
                <h3>Carcazas</h3>
            </figcaption>
        </figure>
        <figure class="mix portfolio-item paseos">
    		{{HTML::Image('/packages/images/productos/aquacheck.png','Imágen del portafolio',array('class'=>'img-responsive'))}}
            <a href="/assets/Imagenes/Home/portafolio/paseos2.jpg" title="Título de la imagen" rel="portfolio" class="fancybox"><span class="plus"></span></a>
            <figcaption class="mask">
                <h3>aquacheck</h3>
            </figcaption>
        </figure>
        <figure class="mix portfolio-item paseos">
    		{{HTML::Image('/packages/images/productos/carcasas-desechables.png','Imágen del portafolio',array('class'=>'img-responsive'))}}
            <a href="/assets/Imagenes/Home/portafolio/paseos7.jpg" title="Título de la imagen" rel="portfolio" class="fancybox"><span class="plus"></span></a>
            <figcaption class="mask">
                <h3>Carcazas Desechables</h3>
            </figcaption>
        </figure>
        <figure class="mix portfolio-item paseos">
    		{{HTML::Image('/packages/images/productos/filtros-equipo_pesado.jpg','Imágen del portafolio',array('class'=>'img-responsive'))}}
            <a href="/assets/Imagenes/Home/portafolio/paseos8.jpg" title="Título de la imagen" rel="portfolio" class="fancybox"><span class="plus"></span></a>
            <figcaption class="mask">
                <h3>Filtros Automotriz<br> y Equipo Pesado</h3>
            </figcaption>
        </figure>
        <figure class="mix portfolio-item nosotros">
    		{{HTML::Image('/packages/images/productos/indicadores.png','Imágen del portafolio',array('class'=>'img-responsive'))}}
            <a href="/assets/Imagenes/Home/portafolio/nosotros2.jpg" title="Título de la imagen" rel="portfolio" class="fancybox"><span class="plus"></span></a>
            <figcaption class="mask">
                <h3>Indicadores de <br>restricción</h3>
            </figcaption>
        </figure>
        <figure class="mix portfolio-item paseos">
    		{{HTML::Image('/packages/images/productos/power.png','Imágen del portafolio',array('class'=>'img-responsive'))}}
            <a href="/assets/Imagenes/Home/portafolio/power.png" title="Título de la imagen" rel="portfolio" class="fancybox"><span class="plus"></span></a>
            <figcaption class="mask">
                <h3>Power Core &amp; G2</h3>
            </figcaption>
        </figure>
        <figure class="mix portfolio-item paseos">
    		{{HTML::Image('/packages/images/productos/prefiltro_turbo.png','Imágen del portafolio',array('class'=>'img-responsive'))}}
            <a href="/assets/Imagenes/Home/portafolio/paseos5.jpg" title="Título de la imagen" rel="portfolio" class="fancybox"><span class="plus"></span></a>
            <figcaption class="mask">
                <h3>Prefiltros Turbo</h3>
            </figcaption>
        </figure>
    	<figure class="mix portfolio-item paseos">
    		{{HTML::Image('/packages/images/productos/separadores.png','Imágen del portafolio',array('class'=>'img-responsive'))}}
            <a href="/assets/Imagenes/Home/portafolio/paseos1.jpg" title="Título de la imagen" rel="portfolio" class="fancybox"><span class="plus"></span></a>
            <figcaption class="mask">
                <h3>Separadores<br> Aire / Aceite</h3>
            </figcaption>
        </figure>
        <figure class="mix portfolio-item paseos">
    		{{HTML::Image('/packages/images/productos/tapas.jpg','Imágen del portafolio',array('class'=>'img-responsive'))}}
            <a href="/assets/Imagenes/Home/portafolio/paseos12.jpg" title="Título de la imagen" rel="portfolio" class="fancybox"><span class="plus"></span></a>
            <figcaption class="mask">
                <h3>Tapas de Lluvia</h3>
            </figcaption>
        </figure>
        <figure class="mix portfolio-item paseos">
    		{{HTML::Image('/packages/images/productos/valvula.png','Imágen del portafolio',array('class'=>'img-responsive'))}}
            <a href="/assets/Imagenes/Home/portafolio/paseos11.jpg" title="Título de la imagen" rel="portfolio" class="fancybox"><span class="plus"></span></a>
            <figcaption class="mask">
                <h3>Valvulas de <br>Evacuadoras de <br>Polvo</h3>
            </figcaption>
        </figure>
	</div>
</section>
<section class="container-fluid" id="section-ubicacion">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center wow fadeInRight">                
                <h2>¿Dónde nos ubicamos?</h2>
                <p class="lead">Aquí dejamos toda la información que puede resultarte útil para encontrarnos fácilmente</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
                 <ul class="row">
                    	<li class="col-sm-1"></li>
                        <li class="col-sm-6">
                            <address>
                                <h5 style="font-size: 25px;">Oficina Principal</h5>
                                <p style="font-size: 19px;">PREFILTROS<br>
                                Torreón, Coahuila CP 27000</p>
                                <p style="font-size: 19px;">Av. Álvares 400 #505</p>
                                <p style="font-size: 19px;">Centro</p>
                                <p style="font-size: 19px;">Teléfono: +52 (871) 713-02-12<br>
                                Correo Electrónico: contacto@prefiltros.com.mx</p>
                            </address>
                        </li>
                    </ul>
        </div>
        <div class="col-md-6">
             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d899.8925749956303!2d-103.43160865707694!3d25.55268652268355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x91d95b921ca171d6!2sPre-Filtros!5e0!3m2!1ses-419!2smx!4v1462058600340" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
</section>
<section id="section-contact" data-scroll-index="7">
    <div class="container">
        <div class="row">
            <div class="section-title text-center wow fadeInDown">
                <h2>¿Tienes alguna duda? ¡Contáctanos!</h2>
                <p>Queremos escucharte. Para esto, a continuación te proporcionamos el siguiente formulario para que podamos conocer tus dudas, sugerencias, comentarios o puntos de vista. Asegurate de llenar la informarción correspondiente</p>
            </div>       
            <div class="col-md-8 col-sm-9 wow zoomInDown">
                <div class="contact-form clearfix">
                    <div class="panel">
                    	<div class="panel-heading">
                    		<h2 class="text-center">Contáctanos!</h2>
                    	</div>
                    	<div class="panel-body">
                    		<form action="/" method="post" id="frmContacto">
                    			<div class="form-group">
								    <label class="sr-only" for="email">E-mail</label>
								    <div class="input-group">
								      <div class="input-group-addon">
								      	<span class="fa fa-user" aria-hidden="true"></span>
								      </div>
								      <input type="text" class="form-control floating-label" id="password" name="email" placeholder="Ingresa tu e-mail">
								    </div>
								</div>
								<div class="form-group">
								    <label class="sr-only" for="asunto">Asunto</label>
								    <div class="input-group">
								      <div class="input-group-addon">
								      	<span class="fa fa-envelope" aria-hidden="true"></span>
								      </div>
								      <input type="text" class="form-control floating-label" id="password" name="asunto" placeholder="Asunto">
								    </div>
								</div>
								<div class="form-group">
									<textarea class="form-control" rows="10" placeholder="Escribenos tus dudas, comentarios y/o sugerencias" id="comentarios" name="comentarios"></textarea>
								</div>
                    		</form>
                    	</div>
                    	<div class="panel-footer">
                    		<div class="row">
	                    		<button type="button" class="btn btn-form" id="contacto">Enviar</button>
                    		</div>
                    	</div>
                    </div>
                </div> <!-- end .contact-form -->
            </div> <!-- .col-md-8 -->

            <div class="col-md-4 col-sm-3 wow fadeInRight">
                <div class="contact-details">
                    <span>Contacto directo</span>
                    <p>+00 123.456.789 <br> <br> +00 123.456.789</p>
                </div> <!-- end .contact-details -->

                <div class="contact-details">
                    <span>Oficinas</span>
                    <p>+00 123.456.789 <br> <br> +00 123.456.789</p>
                </div> <!-- end .contact-details -->
            </div> <!-- .col-md-4 -->

        </div>
    </div>
</section>
<footer id="footer" class="text-center" data-scroll-index="8">
	<div class="container">
	    <div class="row">
	        <div class="col-lg-12">

	            <div class="footer-logo wow fadeInDown">
	                {{HTML::Image('/packages/images/logo.png')}}
	            </div>

	            <div class="footer-social wow fadeInUp">
	                <h3>Encuentranos también en:</h3>
	                <ul class="text-center list-inline">
	                    <li><a href="#" id="fb"><i class="fa fa-facebook fa-lg"></i></a></li>
	                    <li><a href="#"><i class="fa fa-twitter fa-lg"></i></a></li>
	                    <!--<li><a href="#"><i class="fa fa-google-plus fa-lg"></i></a></li>
	                    <li><a href="#"><i class="fa fa-dribbble fa-lg"></i></a></li>-->
	                </ul>
	            </div>
	        </div>
	    </div>
	    <div class="row">
	    	<div class="col-sm-3 wow zoomInDown">
	    		<h5>Acerca de PASCAN</h5>
	    		<ul>
	    			<li><a href="#">Historia</a></li>
	    			<li><a href="#">Misión</a></li>
	    			<li><a href="#">Visión</a></li>
	    			<li><a href="#">Valores</a></li>
	    			<li><a href="#">Familia pascan</a></li>
	    		</ul>
	    	</div>
	    	<div class="col-sm-3 wow fadeInDown">
	    		<h5>Información</h5>
	    		<ul>
	    			<li><a href="#">Preguntas frecuentes</a></li>
	    			<li><a href="#">Informar de un problema</a></li>
	    		</ul>
	    	</div>
	    	<div class="col-sm-3 wow fadeInUp">
	    		<h5>Contactos</h5>
	    		<ul>
	    			<li><a href="#">Lorem</a></li>
	    		</ul>
	    	</div>
	    	<div class="col-sm-3 wow bounceInUp">
	    		<h5>ALgo más</h5>
	    		<ul>
	    			<li><a href="#">Lorem</a></li>
	    			<li><a href="#">Lorem</a></li>
	    			<li><a href="#">Lorem</a></li>
	    		</ul>
	    	</div>
	    </div>
	</div>
</footer>
</div>
    <!-- Zona de archivos js -->
    {{HTML::script('/packages/js/libs/jquery/jquery.min.js')}}
    {{HTML::script('/packages/js/libs/bootstrap/bootstrap.min.js')}}
    {{HTML::script('/packages/js/libs/material/mdb.min.js')}}
    {{HTML::script('/packages/js/libs/material/ripples.min.js')}}
    {{HTML::script('/packages/js/libs/sweetalert/sweetalert.min.js')}}
    {{HTML::script('/packages/js/libs/bootstrap/owl.carousel.min.js')}}
    {{HTML::script('/packages/js/libs/jquery/jquery.nav.js')}}
    {{HTML::script('/packages/js/libs/jquery/jquery.mixitup.min.js')}}
    {{HTML::script('/packages/js/libs/jquery/jquery.parallax-1.1.3.js')}}
    {{HTML::script('/packages/js/libs/jquery/jquery.appear.js')}}
    {{HTML::script('/packages/js/libs/jquery/main.js')}}
    {{HTML::script('/packages/js/prefiltros/inicio.js')}}
    <!-- / Fin de la zona de archivos js -->
</body>
</html>