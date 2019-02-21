$(document).ready(function(){
  var iduser = $('#navbarDropdown').attr('class');
  var idshoe = $('.idshoe').attr('id');
  var size = '33';
  $("#dropdown-cart-js").on('click','.fas.fa-minus-circle', function() {
    var idtopass = $(this).closest('.object-in-cart').attr('id');
    $.get('/cart/removeproduct', {idcart:idtopass,iduser:iduser},
        function(response){
          $('.removefromcart').html(response.cartviewpage_view);
          $('.dropdown.cart').html(response.cart_dx);
          Swal.fire({
            type: 'success',
            title: 'Removed from cart!',
            showConfirmButton: false,
            timer: 3000
          });
        });
  });
});
