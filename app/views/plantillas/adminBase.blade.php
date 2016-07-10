<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/packages/images/marcas/Protec.png">
    <title>@yield('title') </title>

    <!-- Bootstrap -->
    {{HTML::style('/packages/css/libs/bootstrap/bootstrap.min.css')}}
    <!-- Material design for bootstrap -->
    {{HTML::style('/packages/css/libs/animate/animate.min.css')}}
    {{HTML::style('/packages/css/libs/material/ripples.min.css')}}
    {{HTML::style('/packages/css/libs/material/roboto.min.css')}}
    <!-- / end material design for bootstrap -->
    <!-- Font Awesome -->
    {{HTML::style('/packages/css/libs/awensome/css/font-awesome.min.css')}}
    {{HTML::style('/packages/css/libs/sweetalert/sweetalert.css')}}
    <!-- FullCalendar -->
    {{HTML::style('/packages/css/libs/tooltipster/tooltipster.css')}}

    {{HTML::style('/packages/css/prefiltros/custom.css')}}
    {{HTML::style('packages/css/libs/bootstrap/fileinput.css')}}
    <!-- Admin base css -->
    {{HTML::style('/packages/css/prefiltros/admin.css')}}
    <!-- admin base css end-->
    @yield('css')
    <!-- Custom styling plus plugins -->
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="/" class="site_title"><i class="fa fa-gears"></i> <span>Prefiltros!</span></a>
            </div>
            <div class="clearfix"></div>
            <br/>
            <br/>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <!--<li><a href="/"><i class="fa fa-home"></i> Inicio </a></li>-->
                  <li class="li-productos"><a href="/productos"><i class="fa fa-tags"></i> Productos </a></li>
                  <li class="li-categorias"><a href="/categorias"><i class="fa fa-puzzle-piece"></i>Ver Categorías</a></li> 
                  @if(!Auth::check())
                  <li><a href="/carrito"><i class="fa fa-shopping-cart"></i> My carrito <span class="badge bg-green txt-carrito-count">0</span></a></li>
                  @endif
                  <li><a><i class="fa fa-cubes"></i> Categorías <span class="fa fa-angle-down"></span></a>
                    <ul class="nav child_menu" style="display: none">
                     @foreach(categoria::where("active",1)->get() as $categoria)
                     <li><a href="/productos-categoria/{{$categoria->id}}"><i class="fa fa-cube"></i>{{$categoria->titulo}}</a></li>
                     @endforeach
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
          
              <a href="/" data-toggle="tooltip" data-placement="top" title="Inicio">
                <span class="fa fa-home" aria-hidden="true"></span>
              </a>
              <a id="btn-screen-full" data-toggle="tooltip" data-placement="top" title="Pantalla completa">
                <span class="fa fa-desktop" aria-hidden="true"></span>
              </a>
              <a href="/logout" data-toggle="tooltip" data-placement="top" title="Salir">
                <span class="fa fa-sign-out" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav navbar-fixed-top">
          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Prefiltros
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu animated fadeInUp pull-right">
                    <li><a href="/"><i class="fa fa-home pull-left"></i> Ir a inicio</a></li>
                    @if(Auth::check())
                    <li><a href="/logout"><i class="fa fa-sign-out pull-left"></i> Salir</a></li>
                    @else
                    <li><a href="/carrito"><i class="fa fa-shopping-cart"></i> Mi carrito</a></li>
                    <li><a href="/login"><i class="fa fa-sign-in"></i> Iniciar session</a></li>
                    @endif
                  </ul>
                </li>
                @if(Auth::check())
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInUp" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>Eliminar todos los mensages</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
                @endif
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main" style="">
          <div class="container" style="margin-top:5%!important;">
            <div class="row">
              <div class="col-md-11">
                <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
                  @yield('migas')
                </ol>
              </div>
            </div>
            <div class="page-title">
              <div class="title_left">
                @yield('title_page')
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <form id="frm-buscar" method="POST">
                  <div class="input-group">
                    <input type="text" name="busqueda" class="form-control" placeholder="Buscar...">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                    </span>
                  </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- Sección del contenido principal de la página -->
        
                
             @yield('main-container') 
            <!-- endp seccion del contenido principal de la página -->
          </div>
          
      
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Compañía prefiltros Todos los derechos reservados<a href="https://wwww.prefiltros.com.mx"></a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <audio class="hidden" id="noty-success" src="/packages/sounds/music.mp3"></audio>
    <audio class="hidden" id="noty-error" src="/packages/sounds/error.wav"></audio>

    <!-- /calendar modal -->
        
    <!-- jQuery -->
    {{HTML::script('/packages/js/libs/jquery/jquery.min.js')}}
    {{HTML::script('/packages/js/libs/bootstrap/bootstrap.min.js')}}
    {{HTML::script('/packages/js/libs/material/mdb.min.js')}}
    {{HTML::script('/packages/js/libs/material/waves-effect.js')}}
    {{HTML::script('/packages/js/libs/notifier/Notifier.js')}}
    {{HTML::script('/packages/js/prefiltros/main.js')}}
    {{HTML::script('/packages/js/libs/material/ripples.min.js')}}
    {{HTML::script('/packages/js/libs/validation/jquery.validate.min.js')}}
    {{HTML::script('/packages/js/libs/validation/additional-methods.min.js')}}
    {{HTML::script('/packages/js/libs/validation/localization/messages_es.js')}}
    {{HTML::script('/packages/js/libs/sweetalert/sweetalert.min.js')}}
    <!-- NProgress -->
    {{HTML::script('/packages/js/prefiltros/nprogress.js')}}
    {{HTML::script('/packages/js/libs/bootstrap/fileinput.js')}}
    <!-- Custom Theme Scripts -->
    @yield('js')
    <script type="text/javascript">
      $("#frm-buscar").submit(function(e){
        e.preventDefault();
        document.location="/productos/"+$("input[name='busqueda']").val();

      });
      $("#btn-screen-full").click(function(){
        $("a#menu_toggle").trigger("click");
      });
    </script>
    <!-- FastClick -->
    {{HTML::script('/packages/js/prefiltros/custom.min.js')}}
    {{HTML::script('/packages/js/libs/tooltipster/jquery.tooltipster.min.js')}}
    {{HTML::script('/packages/js/prefiltros/fastclick.js')}}
  </body>
</html>