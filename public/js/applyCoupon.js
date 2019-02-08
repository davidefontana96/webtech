$(document).ready(function(){
  $('#applyCoupon').on('click', function(){
    var coupon = $('#mycoupon').val();
    if(coupon != '')
    {
      $.get('/cart/couponapply', {coupon:coupon},
            function(response)
            {
              console.log(response);
              $('.final-prices').html(response);
              $('#mycoupon').attr('placeholder', 'Your coupon number...');
              $('#mycoupon').val('');
            }
          );
    } else {
      $('#mycoupon').val('');
      $('#mycoupon').attr('placeholder', 'Before put your coupon there...');
    }
  });
});
