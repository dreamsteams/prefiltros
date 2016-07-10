/*Created by Wilvardo Ramirez*/
$(document).ready(function() {

  var alturaInicio    = 667;
  var alturaAbout     = $("#section-about").height();
  var alturaProductos = $("#section-productos").height();
  var alturaUbicacion = $("#section-ubicacion").height();
  var alturaCategorias= $("#section-categoras").height();
  var alturaNow = 0;
  var $cuerpo = $("html, body");

  $("#nav-inicio").click(function() {
    alturaNow = 0;
    $cuerpo.animate({scrollTop : 0}, 'slow');
  });

  $("#nav-about").click(function() {
    var altura = alturaInicio-60;
    alturaNow = altura;
    $cuerpo.animate({scrollTop : altura}, 'slow');
  });

  $("#nav-productos").click(function(){
    var altura = (alturaInicio + alturaAbout );
    alturaNow = altura;
    $cuerpo.animate({scrollTop : altura}, 'slow');
  });

  $("#nav-ubicacion").click(function(){
    var altura = (alturaInicio + alturaAbout + alturaProductos + 300);
    alturaNow = altura;
    $cuerpo.animate({scrollTop : altura}, 'slow');
  });
  $("#nav-categorias").click(function(){
      var altura = (alturaInicio + alturaAbout + alturaProductos + alturaUbicacion + 455);
      alturaNow = altura;
      $cuerpo.animate({scrollTop:altura},'slow');
  });
  $("#nav-contacto").click(function(){
    var altura = (alturaInicio + alturaAbout + alturaProductos + alturaUbicacion + 290);
    alturaNow = altura;
    $cuerpo.animate({scrollTop : altura}, 'slow');
  });

});
