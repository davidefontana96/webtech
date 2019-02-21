$(document).ready(function(){
  var idshoe = $('.idshoe').attr('id');
  var numshoe = '44'; //non è importante
  $('#likehandler').on('click','.fa.fa-heart-o', function(){
    $.get('/shoes/'+idshoe+'/product-detail/'+numshoe+'/like', {idshoe:idshoe},
          function(returned){
              $('#likehandler').html(returned);
              $('.fa.fa-heart-o').removeClass('fa-heart-o').addClass('fa-heart');
    });
  });

  $('#likehandler').on('click','.fa.fa-heart', function(){
    $.get('/shoes/'+idshoe+'/product-detail/'+numshoe+'/removelike', {idshoe:idshoe},
          function(returned){
              $('#likehandler').html(returned);
              $('.fa.fa-heart').removeClass('fa-heart').addClass('fa-heart-o');
    });
  });
});
