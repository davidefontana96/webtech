$(document).ready(function(){
  $('.addtowishlist').on('click', '.closed', function(){
    var idwish = $(this).parent().parent().parent().attr('id');
    $.get('/wishlist/remove', {idwish:idwish}, function(response){
      $('.addtowishlist').html(response);
    });
  });
});
