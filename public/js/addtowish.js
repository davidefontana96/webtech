$(document).ready(function(){
  var idshoe = $('.idshoe').attr('id');
  var number = '99';
  $('#wisheshandler').on('click', '.fa.fa-star-o', function(){
    url = '/shoes/'+idshoe+'/product-detail/'+number+'/addtowish';
    $.get(url, {idshoe:idshoe}, function(response){
      if(response != '0'){
      $('#wisheshandler').html(response);
      Swal.fire({
        type: 'success',
        title: 'Added to Wishlist!',
        showConfirmButton: false,
        timer: 3000
      });
    } else {}
    });
  });

  $('#wisheshandler').on('click', '.fa.fa-star', function(){
    url = '/shoes/'+idshoe+'/product-detail/'+number+'/removefromwish';
    $.get(url, {idshoe:idshoe}, function(response){
      $('#wisheshandler').html(response);
      Swal.fire({
        type: 'success',
        title: 'Removed from Wishlist!',
        showConfirmButton: false,
        timer: 3000
      });
    });
  });
});
