@extends('plantillas.base')

@section('css')
{{HTML::style('/packages/css/prefiltros/login.css')}}
@stop
@yield('title')Iniciar session@stop
@section('container-main')
  @section('list')
     <li class="dropdown">
        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Productos <span class="caret"></span></a>
        <ul class="dropdown-menu custom-nav" role="menu">
            <li><a href="javascript:void(0)">Catalogo de productos</a></li>
        </ul>
    </li>
   <li id="nav-inicio"  class=""><a href="/" class=""><i class="fa fa-home"></i> Inicio</a></li>
  @stop
<section class="container-fluid" data-color="colors-blue" id="section-login">
	<div class="row" style="">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="panel wow fadeInLeft" data-wow-delay="0.2s" data-wow-duration="1s">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-4">
							<img src="/packages/images/user/default_user.jpg"  class="img-responsive img-circle">
						</div>
						<div class="col-md-4"></div>
					</div>
					<div class="row">
						<form id="frm-login" method="POST" action="/login" class="col-md-12">
							<div class="row">
							    <div class="input-field col-md-12">
						          <i class="material-icons prefix"><i class="fa fa-user"></i></i>
						          <input type="text" name="username"  id="username"  class="validate">
						          <label for="username">Ingrese su nombre de usuario o email</label>
						        </div>			
					        </div>			
					        <div class="row">
					        	<div class="input-field col-md-12">
					                <i class="material-icons prefix"><i class="fa fa-lock"></i></i>
					                <input type="password" name="password" id="password" class="validate">
					                <label for="password">Ingrese su contraseña</label>
					        	</div>
					        </div>
					        <div class="row">
					        	<div class="col-md-2"></div>
				        		<div class="col-md-8">
				            		<button class="btn btn-success btn-lg"><i class="fa fa-sign-in"></i> Iniciar session</button>
				        		</div>
				        		<div class="col-md-2"></div>
					        </div>
					        <div class="row">
					        	<div class="col-md-1"></div>
					        	<div class="col-md-4">
					        		 <input type="checkbox" id="remember" name="remember"/>
									<label for="remember" style="color:#555;">Recuerdame</label>
					        	</div>
					        	<div class="col-md-7" style="padding-top:7%!important;padding-left:6%!important;">
					        		<b style=""><a href="#">¡Olvide mi contraseña!</a></b>
					        	</div>
					        </div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
	<div class="row" style="margin:1.2% 0!important;">
		<div class="col-md-4"></div>
		<div class="col-md-4"></div>
		<div class="col-md-4">
		    <div class="colors active wow fadeInDown" data-color="colors-blue" data-wow-delay="0.2s" data-wow-duration="1s"></div>          
	        <div class="colors wow fadeInUp " data-color="colors-gray" data-wow-delay="0.2s" data-wow-duration="1s"></div>          
	        <div class="colors wow fadeInDown" data-color="colors-brown" data-wow-delay="0.2s" data-wow-duration="1s"></div>  
	        <div class="colors wow fadeInUp" data-color="colors-green" data-wow-delay="0.2s" data-wow-duration="1s"></div>
		</div>
	</div>
</section>
	
	
@stop

@section('js')
{{HTML::script('/packages/js/prefiltros/login.js')}}
<script type="text/javascript">
	$(document).ready(function(){
		$(".zona-marcas").hide();
	});
</script>
@stop