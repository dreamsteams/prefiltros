$("body").css('overflow', 'hidden');

$(window).load(function(){
  $("#loadSpinner").fadeOut('1000', function() {
    $("body").css('overflow', 'auto');
    $("#miNavbar").addClass('navbar-fixed-top');
  });
});
