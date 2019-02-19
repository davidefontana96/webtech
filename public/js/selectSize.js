$(document).ready(function(){
  var baseUrl = window.location.pathname;
  $('.js-size').find('li').each( function(){
  $(this).click(function(){
    $(this).css('background-color', '#616161');
    $(this).siblings().css('background-color', '#cccccc');
    var toPass = $(this).text();
    var idShoe = $('.idshoe').attr('id');
    $.get(baseUrl+'/'+toPass, {toPass:toPass, idShoe:idShoe}, function(markup){
        $('#quantity').attr('max', markup[0]);
        console.log(markup[0]);
        $('#price').text('$'+markup[1]);
        $('#quantity').val(0);
      });
  });
});
});
