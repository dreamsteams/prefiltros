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
<div class="row">
	<div class="col-md-12">
    	<div class="modal fade" id="modal-detalles">
          <div class="modal-dialog modal-xs" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"> Detalles del producto</h4>
              </div>
              <div class="modal-body">
              	<center><img src="" class="img-responsive z-depth-5"></center>
              	<div class="row">
              		<div class="col-md-5">
              			<p class="title-detalle"></p>
              		</div>
              		<div class="col-md-7">
              			<p class="description-detalle"></p>
              		</div>
              	</div>
              </div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-warning" data-dismiss="modal" id="btn-cancel">Cancelar</button>
                <button type="submit" class="btn btn-success" id="btn-save-seccion">Agregar al carrito</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
	</div>
</div>
<form id="frm-update-image">
	<input type="file" id="changeImage" name="changeImage" class="hidden" accept="image/jpg,image/png,image/jpeg,image/gif">
</form>
<section id="productos">
	<div class="row" id="row-pagination">
		<div class="col-md-12">
			<ul class="pagination">
				<li class="disabled prev"><a href = "#" data-toggle="tooltip" data-placement="bottom" title="Anterior">&laquo;</a></li>
          <?php $contador=1; $n=1; $productos = producto::join("categorias","categorias.id","=","productos.categoria_id")->where("productos.active","1")->where("categorias.active","1")->select("productos.id","productos.titulo","productos.descripcion","productos.imagen","productos.categoria_id")->get();?>
          @foreach($productos as $producto)
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
            @if($contador==18)
            <?php $contador=0;?>
            @endif
            <?php $contador++;?> 
          @endforeach
				<li class="next"><a href = "#" data-toggle="tooltip" data-placement="bottom" title="Siguiente">&raquo;</a></li>
			</ul>
		</div>
	</div>
	<div id="content-products">
  <?php $contador_page=0;$contador_row=1;$n=1;?>
    @foreach($productos as $producto)
      @if($contador_page==0)
        @if($n==1)
        <div id="page-{{$n}}" class="active">
        @else
        <div id="page-{{$n}}" class="">
        @endif
        <?php $n++;$contador_page=1 ?>
      @endif
      @if($contador_row==1)
      <div class="row row-main-product">
      @endif
        @if(Auth::user())
          @if($productos[0]->id ==$producto->id)
          <div class="col-md-2">
            <div class="card card-dark card-new" data-toggle="tooltip" data-placement="bottom" title="Agregar nuevo producto">
              <h1 class="text-center"><i class="fa fa-plus-circle"></i></h1>
              <h4 class="text-center">Nuevo Producto</h4>
            </div>
          </div>
          <?php $contador_row++;?>
          @endif
        @endif
        <div class="col-md-2">
          <div class="card" data-descripcion="{{$producto->descripcion}}" data-titulo="{{$producto->titulo}}" data-card-id="{{$producto->id}}">
            <div class="view overlay hm-white-slight">
              <img src="/packages/images/productos/{{$producto->imagen}}" data-id="{{$producto->id}}" class="img-fluid" style="1350px!important;;height:135px!important;"/>
              <a>
                <div class="mask">
                  <div class="row">
                    <div class="col-md-12">
                      <h5 class="text-center">
                        <a class="btn btn-yt btn-floating btn-search" title="ver detalles del producto" data-tool="tooltip" data-toggle="modal" data-target="#modal-detalles"><i class="fa fa-search"></i></a>
                        @if(Auth::check())
                        <a data-id="{{$producto->id}}" class="btn btn-yt btn-floating change-image" data-tool="tooltip" title="Cambiar imagen del producto"><i class="fa fa-image"></i></a>
                        <a data-id="{{$producto->id}}" data-categoria="{{$producto->categoria_id}}" class="btn btn-yt btn-floating btn-refresh" data-tool="tooltip" title="Modificar producto"><i class="fa fa-refresh"></i></a>
                        <a data-id="{{$producto->id}}" class="btn btn-yt btn-floating btn-trash" data-tool="tooltip" title="Eliminar producto"><i class="fa fa-trash"></i></a>
                        @endif
                      </h5>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="card-block">
              <div class="card-title text-center">
                <p>{{$producto->titulo}}</p>
                @if(!Auth::check())
                <a data-id="{{$producto->id}}" class="btn btn-carrito-add btn-info"><i class="fa fa-car"> Agregar al carrito</i></a>
                @endif
              </div>
            </div>
          </div>
        </div>
      @if($contador_row==6)
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
	        @foreach(categoria::where("active",1)->get() as $categoria)
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