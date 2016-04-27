<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="keywords" content="veterinaria">
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
  	<style>
      input[type=text]:focus:not([readonly]) {
        border-bottom: 1px solid #f21515!important;
        }
    </style>
  	<!-- / Fin de la zona de archivos de estilo -->
  	
</head>
<body>
    <!-- Zona para la barra de navefación de la pagina principal -->
     <nav class="navbar unique-color navbar-fixed-top z-depth-2">
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
                       <li><a class="waves-effect waves-light"><i class="fa fa-map-marker"></i> Contactanos</a></li>
                       <li><a href="#" class="waves-effect waves-light"><i class="fa fa-home"></i> Inicio</a></li>
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
    <section id="home" data-scroll-index="0">
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
	                <div class="animated bounceInRight" id="caption1">
	                    <h2>¡Bienvenido a Pascan!<br>Atención canina de confianza</h2>
	                    <p>En Pascan nos preocupamos por brindarle a tu perro una mayor calidad de vida, porque sabemos que no sólo es una mascota, es parte de tu familia.</p>
	                </div>
	            </div>
	        </div>              

	        <div class="item" style="background-image: url('/packages/images/2.jpg')">                
	            <div class="carousel-caption">
	                <div class="animated bounceInDown" id="caption2">
	                    <h2>¿Le estás dando a tu perro lo que realmente necesita?</h2>
	                    <p>Recuerda que el paseo diario es una actividad fundamental para la calidad de vida de tu perro.</p>
	                </div>
	            </div>
	        </div>

	        <div class="item" style="background-image: url('/packages/images/3.jpg')">                 
	             <div class="carousel-caption">
	                <div class="animated bounceInUp" id="caption3">
	                    <h2>Seguridad y Confianza Pascan</h2>
	                    <p>Encuentra a tu cuidador de mascota ideal. En Pascan nuestros paseadores son confiables y pasan por una revisión.</p>
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
	    <div class="row" id="botones">
			<div class="col-sm-3"></div>
			<div class="col-sm-3">
				<a href="/registro" class="button-0"><i class="fa fa-user-plus"></i>Registrate</a>
			</div>
			<div class="col-sm-3">
				<a href="/login" class="button-0" id="login"><i class="fa fa-sign-in"></i>LogIn</a>
			</div>
			<div class="col-sm-3"></div>
		</div>
	</div>
</section>
    <!-- Fin de la zona del carrucel principal -->
    <!-- Zona de archivos js -->
    {{HTML::script('/packages/js/libs/jquery/jquery.min.js')}}
    {{HTML::script('/packages/js/libs/bootstrap/bootstrap.min.js')}}
    {{HTML::script('/packages/js/libs/material/mdb.min.js')}}
    {{HTML::script('/packages/js/libs/material/ripples.min.js')}}
    {{HTML::script('/packages/js/libs/sweetalert/sweetalert.min.js')}}
    <!-- / Fin de la zona de archivos js -->
</body>
</html>