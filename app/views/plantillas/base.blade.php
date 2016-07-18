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
    @yield('js')
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
            <a class="navbar-brand" href="#"><i class="fa fa-gears"></i> Prefiltros</a>
            <!--Links-->
            <ul class="nav navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#"><i class="fa fa-home"></i> Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
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
                @yield('list')
            </ul>
            <!--Search form-->
            <form class="form-inline">
                <input class="form-control" type="text" placeholder="Buscar">
            </form>
        </div>
        <!--/.Collapse content-->

    </div>

</nav>
 @yield('container-main')

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
    <script type="text/javascript">
      new WOW().init();
    </script>
    @yield('js')
<!--/.Navbar-->
</body>
</html>