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
  	{{HTML::style('/packages/css/libs/material/roboto.min.css')}}
    {{HTML::script('/packages/js/libs/notifier/Notifier.js')}}  
    {{HTML::style('/packages/css/libs/tooltipster/tooltipster.css')}}
    {{HTML::style('/packages/css/libs/sweetalert/sweetalert.css')}}
    {{HTML::style('/packages/css/prefiltros/base.css')}}
  	{{HTML::style('/packages/css/libs/animate/pace.css')}}
          <!-- Diseño de iconos -->
    {{-- {{HTML::style('/packages/css/libs/slide/demo.css')}}   --}}
		<!-- Diseño de los colores -->
    {{-- {{HTML::style('/packages/css/libs/slide/style.css')}}  --}}
    <!-- Ps nose que sea pero se ve feo sin el -->
    {{-- {{HTML::style('/packages/css/libs/slide/custom.css')}} --}}
  	<!-- / Fin de la zona de archivos de estilo -->
  	@yield('css')
  </style>
</head>
<body>
  <!--Navbar-->
<nav class="navbar navbar-fixed-top scrolling-navbar navbar-dark bg-primary">

    <!-- Collapse button-->
    <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx2">
        <i class="fa fa-bars"></i>
    </button>

    <div class="container">

        <!--Collapse content-->
        <div class="collapse navbar-toggleable-xs" id="collapseEx2">
            <!--Navbar Brand-->
            <a class="navbar-brand" href="/"><i class="fa fa-gears"></i> Prefiltros</a>
            <!--Links-->
            <ul class="nav navbar-nav">
                <li class="nav-item active" id="li-inicio">
                    <a class="nav-link" href="/"><i class="fa fa-home"></i> Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown" id="li-admin">
                    <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administracion</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        @if(!Auth::check())
                        <a class="dropdown-item" href="/login">Iniciar session</a>
                        @else
                        <a class="dropdown-item" href="/productos">Gestion de productos</a>
                        <a class="dropdown-item" href="/logout">Cerrar session</a>
                        @endif
                    </div>
                </li>
                <li class="nav-item dropdown" id="li-productos">
                    <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Productos</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <a class="dropdown-item" hidden href="#" id="li-product-news">Lo más nuevo</a>
                        <a class="dropdown-item" href="/productos">Catalogo completo</a>
                        <a class="dropdown-item" href="/categorias">Nuestra categorías</a>
                    </div>
                </li>
                <li class="nav-item" id="li-carrito">
                    <a class="nav-link" href="/carrito"><i class="fa fa-shopping-cart"></i> Mi carrito <span class="badge bg-green txt-carrito-count">0</span><span class="sr-only">(current)</span></a>
                </li>
                @yield('list')
            </ul>
            <!--Search form-->
            <form class="form-inline" id="frm-buscar">
                <input class="form-control" type="text" placeholder="Buscar">
            </form>
        </div>
        <!--/.Collapse content-->

    </div>

</nav>
 @yield('container-main')

<!--Footer-->
<footer class="page-footer center-on-small-only">

    <!--Footer Links-->
    <div class="container-fluid">
 
    </div>
    <!--/.Footer Links-->

    <hr>

    <!--Call to action-->
    <div class="call-to-action">
        <ul>
            <li><h5>Encuentranos también en redes sociales.</h5></li>
        </ul>
    </div>
    <!--/.Call to action-->

    <hr>

    <!--Social buttons-->
    <div class="social-section">
        <ul>
            <li><a href="http://www.facebook.com/pages/PREFILTROS-Y-ACCESORIOS-PARA-LA-ADMISION-PARA-<br />
MAQUINARIA-DIESEL/117117421719097" target="_blank" class="btn-floating btn-small btn-fb"><i class="fa fa-facebook"> </i></a></li>
            <li><a href="http://www.twitter.com/prefiltros" target="_blank" class="btn-floating btn-small btn-tw"><i class="fa fa-twitter"> </i></a></li>
            <li><a href="http://www.youtube.com/user/PREFILTROS?feature=mhee" target="_blank" class="btn-floating btn-small btn-yt"><i class="fa fa-youtube"> </i></a></li>
            <li><a class="btn-floating btn-small btn-ins"><i class="fa fa-instagram"> </i></a></li>
        </ul>
    </div>
    <!--/.Social buttons-->

    <!--Copyright-->
    <div class="footer-copyright">
        <div class="container-fluid">
            © {{date('Y')}} Copyright: <a href="http://www.prefiltros.com.mx"> Prefiltros </a>

        </div>
    </div>
    <!--/.Copyright-->

</footer>
<!--/.Footer-->

<audio class="hidden" id="noty-success" src="/packages/sounds/music.mp3"></audio>
<audio class="hidden" id="noty-error" src="/packages/sounds/error.wav"></audio>
 <!-- Zona de archivos js -->
    {{HTML::script('/packages/js/libs/jquery/jquery-2.2.3.min.js')}}
    {{HTML::script('/packages/js/libs/jquery/pace.js')}}
    {{HTML::script('/packages/js/libs/bootstrap/bootstrap.min.js')}}
    {{HTML::script('/packages/js/libs/material/mdb.min.js')}}
    {{HTML::script('/packages/js/libs/material/waves-effect.js')}}
    {{HTML::script('/packages/js/libs/sweetalert/sweetalert.min.js')}}
    {{HTML::script('/packages/js/libs/jquery/jquery.nav.js')}}
    {{HTML::script('/packages/js/libs/notifier/Notifier.js')}}
    {{HTML::script('/packages/js/libs/sweetalert/sweetalert.min.js')}}
    {{HTML::script('/packages/js/libs/tooltipster/jquery.tooltipster.min.js')}}
    {{HTML::script('/packages/js/libs/validation/jquery.validate.min.js')}}
    {{HTML::script('/packages/js/libs/validation/additional-methods.min.js')}}
    {{HTML::script('/packages/js/libs/validation/localization/messages_es.js')}}
    {{HTML::script('/packages/js/libs/jquery/main.js')}}
    {{HTML::script('/packages/js/prefiltros/main.js')}}
    <script type="text/javascript">
      new WOW().init();
      $("#frm-buscar").submit(function(e){
        e.preventDefault();
        document.location="/productos/"+$("#frm-buscar>input").val();
      });
    </script>
    @yield('js')
<!--/.Navbar-->
</body>
</html>