$(document).ready(function(){
    $admin = {
        isAdmin:function(){
            $.ajax({
                url:"/isAdmin",
                type:"post"
            }).done(function(r){
                console.info(r);
                if(r=="success"){
                    console.log("hola");
                    $(".title_left").trigger("isAdmin");
                }
            }).fail(function(e){
                console.error(e);
            });
        }
    }
    $("[data-tool='tooltip']").tooltipster({
        animation:'swing',
        position:'bottom'
    });
    $admin.isAdmin();
    $noty={
        show:function(type,text,sound,soundSucces){
             switch(type){
                case "success": 
                    Notifier.success(text,"Prefiltros: ");
                break;
                case "error": 
                    Notifier.error(text,"Prefiltros: ");
                break;
                case "info": 
                    Notifier.info(text,"Prefiltros: ");
                break;
                case "warning": 
                    Notifier.warning(text,"Prefiltros: ");
                break;
             }
             if(sound){
                if(soundSucces)
                    document.getElementById('noty-success').play();
                else
                    document.getElementById('noty-error').play();
             }
        }
    }
});