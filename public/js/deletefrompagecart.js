$(document).ready(function(){
  $('.removefromcart').on('click','.closed', function() {
    var idcart = $(this).attr('id');
    console.log(idcart);
    Swal.fire({
      title: 'Removed from Cart!',
      text: 'Go on!',
      type: 'success'
      })
    $.get('/cart/removeproduct', {idcart:idcart}, function(response){
      console.log(response);
      $('.removefromcart').html(response);

    });


  });
});
