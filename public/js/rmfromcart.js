$(document).ready(function(){
  var iduser = $('#navbarDropdown').attr('class');
  var idshoe = $('.idshoe').attr('id');
  var size = '33';
  $("#dropdown-cart-js").on('click','.fas.fa-minus-circle', function() {
    var idtopass = $(this).closest('.object-in-cart').attr('id');
    console.log(idtopass);
    $.get('/shoes/'+idshoe+'/product-detail/'+size+'/removed', {idtopass:idtopass,iduser:iduser},
        function(returned){
          $(".dropdown.cart").html(returned);
          Swal.fire({
            type: 'success',
            title: 'Removed from Cart!',
            text: 'Go on!',
          })
        });
  });
});
