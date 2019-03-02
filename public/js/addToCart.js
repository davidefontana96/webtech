$(document).ready(function(){
  var size='';
  var quantity = 0;
  var idshoe = '';
  var iduser = $('#navbarDropdown').attr('class');

$('.btn-addtocart').click(function(){
  $('.js-size').find('li').each( function(){
     var temp = $(this).css('background-color');
     if(temp == 'rgb(97, 97, 97)')
     {
       size = $(this).children().attr('id');
       quantity = $('#quantity').val();
       idshoe = $('.idshoe').attr('id');
       var url = 'product-detail/'+size+'/add-cart';
       $.get('/shoes/'+idshoe+'/product-detail/'+size+'/addtocart' , {size:size, quantity:quantity, idshoe:idshoe, iduser:iduser},
                function(returned){
                  $(".dropdown.cart").html(returned);
                  var y =($("#quantity").attr('max'));
                  y = y-quantity;
                  $('#quantity').attr('max', y);
                  $('#quantity').val(0);

                  Swal.fire({
                    position: 'top-end',
                    type: 'success',
                    title: 'Your product has been added in Cart!',
                    showConfirmButton: false,
                    timer: 1500
                  })
                });


     } /*else {

       Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: 'Something went wrong!',
        footer: 'Check the measurements!'
      })
    }*/
});

});
});
