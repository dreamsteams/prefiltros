@extends('plantillas.adminBase')

@section('css')
{{HTML::style('/packages/css/prefiltros/categorias.css')}}
@stop

@section('title')
catálogo | Categorías
@stop

@section('migas')
<li class=""><a href="/productos"><i class="fa fa-tag"></i> Productos</a></li>
<li class="active"><a href="/categorias"><i class="fa fa-puzzle-piece"></i> categorías</a></li>
@stop
@section('title_page')
<h3>Categorías <small>Categorías de productos</small></h3>
@stop
@section('main-container') 
<section id="categorias">
	<div class="row">
		<div class="col-md-12">
			<ul class="pagination">
				<li><a href = "#" data-toggle="tooltip" data-placement="bottom" title="Anterior">&laquo;</a></li>
				<li><a href="#">1</a></li>
				<li class="active"><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#">6</a></li>
				<li class=""><a href="#">7</a></li>
				<li><a href="#">8</a></li>
				<li><a href="#">9</a></li>
				<li><a href="#">10</a></li>
				<li><a href="#">11</a></li>
				<li class=""><a href="#">2</a></li>
				<li><a href="#">12</a></li>
				<li><a href="#">13</a></li>
				<li><a href="#">14</a></li>
				<li><a href = "#" data-toggle="tooltip" data-placement="bottom" title="Siguiente">&raquo;</a></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3">
			<div class="card card-dark card-new" data-toggle="tooltip" data-placement="bottom" title="Agregar nueva Categoría">
				<h1 class="text-center"><i class="fa fa-plus-circle"></i></h1>
				<h4 class="text-center">Nueva categoría</h4>
			</div>
		</div>
	 	<div class="col-sm-3">
 			<!--Card-->
			<div class="card">

			    <!--Card image-->
			    <div class="view overlay hm-white-slight">
			        <img src="http://mdbootstrap.com/images/reg/reg%20(2).jpg" class="img-fluid" alt="">
			        <a href="#">
			            <div class="mask">
			            	<div class="row">
			            		<div class="col-md-12">
	            					<h5 class="text-left">
		            					<a data-toggle="tooltip" data-placement="bottom" title="Ver producto"      class="btn btn-yt btn-floating btn-like"><i class="fa fa-search"></i></a>
		            					@if(Auth::check())
		            					<a data-toggle="tooltip" data-placement="bottom" title="Ver producto"      class="btn btn-yt btn-floating btn-like"><i class="fa fa-image"></i></a>
		            					<a data-toggle="tooltip" data-placement="bottom" title="Ver producto"      class="btn btn-yt btn-floating btn-like"><i class="fa fa-refresh"></i></a>
		            					@endif
			            			</h5>
			            		</div>
			            	</div>
			            </div>
			        </a>
			    </div>
			    <!--/.Card image-->

			    <!--Card content-->
			    <div class="card-block">
			        <!--Title-->
			        <h4 class="card-title text-center">
			        	<p>Card title</p>
			        	@if(!Auth::check())
			        	<a href="#" class="btn btn-info"><i class="fa fa-car"></i> Agregar al carrito</a>
			        	@endif
			        </h4>
			        <!--Text-->
			    </div>
			    <!--/.Card content-->

			</div>
			<!--/.Card-->
	 	</div>
	 	<div class="col-sm-3">
 			<!--Card-->
			<div class="card">

			    <!--Card image-->
			    <div class="view overlay hm-white-slight">
			        <img src="http://mdbootstrap.com/images/reg/reg%20(2).jpg" class="img-fluid" alt="">
			        <a href="#">
			            <div class="mask"></div>
			        </a>
			    </div>
			    <!--/.Card image-->

			    <!--Card content-->
			    <div class="card-block">
			        <!--Title-->
			        <h4 class="card-title text-center">Card title</h4>
			        <!--Text-->
			    </div>
			    <!--/.Card content-->

			</div>	
			<!--/.Card-->
	 	</div>
	 	<div class="col-sm-3">
 			<!--Card-->
			<div class="card">

			    <!--Card image-->
			    <div class="view overlay hm-white-slight">
			        <img src="http://mdbootstrap.com/images/reg/reg%20(2).jpg" class="img-fluid" alt="">
			        <a href="#">
			            <div class="mask"></div>
			        </a>
			    </div>
			    <!--/.Card image-->

			    <!--Card content-->
			    <div class="card-block">
			        <!--Title-->
			        <h4 class="card-title text-center">Card title</h4>
			        <!--Text-->
			    </div>
			    <!--/.Card content-->

			</div>
			<!--/.Card-->
	 	</div>
	</div>
	<div class="row">
		<div class="col-12">
			<ul class="pagination">
				<li><a href = "#" data-toggle="tooltip" data-placement="bottom" title="Anterior">&laquo;</a></li>
				<li><a href="#">1</a></li>
				<li class="active"><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#">6</a></li>
				<li class=""><a href="#">7</a></li>
				<li><a href="#">8</a></li>
				<li><a href="#">9</a></li>
				<li><a href="#">10</a></li>
				<li><a href="#">11</a></li>
				<li class=""><a href="#">2</a></li>
				<li><a href="#">12</a></li>
				<li><a href="#">13</a></li>
				<li><a href="#">14</a></li>
				<li><a href = "#" data-toggle="tooltip" data-placement="bottom" title="Siguiente">&raquo;</a></li>
			</ul>
		</div>
	</div>
</section>
@if(Auth::check())
<div class="row" id="admin-categorias" hidden="hidden">
 <div class="col-md-12">
    <form  method="POST" class="form-horizontal" id="frm-categorias">
      <div class="form-group">
      	<label for="nombre">Nombre</label>
      	<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la categoría">
      </div>
       <div class="form-group">
      	<label for="nombre" for="file">imagen de la categoría</label>
      	<input type="file" accept="image/jpg,image/png,image/jpeg" id="file" name="file" class="file" data-show-preview="true" data-show-upload="false" data-show-caption="true" data-allowed-file-extensions='["jpg", "jpeg","png","gif"]'>
      </div>
      <div class="row">
      	<!--<div class="col-md-4">
      	  <div class="img-preview card" data-toggle="tooltip" data-placement="bottom" title="Agregar imagen para la categoría">
			  <h1 class="text-center"><i class="fa fa-plus-circle"></i></h1>
			  <h4 class="text-center">Agregar imagen</h4>
	      </div>
      	</div>-->
		<div class="col-md-3"></div>
      </div>
    <div class="form-group text-right">
      <button type="reset" class="btn btn-warning" id="cancel-categoria">
        <i class="fa fa-remove"></i>
        Cancelar
      </button>
      <button type="submit" class="btn btn-primary"  id="save-categoria">
        <i class="fa fa-check"></i>
        Guardar
      </button>
    </form>
    </div>
  </div> 
</div>
  @endif
@stop

@section('js')
{{HTML::script('/packages/js/prefiltros/categorias.js')}}
@stop