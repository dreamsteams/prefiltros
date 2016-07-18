<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="keywords" content="prefiltros,motores,torreon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="/packages/images/marcas/Protec.png">
    <title>@yield('title')</title>
    <!-- Zona de archivos de estilo -->
    {{HTML::style('/packages/css/libs/bootstrap/bootstrap.min.css')}}
    {{HTML::style('/packages/css/libs/awensome/css/font-awesome.min.css')}}
  	{{HTML::style('/packages/css/libs/animate/animate.min.css')}}
  	{{HTML::style('/packages/css/libs/material/mdb.min.css')}}
  	{{HTML::style('/packages/css/libs/material/material-fullpalette.min.css')}}
  	{{HTML::style('/packages/css/libs/material/ripples.min.css')}}
  	{{HTML::style('/packages/css/libs/material/roboto.min.css')}}
    {{HTML::script('packages/js/libs/bootstrap/jquery.fancybox.pack.js')}}
    {{HTML::script('/packages/js/libs/notifier/Notifier.js')}}  
    {{HTML::style('/packages/css/libs/tooltipster/tooltipster.css')}}
    {{HTML::style('/packages/css/libs/sweetalert/sweetalert.css')}}
  	{{HTML::style('/packages/css/libs/animate/pace.css')}}
    {{HTML::style('/packages/css/prefiltros/inicio.css')}}
    {{HTML::style('/packages/css/prefiltros/responsive.css')}}
    {{HTML::style('/packages/css/libs/bootstrap/jquery.fancybox.css')}}
        <!-- Diseño de iconos -->
    {{-- {{HTML::style('/packages/css/libs/slide/demo.css')}}   --}}
		<!-- Diseño de los colores -->
    {{-- {{HTML::style('/packages/css/libs/slide/style.css')}}  --}}
    <!-- Ps nose que sea pero se ve feo sin el -->
    {{-- {{HTML::style('/packages/css/libs/slide/custom.css')}} --}}
  	<!-- / Fin de la zona de archivos de estilo -->
  	@yield('css')
</head>
<body>
  <div class="container-fluid" style="padding-left:0!important;padding-right:0!important;">
    <!-- Zona para la barra de navefación de la pagina principal -->
     <nav class="navbar navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="/"><img src="/packages/images/logo.png" width="200" height="220" alt="" class="navbar-brand waves-effect waves-light img-responsive"></a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                          <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Administración <span class="caret"></span></a>
                          <ul class="dropdown-menu custom-nav" role="menu">
                            @if(!Auth::check())
                            <li class=""><a href="/login">Iniciar sesion</a></li>
                            @else
                            <li class=""><a href="/productos">Gestión de productos</a></li>
                            <li class=""><a href="/logout">Cerrrar seson</a></li>
                            @endif
                          </ul>
                        </li>
                        @yield('list')
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
    @yield('container-main')
    <!-- Zona de el carrucel principal de la página -->

<footer id="footer" class="text-center  z-depth-2" data-scroll-index="8">
	<div class="container">
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="footer-social wow fadeInUp">
	                <h3>Encuentranos también en redes sociales:</h3>
                    <a href="http://www.facebook.com/pages/PREFILTROS-Y-ACCESORIOS-PARA-LA-ADMISION-PARA-<br />
