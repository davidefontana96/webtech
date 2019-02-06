$(document).ready(function(){
  var iduser = $('#navbarDropdown').attr('class');
  var idshoe = $('.idshoe').attr('id');
  var numshoe = '44'; //non è importante
  console.log('TANTE MADONNE')
  $('#likehandler').on('click','.fa.fa-heart-o', function(){
    $.get('/shoes/'+idshoe+'/product-detail/'+numshoe+'/like', {iduser:iduser, idshoe:idshoe},
          function(returned){
              console.log(returned);
              $('#likehandler').html(returned);
              $('.fa.fa-heart-o').removeClass('fa-heart-o').addClass('fa-heart');
    });
  });

  $('#likehandler').on('click','.fa.fa-heart', function(){
    $.get('/shoes/'+idshoe+'/product-detail/'+numshoe+'/removelike', {iduser:iduser, idshoe:idshoe},
          function(returned){
              console.log(returned);
              $('#likehandler').html(returned);
              $('.fa.fa-heart').removeClass('fa-heart').addClass('fa-heart-o');
    });
  });
});
