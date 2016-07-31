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
<form id="frm-update-image">
<input type="file" name="changeImage" id="changeImage" class="hidden" accept="image/jpg,image/jpeg,image/png,image/gif">
</form>
<section id="categorias">
	<div class="row">
		<div class="col-md-12">
			<ul class="pagination">
				<li class="disabled prev"><a href = "#" data-toggle="tooltip" data-placement="bottom" title="Anterior">&laquo;</a></li>
				     <?php $contador=1; $n=1; $categorias = categoria::where("active","1")->get();?>
			          @foreach($categorias as $categoria)
			            @if($contador==1)
			              @if($n==1)
			                @if(Auth::check())
			                  <?php $contador++;?>
			                @endif
			              <li class="active"><a href="#page-{{$n}}">{{$n}}</a></li>
			              @else
			              <li class=""><a href="#page-{{$n}}">{{$n}}</a></li>
			              @endif
			            <?php $n++;?>
			            @endif
			            @if($contador==12)
			            <?php $contador=0;?>
			            @endif
			            <?php $contador++;?> 
			          @endforeach
				<li class="next"><a href = "#" data-toggle="tooltip" data-placement="bottom" title="Siguiente">&raquo;</a></li>
			</ul>
		</div>
	</div>
	<div id="content-categorias">
	<?php $contador_page=0;$contador_row=1;$n=1;?>
    @foreach($categorias as $categoria)
      @if($contador_page==0)
        @if($n==1)
        <div id="page-{{$n}}" class="active">
        @else
        <div id="page-{{$n}}" class="">
        @endif
        <?php $n++;$contador_page=1 ?>
      @endif
      @if($contador_row==1)
      <div class="row row-main-categorias">
      @endif
        @if(Auth::user())
          @if($categorias[0]->id ==$categoria->id)
          <div class="col-md-3">
            <div class="card card-dark card-new" data-toggle="tooltip" data-placement="bottom" title="Agregar nuevo producto">
              <h1 class="text-center"><i class="fa fa-plus-circle"></i></h1>
              <h4 class="text-center">Nueva Categoría</h4>
            </div>
          </div>
          <?php $contador_row++;?>
          @endif
        @endif
  		<div class="col-md-3">
  			<div class="card" data-card-id="{{$categoria->id}}" data-titulo="{{$categoria->titulo}}">
  				<div class="view overlay hm-white-slight">
  					<img src="/packages/images/categorias/{{$categoria->imagen}}" data-id="{{$categoria->id}}" class="img-fluid" style="width:100%!important;;height:160px!important;">
  					<a>
  						<div class="mask">
  							<div class="row">
  								<div class="col-md-12">
  									<h5 class="text-center">
  										<a data-tool="tooltip" href="/productos-categoria/{{$categoria->id}}" class="btn btn-yt btn-floating btn-search" title="ver productos de la categoría"><i class="fa fa-search"></i></a>
  										@if(Auth::check())
  										<a data-tool="tooltip" data-id="{{$categoria->id}}" class="btn btn-yt btn-floating change-image" title="Cambiar imagen de la categoría"><i class="fa fa-image"></i></a>
  										<a data-tool="tooltip" data-id="{{$categoria->id}}" class="btn btn-yt btn-floating btn-refresh" title="Modificar producto"><i class="fa fa-refresh"></i></a>
  										<a data-tool="tooltip" data-id="{{$categoria->id}}" class="btn btn-yt btn-floating btn-trash" title="Eliminar producto"><i class="fa fa-trash"></i></a>
  										@endif
  									</h5>
  								</div>
  							</div>
  						</div>
  					</a>
  				</div><div class="card-block"><div class="card-title text-center"><p>{{$categoria->titulo}}</p></div></div></div></div>
      @if($contador_row==4)
      </div>
      <?php $contador_row=0;$contador_page++;?>
      @endif
      @if($contador_page==4)
      </div>
      <?php $contador_page=0;?>
      @endif
      <?php $contador_row++;?>
    @endforeach
	</div>
</section>
<div class="row row-pager">
<div class="col-md-12">
  <nav>
    <ul class="pager">
      <li class="disabled prev previous"><a href="#">&larr; Anterior</a></li>
      <li class="next"><a href="#">Siguiente &rarr;</a></li>
    </ul>
  </nav>
</div>
</div>
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
      <input type="number" name="id" id="id" class="hidden">
    </form>
    </div>
  </div> 
</div>
  @endif
@stop

@section('js')
{{HTML::script('/packages/js/prefiltros/categorias.js')}}
@stop