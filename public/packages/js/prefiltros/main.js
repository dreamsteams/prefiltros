$(document).ready(function(){

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