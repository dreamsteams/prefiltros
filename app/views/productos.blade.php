@extends('plantillas.adminBase')

@section('css')
{{HTML::style('/packages/css/prefiltros/productos.css')}}
@stop

@section('title')
Catalogo | productos
@stop

@section('migas')
<li class="active"><a href="/productos"><i class="fa fa-tag"></i> Productos</a></li>
@stop
@section('title_page')
<h3>Productos <small>Catalogo de productos</small></h3>
@stop
@section('main-container') 
<form id="frm-update-image">
	<input type="file" id="changeImage" name="changeImage" class="hidden" accept="image/jpg,image/png,image/jpeg">
</form>
<section id="productos">
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
	<div id="content-products">
		<div class="row row-main-product">
			<div class="col-md-2">
				<div class="card card-dark card-new" data-toggle="tooltip" data-placement="bottom" title="Agregar nuevo producto">
					<h1 class="text-center"><i class="fa fa-plus-circle"></i></h1>
					<h4 class="text-center">Nuevo Producto</h4>
				</div>
			</div>
		</div>
	</div>
</section>
@if(Auth::check())
<div class="row" id="admin-productos" hidden="hidden">
 <div class="col-md-11">
    <form  method="POST" class="form-horizontal" id="frm-productos">
      <div class="form-group">
        <label for="titulo">Nombre</label>
        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nombre del productos">
      </div>
      <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" class="form-control" id="descripcion" rows="5" placeholder="Descripción del producto"></textarea>
      </div>
      <div class="form-group">
      	<label for="nombre" for="file">imagen del producto</label>
      	<input type="file" accept="image/jpg,image/png,image/jpeg" id="file" name="file" class="file" data-show-preview="true" data-show-upload="false" data-show-caption="true" data-allowed-file-extensions='["jpg", "jpeg","png","gif"]'>
      </div>
      <div class="form-group">
        <label for="categoria">Categorría del producto</label>
        <select name="categorias" id="categorias" class="form-control">
        	<option selected value="">Selecciona la categoría para el producto</option>
	        @foreach(categoria::all() as $categoria)
	        <option value="{{$categoria->id}}">{{$categoria->titulo}}</option>
	        @endforeach
        </select>
      </div>
     <div class="form-group text-right">
       <button type="reset" class="btn btn-warning" id="cancel-product">
         <i class="fa fa-remove"></i>
         Cancelar
       </button>
       <button type="submit" class="btn btn-primary"  id="save-product">
         <i class="fa fa-check"></i>
         Guardar
       </button>
     </div>
     <input type="number" name="id" id="id" class="hidden">
    </form>
  </div> 
</div>
  @endif
@stop

@section('js')
{{HTML::script('/packages/js/prefiltros/productos.js')}}
@stop