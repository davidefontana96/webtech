$(document).ready(function(){
  console.log('debug');

  var idshoe = $('.idshoe').attr('id');
  var size = '33';
  $('.btn.btn-xs.btn-primary.pull-right').on('click', function(){
    alert('prova');
    var idtopass = $(this).closest('.object-in-cart').attr('id');
    $(this).closest('.object-in-cart').remove();
    console.log(idtopass);
    $.get('/shoes/'+idshoe+'/product-detail/'+size+'/removed', {idtopass:idtopass},
        function(returned){
            console.log(returned);
        });

  });
});
