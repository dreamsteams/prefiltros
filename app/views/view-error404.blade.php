@extends('plantillas.base')

 @section('title') Prefiltros | ERROR 404 @stop
 @section('css')
 @stop
 @section('container-main')
<body>
  <style media="screen">
    body{
      background-image: url(/packages/images/fondo.jpg);
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }

    .well{
      background-color: rgba(0, 0, 0, 0.5);
      border: 1px solid black;
      margin-top: -100px;
    }
  </style>

  <br><br>
  <div class="container-fluid" style="margin-top:13%!important;margin-bottom:10%!important;">
    <div class="row">
      <div class="col-xs-3"></div>
      <div class="col-xs-6">
        <div class="lockscreen-wrapper">
          <div class="well well-lg" style="color:#fff;">
            <div class="lockscreen-logo" style="margin-top:5%!important;">
              <!-- <b>Curiosity</b><small>.com.mx</small> -->
              <center>
                <img src="/packages/images/logo.png" alt="logo prefiltros" style="width:300px; height:100px;" class="img-responsive img-fluid wow bounceIn lock-img">
                {{-- {{HTML::image('/packages/images/logo.png', 'alt', array(class' => 'img-responsive img-fluid wow bounceIn lock-img'))}} --}}
              </center>
            </div>
            <h1 class="text-center" style="margin-top:5%!important;"><b>404</b></h1>
            <h4 class="text-center">La pagina que usted intenta buscar no existe</h4>
            <div class="lockscreen-footer text-center"style="margin-bottom:1%!important;">
              Copyright &copy; {{date('Y')}} | <b>Prefiltros</b><br>
              Todos los derechos reservados.
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-3"></div>
    </div>
  </div>
@stop

@section('js')
{{HTML::script('/packages/js/libs/jquery/jquery.min.js')}}
{{HTML::script('/packages/js/libs/bootstrap/bootstrap.min.js')}}
@stop