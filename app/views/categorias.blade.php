@extends('plantillas.base')
@section('css')
{{HTML::style('/packages/css/prefiltros/categorias.css')}}
@stop

@section('title')
Catalogo | Categorías
@stop

@section('container-main')
<div class="container-fluid" style="margin-top:6%!important;padding-left:3%;padding-right:3%;">
  <div class="row">
    <div class="col-md-12">
      <div class="modal fade" id="modal-upload-categoria">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"><b><i class="fa fa-plus"></i> Agregar una nueva categoría.</b></h4>
              </div>
              <div class="modal-body">
              @if(Auth::check())
                  <div class="row" id="" >
                    <div class="col-md-1"></div>
                   <div class="col-md-10">
                      <form  method="POST" class="form-horizontal" id="frm-categorias">
                        <div class="file-field">
                          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la categoría">
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
                       <input type="number" name="id" id="id" hidden>
                    </div> 
                  </div>
                 @endif
                </div>
                <div class="modal-footer">
                  <div class="form-group text-right">
                     <button type="reset" data-dismiss="modal" class="btn btn-warning" id="cancel-categoria">
                       <i class="fa fa-remove"></i>
                       Cancelar
                     </button>
                     <button type="submit" class="btn btn-primary"  id="save-categoria">
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
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <div class="section-title text-center wow fadeInDown" data-wow-delay="0.7s" data-wow-duration="1s" style="margin-bottom:0!important">
        <h2 style="font-size:1.5em;" class="text-center">Categorías de nuestro catálogo de producots</h2>
      </div> 
    </div>
    <div class="col-md-4"></div>
  </div>
  <form id="frm-update-image">
<input type="file" name="changeImage" id="changeImage" class="hidden" hidden accept="image/jpg,image/jpeg,image/png,image/gif">
</form>
<section id="categorias">
  <div class="row">
    <div class="col-md-12">
      <ul class="pagination">
        <li class="page-item disabled prev"><a class="page-link" href = "#" data-toggle="tooltip" data-placement="bottom" title="Anterior">&laquo;</a></li>
             <?php $contador=1; $n=1; $categorias = categoria::where("active","1")->get();?>
                @foreach($categorias as $categoria)
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
                  @if($contador==12)
                  <?php $contador=0;?>
                  @endif
                  <?php $contador++;?> 
                @endforeach
        <li class="page-item next"><a class="page-link" href = "#" data-toggle="tooltip" data-placement="bottom" title="Siguiente">&raquo;</a></li>
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
            <div class="card card-dark card-new" data-toggle="modal" data-target="#modal-upload-categoria" title="Agregar nuevo producto">
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
                      <a data-tool="tooltip" href="/productos-categoria/{{$categoria->id}}" class="btn-floating btn-small blue btn-search" title="ver productos de la categoría"><i class="fa fa-search"></i></a>
                      @if(Auth::check())
                      <a data-tool="tooltip" data-id="{{$categoria->id}}" class="btn btn-floating btn-small btn-secondary change-image" title="Cambiar imagen de la categoría"><i class="fa fa-image"></i></a>
                      <a data-tool="tooltip" data-id="{{$categoria->id}}" class="btn btn-floating btn-small blue btn-refresh"style="background-color:#FF8800!important;" data-toggle="modal" data-target="#modal-upload-categoria" title="Modificar producto"><i class="fa fa-refresh"></i></a>
                      <a data-tool="tooltip" data-id="{{$categoria->id}}" class="btn btn-floating btn-small red btn-trash" title="Eliminar producto"><i class="fa fa-trash"></i></a>
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
</div>
@stop

@section('js')
{{HTML::script('/packages/js/prefiltros/categorias.js')}}
@stop