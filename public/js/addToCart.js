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
       console.log('fino a qua ok');
       var url = 'product-detail/'+size+'/add-cart';
       $.get('/shoes/'+idshoe+'/product-detail/'+size+'/addtocart' , {size:size, quantity:quantity, idshoe:idshoe, iduser:iduser},
                function(returned){
                  console.log(returned);
                  $('.divider').before(
                    '<li class="object-in-cart" id="'+returned[5]+'">'+
                         '<span class="item">'+
                           '<span class="item-left">'+
                              '<img src="http://lorempixel.com/50/50/" alt="" />'+
                               '<span class="item-info">'+
                                   '<span>'+returned[4]+'</span>'+
                                   '<span>'+returned[3] + '$' +'</span>'+
                               '</span>'+
                           '</span>'+
                           '<span class="item-right">'+
                               '<button class="btn btn-xs btn-primary pull-right">x</button>'+
                           '</span>'+
                       '</span>'+
                     '</li>'
                   );
                });


     } else {

       /* $('.js-size').append
       ('<div class="alert alert-warning">'+
          '<strong>Warning!</strong> This alert box could indicate a warning that might need attention.'+
      '</div>')*/
     }
});

});
});
