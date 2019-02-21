$(document).ready(function(){
  $('.removefromcart').on('click','.closed', function() {
    var idcart = $(this).attr('id');
    Swal.fire({
      type: 'success',
      title: 'Product removed!',
      showConfirmButton: false,
      timer: 3000
    });
    $.get('/cart/removeproduct', {idcart:idcart}, function(response){
      $('.removefromcart').html(response);
              $('.removefromcart').html(response.cartviewpage_view);
              $('.dropdown.cart').html(response.cart_dx);
    });


  });
});
