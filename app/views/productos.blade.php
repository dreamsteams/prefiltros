@extends('plantillas.base')
@section('css')
{{HTML::style('/packages/css/prefiltros/productos.css')}}
@stop

@section('title')
Catalogo | productos
@stop

@section('container-main')
<div class="container-fluid" style="margin-top:6%!important">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <div class="section-title text-center wow fadeInDown" data-wow-delay="0.7s" data-wow-duration="1s" style="margin-bottom:0!important">
        <h2 style="font-size:1.5em;" class="text-center">Catálogo de nuestros productos</h2>
      </div> 
    </div>
    <div class="col-md-4"></div>
  </div>
  <div class="row">
    <div class="col-md-12">
        <div class="modal fade" id="modal-detalles">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <h3 class="modal-title"><b> Detalles del producto</b></h3>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-6">
                      <center><img src="" class="img-responsive img-fluid img-producto-detalle"></center>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-6">
                          <h4 class="text-center"><b>Nombre del producto</b></h4>
                        </div>
                        <div class="col-md-6">
                          <h4 class="text-center"><b>Descripción del producto</b></h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <h6 class="text-center title-detalle"></h6>
                        </div>
                        <div class="col-md-6">
                          <h6 class="text-center description-detalle"></h6>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-md-5">
                          <h5 class="text-center"><b class="nombre-marca"></b></h5>
                        </div>
                        <div class="col-md-7">
                          <img class="img-fluid img-marca"></img>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-md-6" style="margin-top:3%;">
                          <h6 class="text-center"><b>Cantidad de productos:</b></h6>
                        </div>
                        <div class="col-md-5">
                          <div class="input-group">
                            <span class="input-group-btn btn-left btn-n-products" data-id="">
                              <button class="btn btn-primary" type="button"><i class="fa fa-minus"></i></button>
                            </span>
                            <input type="text" name="cantidad" id="cantidad" class="form-control" style="padding: 0.375rem .55rem;border-bottom:0px;margin-top:-1px;" placeholder="" readonly="true" value="1">
                            <span class="input-group-btn btn-right btn-n-products" data-id="">
                              <button class="btn btn-primary" type="button"><i class="fa fa-plus"></i></button>
                            </span>
                          </div>
                        </div>
                        <div class="col-md-1"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="reset"  class="btn btn-warning" data-dismiss="modal" id="btn-cancel-carrito">Cancelar</button>
                  <button type="submit" class="btn btn-success" id="btn-save-carrito">Agregar al carrito</button>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="modal fade" id="modal-upload-product">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"><b><i class="fa fa-plus"></i> Agregar un nuevo producto.</b></h4>
              </div>
              <div class="modal-body">
              @if(Auth::check())
                  <div class="row" id="admin-productos" >
                    <div class="col-md-1"></div>
                   <div class="col-md-10">
                      <form  method="POST" class="form-horizontal" id="frm-productos">
                        <div class="file-field">
                          <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nombre del productos">
                        </div>
                        <div class="file-field">
                          <textarea name="descripcion" class="form-control" id="descripcion" rows="5" placeholder="Descripción del producto"></textarea>
                        </div>
                         <div class="file-field">
                            <div class="btn btn-primary" style="padding-top:1px!important;padding-bottom:1px!important;">
                                <span>imagen del producto</span>
                                <input type="file" accept="image/jpg,image/png,image/jpeg" id="file" name="file" >
                            </div>
                            <div class="file-path-wrapper">
                               <input type="text" readonly class="file-path validate" placeholder="Subir imagen para el producto..." data-show-preview="true" data-show-upload="false" data-show-caption="true" data-allowed-file-extensions='["jpg", "jpeg","png","gif"]'>
                            </div>
                        </div>
                        <!--<div class="form-group">
                          <label for="nombre" for="file">imagen del producto</label>
                          <input type="file" accept="image/jpg,image/png,image/jpeg" id="file" name="file" class="file" data-show-preview="true" data-show-upload="false" data-show-caption="true" data-allowed-file-extensions='["jpg", "jpeg","png","gif"]'>
                        </div>-->
                        <div class="file-field">
                          <select name="categorias" id="categorias" class="form-control mdb-select">
                            <option selected value="">Selecciona la categoría para el producto</option>
                            @foreach(categoria::where("active",1)->get() as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->titulo}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="file-field">
                          <select name="marcas" id="marcas" class="form-control mdb-select">
                            <option selected value="">Selecciona la marca para el producto</option>
                            @foreach(marca::all() as $marca)
                            <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                            @endforeach
                          </select>
                        </div>
                       <input type="number" name="id" id="id" hidden>
                    </div> 
                  </div>
                 @endif
                </div>
                <div class="modal-footer">
                  <div class="form-group text-right">
                     <button type="reset" data-dismiss="modal" class="btn btn-warning" id="cancel-product">
                       <i class="fa fa-remove"></i>
                       Cancelar
                     </button>
                     <button type="submit" class="btn btn-primary"  id="save-product">
                       <i class="fa fa-check"></i>
                       Guardar
                     </button>
                   </div>
                  </form>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->
    </div>
  </div>
  <form id="frm-update-image">
    <input type="file" id="changeImage" name="changeImage" class="hidden"hidden accept="image/jpg,image/png,image/jpeg,image/gif">
  </form>
  <section id="productos" style="padding-left:3%;padding-right:3%;">
    <div class="row" id="row-pagination">
      <div class="col-md-12">
        <ul class="pagination">
          <li class="page-item disabled prev"><a class="page-link" href = "#" data-toggle="tooltip" data-placement="bottom" title="Anterior">&laquo;</a></li>
            <?php $contador=1; $n=1; $productos = producto::join("categorias","categorias.id","=","productos.categoria_id")->join('marcas','marcas.id','=','productos.marca_id')->where("productos.active","1")->where("categorias.active","1")->select("productos.id","productos.titulo","productos.descripcion","productos.imagen","productos.categoria_id","productos.marca_id","marcas.nombre as nombreMarca","marcas.imagen as imgMarca")->get();?>
            @foreach($productos as $producto)
              @if($contador==1)
                @if($n==1)
                  @if(Auth::check())
                    <?php $contador++;?>
                  @endif
                <li class="page-item active"><a class="page-link" href="#page-{{$n}}">{{$n}}</a></li>
                @else
                <li class="page-item"><a class="page-link" href="#page-{{$n}}">{{$n}}</a></li>
                @endif
              <?php $n++;?>
              @endif
              @if($contador==18)
              <?php $contador=0;?>
              @endif
              <?php $contador++;?> 
            @endforeach
          <li class="page-item next"><a class="page-link" href = "#" data-toggle="tooltip" data-placement="bottom" title="Siguiente">&raquo;</a></li>
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
              <div class="card card-dark card-new" data-toggle="modal" data-placement="bottom" data-toggle="modal" data-target="#modal-upload-product" title="Agregar nuevo producto">
                <h1 class="text-center"><i class="fa fa-plus-circle"></i></h1>
                <h4 class="text-center">Nuevo Producto</h4>
              </div>
            </div>
            <?php $contador_row++;?>
            @endif
          @endif
          <div class="col-md-2">
            <div class="card" data-descripcion="{{$producto->descripcion}}" data-titulo="{{$producto->titulo}}" data-card-id="{{$producto->id}}" data-imagen="{{$producto->imgMarca}}" data-marca="{{$producto->nombreMarca}}">
              <div class="view overlay hm-white-slight">
                <img src="/packages/images/productos/{{$producto->imagen}}" data-id="{{$producto->id}}" class="img-fluid" style="1350px!important;height:135px!important;"/>
                <a>
                  <div class="mask">
                    <div class="row">
                      <div class="col-md-12">
                        <h5 class="text-center">
                          <a data-id="{{$producto->id}}" class="btn-floating btn-small blue btn-search" title="ver detalles del producto" data-tool="tooltip" data-toggle="modal" data-target="#modal-detalles"><i class="fa fa-search"></i></a>
                          @if(Auth::check())
                          <a data-id="{{$producto->id}}" class="btn btn-floating btn-small btn-secondary change-image" data-tool="tooltip" title="Cambiar imagen del producto"><i class="fa fa-image"></i></a>
                          <a data-id="{{$producto->id}}" data-target="#modal-upload-product" data-toggle="modal" data-marca="{{$producto->marca_id}}" data-categoria="{{$producto->categoria_id}}" style="background-color:#FF8800!important;" class="btn btn-warning blue btn-floating btn-small btn-refresh" data-tool="tooltip" title="Modificar producto"><i class="fa fa-refresh"></i></a>
                          <a data-id="{{$producto->id}}" class="btn btn-floating btn-small red btn-trash" data-tool="tooltip" title="Eliminar producto"><i class="fa fa-trash"></i></a>
                          @endif
                        </h5>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="card-block text-center">
                <h6 class="card-title"> {{$producto->titulo}} </h6>               
                <a data-id="{{$producto->id}}" style="font-size:.9em;" class="btn btn-primary btn-carrito-add"><i class="fa fa-shopping-cart"></i> Agragar al carrito</a>
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
 </div>
@stop

@section('js')
{{HTML::script('/packages/js/prefiltros/productos.js')}}

@stop