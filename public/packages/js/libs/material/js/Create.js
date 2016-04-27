/*Created by Gerson Isaias*/
var elemento ={
        clase:this.class,
        create:function($tag){
            return $("<"+$tag+"/>").addClass(this.class);
        },
        addToCreate:function($parent,$child){
            this.create($parent).append(this.create($child));
        },
        add:function($parent,$children){
            if($.isArray($children)){
                $.each($children,function(index,object){
                    $($parent).append(object);
                })
            }
            else{
                $($parent).append($children);
            }

        },
        Post:{
            id:this.id,
            contenido:this.contenido,
            titulo:this.titulo,
            srcImage:this.srcImage,
            create:function(){
                return "<div class=\"col-xs-6 push-post col-md-4\" data-id-post="+this.id+">"+
                  "<div class=\"col-xs-12 text-right\">"+
                    "<div class=\"actionButtons\">"+
                      "<button type=\"button\" name=\"btn-view\" data-id-post="+this.id+" style=\"margin-right:-3px;\" class=\"btn btn-success btn-fab btnDelPost\">"+
                        "<span class=\"fa fa-eye\"></span>"+
                      "</button>"+
                      "<button type=\"button\" name=\"btn-refresh\" data-id-post="+this.id+" class=\"btn btn-info btn-fab btnUpdatePost\">"+
                        "<span class=\"fa fa-refresh\"></span>"+
                      "</button>"+
                      "<button type=\"button\" name=\"btn-disabled\" data-id-post="+this.id+" class=\"btn btn-danger btn-fab btnDelPost\">"+
                        "<span class=\"fa fa-trash-o\"></span>"+
                      "</button>"+
                    "</div>"+
                  "</div>"+
                  "<div class=\"card-post text-center\" id='content_post_"+this.id+"' title='Comentario:"+this.contenido+"'>"+
                   "<img src="+this.srcImage+" alt=\"Imagen del post\" class=\"img-responsive\">"+
                    "<h5 id='title_post_"+this.id+"'>"+this.titulo+"</h5>"+
                  "</div>"+
                "</div>";
            }
        },
        Comment:{
            id:this.id,
            contenido:this.contenido,
            total:this.total,
            srcImage:this.srcImage,
            fecha:this.fecha,
            nombre_completo:this.nombre_completo,
            create:function(){
                return "<div class=\"comments row\" data-id-comment="+this.id+">"+
                            "<hr class=\"col-md-12\">"+
                               "<div class=\"col-sm-2\">"+
                                    "<img src="+this.srcImage+" style=\"width:4.5em; height:4.5em;\" class=\"img-responsive z-depth-1\" >"+
                               "</div>"+
                            "<div class=\"col-md-9\">"+
                               "<h6>"+this.nombre_completo+"</h6>"+
                               "<p class=\"text-justify\">"+this.contenido+"</p>"+
                                "<span class=\"text-right\">&nbsp;&nbsp; <i class=\"fa fa-clock-o\">"+this.fecha+"</i></span>"+
                             "</div>"+
                        "</div>";
            }
        }
}