MAQUINARIA-DIESEL/117117421719097" class="btn-floating btn-large fb-bg  waves-effect waves-light" title="facebook" data-tool="tooltip"><i class="fa fa-facebook"> </i></a>
                    <a href="http://www.twitter.com/prefiltros" class="btn-floating btn-large tw-bg waves-effect waves-light" title="twitter" data-tool="tooltip"><i class="fa fa-twitter"> </i></a>
                    <a href="#section-contact" class="btn-floating btn-large  waves-effect waves-light" title="email:contacto@prefiltros.com.mx" data-tool="tooltip"><i class="fa fa-envelope-o"> </i></a>
                    <a class="btn-floating btn-large ins-bg waves-effect waves-light" title="instagram:prefiltros" data-tool="tooltip"><i class="fa fa-instagram"> </i></a>
                    <a href="http://www.youtube.com/user/PREFILTROS?feature=mhee" class="btn-floating btn-large yt-bg waves-effect waves-light" title="youtube" data-tool="tooltip"><i class="fa fa-youtube"> </i></a>
	            </div>
	         <!--   <ul class="social">
                        <li class="facebook"><a href="#" class="fa fa-facebook"></a></li>
                        <li class="twitter"><a href="#" class="fa fa-twitter"></a></li>
                        <li class="dribbble"><a href="#" class="fa fa-youtube"></a></li>
                        <li class="behance"><a href="#" class="fa fa-instagram"></a></li>
                    </ul>-->
	        </div>
	    </div>
       <!--  <div class="row zona-marcas">
            <div class="col-lg-12">
                <div class="footer-social wow fadeInUp">
                    <h3>Nuestras marcas:</h3>
                </div>
            </div>
        </div>
       <div class="row wow fadeInDown zona-marcas">
            <div class="col-md-2"></div>
            <a  href="/packages/images/marcas/donaldson.png"     rel="marcas" class="col-md-1 fancybox" style=""><img src="/packages/images/marcas/donaldson.png"      class="img-responsive view overlay hm-white-slight z-depth-1" style="width:120px;height:60px;cursor:pointer;"></a>
            <a  href="/packages/images/marcas/fleetguard.png"    rel="marcas" class="col-md-1 fancybox" style=""><img src="/packages/images/marcas/Fleetguard.png"     class="img-responsive view overlay hm-white-slight z-depth-1" style="width:120px;height:60px;cursor:pointer;"></a>
            <a  href="/packages/images/marcas/Turbo.png"         rel="marcas" class="col-md-1 fancybox" style=""><img src="/packages/images/marcas/Turbo.png"          class="img-responsive view overlay hm-white-slight z-depth-1" style="width:120px;height:60px;cursor:pointer;"></a>
            <a  href="/packages/images/marcas/MannFilter.png"    rel="marcas" class="col-md-1 fancybox" style=""><img src="/packages/images/marcas/MannFilter.png"     class="img-responsive view overlay hm-white-slight z-depth-1" style="wodth:120px;height:60px;cursor:pointer;"></a>
            <a  href="/packages/images/marcas/protec.png"        rel="marcas" class="col-md-1 fancybox" style=""><img src="/packages/images/marcas/protec.png"         class="img-responsive view overlay hm-white-slight z-depth-1" style="width:120px;height:60px;cursor:pointer;"></a>
            <a  href="/packages/images/marcas/sakura_filter.gif" rel="marcas" class="col-md-1 fancybox" style=""><img src="/packages/images/marcas/sakura_filter.gif"  class="img-responsive view overlay hm-white-slight z-depth-1" style="width:120px;height:60px;cursor:pointer;"></a>
            <a  href="/packages/images/marcas/TOPSPIN.png"       rel="marcas" class="col-md-1 fancybox" style=""><img src="/packages/images/marcas/TOPSPIN.png"        class="img-responsive view overlay hm-white-slight z-depth-1" style="width:120px;height:60px;cursor:pointer;"></a>
            <a  href="/packages/images/marcas/Wix.png"           rel="marcas" class="col-md-1 fancybox" style=""><img src="/packages/images/marcas/Wix.png"            class="img-responsive view overlay hm-white-slight z-depth-1" style="width:120px;height:60px;cursor:pointer;"></a>
            <div class="col-md-2"></div>
        </div>-->
	</div>
	<div class="footer-copyright text-center rgba-black-light" style="margin-top:1%!important;">
        <div class="container-fluid" style="padding-bottom:1%!important;padding-top:1%!important;">
            <p style="font-size:1.1em;"><b>Todos los derechos reservados.</b></p>
            © 2016 Copyright: <a href="http://www.prefiltros.com.mx" style="color:#666"> <b>prefiltros</b>.com.mx</a>
        </div>
    </div>
</footer>
<audio class="hidden" id="noty-success" src="/packages/sounds/music.mp3"></audio>
<audio class="hidden" id="noty-error" src="/packages/sounds/error.wav"></audio>
</div>
    <!-- Zona de archivos js -->
    {{HTML::script('/packages/js/libs/jquery/jquery.min.js')}}
    {{HTML::script('/packages/js/libs/jquery/pace.js')}}
    {{HTML::script('/packages/js/libs/bootstrap/bootstrap.min.js')}}
    {{HTML::script('/packages/js/libs/material/mdb.min.js')}}
    {{HTML::script('/packages/js/libs/material/waves-effect.js')}}
    {{HTML::script('/packages/js/libs/material/ripples.min.js')}}
    {{HTML::script('/packages/js/libs/sweetalert/sweetalert.min.js')}}
    {{HTML::script('/packages/js/libs/jquery/jquery.nav.js')}}
    {{--{{HTML::script('/packages/js/libs/slide/modernizr.custom.79639.js')}}--}}
    {{--<script src="http://flashcanvas.net/bin/flashcanvas.js"></script>--}}
    {{--{{HTML::script('/packages/js/libs/slide/jquery.ba-cond.min.js')}} --}}
    {{--{{HTML::script('/packages/js/libs/slide/jquery.slitslider.js')}}--}}
    {{--{{HTML::script('/packages/js/libs/slide/sliderControl.js')}}--}}
    {{HTML::script('packages/js/libs/bootstrap/jquery.fancybox.pack.js')}}
    {{HTML::script('/packages/js/libs/jquery/jquery.mixitup.min.js')}}
    {{HTML::script('/packages/js/libs/jquery/jquery.parallax-1.1.3.js')}}
    {{HTML::script('/packages/js/libs/jquery/jquery.appear.js')}}
    {{HTML::script('/packages/js/libs/notifier/Notifier.js')}}
    {{HTML::script('/packages/js/libs/sweetalert/sweetalert.min.js')}}
    {{HTML::script('/packages/js/libs/tooltipster/jquery.tooltipster.min.js')}}
    {{HTML::script('/packages/js/libs/validation/jquery.validate.min.js')}}
    {{HTML::script('/packages/js/libs/validation/additional-methods.min.js')}}
    {{HTML::script('/packages/js/libs/validation/localization/messages_es.js')}}
    {{HTML::script('/packages/js/libs/jquery/main.js')}}
   
    <!-- / Fin de la zona de archivos js -->
    @yield('js')
</body>
</html>