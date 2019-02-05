$(document).ready(function(){
  var iduser = $('#navbarDropdown').attr('class');
  var idshoe = $('.idshoe').attr('id');
  var size = '33';
  $("#dropdown-cart-js").on('click','.btn.btn-xs.btn-primary.pull-right', function() {
    var idtopass = $(this).closest('.object-in-cart').attr('id');
    console.log(idtopass);
    $.get('/shoes/'+idshoe+'/product-detail/'+size+'/removed', {idtopass:idtopass,iduser:iduser},
        function(returned){
          $(".dropdown.cart").html(returned);
        });
  });
});
