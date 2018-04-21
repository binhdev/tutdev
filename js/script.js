var $ = jQuery.noConflict();
$(document).ready(function(){
  $('#btn-menu').click(function(e){
    $('#menu-mobile').addClass('open');
    $('#btn-menu').addClass('open');
  });
  $('#close-menu').click(function(e){
    $('#menu-mobile').removeClass('open');
    $('#btn-menu').removeClass('open');
  });
});
