$(document).ready(function(){
  var idshoe = $('.idshoe').attr('id');
  console.log('atttowishresult '+idshoe);
  var number = '99';
  $('#wisheshandler').on('click', '.fa.fa-star-o', function(){
    Swal.fire({
  title: 'Added in Wish-list!',
  text: '',
  type: 'success',
  confirmButtonText: 'Go On!'
})
    url = '/shoes/'+idshoe+'/product-detail/'+number+'/addtowish';
    console.log(url);
    $.get(url, {idshoe:idshoe}, function(response){
      console.log(response);
      $('#wisheshandler').html(response);
    });
  });

  $('#wisheshandler').on('click', '.fa.fa-star', function(){
    Swal.fire({
      title: 'Removed from wishlist!',
      text: '',
      type: 'success',
      confirmButtonText: 'Go On!'
    })
    url = '/shoes/'+idshoe+'/product-detail/'+number+'/removefromwish';
    console.log(url);
    $.get(url, {idshoe:idshoe}, function(response){
      console.log(response);
      $('#wisheshandler').html(response);
    });
  });
});
