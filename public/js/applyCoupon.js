$(document).ready(function(){
  $('#applyCoupon').on('click', function(){
    var coupon = $('#mycoupon').val();
    if(coupon != '')
    {
      $.get('/cart/couponapply', {coupon:coupon},
            function(response)
            {
              $('.removefromcart').html(response);
              $('#mycoupon').attr('placeholder', 'Your coupon number...');
              $('#mycoupon').val('');
              Swal.fire({
                title: 'Coupon applied!',
                text: 'Go on!',
                type: 'success',
                footer: 'Do not forget to add it in checkout page!!',
              });
            });
    } else {
      Swal.fire({
        title: 'You have not insert a coupon',
        text: 'Go on!',
        type: 'error',
        footer: 'Check the coupon!!'
        })
      $('#mycoupon').val('');
      $('#mycoupon').attr('placeholder', 'Before put your coupon there...');
    }
  });
});
