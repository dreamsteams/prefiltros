@extends('plantillas.adminBase')

@section('css')
{{HTML::style('/packages/css/prefiltros/carrito.css')}}
@stop

@section('title')
Catalogo | productos
@stop

@section('migas')
<li class="active"><a href="/productos"><i class="fa fa-tag"></i> Productos</a></li>
<li class="active"><a href="/carrito"><i class="fa fa-shopping-cart"></i> My carrito</a></li>
@stop
@section('title_page')
<h3>Carrito <small><i class="fa fa-shopping-cart"></i> My Carrito de productos</small></h3>
@stop
@section('main-container') 
<section id="carrito">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
        <div class="modal fade" id="modal-cotizacion">
          <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"><i class="fa fa-shopping-cart"></i> Enviar cotización</h4>
              </div>
              <div class="modal-body">
                <form action="/send-cotizacion" method="POST" id="frm-cotizacion" class="form-horizontal">
                    <div class="form-group">
                      <label for="nombre" class="col-md-2">Nombre:</label>
                      <div class="col-md-10">
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingresa tu nombre">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="apellido_paterno" class="col-md-2">Apellido paterno:</label>
                      <div class="col-md-10">
                        <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control" placeholder="Ingresa tu Apellido Paterno">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="apellido_materno" class="col-md-2">Apellido Materno:</label>
                      <div class="col-md-10">
                        <input type="text" name="apellido_materno" id="apellido_materno" class="form-control" placeholder="Ingresa tu Apellido Materno">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="correo" class="col-md-2">Correo:</label>
                      <div class="col-md-10">
                        <input type="text" name="correo" id="correo" class="form-control" placeholder="Ingresa tu nombre">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="telefono" class="col-md-2">Telefono:</label>
                      <div class="col-md-10">
                        <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Ingresa tu nombre">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="mensaje" class="col-md-2">Mensaje:</label>
                      <div class="col-md-10">
                        <textarea name="mensaje" id="mensaje" rows="7" class="form-control" placeholder="Agrega un mensaje o un comentario a tu cotización."></textarea>
                      </div>
                    </div>
              	</div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-warning btn-cancel" data-dismiss="modal" id="btn-cancel"><i class="fa fa-remove"></i> Cancelar</button>
                <button type="submit" class="btn btn-success" id="btn-send-cotizacion"><i class="fa fa-paper-plane"></i> Enviar cotización</button>
              </div>
            </form>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
      <button data-toggle="modal" data-target="#modal-cotizacion" class="btn btn-info"><i class="fa fa-paper-plane-o"></i> Enviar Cotización</button>
      <button class="btn btn-danger btn-empty-cart"><i class="fa fa-cart-arrow-down"></i> Vaciar carrito</button>
      <a href="/productos" role="button" class="btn btn-success"><i class="fa fa-plus"></i> Agragar productos</a>
		</div>
	</div>
	<div id="content-products">
      <?php 
        $contador = 0;
        $id = Session::get("carrito")[(count(Session::get("carrito")))-1]["id"];
        //echo $id;
        //echo $id;
      ?>
			@if(Session::get('carrito'))
				@foreach(Session::get('carrito') as $producto)
          @if($contador==0)
          <div class="row">
          @endif
          <div class="col-md-6">
            <div class="box-product hoverable row">
                <div class="col-md-4">
                  <div class="card card-producto item hoverable">
                      <div class="view overlay hm-white-slight">
                        <img class="img-fluid img-carrito img-responsive" src="/packages/images/productos/{{$producto['imagen']}}"></img>
                      </div>
                      <div class="card-block text-left">
                        <h5 class="card-title">
                          {{$producto["titulo"].$contador}}
                        </h5>
                      </div>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-md-12">
                      <!--Panel-->
                      <div class="card card-block">
                          <h4 class="card-title">Descripción del producto</h4>
                          <p class="card-text text-justify">{{$producto["descripcion"]}}</p>
                      </div>
                      <!--/.Panel-->
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-5">
                       <div class="input-group">
                          <span class="input-group-btn btn-left btn-n-products" data-id="{{$producto['id']}}">
                            <button class="btn btn-default" type="button"><i class="fa fa-minus"></i></button>
                          </span>
                          <input type="text" name="cantidad" id="cantidad" class="form-control" placeholder="" readonly="true" value="{{$producto['cantidad']}}">
                          <span class="input-group-btn btn-right btn-n-products" data-id="{{$producto['id']}}">
                            <button class="btn btn-default" type="button"><i class="fa fa-plus"></i></button>
                          </span>
                        </div>
                    </div>
                    <div class="col-md-7">
                      <button class="btn btn-danger btn-carrito-quit" data-id="{{$producto['id']}}">Quitar del carrito</button>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <?php $contador++;?>
          @if($contador==2 ||  $producto["id"] == $id)
          </div>
          <?php $contador=0;?>
          @endif
				@endforeach
			@endif
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
{{HTML::script('/packages/js/libs/mask/jquery-mask/jquery.mask.js')}}
{{HTML::script('/packages/js/prefiltros/carrito.js')}}
@stop