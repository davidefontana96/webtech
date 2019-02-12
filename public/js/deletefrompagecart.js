$(document).ready(function(){
  console.log("smadonning");
  $('.removefromcart').on('click','.closed', function() {
    var idcart = $(this).attr('id');
    console.log(idcart);
    $.get('/cart/removeproduct', {idcart:idcart}, function(response){
      $('.removefromcart').html(response);
    });
  });
});
