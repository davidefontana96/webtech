$(document).ready(function(){
  $('.addtowishlist').on('click', '.closed', function(){
    var idwish = $(this).parent().parent().parent().attr('id');
    console.log(idwish);
    $.get('/wishlist/remove', {idwish:idwish}, function(response){
      $('.addtowishlist').html(response);
    });
  });
});
